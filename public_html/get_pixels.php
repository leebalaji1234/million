<?php

// get_pixels.php
// page controller for pixel purchase process

require_once('config.php');
require_once('grid.class.php');
require_once('drawing.class.php');
require_once('util.class.php');
require_once('get_pixels.inc.php');
require_once('sponsor_detail.class.php');
require('theme.class.php'); 
    
$tbl_themes = new Theme; 

$tbl = new Grid;

$payment_controller = 'get_pixels';

$step =& $_REQUEST['step'];

// check step to make sure we are moving forward through the steps
// and not skipping any steps
// print_r($order_status);exit;
if (!isset($order_status)) $order_status = array();
if (!isset($order_status['step'])) $order_status['step'] = 1;
 
if($step == 6 && $order_status['step'] < 6  ){  
  echo $app->redirect_url(false, array('step' => $order_status['step']));exit;
}  
if($step == 6 && $order_status['step'] == 1  ){ 
  echo $app->redirect_url(false, array('step' => $order_status['step']));exit;
}
// print_r($order_status);exit;

if ($step < 1) $step = 1;

if ($step > $order_status['step'] ) {
  $app->redirect(false, array('step' => $order_status['step']));
}

if ($step <= 1) @clear_params(array_keys($order_status));
$order_status['step'] = $step;

$smarty->assign('lang', $lang);
$smarty->assign('step', $step);
$smarty->assign_by_ref('order_status', $order_status);

// step 1: select grid
if ($step <= 1) {
  if ($app->is_post()) {
    save_params('grid_id', 'free_paid');
    next_step();
  }
  else
    clear_params('grid_id', 'choose');
  clear_params('x', 'y', 'w', 'h', 'url', 'title', 'alt', 'email', 'region_id');
  unset($_SESSION['image']);
  $grids = $tbl->find_all('order by display_order');
  $smarty->assign('grids', $grids);
  $smarty->display('get_pixels.tpl', 'get_pixels|'.$cache_step.'|'.$cache_id);
  exit;
}
 
// fetch grid and make available to further steps
$grid_id = (int)param('grid_id');
$grid = $tbl->get($grid_id);
$smarty->assign('grid', $grid);
 
// step 2: select pixels
if ($step == 2) {
  $smarty->caching = 0;
  if ($app->is_post()) {
    if ($_REQUEST['w'] == 0){
      $smarty->caching = 0;
      $app->error('##Please select a region##');
    } elseif ($grid->region_max_width && $_REQUEST['w'] > $grid->region_max_width
      || $grid->region_max_height && $_REQUEST['h'] > $grid->region_max_height){
      $smarty->caching = 0;
      $app->error('##That region exceeds the maxium allowable size##');
    } elseif (!$grid->is_free_region($_REQUEST['x'], $_REQUEST['y'], $_REQUEST['w'], $_REQUEST['h'])){
      $app->error('##That region overlaps one or more existing regions##');
    } else {
      save_params('x');
      save_params('y');
      save_params('w');
      save_params('h');
      $square = param('w') * param('h');
      if ($grid->allow_free_paid && $grid->free_square >= param('w') * param('h') && param('free_paid') == 'free')  
        $_REQUEST['amount'] = 0;
      else
        $_REQUEST['amount'] =  $square * $grid->pixel_price / ($grid->selectable_square_size * $grid->selectable_square_size);
      save_params('amount');
      next_step();
    }
  }
  else
    clear_params('x', 'y', 'w', 'h', 'amount');

  clear_params('url', 'title', 'alt', 'email', 'region_id');
  unset($_SESSION['image']);
  load_params('grid_id', 'free_paid');

  $smarty->display('get_pixels_region.tpl', 'get_pixels|'.$grid_id.'|'.$cache_id);
  exit;
}

// step 3: upload image
if ($step == 3) {
  if ($app->is_post()) {
    $smarty->caching = false;

    if (Util::process_image_upload(param('w'), param('h'))){
      next_step();
    }
  }
  else
    unset($_SESSION['image']);
  clear_params('url', 'title', 'alt', 'email', 'region_id');
	load_params('w', 'h');
	if ($grid->images_gallery) {
  	$predefined_images = Util::predefined_images();
		$smarty->assign_by_ref('predefined_images', $predefined_images);
	}
  $smarty->display('get_pixels_upload.tpl', 'get_pixels|image_choose|'.$cache_id);
  exit;
} 

// step 4: show details form
if ($step == 4) {
  if ($app->is_post()) {
    if (empty($_REQUEST['url']) && empty($_REQUEST['skip_details']))
      $app->error('##A URL is required##');
    elseif (empty($_REQUEST['skip_details']) && !preg_match('/^https?:\/\/./', $_REQUEST['url']) && empty($_REQUEST['skip_details']))
      $app->error('##The URL must be an absolute URL starting with "http://" or "https://"##');
    else {
      if (empty($_REQUEST['skip_details']))
        save_params('url', 'title', 'alt');
      else {
        $_REQUEST['url'] = '';
        $_REQUEST['title'] = '';
        $_REQUEST['alt'] = '';
      }
      save_params('url', 'title', 'alt');
      next_step();
    }
  }
  else
    clear_params('url', 'title', 'alt');
  clear_params('email', 'region_id');
  load_params('w', 'h');
  $smarty->display('get_pixels_details.tpl');
  exit;
} 

// // from this point forward, we must be logged in if user accounts enabled
// if ($app->setting->user_accounts) {
//   $app->check_login('<p>##Please log in before proceeding##</p>');
// }

// step 5 (user accounts enabled): carry email from user account
// if ($step == 5 && $app->setting->user_accounts) {
//   $_REQUEST['email'] = @$_SESSION['email'];
//   save_params('email');
//   next_step();
// }

// step 5 (no user accounts): show email form
if ($step == 5) {
 // if (isset($_SESSION) && $_SESSION['email']) {
 //   $_REQUEST['email'] = @$_SESSION['email'];
    
 //   save_params('email');
 //   next_step();
 //  }
 // print_r($_REQUEST);exit;
  if(!empty(param('theme_id'))){
      
      $_REQUEST['amount'] = param('realamount');
      $order_status['amount'] = $_REQUEST['amount'];
      save_params('amount');  
  }
  if ($app->is_post() ) {

    if (empty($_REQUEST['email']))
      $app->error('##Please enter your e-mail address##');
    elseif (!Util::valid_email($_REQUEST['email']))
      $app->error('##That does not appear to be a valid e-mail address##');
    elseif (strtolower($_REQUEST['email_confirm']) != strtolower($_REQUEST['email']))
      $app->error('##Your re-entered email address does not match; please check##');
    elseif (isset($_REQUEST['own_theme']) && empty($_REQUEST['theme_name']))
      $app->error('##Enter your theme name##');
    else { 
      save_params('email');
      $_REQUEST['realamount'] = param('amount');
      $order_status['realamount'] = $_REQUEST['realamount'];
      save_params('realamount');  
    if(isset($_REQUEST['own_theme']) && !empty($_REQUEST['theme_name'])){
      require('theme_category.class.php');
      
      $tblcategory = new Theme_categorie;
      $spcategory = $tblcategory->find('where id=?', array($_REQUEST['category_id']));
       $famount = param('amount')+ $spcategory->amount;
      // param('amount') = $famount;
      $_REQUEST['amount'] = $famount;
      $order_status['amount'] = $famount;
      save_params('amount');  
      // $tbl_themes->region_id = param('region_id');
      $tbl_themes->category_id = $_REQUEST['category_id'];
      $tbl_themes->name = $_REQUEST['theme_name'];
      $tbl_themes->description = $_REQUEST['theme_description']?$_REQUEST['theme_description']:'';
      $tbl_themes->created_at = Util::epoch_to_datetime();
      $tbl_themes->status  = 1;
      $tbl_themes->save(); 
      $order_status['theme_id'] = $tbl_themes->id();
      $_REQUEST['theme_id'] = $order_status['theme_id'];
      save_params('theme_id');

    }

     if(!empty($_REQUEST['twitter_name'])){
     
        $tbls = new sponsor_detail;
        $tbls->lock();
        $sponsor = $tbls->find('where email=?', array($_REQUEST['email']));
       
        if ($sponsor->email && $sponsor->id){
           $sponsor->twitter_username = $_REQUEST['twitter_name'];
           $sponsor->updated_at = Util::epoch_to_datetime();
           $sponsor->save();

        }else {
           $tbls->email = $_REQUEST['email'];
           $tbls->twitter_username = $_REQUEST['twitter_name'];
           $tbls->created_at = Util::epoch_to_datetime();
           $tbls->save();
        }
        $tbl->unlock();
     }


        if(!isset($_REQUEST['own_theme']) && $_REQUEST['submit_button'] == 'Continue >>'){
          next_step();
        }else{ 

          clear_params('drawing_id'); 
          $order_status['step'] = 6; 
          header('Location:'.next_step_url());
        }
      
    }
  } 
  else
    clear_params('email');
  clear_params('region_id');
  load_params('w', 'h');
  $smarty->display('get_pixels_email.tpl');
  exit;
}
if ($step == 6 ) {
   
   if($app->is_post() && isset($_REQUEST['payment_id'])){ 
      $step = 7;
      goto payment;
   }elseif( $app->is_post() && isset($_REQUEST['drawing_id'])) {
     if($_REQUEST['drawing_id'] != 'skip'){
        save_params('drawing_id');
     }else{
        clear_params('drawing_id');
     }  
    echo next_step_url();exit;
   }else{
     header('Location:'.$app->url('drawings.php'));
   }
   exit; 
  // $smarty->display('get_pixels_drawing.tpl');
   
} 

// step 7: get payment
payment:
if ($step == 7) {
 
  // echo "testt".$app->is_post();exit;
  if ($app->is_post()) {

    if ($type = process_payment()) {

      store_region();
      if(!empty(param('drawing_id'))){
          $tbl_drawing = new Drawing;
          $drawing = $tbl_drawing->get(param('drawing_id')); 
          $drawing->is_sponsored = 1;
          $drawing->save(); 
       }
      if(!empty(param('theme_id'))){
        $themes = $tbl_themes->get(param('theme_id'));
        $themes->region_id = param('region_id');
        $tbl_themes->status  = 0;
        $themes->save();
      }
       
  
      if ($grid->allow_free_paid == 'true' && (param('w') * param('h') < $grid->free_square )) {
        if ($app->setting->approval_required)
          $mail_key = 'confirmation_free_pending';
        else
          $mail_key = 'confirmation_customers_active';
 
        $app->mail(param('email'), $mail_key, array(
          '[site_url]' => $app->url('/'),
          '[banner_url]' => $grid->url(),
          '[site_name]' => $app->setting->site_name,
          '[confirmation_number]' => $order_status['region_id'],
          '[update_url]' => $app->url('/update.php', array('id' => $order_status['region_id'], 'digest' => $app->digest(array('id' => $order_status['region_id']))), true, true)
          )
        );
      }
      $step = 8; 
      // print_r($_REQUEST);exit;
      // next_step();
      goto thank;
    }
  }
 
  // load_params('w', 'h', 'amount');
  load_params('w', 'h', 'amount','x','y','grid_id','drawing_id','email','url','title','alt');
   $_SESSION['current_order_status'] = $_REQUEST;
  if(!isset($_SESSION['inrRate']) || $_SESSION['inrRate'] ==''){
    $_SESSION['inrRate'] = 66;
    $respCurrency = @file('http://currency-converter.php5developer.com/api.php?from=USD&to=INR');
    $resArr = json_decode($respCurrency[0],true);
    if($respCurrency && $resArr){
      $_SESSION['inrRate'] = $resArr['rate'];
      $amount_var = round(($resArr['rate'] * param('amount')),2);
    }else{
      $amount_var = param('amount');
      $_SESSION['inrRate'] = '';
    }
  } 
     
  allocate_payment_id();
  assign_payment_options(); 
  $amount_var = round(($_SESSION['inrRate'] * param('amount')),2);
  $smarty->assign_by_ref('inramount',$amount_var);   
  $smarty->display('get_pixels_payment.tpl');
  exit;
} 

thank:
// step 8: thank you
if ($step == 8) {
  load_params('region_id');
  unset($_SESSION['payment_id']);
  unset($_SESSION['order_status']);        // we can't go back from this step
  unset($_SESSION['current_order_status']);
  $smarty->clear_all_cache();

  $smarty->display('get_pixels_done.tpl');
  exit;
}

// if we get here, there is a problem
$app->abort("Invalid step value");

?>
