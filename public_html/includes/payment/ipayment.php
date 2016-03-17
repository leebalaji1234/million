<?php
/*
  $Id: ipayment.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class ipayment extends PaymentModuleBase
{

  // validate payment form submission
  function validate()
  {
    global $app;
    if (empty($_REQUEST['ipayment_cc_owner']))
      $app->error('##Credit Card Owner is required##');
    if (empty($_REQUEST['ipayment_cc_number']))
      $app->error('##Credit Card Number is required##');
    else {
      require_once('cc_validation.class.php');
      $cc_validation = new cc_validation;
      $exp_m = $_REQUEST['ipayment_cc_expires_Month'];
      $exp_y = substr( $_REQUEST['ipayment_cc_expires_Year'], -2);
      $result = $cc_validation->validate($_REQUEST['ipayment_cc_number'], $exp_m, $exp_y);
      $_REQUEST['ipayment_cc_type'] = $cc_validation->cc_type;
      if ($result === -1 || $result === false)
        $app->error('##Invalid Credit Card Number##');
    }
    $exp_ym = $_REQUEST['ipayment_cc_expires_Year'] . $_REQUEST['ipayment_cc_expires_Month'];
    $now_ym = date('Ym');
    if ($exp_ym < $now_ym)
      $app->error('##Credit Card Expiration Date cannot be in the past##');
    return parent::validate();
  }

  // return list of validation errors from array of posted config values
  function validate_configuration($attr) {
    $errs = array();
    if (empty($attr['MODULE_PAYMENT_IPAYMENT_ID']))
      $errs[] = 'Account number is required';
    if (empty($attr['MODULE_PAYMENT_IPAYMENT_URL']))
      $errs[] = 'ipayment.de URL is required';
    elseif (!preg_match('/^https?:\/\//i', $attr['MODULE_PAYMENT_IPAYMENT_URL']))
      $errs[] = 'ipayment.de URL must start with http:// or https://';
    if (empty($attr['MODULE_PAYMENT_IPAYMENT_USER_ID']))
      $errs[] = 'User ID is required';
    if ($attr['MODULE_PAYMENT_IPAYMENT_PASSWORD'] == '')
      $errs[] = 'User Password is required';
    return $errs;
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_IPAYMENT_CURRENCY' => 'Either EUR or USD, else EUR',
      'MODULE_PAYMENT_IPAYMENT_ID' => '99999',
      'MODULE_PAYMENT_IPAYMENT_PASSWORD' => '0',
      'MODULE_PAYMENT_IPAYMENT_URL' => 'https://ipayment.de/merchant/[id]/processor.php',
      'MODULE_PAYMENT_IPAYMENT_USER_ID' => '99999',
    );
  }

}
?>
