<?php

define('ADMIN_NO_AUTH', 1);

require_once('admin_config.php');

if ($app->is_post()) {
  if ($admin->login(@$_POST['user'], @$_POST['pass']))
    $app->redirect('/admin/index.php');
  $app->error('##Invalid user name or password##');
}

$smarty->display('admin/login.tpl');

?>
