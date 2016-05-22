<?php
require_once('config.php');
require_once('util.class.php');
require_once('drawing.class.php');  
require_once('drawing_like.class.php'); 

 if(isset($_REQUEST) && $_REQUEST['drawing_id']){
//  $externalContent = file_get_contents('http://checkip.dyndns.com/');
// preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
// $externalIp = $m[1];

 	$tbl_likes = new Drawing_like;
 	$row = $tbl_likes->find('where drawing_id=? and like_ip=?',array($_REQUEST['drawing_id'], $_SERVER['REMOTE_ADDR'])); 
 	  
    if (!is_null($row->id())) {
        echo "disable";exit; 
     }else{
		$tbl_likes->drawing_id = $_REQUEST['drawing_id'];
		$tbl_likes->like_ip = $_SERVER['REMOTE_ADDR'];
		$tbl_likes->created_at = Util::epoch_to_datetime();
		$tbl_likes->save();
		$tbl_drawing = new Drawing;
		$d = $tbl_drawing->get($_REQUEST['drawing_id']);
		$likes = $d->likes+1;
		$d->likes = $likes;
		$d->save();
		echo "success";exit;
     }
    
 }else{
 	echo "failure";exit;
 }
  
 

 