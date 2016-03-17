<?php

require_once('admin_config.php');
require_once('admin_user.class.php');

$tbl = new Admin_User;
$row = $tbl->get(1);

if ($app->is_post()) {
  if (md5($_REQUEST['current_pass']) != $row->pass)
    $app->error('Current password is not correct');
  else {
    if (empty($_REQUEST['user']))
      $app->error('User Name is required');
    if (!empty($_REQUEST['pass']) && $_REQUEST['pass_confirm'] != $_REQUEST['pass'])
      $app->error('Your re-typed password does not match');
  }
  if (empty($app->errors)) {
    $row->user = $_REQUEST['user'];
    if (!empty($_REQUEST['pass']))
      $row->pass = md5($_REQUEST['pass']);
    $row->save();
    $app->redirect('/admin/index.php');
  }
}
else {
  $_REQUEST['user'] = $row->user;
}

$smarty->display('admin/change_password.tpl');

?>
