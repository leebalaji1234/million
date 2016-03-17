<?php

// egold_verify.php
// handle E-Gold status response

require_once('config.php');
$app->initialized = false;    # this prevents error templates from being used

// this must be a POST
if (@$_SERVER['REQUEST_METHOD'] != 'POST') 
  $app->redirect('/index.php');

// we must have 'PAYMENT_ID' and 'PAYMENT_BATCH_NUM' parameters at a bare minimum,
// otherwise, this is a spurious post
if (!isset($_POST['PAYMENT_ID']) || !isset($_POST['PAYMENT_BATCH_NUM'])) 
  $app->redirect('/index.php');

require_once('payment_module.class.php');
require_once('payment.class.php');
require_once('util.class.php');

// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='egold'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// save the posted vars
$verified_vars = $_POST;

// fetch payment row
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($_REQUEST['PAYMENT_ID'], false);
$payment->id = $_REQUEST['PAYMENT_ID'];
$payment->payment_method = $module->module_key;
if ($payment->_new_row) $payment->notes = '';

// handle errors
if (empty($_REQUEST['PAYMENT_BATCH_NUM'])) {
  $payment->is_error = 1;
  $payment->notes .= "PAYMENT_BATCH_NUM is empty\r\n";
}
elseif (!empty($conf['MODULE_PAYMENT_EGOLD_ALTERNATE_PASSPHRASE']) && $_REQUEST['V2_HASH'] != compute_v2_hash($conf['MODULE_PAYMENT_EGOLD_ALTERNATE_PASSPHRASE'])) {
  $payment->is_error = 1;
  $payment->notes .= "V2_HASH check failed\r\n";
}

// update verified status
$payment->is_verified = 1;
$payment->verified_at = Util::epoch_to_datetime();
$payment->verified_vars = print_r($verified_vars, true);
$payment->txn_id = $_REQUEST['PAYMENT_BATCH_NUM'];

// save payment
$payment->save();
$tbl->unlock();

function compute_v2_hash($passphrase)
{
  return strtoupper(md5(implode(':', array(
    $_POST['PAYMENT_ID'],
    $_POST['PAYEE_ACCOUNT'],
    $_POST['PAYMENT_AMOUNT'],
    $_POST['PAYMENT_UNITS'],
    $_POST['PAYMENT_METAL_ID'],
    $_POST['PAYMENT_BATCH_NUM'],
    $_POST['PAYER_ACCOUNT'],
    strtoupper(md5($passphrase)),
    $_POST['ACTUAL_PAYMENT_OUNCES'],
    $_POST['USD_PER_OUNCE'],
    $_POST['FEEWEIGHT'],
    $_POST['TIMESTAMPGMT'],
  ))));
}

?>
