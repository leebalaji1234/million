<?php
// paypal_ipn.php
// handle PayPal IPN response
list($custom, $session_id) = explode(':', $_REQUEST['custom']);
session_id($session_id);

require_once('config.php');
$values = __FILE__.var_export($_REQUEST, true). var_export($_SESSION, true);
error_log($values, 1, 'xshare@kalexandr.com');
require_once('includes/get_pixels.inc.php');
$app->initialized = false;    # this prevents error templates from being used
session_id($session_id);

// this must be a POST
if (@$_SERVER['REQUEST_METHOD'] != 'POST') 
  $app->redirect('/index.php');

// we must have 'custom' and 'txn_id' parameters at a bare minimum,
// otherwise, this is a spurious post
if (!isset($_POST['custom']) || !isset($_POST['txn_id'])) 
  $app->redirect('/index.php');


require_once('payment_module.class.php');
require_once('payment.class.php');
require_once('util.class.php');

// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='paypal'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// save the posted vars
$verified_vars = $_REQUEST;

// create the post back to verify that PayPal was the legitimate source
// of this data and that this is a real payment
$url = trim($conf['MODULE_PAYMENT_PAYPAL_VERIFY_URL']);
if ($url == '') $url = trim($conf['MODULE_PAYMENT_PAYPAL_URL']);
$vars = array();
$_REQUEST['cmd'] = '_notify-validate';
foreach ($_REQUEST as $name => $val)
  $vars[] = rawurlencode($name) . '=' . rawurlencode($val);

$c = curl_init($conf['MODULE_PAYMENT_PAYPAL_VERIFY_URL']);
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, implode('&', $vars));
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($c);
curl_close($c);

// fetch payment row
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($custom, false);
$payment->id = $custom;
$payment->payment_method = $module->module_key;

// handle errors
if ($result != 'VERIFIED') {
  $payment->is_error = 1;
  $payment->notes .= "IPN result not 'VERIFIED'\n";
} else {
  if ($verified_vars['payment_status'] != 'Completed') {
    $payment->is_error = 1;
    $payment->notes .= "payment_status not 'Completed'\n";
  } else {
    $payment->is_completed = 1;
    $payment->completed_at = Util::epoch_to_datetime();
    $payment->amount = $verified_vars['payment_gross'];
    $payment->email = $verified_vars['payer_email'];
 //   $payment->region_id =  $_SESSION['order_status']['region_id'];
  }

}

// update verified status
$payment->is_verified = 1;
$payment->verified_at = Util::epoch_to_datetime();
$payment->verified_vars = print_r($verified_vars, true) . print_r("POST Response='$result'".var_export($_SESSION, true), true);
$payment->txn_id = $_REQUEST['txn_id'];

// save payment
$payment->save();
$tbl->unlock();

//republish grids and clear cache
require_once('grid.class.php');
@set_time_limit(120);
$tbl = new Grid;
$grids = $tbl->find_all();
foreach ($grids as $k => $grid) {
 	$grid->publish(true);
}

$smarty->clear_all_cache();
require(postback_payment_controller());
?>
