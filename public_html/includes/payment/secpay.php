<?php
/*
  $Id: secpay.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class secpay extends PaymentModuleBase
{

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) 
  {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_SECPAY_MERCHANT_ID']))
      $errs[] = 'Merchant ID is required';
    if (empty($attr['MODULE_PAYMENT_SECPAY_URL']))
      $errs[] = 'SECPay URL is required';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_SECPAY_URL']))
      $errs[] = 'SECPay URL must start with http:// or https://';
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_SECPAY_CURRENCY' => '',
      'MODULE_PAYMENT_SECPAY_DIGEST_KEY' => '',
      'MODULE_PAYMENT_SECPAY_MERCHANT_ID' => 'secpay',
      'MODULE_PAYMENT_SECPAY_REMOTE_PASSWORD' => '',
      'MODULE_PAYMENT_SECPAY_TEST_STATUS' => 'live',
      'MODULE_PAYMENT_SECPAY_URL' => 'https://www.secpay.com/java-bin/ValCard',
    );
  }

}
?>
