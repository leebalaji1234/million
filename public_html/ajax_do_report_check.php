<?php
require_once('config.php');
require_once('util.class.php'); 
require_once('drawing_report.class.php'); 
  
 if(isset($_POST) && $_POST['drawid'] && $_POST['email']){
 
 	$tbl_reports = new Drawing_report;
 	$row = $tbl_reports->find('where drawing_id=? and email=?',array($_POST['drawid'], $_POST['email'])); 
 	    
    if (!is_null($row->id())) {
        echo "false";exit; 
     }else{ 
		echo "true";exit;
     }
    
 }else{
 	echo "failure";exit;
 }
  
 

 