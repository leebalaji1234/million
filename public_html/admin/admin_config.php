<?php

// admin_config.php
// configuration for admin pages; creates global $admin object

// don't redirect to "site down" page from admin pages
define('NO_SITE_DOWN_REDIRECT', true);

require_once('../config.php');

require_once('app.class.php');
require_once('admin.class.php');

$admin = new Admin;

// change some app settings for admin area
$app->error_template = 'admin/error.tpl';
$app->in_admin = true;

// change site title
$smarty->assign('site_title', $app->setting->site_name . $lang->language_translate(' ##Administration##'));

// all pages require admin credentials unless special
// ADMIN_NO_AUTH is defined
if (!defined('ADMIN_NO_AUTH'))
  $admin->check_auth();

?>
