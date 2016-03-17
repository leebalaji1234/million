<?php

define('ADMIN_NO_AUTH', 1);

require_once('admin_config.php');

// clear login credential
$admin->logout();

// go to application home after logout
$app->redirect('/index.php');

?>
