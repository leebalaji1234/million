<?php

// secpay_return.php
// handle callback from SECPay gateway
//
// This script is called via a GET from SECPay's gateway,
// similar to the way PayPal IPN works. However, the response from
// this script is relayed back to the customer's browser as if it
// originated from the SECPay gateway.
//
// The trans_id parameter is used as a session key. They payment
// is then taken from the session 'payment_id' field.  This
// payment must not already exist. This script creates the payment
// row and sets its status, and then simulates the post back to step 6
// of get_pixels.php, which will create the region and then move
// on to the "Thank You" page.

// since we are being fetched from SECPay, we won't get the session
// id via the normal cookie; instead, use the request parameter for the
// session id.
session_id(@$_GET['trans_id']);

require_once('config.php');
$app->initialized = false;    # this prevents error templates from being used

// we must have 'trans_id' and 'code' parameters at a bare minimum,
// otherwise, this is a spurious post
if (!isset($_GET['trans_id']) || !isset($_GET['code']))
  $app->redirect('/index.php');

require_once('payment.class.php');
require_once('payment_module.class.php');
require_once('util.class.php');
require_once('get_pixels.inc.php');

// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='secpay'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// create payment row (must not already exist)
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($_SESSION['payment_id'], false);
if (!$payment->_new_row)
  $app->abort('##Duplicate Payment Id##');
$payment->id = $_SESSION['payment_id'];
$payment->payment_method = 'secpay';

// handle errors
$payment->is_error = 0;
$payment->notes = '';
if ($_REQUEST['code'] != 'A')
  $payment->is_error = 1;

// set completion
$payment->is_completed = 1;
$payment->completed_at = Util::epoch_to_datetime();
$payment->verified_vars = print_r($_REQUEST, true);
$payment->txn_id = '';

// check MD5 hash if key has been provided
if (!empty($conf['MODULE_PAYMENT_SECPAY_DIGEST_KEY'])) {
  $uri = preg_replace('/hash=.*/', '', $_SERVER['REQUEST_URI']);
  $hash = strtolower(md5($uri . $conf['MODULE_PAYMENT_SECPAY_DIGEST_KEY']));
  if (strtolower($hash) != strtolower(@$_REQUEST['hash'])) {
    $payment->is_error = 1;
    $payment->notes .= "MD5 hash validation failed on callback!\r\n";
  }
  else {
    // MD5 hash is valid, so set verification
    $payment->is_verified = 1;
    $payment->verified_at = $payment->completed_at;
  }
}

// check amount on response
if (abs(@$_REQUEST['amount'] - param('amount')) > 0.001) {
  $payment->is_error = 1;
  $payment->notes .= "Payment amount has been changed! Expected " . param('amount') . "\r\n";
}

// save payment
$payment->save();
$tbl->unlock();

// if the payment was not approved, don't create the region; instead
// show an error page
if ($payment->is_error) {
  $reason = '##There has been an error processing this transaction.##';
  if ($_REQUEST['code'] == 'D')
    $reason = '##This transaction has been declined.##';
  $smarty->assign('reason', $lang->language_translate($reason));
  if ($payment_controller == 'renew')
    $smarty->display('renew_payment_error.tpl');
  else
    $smarty->display('get_pixels_payment_error.tpl');
  exit;
}

// now simulate the purchase/renewal and "thank you". This
// is necessary because we need to land on the "thank you" page

// create or renew the region 
if ($payment_controller == 'renew') {
  $region_id = param('region_id');
  require_once('region.class.php');
  $tbl_region = new Region;
  $region = $tbl_region->get($region_id);
  require_once('grid.class.php');
  $tbl_grid = new Grid;
  $grid = $tbl_grid->get($region->grid_id);
  renew_region();
}
else {
  require_once('grid.class.php');
  $tbl = new Grid;
  $grid_id = param('grid_id');
  $grid = $tbl->get($grid_id);
  store_region();
}

// show "thank you" 
load_params('region_id');
unset($_SESSION['order_status']);
if ($payment_controller == 'renew') {
  $_REQUEST['id'] = $region->id;
  $_REQUEST['digest'] = $app->digest(array($region->id));
  $_REQUEST['email'] = $region->email;
  $smarty->display('renew_done.tpl');
}
else
  $smarty->display('get_pixels_done.tpl');

?>
