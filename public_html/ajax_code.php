<?php
require_once('config.php'); 
require_once('volunteer.class.php');
$tbl = new Volunteer;
     
    $user = $tbl->find('where email=? and status = 1 ', array($_REQUEST['email']));
    if (!$user->_new_row)
       echo 'MDD'.$user->id;
    else {
    	echo "This email not activate or not registered with us";
    }

?>