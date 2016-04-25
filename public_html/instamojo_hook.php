<?php
require_once('config.php');
$logFile = 'payment_logs/instamojo.log';
$getset = print_r($_GET,true);
$postset = print_r($_POST,true);
// we must have a payment_id in process, and it must match the request id
if (!isset($_REQUEST['payment_request_id'])) 
  $logInfo = "[".date('d-m-Y h:i:s a')."]ERROR : HOOK :: missing payment_id : GET[$getset] POST[$postset]\n";
  file_put_contents($logFile, $logInfo,FILE_APPEND);
   

require_once('payment.class.php'); 
require_once('util.class.php'); 
require_once('instamojo_payment.class.php');
$tblins = new Instamojo_payment;
$insdata = $tblins->find('where instamojo_id=?',array($_REQUEST['payment_request_id']));
if($_REQUEST['status'] == 'Credit'){
	$paymentstatus = 1;
	$insdata->pay_status = 'Success';
}else{
	$paymentstatus = 0;
	$insdata->pay_status = 'Failed';
}
$logInfo = "[".date('d-m-Y h:i:s a')."]INFO : PAYMENT HOOK PAYSTATUS[$insdata->pay_status] payment_id[$insdata->payment_id] : GET[$getset] POST[$postset]\n";
file_put_contents($logFile, $logInfo,FILE_APPEND);
$insdata->save();
$tbl = new Payment;
$tbl->lock();
$payment = $tbl->get($insdata->payment_id, false);
$payment->is_completed = $paymentstatus;
$payment->is_verified = 1;
$payment->verified_at = Util::epoch_to_datetime();
$payment->txn_id = $_REQUEST['payment_id'];
$payment->completed_at = Util::epoch_to_datetime();
$payment->save();
$tbl->unlock();
$logInfo = "[".date('d-m-Y h:i:s a')."]INFO : PAYMENT HOOK SAVED : GET[$getset] POST[$postset]\n";
file_put_contents($logFile, $logInfo,FILE_APPEND);