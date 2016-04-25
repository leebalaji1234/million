<?php
require_once('config.php');
require_once('util.class.php');
require_once('drawing.class.php');  
require_once('drawing_click.class.php'); 
  
 if(isset($_REQUEST) && $_REQUEST['drawing_id']){
 	$tbl_clicks = new Drawing_click;
    $tbl_clicks->drawing_id = $_REQUEST['drawing_id'];
    $tbl_clicks->click_ip = $_SERVER['REMOTE_ADDR'];
    $tbl_clicks->created_at = Util::epoch_to_datetime();
    $tbl_clicks->save();
    $tbl_drawing = new Drawing;
    $d = $tbl_drawing->get($_REQUEST['drawing_id']);
    $clicks = $d->clicks+1;
    $d->clicks = $clicks;
    $d->save();
    echo "success";exit;
 }else{
 	echo "failure";exit;
 }
  
 

 