<?php

require_once('admin_config.php');
require_once('admin_user.class.php');

$email =& $_REQUEST['email'];

if ($app->is_post()) {
  if (empty($email))
    $app->error('To address is required');
  else {

    $subject = $app->setting->site_name . ' Test Email';
    $body = 'Test email generated on ' . date('r');
    $from = $app->setting->admin_email;

    $err = $app->send_mail($email, $subject, $body, $from, true);

    $smarty->assign('email', $email);
    $smarty->assign('subject', $subject);
    $smarty->assign('body', $body);
    $smarty->assign('from', $from);
    $smarty->assign('err', $err);
    $smarty->display('admin/test_email_results.tpl');
    exit;
  }
}

$smarty->display('admin/test_email.tpl');

?>
