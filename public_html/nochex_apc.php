<?php

// nochex_apc.php
// handle NOCHEX APC response

require_once('config.php');
$app->initialized = false;    # this prevents error templates from being used

// this must be a POST
if (@$_SERVER['REQUEST_METHOD'] != 'POST') 
  $app->redirect('/index.php');

// we must have 'order_id' and 'transaction_id' parameters at a bare minimum,
// otherwise, this is a spurious post
if (!isset($_POST['order_id']) || !isset($_POST['transaction_id'])) 
  $app->redirect('/index.php');

require_once('payment_module.class.php');
require_once('payment.class.php');
require_once('util.class.php');

// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='nochex'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// save the posted vars
$verified_vars = $_POST;

// create the post back to verify that NOCHEX was the legitimate source
// of this data and that this is a real payment
$vars = array();
foreach ($_POST as $name => $val)
  $vars[] = rawurlencode($name) . '=' . rawurlencode($val);

$c = curl_init($conf['MODULE_PAYMENT_NOCHEX_VERIFY_URL']);
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, implode('&', $vars));
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($c);
curl_close($c);

// fetch payment row
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($_REQUEST['order_id'], false);
$payment->id = $_REQUEST['order_id'];
$payment->payment_method = $module->module_key;
if ($payment->_new_row) $payment->notes = '';

// handle errors
if (trim($result) != 'AUTHORISED') {
  $payment->is_error = 1;
  $payment->notes .= "APC result not 'AUTHORISED'\r\n";
}

// update verified status
$payment->is_verified = 1;
$payment->verified_at = Util::epoch_to_datetime();
$payment->verified_vars = print_r($verified_vars, true) . print_r("POST Response='$result'", true);
$payment->txn_id = $_REQUEST['transaction_id'];

// save payment
$payment->save();
$tbl->unlock();

?>
