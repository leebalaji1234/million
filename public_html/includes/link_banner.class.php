<?php

// setting.class.php
// ORM model for link_banner table

require_once('model.class.php');
require_once('app.inc.php');
require_once('PHP/Compat/Function/file_put_contents.php');

class Link_Banner extends Model{

  function validate(){
    return parent::validate();
  }

  // returns image base name
  function image_basename(){
    $ext = '.png';
    if ($this->mime_type == 'image/gif') $ext = '.gif';
    if ($this->mime_type == 'image/jpeg') $ext = '.jpg';
    return "banner_" . $this->id . $ext;
  }

  // returns path to filesystem location of image file
  function image_path(){
    return GRIDS_DIR . $this->image_basename();
  }

  // returns URL to image file
  function image_url(){
    global $app;
    return $app->url('/grids/' . $this->image_basename());
  }

  // publishes current banner file to grids directory
  function publish()
  {
    file_put_contents($this->image_path(), $this->image);
  }

  function replace_parameters()
  {
    global $app;
    $s = $this->html;
    $s = str_replace('[site_name]', htmlspecialchars($app->setting->site_name), $s);
    $s = str_replace('[site_url]', $app->url('/index.php'), $s);
    $s = str_replace('[banner_url]', $this->image_url(), $s);
    return $s;
  }

}

?>