<?php

// pm2checkout_return.php
// handle return to site after pm2checkout payment
if ($_REQUEST['session_id'])
  session_id($_REQUEST['session_id']);

require_once('config.php');

// we must have a payment_id in process, and it must match the request id
if (!isset($_SESSION['payment_id']) || !isset($_REQUEST['cart_order_id']) || @$_SESSION['payment_id'] != @$_REQUEST['cart_order_id']) 
  $app->redirect('/index.php');

require_once('payment.class.php');
require_once('payment_module.class.php');
require_once('util.class.php');
require_once('get_pixels.inc.php');

// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='pm2checkout'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// fetch payment row
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($_SESSION['payment_id'], false);
$payment->id = $_SESSION['payment_id'];
$payment->payment_method = $module->module_key;

// handle errors
$payment->is_error = 0;
$payment->notes = '';
if (@$_REQUEST['credit_card_processed'] != 'Y')
  $payment->is_error = 1;

// update completed status
$payment->is_completed = 1;
$payment->completed_at = Util::epoch_to_datetime();
$payment->verified_vars = print_r($_REQUEST, true);
$payment->txn_id = @$_REQUEST['order_number'];

// check MD5 hash if secret word has been provided
if (!empty($conf['MODULE_PAYMENT_2CHECKOUT_SECRET_WORD'])) {
  $hash = strtolower(md5(
    $conf['MODULE_PAYMENT_2CHECKOUT_SECRET_WORD'] .
    $conf['MODULE_PAYMENT_2CHECKOUT_LOGIN'] . $_REQUEST['order_number'] .
    $_REQUEST['total']
  ));
  if (strtolower($hash) != strtolower(@$_REQUEST['key'])) {
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
if (abs(@$_REQUEST['total'] - param('amount')) > 0.001) {
  $payment->is_error = 1;
  $payment->notes .= "Payment amount has been changed! Expected " . param('amount') . "\r\n";
}

// save payment
$payment->save();
$tbl->unlock();

require(postback_payment_controller());

?>