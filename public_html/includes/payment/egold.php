<?php
/*
  $Id: egold.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class egold extends PaymentModuleBase
{

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_EGOLD_URL']))
      $errs[] = '##E-Gold URL is required##';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_EGOLD_URL']))
      $errs[] = '##E-Gold URL must start with http:// or https://##';
    if (empty($attr['MODULE_PAYMENT_EGOLD_PAYEE_ACCOUNT']))
      $errs[] = '##Merchant Account Number is required##';
    if (trim($attr['MODULE_PAYMENT_EGOLD_PAYMENT_UNITS']) == '')
      $errs[] = '##Payment Units Code is required##';
    if (trim($attr['MODULE_PAYMENT_EGOLD_PAYMENT_METAL_ID']) == '')
      $errs[] = '##Payment Metal ID is required##';
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_EGOLD_URL' => 'https://www.e-gold.com/sci_asp/payments.asp',
      'MODULE_PAYMENT_EGOLD_PAYEE_ACCOUNT' => '',
      'MODULE_PAYMENT_EGOLD_PAYEE_NAME' => '',
      'MODULE_PAYMENT_EGOLD_PAYMENT_UNITS' => '1',
      'MODULE_PAYMENT_EGOLD_PAYMENT_METAL_ID' => '0',
      'MODULE_PAYMENT_EGOLD_ALTERNATE_PASSPHRASE' => '',
    );
  }

}
?>
