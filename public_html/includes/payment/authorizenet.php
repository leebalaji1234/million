<?php
/*
  $Id: authorizenet.php,v 1.1 2007/07/25 21:15:45 admin Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once('payment_module_base.class.php');

class authorizenet extends PaymentModuleBase
{

  // Authorize.net utility functions
  // DISCLAIMER:
  //     This code is distributed in the hope that it will be useful, but without any warranty; 
  //     without even the implied warranty of merchantability or fitness for a particular purpose.

  // Main Interfaces:
  //
  // function InsertFP ($loginid, $txnkey, $amount, $sequence) - Insert HTML form elements required for SIM
  // function CalculateFP ($loginid, $txnkey, $amount, $sequence, $tstamp) - Returns Fingerprint.

  // compute HMAC-MD5
  // Uses PHP mhash extension. Pl sure to enable the extension
  // function hmac ($key, $data) {
  //   return (bin2hex (mhash(MHASH_MD5, $data, $key)));
  //}

  // Thanks is lance from http://www.php.net/manual/en/function.mhash.php
  //lance_rushing at hot* spamfree *mail dot com
  //27-Nov-2002 09:36 
  // 
  //Want to Create a md5 HMAC, but don't have hmash installed?
  //
  //Use this:
  function hmac ($key, $data)
  {
     // RFC 2104 HMAC implementation for php.
     // Creates an md5 HMAC.
     // Eliminates the need to install mhash to compute a HMAC
     // Hacked by Lance Rushing

     $b = 64; // byte length for md5
     if (strlen($key) > $b) {
         $key = pack("H*",md5($key));
     }
     $key  = str_pad($key, $b, chr(0x00));
     $ipad = str_pad('', $b, chr(0x36));
     $opad = str_pad('', $b, chr(0x5c));
     $k_ipad = $key ^ $ipad ;
     $k_opad = $key ^ $opad;

     return md5($k_opad  . pack("H*",md5($k_ipad . $data)));
  }
  // end code from lance (resume authorize.net code)

  // Calculate and return fingerprint
  // Use when you need control on the HTML output
  function CalculateFP ($loginid, $txnkey, $amount, $sequence, $tstamp, $currency = "") {
    return ($this->hmac ($txnkey, $loginid . "^" . $sequence . "^" . $tstamp . "^" . $amount . "^" . $currency));
  }

  // end authorize.net code

  // validate payment form submission
  function validate()
  {
    global $app;
    if (empty($_REQUEST['authorizenet_cc_owner']))
      $app->error('##Credit Card Owner is required##');
    if (empty($_REQUEST['authorizenet_cc_number']))
      $app->error('##Credit Card Number is required##');
    else {
      require_once('cc_validation.class.php');
      $cc_validation = new cc_validation;
      $exp_m = $_REQUEST['authorizenet_cc_expires_Month'];
      $exp_y = substr( $_REQUEST['authorizenet_cc_expires_Year'], -2);
      $result = $cc_validation->validate($_REQUEST['authorizenet_cc_number'], $exp_m, $exp_y);
      $_REQUEST['authorizenet_cc_type'] = $cc_validation->cc_type;
      if ($result === -1 || $result === false)
        $app->error('##Invalid Credit Card Number##');
    }
    $exp_ym = $_REQUEST['authorizenet_cc_expires_Year'] . $_REQUEST['authorizenet_cc_expires_Month'];
    $now_ym = date('Ym');
    if ($exp_ym < $now_ym)
      $app->error('##Credit Card Expiration Date cannot be in the past##');
    return parent::validate();
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
      'MODULE_PAYMENT_AUTHORIZENET_CURRENCY' => 'USD',
      'MODULE_PAYMENT_AUTHORIZENET_EMAIL_CUSTOMER' => 'False',
      'MODULE_PAYMENT_AUTHORIZENET_LOGIN' => 'testing',
      'MODULE_PAYMENT_AUTHORIZENET_MD5_KEY' => '',
      'MODULE_PAYMENT_AUTHORIZENET_ORDER_STATUS_ID' => '0',
      'MODULE_PAYMENT_AUTHORIZENET_TESTMODE' => 'Test',
      'MODULE_PAYMENT_AUTHORIZENET_TXNKEY' => 'Production',
      'MODULE_PAYMENT_AUTHORIZENET_URL' => 'https://secure.authorize.net/gateway/transact.dll',
    );
  }

}

?>
