<?php

// get_pixels.inc.php
// support functions for pixel purchase and renewal processes.
//
// requires that $grid be set to the Grid object for the current
// region purchase/renewal. all other purchase/renewal data is in
// the $_SESSION['order_status'] array.

$order_status =& $_SESSION['order_status'];
$payment_controller =& $_SESSION['payment_controller'];

// get saved parameter from session
function param($param)
{
  global $order_status;
  if (isset($order_status[$param]))
  	return $order_status[$param];
}

// save request parameter to session
function save_params()
{
  global $order_status;
  $args = func_get_args();
  foreach ($args as $k => $param) {
    if (isset($_REQUEST[$param])) 
      $order_status[$param] = $_REQUEST[$param];
  }
}

// load request parameter from session
function load_params()
{
  $args = func_get_args();
  foreach ($args as $k => $param)
    $_REQUEST[$param] = param($param);
}

// clear request parameters
function clear_params()
{
  global $order_status;
  $args = func_get_args();
  foreach ($args as $k => $param)
    unset($order_status[$param]);
}

// upon post from payment selection form, validates and stores the
// payment (if not already done), and returns true. If the payment
// selection form needs to be redisplayed, returns false.
function process_payment() {
  global $app, $smarty;

  // payment id must be in session
  if (!isset($_SESSION['payment_id']))
    $app->abort('##Payment ID not set##');

  // handle no-charge payment
  if (param('amount') == 0) {
    store_free_payment();
    return 'free';
  }

  // if module key is not set, assume payment has been stored by
  // another process (e.g. paypal_return.php). verify that the payment
  // exists and is complete.
  if (!isset($_REQUEST['module_key'])) {
    require_once('payment.class.php');
    $tbl_payment= new Payment;
    $payment = $tbl_payment->get($_SESSION['payment_id']);
    if (!$payment->is_completed)
      $app->abort('##Payment not complete##');
    return true;
  }

  // load the module and validate the submission
  require_once('payment_module.class.php');
  $tbl_payment_module = new Payment_Module;
  $module = $tbl_payment_module->find('where `module_key`=?', array($_REQUEST['module_key']));
  if ($module->_new_row || !$module->is_enabled)
    $app->abort('##Invalid module_key##');
  $module->require_class();
  $obj = new $module->module_key;
  $module->conf = $obj->configuration();

  // validate the submission
  if (!$obj->validate())
    return false;

  if ($module->module_key == 'authorizenet') {

    // populate the confirmation form, which posts to service
    $module->action = $module->conf['MODULE_PAYMENT_AUTHORIZENET_URL'];
    $module->hidden = array(
      'session_id' => session_id(),
      'x_login' => $module->conf['MODULE_PAYMENT_AUTHORIZENET_LOGIN'],
      'x_version' => '3.0',
      'x_test_request' => $module->conf['MODULE_PAYMENT_AUTHORIZENET_TESTMODE'] == 'Test' ? 'TRUE' : 'FALSE',
      'x_fp_sequence' => $_SESSION['payment_id'],
      'x_fp_timestamp' => time(),
      'x_cust_id' => @$_SESSION['user_id'],
      'x_relay_response' => 'TRUE',
      'x_relay_url' => $app->url('/authorizenet_return.php', array(), true, true),
      'x_email' => param('email'),
      'x_description' => param('url'),
      'x_invoice_num' => $_SESSION['payment_id'],
      'x_amount' => param('amount'),
      'x_currency_code' => $module->conf['MODULE_PAYMENT_AUTHORIZENET_CURRENCY'],
      'x_method' => 'CC',
      'x_type' => 'AUTH_CAPTURE',
      'x_card_num' => $_REQUEST['authorizenet_cc_number'],
      'x_exp_date' => $_REQUEST['authorizenet_cc_expires_Month'] . $_REQUEST['authorizenet_cc_expires_Year'],
    );
    $module->hidden['x_fp_hash'] = $obj->CalculateFP(
      $module->hidden['x_login'],
      $module->conf['MODULE_PAYMENT_AUTHORIZENET_TXNKEY'],
      $module->hidden['x_amount'],
      $module->hidden['x_fp_sequence'],
      $module->hidden['x_fp_timestamp'],
      $module->hidden['x_currency_code']
    );
    load_params('amount');
    $smarty->assign_by_ref('module', $module);
    $smarty->caching = false;
    $smarty->display('get_pixels_authorizenet.tpl');
    exit;

  }
  elseif ($module->module_key == 'psigate') {

    // populate the confirmation form, which posts to service
    $module->action = $module->conf['MODULE_PAYMENT_PSIGATE_URL'];
    $module->hidden = array(
      'Bname' => $_REQUEST['psigate_cc_owner'],
      'Userid' => @$_SESSION['user_id'],
      'CardNumber' => $_REQUEST['psigate_cc_number'],
      'ExpMonth' => $_REQUEST['psigate_cc_expires_Month'],
      'ExpYear' => substr($_REQUEST['psigate_cc_expires_Year'], 2, 2),
      'Email' => param('email'),
      'ChargeType' => '0',
      'Result' => '0',
      'MerchantID' => $module->conf['MODULE_PAYMENT_PSIGATE_MERCHANT_ID'],
      'Items' => '1',
      'FullTotal' => param('amount'),
      'ThanksURL' => $app->url('/psigate_return.php', array('payment_id' => $_SESSION['payment_id']), true, true),
      'NoThanksURL' => payment_controller_url(),
    );
    load_params('amount');
    $smarty->assign_by_ref('module', $module);
    $smarty->caching = false;
    $smarty->display('get_pixels_psigate.tpl');
    exit;

  }
  elseif ($module->module_key == 'ipayment') {

    // populate the confirmation form, which posts to service
    $module->action = str_replace('[id]', $module->conf['MODULE_PAYMENT_IPAYMENT_ID'], $module->conf['MODULE_PAYMENT_IPAYMENT_URL']);
    $module->hidden = array(
      'silent' => '1',
      'trx_paymenttyp' => 'cc',
      'trxuser_id' => $module->conf['MODULE_PAYMENT_IPAYMENT_USER_ID'],
      'trxpassword' => $module->conf['MODULE_PAYMENT_IPAYMENT_PASSWORD'],
      'item_name' => param('url'),
      'trx_currency' => $module->conf['MODULE_PAYMENT_IPAYMENT_CURRENCY'],
      'trx_amount' => param('amount'),
      'cc_expdate_month' => $_REQUEST['ipayment_cc_expires_Month'],
      'cc_expdate_year' => $_REQUEST['ipayment_cc_expires_Year'],
      'cc_number' => $_REQUEST['ipayment_cc_number'],
      'cc_checkcode' => $_REQUEST['ipayment_cc_cvv'],
      'addr_name' => $_REQUEST['ipayment_cc_owner'],
      'redirect_url' => $app->url('/ipayment_return.php', array('payment_id' => $_SESSION['payment_id']), true, true),
      'silent_error_url' => payment_controller_url(),
      'cart_order_id' => $_SESSION['payment_id'],
    );
    load_params('amount');
    $smarty->assign_by_ref('module', $module);
    $smarty->caching = false;
    $smarty->display('get_pixels_ipayment.tpl');
    exit;

  }
  elseif ($module->module_key == 'cc') {
    // no additional processing required
  }
  elseif ($module->module_key == 'offline') {
    // no additional processing required
  }
  else {
    $app->abort('##Invalid module_key##');
  }

  // create the payment
  require_once('payment.class.php');
  $payment = new Payment;
  $payment->id = $_SESSION['payment_id'];
  $payment->payment_method = $module->module_key;
  $payment->is_completed = 1;
  $payment->completed_at = Util::epoch_to_datetime();
  $payment->is_verified = 1;
  $payment->verified_at = Util::epoch_to_datetime();
  $payment->verified_vars = print_r($_REQUEST, true);
  $payment->txn_id = '';

  // cc payments require offline verification
  if ($module->module_key == 'cc') {
    $payment->is_verified = 0;

    // if split CC digits requested, mail the middle digits separately
    if ($module->conf['MODULE_PAYMENT_CC_EMAIL']) {
      $cc_number =& $_REQUEST['cc_number'];
      preg_match('/^(....)(.*)(....)$/', $cc_number, $matches);
      $cc_digits = $matches[2];
      $matches[2] = str_repeat('X', strlen($matches[2]));
      $cc_number = $matches[1] . $matches[2] . $matches[3];
      $payment->verified_vars = print_r($_REQUEST, true);
      $app->mail($module->conf['MODULE_PAYMENT_CC_EMAIL'], 'cc_split_digits', array(
        '[cc_digits]' => $cc_digits,
        '[payment_id]' => $payment->id,
        '[payment_url]' => $app->url('/admin/payment_history.php', array('id' => $payment->id), true, true),
      ));
    }

  }

  // offline payments require offline verification
  if ($module->module_key == 'offline') {
    $payment->is_verified = 0;
  }
  $payment->drawing_id = param('drawing_id')?param('drawing_id'):0;
  $payment->save();
   
  

  return true;
}

// store the region and republish the grid
// link the payment to the region
function store_region() {
  global $app, $grid, $order_status;
  require_once('region.class.php');
  require_once('payment.class.php');

  // retrieve the payment
  $tbl_payment = new Payment;
  $payment = $tbl_payment->get($_SESSION['payment_id']);

  // create the region
  $region = new Region;
  $region->grid_id = param('grid_id');
  // if ($app->setting->user_accounts) $region->user_id = $_SESSION['user_id'];
  $region->x = param('x');
  $region->y = param('y');
  $region->width = param('w');
  $region->height = param('h');
  $region->image = $_SESSION['image'];
  $region->url = param('url');
  $region->title = param('title');
  $region->alt = param('alt');
  $region->email = param('email');
  $region->type = param('sponsortype');

  // set the expiration-related dates if necessary
  $now = time();
  if ($grid->expire_days > 0)
    $region->expires_at = Util::epoch_to_datetime($now + $grid->expire_days * 86400);
  if ($grid->reminder_days > 0)
    $region->reminder_at = Util::epoch_to_datetime($now + ($grid->expire_days - $grid->reminder_days) * 86400);
  if ($grid->purge_days > 0)
    $region->purge_at = Util::epoch_to_datetime($now + ($grid->expire_days + $grid->purge_days) * 86400);

  // determine region status. region is pending if administrator
  // approval is required or if the payment has not been verified.
  $region->status = REGION_ACTIVE;
  if ($app->setting->approval_required)
    $region->status = REGION_PENDING;
  if (!$payment->is_verified || $payment->is_error)
    $region->status = REGION_PENDING;
  if(!$payment->is_error)
    $region->status = REGION_ACTIVE;
   
  // save region and mark grid dirty
  $region->save();
  $grid->is_dirty = 1;
  $grid->save();
  $order_status['region_id'] = $region->id();

  // link the payment to the region
  $payment->region_id = param('region_id');
  $payment->email = param('email');
  $payment->amount = param('amount');
  $payment->drawing_id = param('drawing_id')?param('drawing_id'):0;
  $payment->save();

  // this payment is now finished
  unset($_SESSION['payment_id']);

  // send email confirmation
  send_confirmation($region, $payment);
}

// renew the region and republish the grid
// link the payment to the region
function renew_region()
{
  global $app, $grid, $region, $order_status;
  require_once('region.class.php');
  require_once('payment.class.php');

  // retrieve the payment
  $tbl_payment = new Payment;
  $payment = $tbl_payment->get($_SESSION['payment_id']);

  // renew the region

  // set the expiration-related dates if necessary
  $expires_at = strtotime(param('new_expires_at'));
  $region->expires_at = Util::epoch_to_datetime($expires_at);
  if ($grid->reminder_days > 0)
    $region->reminder_at = Util::epoch_to_datetime($expires_at - $grid->reminder_days * 86400);
  else
    $region->reminder_at = Util::empty_datetime();
  if ($grid->purge_days > 0)
    $region->purge_at = Util::epoch_to_datetime($expires_at + $grid->purge_days * 86400);
  else
    $region->purge_at = Util::empty_datetime();

  // upon renewal, region is marked active if it was expired.
  if ($region->status == REGION_EXPIRED)
    $region->status = REGION_ACTIVE;

  // save region and mark grid dirty
  $region->save();
  $grid->is_dirty = 1;
  $grid->save();

  // link the payment to the region
  $payment->region_id = param('region_id');
  $payment->email = param('email');
  $payment->amount = param('amount');
  $payment->drawing_id = param('drawing_id')?param('drawing_id'):0;
  $payment->save();

  // this payment is now finished
  unset($_SESSION['payment_id']);
}

// send the confirmation email, based on the status of the region
function send_confirmation($region, $payment)
{
  global $app, $grid;

  if ($grid->allow_free_paid == 'false') {
    send_purchase_confirmation($region, $payment);
  }

    // if region is not active, send admin notification
  if ($region->status != REGION_ACTIVE) {
      $app->mail($app->setting->admin_email, 'region_approval_notification', array(
        '[region_id]' => $region->id,
        '[region_url]' => $app->url('/admin/edit_region.php', array('id' => $region->id), true, true),
        '[payment_method]' => $payment->payment_method,
        '[payment_id]' => $payment->id,
        '[payment_url]' => $app->url('/admin/payment_history.php', array('id' => $payment->id), true, true),
        '[user_id]' => $app->setting->user_accounts ? $region->user_id : '(N/A)',
        '[user_url]' => $app->setting->user_accounts ? $app->url('/admin/user_accounts.php', array('id' => $region->user_id), true, true) : '(N/A)',
      ));
  }
}

// send purchase confirmation email
function send_purchase_confirmation($region, $payment) {
  global $app, $lang;

  if (!is_object($payment)){
    $payment = (object)'';
    $payment->payment_method = '';
    $payment->amount = '';
  } 

  $template = 'email_purchase_active';
  if ($region->status != REGION_ACTIVE)
    $template = 'email_purchase_pending';
  if ($payment->payment_method == 'offline')
    $template = 'offline_payment_email';
  $update_url_param = array('id' => $region->id);
  if (!$app->setting->user_accounts)
    $update_url_param['digest'] = $app->digest(array($region->id));
  $app->mail($region->email, $template, array(
    '[confirmation_number]' => $region->id,
    '[update_url]' => $app->url('/update.php', $update_url_param, true, true),
    '[email]' => $region->email,
    '[amount]' => $app->setting->currency_symbol . number_format($payment->amount, 2, $lang->decimal_point, $lang->thousands_separator),
  ));
}

// store a payment row for free pixels
function store_free_payment() {
  require_once('payment.class.php');

  $payment = new Payment;
  $payment->id = $_SESSION['payment_id'];
  $payment->payment_method = '(none)';
  $payment->is_completed = 1;
  $payment->completed_at = Util::epoch_to_datetime();
  $payment->is_verified = 1;
  $payment->verified_at = Util::epoch_to_datetime();
  $payment->save();
}

// return a full URL to the payment controller
function payment_controller_url()
{
  global $app, $payment_controller, $order_status;
  if ($payment_controller == 'renew')
    return $app->url('/renew.php', array('step' => param('step'), 'id' => param('region_id'), 'email' => @$_REQUEST['email'], 'digest' => @$_REQUEST['digest']));
  return $app->url('/get_pixels.php', array('step' => $order_status['step']));
}

// redirect to next step
function next_step()
{
  global $app, $step, $order_status, $payment_controller;
  $order_status['step']++;
  header('Location: ' . payment_controller_url());
  exit;
}
function next_step_url()
{
  global $app, $step, $order_status, $payment_controller;
  $order_status['step']++;
   return payment_controller_url();
  // exit;
}

// allocate a payment id for this transaction
function allocate_payment_id()
{
  require_once('payment_id.class.php');
  $_SESSION['payment_id'] = Payment_Id::next_id();
}

// assign payment options to smarty for this region
function assign_payment_options()
{
  global $app, $grid, $step, $smarty, $payment_controller;

  require_once('payment_module.class.php');
  require_once('snippet.class.php');

  // find active payment modules
  $tbl = new Payment_Module;
  $modules = $tbl->find_all('where is_enabled order by `display_order`, `name`');

  // set values for each module
  for ($i = 0; $i < count($modules); $i++) {
    $module =& $modules[$i];

    // get the module and it's configuration
    $module->require_class();
    $obj = new $module->module_key;
    $module->conf = $obj->configuration();
    
    // compute amount
    $grid_title = Snippet::snippet_text('grid_title', $grid->id());
 
    $module->action = $app->url();

    // set hidden fields based on module type
    switch ($module->module_key) {

    case 'authorizenet':
      $module->hidden = array(
        'module_key' => $module->module_key,
        'step' => param('step'),
      );
      if ($payment_controller == 'renew') {
        $module->hidden['id'] = $_REQUEST['id'];
        $module->hidden['digest'] = $_REQUEST['digest'];
        $module->hidden['email'] = $_REQUEST['email'];
      }
      break;

    case 'cc':
      $module->hidden = array(
        'module_key' => $module->module_key,
        'step' => param('step'),
      );
      if ($payment_controller == 'renew') {
        $module->hidden['id'] = $_REQUEST['id'];
        $module->hidden['digest'] = $_REQUEST['digest'];
        $module->hidden['email'] = $_REQUEST['email'];
      }
      break;

    case 'offline':
      $module->hidden = array(
        'module_key' => $module->module_key,
        'step' => param('step'),
      );
      if ($payment_controller == 'renew') {
        $module->hidden['id'] = $_REQUEST['id'];
        $module->hidden['digest'] = $_REQUEST['digest'];
        $module->hidden['email'] = $_REQUEST['email'];
      }
      break;

    case 'paypal':
      $module->action = $module->conf['MODULE_PAYMENT_PAYPAL_URL'];
      $module->hidden = array(
        'amount' => param('amount'),
        'business' => $module->conf['MODULE_PAYMENT_PAYPAL_ID'],
        'cancel_return' => payment_controller_url(),
        'cmd' => '_xclick',
        'currency_code' => $module->conf['MODULE_PAYMENT_PAYPAL_CURRENCY'],
        'custom' => $_SESSION['payment_id'].':'.session_id(),
        'item_name' => "$grid_title: " . param('url'),
        'no_note' => '1',
        'NotifyURL' => $app->url('/paypal_ipn.php', array('payment_id' => $_SESSION['payment_id']), true, true),
        'no_shipping' => '1',
        'return' => $app->url('/paypal_return.php', array('payment_id' => $_SESSION['payment_id']), true, true),
        'rm' => '2',
      );
      if ($module->conf['MODULE_PAYMENT_PAYPAL_USE_IPN'])
        $module->hidden['notify_url'] = $app->url('/paypal_ipn.php', false, true, true);
      break;
    case 'instamojo':
      
    $amount_var = round(($_SESSION['inrRate'] * param('amount')),2);
      $module->action = $module->conf['MODULE_PAYMENT_INSTAMOJO_FORM_URL'].'?a='.base64_encode($amount_var);
      $module->hidden = array(
        'amount' => base64_encode($amount_var."_"),
        'email' => param('email'),
        'w' => param('w'),
        'h' => param('h'),
        'x' => param('x'),
        'y' => param('y')
      );
       
      break;

    case 'nochex':
      $module->action = $module->conf['MODULE_PAYMENT_NOCHEX_URL'];
      $module->hidden = array(
        'email' => $module->conf['MODULE_PAYMENT_NOCHEX_ID'],
        'amount' => param('amount'),
        'ordernumber' => $_SESSION['payment_id'],
        'description' => "$grid_title: " . param('url'),
        'returnurl' => $app->url('/nochex_return.php', array('payment_id' => $_SESSION['payment_id']), true, true),
        'cancelurl' => payment_controller_url(),
        'email_address_sender' => param('email'),
      );
      if ($module->conf['MODULE_PAYMENT_NOCHEX_USE_APC'])
        $module->hidden['responderurl'] = $app->url('/nochex_apc.php', false, true, true);
      break;

    case 'psigate':
      $module->hidden = array(
        'module_key' => $module->module_key,
        'step' => param('step'),
      );
      if ($payment_controller == 'renew') {
        $module->hidden['id'] = $_REQUEST['id'];
        $module->hidden['digest'] = $_REQUEST['digest'];
        $module->hidden['email'] = $_REQUEST['email'];
      }
      break;

    case 'ipayment':
      $module->hidden = array(
        'module_key' => $module->module_key,
        'step' => param('step'),
      );
      if ($payment_controller == 'renew') {
        $module->hidden['id'] = $_REQUEST['id'];
        $module->hidden['digest'] = $_REQUEST['digest'];
        $module->hidden['email'] = $_REQUEST['email'];
      }
      break;

    case 'secpay':
      $test_status = $module->conf['MODULE_PAYMENT_SECPAY_TEST_STATUS'];
      if ($test_status != 'true' && $test_status != 'false')
        $test_status = 'live';
      $module->action = $module->conf['MODULE_PAYMENT_SECPAY_URL'];
      $module->hidden = array(
        'merchant' => $module->conf['MODULE_PAYMENT_SECPAY_MERCHANT_ID'],
        'trans_id' => session_id(),
        'amount' => param('amount'),
        'callback' => $app->url('/secpay_return.php', false, true, true),
        'options' => "test_status=$test_status",
      );
      if ($module->conf['MODULE_PAYMENT_SECPAY_CURRENCY'])
        $module->hidden['currency'] = strtoupper($module->conf['MODULE_PAYMENT_SECPAY_CURRENCY']);
      if ($module->conf['MODULE_PAYMENT_SECPAY_REMOTE_PASSWORD'])
        $module->hidden['digest'] = strtolower(md5(
          $module->hidden['trans_id'] .
          $module->hidden['amount'] .
          $module->conf['MODULE_PAYMENT_SECPAY_REMOTE_PASSWORD']
        ));
      break;

    case 'pm2checkout':
      $module->action = $module->conf['MODULE_PAYMENT_2CHECKOUT_URL'];
      $module->hidden = array(
        'sid' => $module->conf['MODULE_PAYMENT_2CHECKOUT_LOGIN'],
        'total' => sprintf('%.2f', param('amount')),
        'cart_order_id' => $_SESSION['payment_id'],
        'return_url' => $app->url('/pm2checkout_return.php', false, true, true),
        'merchant_order_id' => $_SESSION['payment_id'],
        'pay_method' => 'cc',
        'c_prod' => $module->conf['MODULE_PAYMENT_2CHECKOUT_C_PROD'],
        'id_type' => $module->conf['MODULE_PAYMENT_2CHECKOUT_ID_TYPE'],
        'session_id' => session_id()
      );
      if ($module->conf['MODULE_PAYMENT_2CHECKOUT_TESTMODE'])
        $module->hidden['demo'] = 'Y';
      break;

    case 'egold':
      $payee_name = $module->conf['MODULE_PAYMENT_EGOLD_PAYEE_NAME'];
      if (empty($payee_name))
        $payee_name = $app->setting->site_name;
      $module->action = $module->conf['MODULE_PAYMENT_EGOLD_URL'];
      $module->hidden = array(
        'PAYEE_ACCOUNT' => $module->conf['MODULE_PAYMENT_EGOLD_PAYEE_ACCOUNT'],
        'PAYEE_NAME' => $module->conf['MODULE_PAYMENT_EGOLD_PAYEE_NAME'],
        'PAYMENT_AMOUNT' => param('amount'),
        'PAYMENT_UNITS' => $module->conf['MODULE_PAYMENT_EGOLD_PAYMENT_UNITS'],
        'PAYMENT_METAL_ID' => $module->conf['MODULE_PAYMENT_EGOLD_PAYMENT_METAL_ID'],
        'PAYMENT_ID' => $_SESSION['payment_id'],
        'STATUS_URL' => $app->url('/egold_verify.php', array('payment_id' => $_SESSION['payment_id']), true, true),
        'PAYMENT_URL' => $app->url('/egold_return.php', array('payment_id' => $_SESSION['payment_id']), true, true),
        'PAYMENT_URL_METHOD' => 'POST',
        'NOPAYMENT_URL' => payment_controller_url(),
        'NOPAYMENT_URL_METHOD' => 'GET',
        'BAGGAGE_FIELDS' => '',
      );
      break;

    }
  }

  $smarty->assign_by_ref('modules', $modules);

}

// prepare to simulate the effect of a POST back to the payment controller
// after payment processor return by setting up environment and returning
// the name of the payment controller to include.
function postback_payment_controller()
{
  global $app, $payment_controller;

  $_SERVER['REQUEST_METHOD'] = 'POST';
  if ($payment_controller == 'renew')  {
    $_REQUEST['step'] = 1;
    require_once('region.class.php');
    $tbl_region = new Region;
    $region = $tbl_region->get(param('region_id'));
    $_REQUEST['id'] = $region->id;
    $_REQUEST['digest'] = $app->digest(array($region->id));
    $_REQUEST['email'] = $region->email;
    return('renew.php');
  }
  else {
    $_REQUEST['step'] = 6;
    return('get_pixels.php');
  }
}

?>
