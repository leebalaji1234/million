<?php

require_once('email_template.class.php');
require_once('payment_module_base.class.php');
require_once('snippet.class.php');

class offline extends PaymentModuleBase
{
  function before_enable() { 
    $tbl = new Email_Template;
    $row = $tbl->find('where email_key = ?', array('offline_payment_email'));
    if ($row->_new_row) {
      $row->email_key = 'offline_payment_email';
      $row->name = 'Purchase Confirmation (Offline Payment)';
      $row->parameters = '[site_name],[confirmation_number],[amount],[update_url],[email]';
      $row->save();
    }
    Snippet::initialize('offline_payment_title', 0, 'Offline Payment');
    Snippet::initialize('offline_payment_description', 0, '(Put your description here)');
    Snippet::initialize('offline_payment_email_subject', 0, 'Thank you for Your Pixel Purchase');
    Snippet::initialize('offline_payment_email_body', 0, '(Put your payment instructions here)');
  }

  // default configuration parameters
  function default_configuration()
  {
    return array(
    );
  }

  // additional actions before the configuration edit form is displayed
  // (e.g. initialize snippets)
  function before_edit_configuration()
  {
    Snippet::get_to_request('offline_payment_title');
    Snippet::get_to_request('offline_payment_description');
  }

  // return list of validation errors from array of posted config values
  function validate_configuration($attr)
  {
    $err = array();
    if (Snippet::is_request_empty('offline_payment_title'))
      $err[] = '##Title is required##';
    if (Snippet::is_request_empty('offline_payment_description'))
      $err[] = '##Description is required##';
    if (empty($err)) {
      Snippet::save_from_request('offline_payment_title');
      Snippet::save_from_request('offline_payment_description');
    }
    return $err;
  }

}

?>
