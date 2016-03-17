<?php

// nochex_return.php
// handle return to site after nochex payment

require_once('config.php');

// we must have a payment_id in process, and it must match the request id
if (!isset($_SESSION['payment_id']) || !isset($_REQUEST['payment_id']) || @$_SESSION['payment_id'] != @$_REQUEST['payment_id']) 
  $app->redirect('/index.php');

require_once('payment.class.php');
require_once('payment_module.class.php');
require_once('util.class.php');
require_once('get_pixels.inc.php');

// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='nochex'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// fetch payment row, waiting for APC if necessary
$tbl = new Payment;
@set_time_limit(120);
$timeout = time() + 60;
while (true) {
  $tbl->lock();
  $payment = $tbl->get($_SESSION['payment_id'], false);

  // if APC is enabled, wait up to 60 seconds for APC
  if ($conf['MODULE_PAYMENT_NOCHEX_USE_APC'] && !@$payment->is_verified) {
    if (time() < $timeout) {
      $tbl->unlock();
      sleep(1);
      continue;
    }
  }
  break;
}
$payment->id = $_SESSION['payment_id'];
$payment->payment_method = $module->module_key;

// update completed status
$payment->is_completed = 1;
$payment->completed_at = Util::epoch_to_datetime();

// save payment
$payment->save();
$tbl->unlock();

require(postback_payment_controller());

?>
