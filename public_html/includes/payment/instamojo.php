<?php
/*
  $Id: instamojo.php,v 1.1 2016/03/17 23:55:45 admin Exp $

  Enterprise Solutions
  http://www.instamojo.com

  Copyright (c) 2016 instamojo

  Released under the   License
*/

require_once('payment_module_base.class.php');

class instamojo extends PaymentModuleBase
{

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_INSTAMOJO_KEY']))
      $errs[] = 'API Key is required';
    if (empty($attr['MODULE_PAYMENT_INSTAMOJO_AUTH_TOKEN']))
      $errs[] = 'Auth Token is required';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_INSTAMOJO_REDIRECT_URL']) || !preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_INSTAMOJO_HOOK_URL']))
      $errs[] = 'URL must start with http:// or https://';
    // if ($attr['MODULE_PAYMENT_PAYPAL_USE_IPN']) {
    //   if (!function_exists('curl_init'))
    //     $errs[] = 'PayPal IPN requires cURL extension, but it does not appear to be available on this server';
    //   if (empty($attr['MODULE_PAYMENT_PAYPAL_VERIFY_URL']))
    //     $errs[] = 'PayPal Verification URL is required when IPN used';
    //   elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_PAYPAL_VERIFY_URL']))
    //     $errs[] = 'PayPal Verification URL must start with http:// or https://';
    // }
     
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_INSTAMOJO_FORM_URL' => 'http://<your-domain>/instamojo_payment.php', 
      'MODULE_PAYMENT_INSTAMOJO_KEY' => 'key of your api instamojo',
      'MODULE_PAYMENT_INSTAMOJO_AUTH_TOKEN' => 'instamojo auth token', 
      'MODULE_PAYMENT_INSTAMOJO_REDIRECT_URL' => 'http://<your-domain>/redirect.php',
      'MODULE_PAYMENT_INSTAMOJO_HOOK_URL' => 'http://<your-domain>/hook.php',
    );
  }

}
?>
