<?php
require_once("instamojo_plugin/instamojo.php");
require_once('config.php');
require_once('util.class.php'); 
require_once('includes/payment/instamojo.php'); 
require_once('instamojo_payment.class.php'); 
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
$logFile = 'payment_logs/instamojo.log';

$obj = new instamojo();
$conf = $obj->configuration();
$postAmount = '';
$getAmount = '';
if($_POST && $_POST['amount'] && $_GET && $_GET['a']){
    $getAmount = base64_decode($_GET['a']);
    $postAmountbefore = base64_decode($_POST['amount']);
    $postAmount = str_replace("_", "", $postAmountbefore);
}

  
if(empty($getAmount) || empty($postAmount) || $getAmount != $postAmount ){
    $logInfo = "[".date('d-m-Y h:i:s a')."]ERROR : PAYMENT MODULE : Amount mismatch GET[$getAmount] POST[$postAmount]\n";
    file_put_contents($logFile, $logInfo,FILE_APPEND);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
$tbl =  new Instamojo_payment();
$data = $tbl->find('where amount=? and width=? and height=? and x=? and y=? and pay_status ="Pending"', array($getAmount,$_POST['w'],$_POST['h'],$_POST['x'],$_POST['y']));
 
 if ($data->pay_url)  {
    $payid = $_SESSION['payment_id'];
    $logInfo = "[".date('d-m-Y h:i:s a')."]INFO : PAYMENT MODULE : Payment url redirects amount[$getAmount] pay_id[$payid] url[$data->pay_url]\n";
    file_put_contents($logFile, $logInfo,FILE_APPEND);
    header('Location: ' . $data->pay_url."?embed=form");
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
        "amount" => "9", //$postAmount
        "send_email" => true,
        "email" => $_POST['email'],
        "redirect_url" => $conf['MODULE_PAYMENT_INSTAMOJO_REDIRECT_URL'],
        "webhook"=> $conf['MODULE_PAYMENT_INSTAMOJO_HOOK_URL']
        ));
// $printText = date('d-m-Y H:i:s a')." -- PAYMENT PROCESSED ---payment.php".print_r($response,true)."\n";
// file_put_contents($logFile,$printText);

    // Successful paymeent link creation
        
        if($data->_new_row  && isset($response) && $response['id'] && $response['amount']){
            $tbl->lock();
            $tbl->email = $_POST['email'];
            $tbl->amount = $getAmount;
            $tbl->width = $_POST['w'];
            $tbl->height = $_POST['h'];
            $tbl->x = $_POST['x'];
            $tbl->y = $_POST['y'];
            $tbl->instamojo_id = $response['id'];
            $tbl->pay_url = $response['longurl'];
            $tbl->payment_id = $_SESSION['payment_id'];
            $tbl->pay_status = 'Pending';
            $tbl->created_at = Util::epoch_to_datetime();
            $tbl->save();
            $tbl->unlock();
            $logInfo = "[".date('d-m-Y h:i:s a')."]INFO : PAYMENT MODULE : Payment Details Received : amount[$getAmount] pay_id[$tbl->payment_id] url[$tbl->pay_url]\n";
            file_put_contents($logFile, $logInfo,FILE_APPEND);
            if($response && $response['longurl']){ 
                header('Location: ' . $response['longurl']."?embed=form");
                exit;
            }else{
                header('Location: ' . $conf['MODULE_PAYMENT_INSTAMOJO_REDIRECT_URL']);
                exit;
            }
            
        }

    
}
catch (Exception $e) {
   // print('['.date('d-m-Y h:i:s a').']Error: ' . $e->getMessage());
   $logInfo = "[".date('d-m-Y h:i:s a')."]ERROR : PAYMENT MODULE : Payment Request Failed :".$e->getMessage()."\n";
   file_put_contents($logFile, $logInfo,FILE_APPEND);
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
