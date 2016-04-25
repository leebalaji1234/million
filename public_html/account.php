<?php

require_once('config.php');
require_once('drawing.class.php');
require_once('region.class.php');
require_once('payment.class.php');
require_once('user.class.php');
$tbl_drawings = new Drawing;
$tbl_sponsors = new Payment;
$tbl_regions = new Region;
$app->check_login();

$tbl_user = new User;
$user = $tbl_user->get($_SESSION['user_id']);
$drawings = $tbl_drawings->find_all("where user_id=? ", array($_SESSION['user_id']));
$allSponsor = [];
foreach($drawings as $drawing){ 
	$s = $tbl_sponsors->find_all("where drawing_id=? and is_completed=1",array($drawing->id));
	
	if($s){
	
		foreach($s as $s1){ 

		  $r = $tbl_regions->find_all("where status =1 and id=?",array($s1->region_id));

		  if($r){
		  	foreach ($r as $r1) {
		  		$allSponsor[$drawing->id]['title'][]= $r1->title;
		  		$allSponsor[$drawing->id]['url']= $r1->url;

		  		 
		  	}
		  	if($s1->payment_method != 'instamojo'){
		  		$txt = '$';
		  	}else{
		  		$txt = '<i class="fa fa-inr"></i>';
		  	}
		  	$allSponsor[$drawing->id]['amount'][] = $txt. $s1->amount;
		  }
		  
	    }
	}
	
}
 
 // if($allSponsor){
 // 	$allSponsor = array_map('convertstring', $allSponsor);
 // }

 // function convertstring($val,$i){
 // 	if($val){
 // 		return implode(',',$val);
 // 	}
 // }
// print_r($allSponsor);exit;
 
$smarty->assign_by_ref('allSponsor', $allSponsor); 
$smarty->assign_by_ref('drawings', $drawings);
$smarty->assign_by_ref('user', $user); 
$smarty->display('account.tpl', 'account|'.$cache_id);

?>
