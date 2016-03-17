<?php

// payment_module_base.class.php
// defines class PaymentModuleBase, which implements common functionality
// for all payment modules.

require_once('payment_config.class.php');

class PaymentModuleBase
{

  // hook to do stuff before a module is enabled
  function before_enable() { }

  // return an assoc array of configuration values
  function configuration()
  {
    global $db;
    $default_conf = $this->default_configuration();
    $conf = $db->getAssoc('
      select configuration_key, configuration_value from !
      where module_key = ?
    ', false, array(TABLE_CONFIGURATION, $this->module_key()));
    return array_merge($default_conf, $conf);
  }

  // default configuration for this module (override in derived class)
  function default_configuration()
  {
    return array();
  }

  // get current module key from class name
  function module_key()
  {
    return strtolower(get_class($this));
  }

  // remove configuration entries for this module
  function remove() 
  {
    $tbl = new Payment_Config;
    $tbl->delete('where `module_key`=?', array($this->module_key()));
  }

  // given an assoc array of configuration values, update the
  // configuration rows
  function update($configuration = array()) {
    global $db;
  
    if (is_array($configuration)) {
      while (list ($key, $val) = each ($configuration)) {
        $sqlupd = "replace into ! set configuration_value = ?, configuration_key = ?, module_key = ?";
        $db->query($sqlupd, array(TABLE_CONFIGURATION, $val, $key, $this->module_key()));
      }
    }
  }

  // validate payment form submission
  function validate()
  {
    global $app;
    return empty($app->errors);
  }

  // return list of validation errors from array of posted config values
  function validate_configuration($attr)
  {
    return array();
  }

  // additional actions before the configuration edit form is displayed
  // (e.g. initialize snippets)
  function before_edit_configuration() { }

}

?>
