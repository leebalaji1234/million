<?php

// ipayment_return.php
// handle return to site after ipayment payment
 
$payment_controller = 'get_pixels';
require_once('config.php');
$logFile = 'payment_logs/instamojo.log';
$getset = print_r($_GET,true);
$postset = print_r($_POST,true);
// we must have a payment_id in process, and it must match the request id
 
// Array ( [payment_request_id] => aa5a2aa9ae9642ddb18a252f53756dab [payment_id] => MOJO6422005U08639482 ) 
if (!isset($_REQUEST['payment_id']) || !isset($_REQUEST['payment_request_id'])) {
	 
  $logInfo = "[".date('d-m-Y h:i:s a')."]ERROR : RETURN PAY ::  missing payment_id : GET[$getset] POST[$postset]\n";
  file_put_contents($logFile, $logInfo,FILE_APPEND);
  $app->redirect('/index.php');
}

require_once('payment.class.php');
require_once('payment_module.class.php');
require_once('util.class.php');
require_once('get_pixels.inc.php');
require_once('instamojo_payment.class.php'); 
$tblins = new Instamojo_payment;
$insdata = $tblins->find('where instamojo_id=?',array($_REQUEST['payment_request_id']));
// load the payment module and its configuration
$tbl = new Payment_Module;
$module = $tbl->find("where module_key='instamojo'");
$module->require_class();
$obj = new $module->module_key;
$conf = $obj->configuration();

// fetch payment row
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($insdata->payment_id, false);
$payment->id = $insdata->payment_id;
$payment->payment_method = $module->module_key;

// update completed status
$payment->is_completed = 1;
$payment->completed_at = Util::epoch_to_datetime();

// save payment
$payment->save();
$tbl->unlock();
 $_REQUEST['payment_type'] = 'instamojo';
  // print_r($_SESSION['current_order_status']);exit;
  $_SESSION['payment_id'] = $insdata->payment_id;
 $order_status = $_SESSION['current_order_status'];
 // $order_status['url'] ='http://www.google.com';
 // $order_status['title'] = 'awesome';
 // $order_status['alt'] = 'wallexpress';
$logInfo = "[".date('d-m-Y h:i:s a')."]INFO : PAYMENT MODULE : PAYMENT SAVED : GET[$getset] POST[$postset]\n";
file_put_contents($logFile, $logInfo,FILE_APPEND);
require(postback_payment_controller());

?>
