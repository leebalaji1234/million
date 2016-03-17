<?php
/*
  $Id: nochex.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class nochex extends PaymentModuleBase
{

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_NOCHEX_ID']))
      $errs[] = 'E-Mail Address is required';
    if (empty($attr['MODULE_PAYMENT_NOCHEX_URL']))
      $errs[] = 'NOCHEX URL is required';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_NOCHEX_URL']))
      $errs[] = 'NOCHEX URL must start with http:// or https://';
    if ($attr['MODULE_PAYMENT_NOCHEX_USE_APC']) {
      if (!function_exists('curl_init'))
        $errs[] = 'NOCHEX APC requires cURL extension, but it does not appear to be available on this server';
      if (empty($attr['MODULE_PAYMENT_NOCHEX_VERIFY_URL']))
        $errs[] = 'NOCHEX Verification URL is required when APC used';
      elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_NOCHEX_VERIFY_URL']))
        $errs[] = 'NOCHEX Verification URL must start with http:// or https://';
    }
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_NOCHEX_ID' => 'you@yourbuisness.com',
      'MODULE_PAYMENT_NOCHEX_URL' => 'https://www.nochex.com/nochex.dll/checkout',
      'MODULE_PAYMENT_NOCHEX_USE_APC' => '1',
      'MODULE_PAYMENT_NOCHEX_VERIFY_URL' => 'https://www.nochex.com/nochex.dll/apc/apc',
    );
  }

}
?>
