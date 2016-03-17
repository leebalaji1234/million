<?php

// setting.class.php
// ORM model for link_link table

require_once('model.class.php');
require_once('app.inc.php');

class Link_Link extends Model
{

  function validate()
  {
    return parent::validate();
  }

  function replace_parameters()
  {
    global $app;
    $s = $this->html;
    $s = str_replace('[site_name]', htmlspecialchars($app->setting->site_name), $s);
    $s = str_replace('[site_url]', $app->url('/index.php'), $s);
    return $s;
  }

}

?>
