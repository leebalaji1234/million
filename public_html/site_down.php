<?php

define('NO_SITE_DOWN_REDIRECT', true);

require_once('config.php');

# if the site is up, redirect back to index
# (this is in case user is refreshing the site_down.php page)
if (!$app->setting->site_down)
  $app->redirect('/index.php');

$smarty->display('site_down.tpl');

?>
