<?php

require_once('config.php');
require_once('user.class.php');
require_once('util.class.php');

$app->check_login();

$tbl_user = new User;
$user = $tbl_user->get($_SESSION['user_id']);

if ($app->is_post()) {
	$smarty->clear_cache(null, 'rss');
	$smarty->clear_all_cache();
	if (empty($_REQUEST['first_name']))
    $app->error('##Please enter your first name##');
  if (empty($_REQUEST['last_name']))
    $app->error('##Please enter your last name##');
  if (!empty($_REQUEST['email'])) {
    if (!Util::valid_email($_REQUEST['email']))
      $app->error('##That does not appear to be a valid e-mail address##');
    elseif ($_REQUEST['email_confirm'] != $_REQUEST['email'])
      $app->error('##Your re-entered email address does not match; please check##');
  }
  if (!empty($_REQUEST['pass'])) {
    if (strlen(@$_REQUEST['pass']) < 5)
      $app->error('##Please create a password of at least 5 characters##');
    elseif ($_REQUEST['pass_confirm'] != $_REQUEST['pass'])
      $app->error('##Your re-entered password does not match; please check##');
  }
  if (empty($app->errors)) {
    // update user account
    $user->first_name = $_REQUEST['first_name'];
    $user->last_name = $_REQUEST['last_name'];
    if (!empty($_REQUEST['email']))
      $user->email = $_REQUEST['email'];
    if (!empty($_REQUEST['pass']))
      $user->pass = $_REQUEST['pass'];
    $user->save();

    // update login values in session
    $_SESSION['email'] = $user->email;
    $_SESSION['first_name'] = $user->first_name;
    $_SESSION['last_name'] = $user->last_name;

    $app->redirect('/account.php');
  }
}
else {
  $_REQUEST['first_name'] = $user->first_name;
  $_REQUEST['last_name'] = $user->last_name;
}

$smarty->assign_by_ref('user', $user);
$smarty->display('account_details.tpl', 'account|'.$cache_id);

?>
