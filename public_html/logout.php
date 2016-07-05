<?php

require_once('config.php');

unset($_SESSION['user_id']); 
setcookie("email", '', time() - (365 * 24 * (60 * 60)));
setcookie("password", '', time() - (365 * 24 * (60 * 60)));  
unset($_COOKIE['email']);
unset($_COOKIE['password']);      
$app->redirect('/index.php');

?>
