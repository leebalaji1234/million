<?php
require_once('config.php');
require_once('util.class.php');  
require_once('drawing.class.php'); 
require_once('theme.class.php');
require_once('drawing.class.php');
require_once('parent_detail.class.php');
require_once('volunteer.class.php');
require_once('user.class.php');
require_once('region.class.php');
require_once('payment.class.php');


if (isset($_GET) && $_GET['id']) { 

$tbl_themes = new Theme;
$tbl_drawings = new Drawing;
$tbl_user = new User;
$tbl_parent = new Parent_Detail;
$tbl_volunteer = new Volunteer;
$tbl_sponsors = new Payment;
$tbl_regions = new Region;
  $carr = [];
  $drawings = $tbl_drawings->get($_GET['id']);  
  if($drawings->id){
    $userdetail = $tbl_user->find(array('id',$drawings->user_id));
  $s = $tbl_sponsors->find_all("where drawing_id=? and is_completed=1",array($drawings->id));
  
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
  $carr['clicks'] = $drawings->clicks;
  $carr['likes'] = $drawings->likes;
  $carr['proof'] = $drawings->proof_file;
  $carr['title'] = $drawings->title;
  $carr['image'] = $drawings->drawing_image;
  $carr['description'] = $drawings->description;
  $carr['reports'] = $drawings->reports;
  $carr['sponsors']  = $allSponsor;
  $carr['username'] = ucfirst($userdetail->first_name).' '.$userdetail->last_name;

  }
  
    
}else{
  $app->redirect('/');exit;
}
  $cobj = (object)$carr;

$smarty->assign_by_ref('drawing',$cobj);  
$smarty->display('drawing.tpl'); 
?>