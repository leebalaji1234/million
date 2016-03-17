<?php

require_once('config.php');

// if admin has not enabled user accounts, redirect to home page
if (!$app->setting->user_accounts) $app->redirect('/index.php');

$smarty->display('signup_done.tpl');

?>
