<?php

// payment_module.class.php
// ORM model for payment_modules table

require_once('model.class.php');
require_once('payment_config.class.php');

class Payment_Module extends Model
{

  // return path to user input form for this module
  function form()
  {
    return 'payment/' . $this->formfile;
  }

  // return path to admin config form for this module
  function config_form()
  {
    return 'admin/payment/' . $this->formfile;
  }

  // load class file for this module
  function require_class()
  {
    $file = 'payment/' . $this->class_file;
    require_once($file);
  }

}

?>
