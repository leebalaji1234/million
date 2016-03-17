<?php

// payment_config.class.php
// ORM model for payment_configs table

require_once('model.class.php');

// define constant required by osCommerce payment modules
define('TABLE_CONFIGURATION', "`" . DB_PREFIX . "payment_configs`");

class Payment_Config extends Model
{
  function Payment_Config()
  {
    parent::Model();
    $this->_id_name = 'configuration_id';
  }
}

?>
