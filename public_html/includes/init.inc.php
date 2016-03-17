<?php

// init.inc.php
// per-request initialization, loaded by config.php

// intialize environment
session_name(SESSION_COOKIE_NAME);
session_start();
set_magic_quotes_runtime(0);

// set default content type and encoding
header('Content-Type: text/html; charset=utf-8');

// bring in global functions and support libs
require_once('smarty.inc.php');
require_once('app.inc.php');
require_once('lang.inc.php');

// strip slashes
if (get_magic_quotes_gpc()) {
  $app->clean_array($_GET);
  $app->clean_array($_POST);
  $app->clean_array($_SERVER);
}

// trim surrounding whitespace on all request parameters
$app->trim_array($_GET);
$app->trim_array($_POST);

// re-create $_REQUEST with just GET, POST (no cookies)
$_REQUEST = array_merge($_GET, $_POST);

// get application settings into $app->setting
require_once('setting.class.php');
$app->setting = new Setting;
$app->setting = $app->setting->get(1, false);

// change language if requested; otherwise, set language from cookie,
// or set from first entry in HTTP_ACCEPT_LANGUAGE header
if (isset($_REQUEST['lang']))
  $lang->set_language($_REQUEST['lang'], true);
elseif (isset($_COOKIE[LANGUAGE_COOKIE_NAME]))
  $lang->set_language($_COOKIE[LANGUAGE_COOKIE_NAME]);
else {
  if (preg_match('/^[a-z]+/', @$_SERVER['HTTP_ACCEPT_LANGUAGE'], $m))
    $lang->set_language($m[0]);
}
$smarty->assign('language_code', $lang->code);

// templates have access to app object
$smarty->assign_by_ref('app', $app);

// set default site title
$smarty->assign('site_title', $app->setting->site_name);

// app is initialized enough now to display errors with template
$app->initialized = true;

// set a flag to indicate if install files are present
$app->install_files_present = is_dir(PACKAGE_ROOT . 'install') && !is_dir(PACKAGE_ROOT . 'install/.svn');

// assign the pixels used/avail variables so they are available in all templates
$app->assign_pixels_used_avail();

// if site is down for maintenace, show notice
if (!defined('NO_SITE_DOWN_REDIRECT') && $app->setting->site_down) {
  $app->redirect('/site_down.php');
}

// if user accounts are in effect, verify that user account is valid
if ($app->setting->user_accounts) {
  if (isset($_SESSION['user_id'])) {
    require_once('user.class.php');
    $tbl_user = new User;
    $user = $tbl_user->get($_SESSION['user_id'], false);
    if ($user->_new_row) unset($_SESSION['user_id']);
  }
}

?>
