<?php
require_once('config.php');
require_once('util.class.php');
require_once('theme.class.php');
require_once('drawing.class.php');
require_once('parent_detail.class.php');
require_once('volunteer.class.php');
require_once('user.class.php');
require_once('region.class.php');
require_once('payment.class.php');
$tbl_themes = new Theme;
$tbl_drawings = new Drawing;
$tbl_user = new User;
$tbl_parent = new Parent_Detail;
$tbl_volunteer = new Volunteer;
$tbl_sponsors = new Payment;
$tbl_regions = new Region;
// $user = $tbl_user->get($_SESSION['user_id']);

$drawings = $tbl_drawings->find_all("where status=0 ORDER BY proof_file !='' desc ,is_watermark = 0 ,is_sponsored != '' asc");
$themes = $tbl_themes->find_all();

$arr = [];
$carr = [];
$allSponsor = [];
if($drawings){
	$i = 0;
	foreach ($drawings as $key => $value) {
		 $userdetail = [];
         $userdetail = $tbl_user->get($value->user_id);

         if($userdetail->is_confirmed == 1){
         	# code...
		$age = $userdetail->age?$userdetail->age:'0';
		$country = $userdetail->country?$userdetail->country:'';
		$carr[$i]['id'] = $value->id;
		$carr[$i]['userid'] = $value->user_id;
		$carr[$i]['title'] = $value->title;
		$carr[$i]['description'] = $value->description;
		$carr[$i]['image'] = $value->drawing_image;
		$carr[$i]['proof'] = $value->proof_file;
		$carr[$i]['age'] = $age;
		$carr[$i]['country'] = $country;
		$carr[$i]['theme_id'] = $value->theme_id;
		$carr[$i]['is_sponsored'] = $value->is_sponsored;
		$carr[$i]['created'] = $value->created_at;
		$carr[$i]['likes'] = $value->likes?$value->likes:0;
		$carr[$i]['clicks'] = $value->clicks?$value->clicks:0;
		$carr[$i]['ip'] = $_SERVER['REMOTE_ADDR'];
		$carr[$i]['username'] = ucfirst($userdetail->first_name).' '.$userdetail->last_name;
		$s = $tbl_sponsors->find_all("where drawing_id=? and is_completed=1",array($value->id));
	
	if($s){
	
		foreach($s as $s1){ 

		  $r = $tbl_regions->find_all("where status =1 and id=?",array($s1->region_id));

		  if($r){
		  	foreach ($r as $r1) {
		  		$allSponsor['title'][]= $r1->title;
		  		$allSponsor['url']= $r1->url;

		  		 
		  	}
		  	if($s1->payment_method != 'instamojo'){
		  		$txt = '$';
		  	}else{
		  		$txt = '<i class="fa fa-inr"></i>';
		  	}
		  	$allSponsor['amount'][] = $txt. $s1->amount;
		  }
		  
	    }
	}

		
		$carr[$i]['sponsors']  = $allSponsor;
		$i++;
	}

	
 
	$arr['drawings'] = $carr;

    }
		
}
// if($drawings){
// 	foreach ($drawings as $key => $value) {
// 		# code...
// 		$arr['themes']['id'][] = $value->id;
// 		$arr['themes']['name'][] = $value->name;
// 		$arr['themes']['description'][] = $value->description;
// 	}
// }
echo json_encode($arr);exit;
// echo json_encode($drawings);exit;
// print_r($drawings);
// exit;