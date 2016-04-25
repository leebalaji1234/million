<?php
require_once('config.php');
require_once('util.class.php'); 
require_once('sponsor_detail.class.php');

$tbl = new Sponsor_detail;

$sponsors = $tbl->find_all();

if($sponsors){
	$newarr = []; 
	 foreach ($sponsors as $s) {
	 	$newarr['twitter'][] = $s->twitter_username;

	 }

	 echo json_encode($newarr);exit;
}else{
	echo 'error';exit;
}