<?php

require_once('config.php');

unset($_SESSION['user_id']);

$app->redirect('/index.php');

?>
