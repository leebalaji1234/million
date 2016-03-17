<?php

require_once('config.php');
require_once('user.class.php');

if (isset($_REQUEST['amp;digest']))
	$_REQUEST['digest'] = $_REQUEST['amp;digest'];	
	
// if admin has not enabled user accounts, redirect to home page
if (!$app->setting->user_accounts) $app->redirect('/index.php');

$id =& $_REQUEST['id'];
if (!isset($id))
  $app->abort('##Expected id##');

// fetch user row and validate digest
$tbl = new User;
$user = $tbl->get($id);
if ($user->digest != @$_REQUEST['digest'])
  $app->abort('##The supplied digest is invalid##');

// confirm the account
$user->is_confirmed = 1;
$user->save();

$_SESSION['user_id'] = $user->id;
$_SESSION['email'] = $user->email;
$_SESSION['first_name'] = $user->first_name;
$_SESSION['last_name'] = $user->last_name;

$smarty->display('signup_confirm.tpl');

?>
