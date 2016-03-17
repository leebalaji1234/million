<?php

// email_template.class.php
// ORM model for email_templates table

require_once('model.class.php');

class Email_Template extends Model {

  function snippet_key_body(){
    return $this->email_key . '_body';
  }

  function snippet_key_subject(){
    return $this->email_key . '_subject';
  }

}

?>
