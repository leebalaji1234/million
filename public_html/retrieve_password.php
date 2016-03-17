<?php

require_once('config.php');

// if admin has not enabled user accounts, redirect to home page
if (!$app->setting->user_accounts) $app->redirect('/index.php');

$template = 'retrieve_password.tpl';
if ($app->is_post()) {
  if (empty($_REQUEST['email']))
    $app->error('##Please enter your E-Mail address##');
  else {
    require_once('user.class.php');
    $tbl = new User;
    $user = $tbl->find('where `email`=?', array($_REQUEST['email']));
    if ($user->_new_row)
      $app->error('##That E-Mail address is not on file##');
    else {
      $app->mail($user->email, 'retrieve_password', array(
        '[email]' => $user->email,
        '[password]' => $user->pass,
        '[login_url]' => $app->url('/login.php', array(), true, true),
      ));
      $template = 'retrieve_password_done.tpl';
    }
  }
}
else {
  $_REQUEST['email'] = @$_SESSION['email'];
}

$smarty->display($template);

?>
