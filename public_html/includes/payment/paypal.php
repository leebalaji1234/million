<?php
/*
  $Id: paypal.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class paypal extends PaymentModuleBase
{

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_PAYPAL_ID']))
      $errs[] = 'E-Mail Address is required';
    if (empty($attr['MODULE_PAYMENT_PAYPAL_URL']))
      $errs[] = 'PayPal URL is required';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_PAYPAL_URL']))
      $errs[] = 'PayPal URL must start with http:// or https://';
    if ($attr['MODULE_PAYMENT_PAYPAL_USE_IPN']) {
      if (!function_exists('curl_init'))
        $errs[] = 'PayPal IPN requires cURL extension, but it does not appear to be available on this server';
      if (empty($attr['MODULE_PAYMENT_PAYPAL_VERIFY_URL']))
        $errs[] = 'PayPal Verification URL is required when IPN used';
      elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_PAYPAL_VERIFY_URL']))
        $errs[] = 'PayPal Verification URL must start with http:// or https://';
    }
    if (empty($attr['MODULE_PAYMENT_PAYPAL_CURRENCY']))
      $errs[] = 'Currency Code is required';
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_PAYPAL_CURRENCY' => 'USD',
      'MODULE_PAYMENT_PAYPAL_ID' => 'yourname@yourdomain.com',
      'MODULE_PAYMENT_PAYPAL_URL' => 'https://www.paypal.com/cgi-bin/webscr',
      'MODULE_PAYMENT_PAYPAL_TEST_IPN' => '1',
      'MODULE_PAYMENT_PAYPAL_USE_IPN' => '0',
      'MODULE_PAYMENT_PAYPAL_VERIFY_URL' => 'https://www.paypal.com/cgi-bin/webscr',
    );
  }

}
?>
