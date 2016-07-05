<?php
require_once('config.php');
require_once('util.class.php');
require_once('theme.class.php');
require_once('drawing.class.php');
require_once('parent_detail.class.php');
require_once('volunteer.class.php');
require_once('user.class.php');

require_once('country.class.php');
require_once('state.class.php');
require_once('city.class.php');


$tbl_country = new Countrie;
$tbl_city = new Citie; 
$tbl_state = new State;

$tbl_themes = new Theme;
$tbl_drawings = new Drawing;
$tbl_user = new User;
$tbl_parent = new Parent_Detail;
$tbl_volunteer = new Volunteer;

if ($app->setting->user_accounts) {
   $app->check_login('<p>##Please log in before proceeding##</p>');
}
if($user->uploads == 3){
  $_SESSION['drawing']['error'] = 1;
  $app->redirect('drawings.php');
} 
$user = $tbl_user->get($_SESSION['user_id']);

$dob_field_display = 'disable';
$parent_field_display = 'disable';
function calculateAge($dob){
if(isset($dob) && $dob){
  $birthDate = $_POST['dob'];//"12/17/1987"//mm/dd/YYYY; 
    $birthDate = explode("/", $birthDate); 
   $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2])); 
   $arrage['currentage'] = $age;
   return $age;
} else{
  return false;
}

}

 $smarty->caching = false;

if ($app->is_post()) {

   



   //  if(isset($_FILES) && $_FILES['proof_file']['tmp_name']){

   //   list($pwidth, $pheight, $ptype, $attr) = getimagesize($_FILES['proof_file']['tmp_name']);
	  //   $pimg_name = 'images/proofs/'.time().'.'.'png';
	  //   if (Util::process_image_upload($pwidth, $pheight,'proof_file','proof_image')){ 
			// file_put_contents($pimg_name, @$_SESSION['proof_image']);	 
	  //   }
   //  }
    // $app->error('##Please select a region##');
    // print_r($_REQUEST);exit;
// 
$error = false;
 
    if(isset($_REQUEST['dob']) && !empty($_REQUEST['dob'])){
      
       $req_age  = calculateAge($_REQUEST['dob']);
       if($req_age < 13){
        $parent_field_display = 'enable';
       }
       // list($mm,$dd,$yyyy) = explode('/',trim($_REQUEST['dob']));
       //  if (!checkdate($mm,$dd,$yyyy)) {
       //          $error = true;
       //  }
    } else{
      $req_age  =  calculateAge($user->dob); //$user->age;
       if($req_age < 13){
        $parent_field_display = 'enable';
       }
    }
 
// echo "checking".$parent_field_display;exit;
    if(!empty($_REQUEST['volunteer_id']) && $_REQUEST['volunteer_id']){
      // $code = $_REQUEST['volunteer_id']? str_replace('MDD', '', $_REQUEST['volunteer_id']):'';
      $code = $_REQUEST['volunteer_id'];
      $v = $tbl_volunteer->find('where id=?', array($code));
      // print_r($v);exit;
    }
    
    if (isset($_REQUEST['volunteer_id']) && !empty($_REQUEST['volunteer_id']) &&   empty($v->id)){

       
        $app->error('##Volunteer code not found.##');
       
    } 
    else if($user->uploads == 3){
       $app->error('## maximum upload reached##');
   }else if(isset($_FILES) && empty($_FILES['file']['tmp_name'])){
      $app->error('## Please upload art file##');
    }else if(isset($_FILES) && (empty($_FILES['file']['size']) || $_FILES['file']['size'] > 1000000)){
      $app->error('## Please upload file below 1 MB##');
    }else if(empty($_REQUEST['title'])){
      $app->error('## Please enter art title##');
    }else if(empty($_REQUEST['description'])){
      $app->error('## Please enter art description##');
    }else if($parent_field_display == 'enable' && empty($_REQUEST['parent_name'])){      
      $app->error('## Please fill parent name##');
    }else if($parent_field_display == 'enable' && empty($_REQUEST['parent_details'])){ 
      $app->error('## Please fill parent details <address> , <phone>, <email> ..etc##');
    }else if (@$_REQUEST['phrase'] != Util::captcha_phrase()){

     $app->error('##The text from the image was not entered correctly##');
    }
    else{

    if(isset($_FILES) && $_FILES['file']['tmp_name']){
      list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
      $country = $tbl_country->get($user->country);
      $state = $tbl_state->get($user->state);
      $city = $tbl_city->get($user->city);
        
 
      $img_name = 'images/drawings/'.$user->first_name.'_'.$user->last_name.'_'.$country->name.'_'.$state->name.'_'.$city->name.'_'.$_REQUEST['title'].'_'.time().'.'.'png';
      if (Util::process_image_upload($width, $height,'file','drawing_image')){ 
      file_put_contents($img_name, @$_SESSION['drawing_image']);   
      }
    }
        $tbl_drawings->user_id = $_SESSION['user_id'];
        $tbl_drawings->theme_id = $_REQUEST['theme_id'];
        $tbl_drawings->title = $_REQUEST['title'];
        $tbl_drawings->description = $_REQUEST['description'];
        $tbl_drawings->ip_address = $_SERVER['REMOTE_ADDR'];
        $tbl_drawings->status = 0;
        $tbl_drawings->drawing_image = $img_name;
        $tbl_drawings->drawing_image_type = $_FILES['file']['type'];
        $tbl_drawings->drawing_size = $_FILES['file']['size'];
        $tbl_drawings->proof_file =  $_REQUEST['proof_file']?str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $_REQUEST['proof_file']):'';
        $tbl_drawings->is_watermark = isset($_REQUEST['is_watermark'])?1:0;
        $tbl_drawings->created_at = Util::epoch_to_datetime();
        $tbl_drawings->volunteer_id = $_REQUEST['volunteer_id']?$_REQUEST['volunteer_id']:0;
        $tbl_drawings->save();
        // volunteer drawing count updation
        // user details updation 
        // $user->dob = $_REQUEST['dob'];
        // $user->age = $req_age;
        $user->uploads = $user->uploads+1;
        $user->save();
        $tbl_parent->user_id = $_SESSION['user_id'];
        $tbl_parent->drawing_id = $tbl_drawings->id;
        $tbl_parent->name = $_REQUEST['parent_name'];
        $tbl_parent->details = $_REQUEST['parent_details'];
        $tbl_parent->save();

       
        if(!empty($_REQUEST['volunteer_id']) && $_REQUEST['volunteer_id']){

        $code = $_REQUEST['volunteer_id'];
        $v = $tbl_volunteer->find('where id=?', array($code));
         $v->drawings = $v->drawings+1;
        $v->save();
        // print_r($v);exit;
        }
        // $tbl_volunteer->user_id = $_SESSION['user_id'];
        // $tbl_volunteer->drawing_id = $tbl_drawings->id;
        // $tbl_volunteer->name = $_REQUEST['volunteer_name'];
        // $tbl_volunteer->country = $_REQUEST['volunteer_country'];
        // $tbl_volunteer->state = $_REQUEST['volunteer_state'];
        // $tbl_volunteer->city = $_REQUEST['volunteer_city'];
        // $tbl_volunteer->address = $_REQUEST['volunteer_address'];
        // $tbl_volunteer->phone = $_REQUEST['volunteer_phone'];
        // $tbl_volunteer->save();

        $_SESSION['drawing']['success'] = 1;
        $app->redirect('drawings.php'); 
    }
   
  }
  else{
  	unset($_SESSION['drawing_image']);
  	// unset($_SESSION['proof_image']);
  }

 if($user->dob == ''){
      $dob_field_display  ='enable';
 }
 if($user->age < 13){
        $parent_field_display = 'enable';
 }
// var_dump($dob_field_display);exit;
 // $regions = $tbl_region->find_all('where status=? and if(title=\'\',url,title) like ? order by !', array(REGION_ACTIVE, "%$q%", $order));

Util::captcha_create();
$smarty->assign('captcha_url', Util::captcha_url());
$themes = $tbl_themes->find_all('where status !=1');  
$vcodes = $tbl_volunteer->find_all('where status=1');
$smarty->assign_by_ref('vcodes', $vcodes);
$smarty->assign_by_ref('themes', $themes);
$smarty->assign_by_ref('dobdisplay', $dob_field_display);
$smarty->assign_by_ref('parentdisplay', $parent_field_display);

$smarty->display('upload_drawing.tpl'); 
?>