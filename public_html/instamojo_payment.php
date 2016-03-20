<?php
require_once("instamojo_plugin/instamojo.php");
require_once('config.php');
require_once('includes/payment/instamojo.php');

$obj = new instamojo();
$conf = $obj->configuration();
$postAmount = '';
$getAmount = '';
if($_POST && $_POST['amount'] && $_GET && $_GET['a']){
	$getAmount = base64_decode($_GET['a']);
	$postAmountbefore = base64_decode($_POST['amount']);
	$postAmount = str_replace("_", "", $postAmountbefore);
}
// echo "GET AMOUNT ::".$getAmount;
// echo "POST AMOUNT ::".$postAmount;
if(empty($getAmount) || empty($postAmount) || $getAmount != $postAmount ){
	header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

 // print_r($conf);exit;
// print_r($_POST);exit;
// $logFile = 'log.txt';
// echo "eer".ini_get('curl.cainfo');exit;
$apiKey = $conf['MODULE_PAYMENT_INSTAMOJO_KEY']; //'a7cbaf4f883b25a06d70597e94984f22';
$authToken = $conf['MODULE_PAYMENT_INSTAMOJO_AUTH_TOKEN']; //'36507f62d14a12ce7e9c24007e65779e';
$api = new InstamojoPayment($apiKey, $authToken);

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Buy Pixel",
        "amount" => $postAmount,
        "send_email" => true,
        "email" => $_POST['email'],
        "redirect_url" => $conf['MODULE_PAYMENT_INSTAMOJO_REDIRECT_URL'],
        "webhook"=> $conf['MODULE_PAYMENT_INSTAMOJO_HOOK_URL']
        ));
// $printText = date('d-m-Y H:i:s a')." -- PAYMENT PROCESSED ---payment.php".print_r($response,true)."\n";
// file_put_contents($logFile,$printText);
    if($response && $response['longurl']){
    	header('Location: ' . $response['longurl']."?embed=form");
        exit;
    }else{
    	header('Location: ' . $conf['MODULE_PAYMENT_INSTAMOJO_REDIRECT_URL']);
        exit;
    }
}
catch (Exception $e) {
    // print('Error: ' . $e->getMessage());
    // echo "ERROR RAISEING";exit;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>