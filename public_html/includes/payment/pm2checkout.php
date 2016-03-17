<?php
/*
  $Id: pm2checkout.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class pm2checkout extends PaymentModuleBase
{

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) 
  {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_2CHECKOUT_LOGIN']))
      $errs[] = 'Login/Merchant ID is required';
    if (empty($attr['MODULE_PAYMENT_2CHECKOUT_URL']))
      $errs[] = '2Checkout URL is required';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_2CHECKOUT_URL']))
      $errs[] = '2Checkout URL must start with http:// or https://';
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_2CHECKOUT_LOGIN' => '99999',
      'MODULE_PAYMENT_2CHECKOUT_TESTMODE' => '0',
      'MODULE_PAYMENT_2CHECKOUT_URL' => 'https://www.2checkout.com/2co/buyer/purchase',
      'MODULE_PAYMENT_2CHECKOUT_C_PROD' => '1',
      'MODULE_PAYMENT_2CHECKOUT_ID_TYPE' => '2',
      'MODULE_PAYMENT_2CHECKOUT_SECRET_WORD' => '',
    );
  }

}

?>