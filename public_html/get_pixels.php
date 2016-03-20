<?php

// get_pixels.php
// page controller for pixel purchase process

require_once('config.php');
require_once('grid.class.php');
//require_once('util.class.php');
require_once('get_pixels.inc.php');

$tbl = new Grid;

$payment_controller = 'get_pixels';

$step =& $_REQUEST['step'];

// check step to make sure we are moving forward through the steps
// and not skipping any steps
if (!isset($order_status)) $order_status = array();
if (!isset($order_status['step'])) $order_status['step'] = 1;

if ($step < 1) $step = 1;
if ($step > $order_status['step'])
  $app->redirect(false, array('step' => $order_status['step']));
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
  if ($app->is_post()) {
    if (empty($_REQUEST['email']))
      $app->error('##Please enter your e-mail address##');
    elseif (!Util::valid_email($_REQUEST['email']))
      $app->error('##That does not appear to be a valid e-mail address##');
    elseif (strtolower($_REQUEST['email_confirm']) != strtolower($_REQUEST['email']))
      $app->error('##Your re-entered email address does not match; please check##');
    else {
      save_params('email');
      next_step();
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
  if ($app->is_post()) { 
    save_params('drawingid');
    next_step(); 
   }
  $smarty->display('get_pixels_drawing.tpl');
  exit;
} 

// step 7: get payment
if ($step == 7) {
  if ($app->is_post()) {
    if ($type = process_payment()) {
      store_region();
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
      next_step();
    }
  }

  load_params('w', 'h', 'amount');

  allocate_payment_id();
  assign_payment_options();
  $smarty->display('get_pixels_payment.tpl');
  exit;
} 

// step 8: thank you
if ($step == 8) {
  load_params('region_id');
  unset($_SESSION['order_status']);        // we can't go back from this step
  $smarty->clear_all_cache();
  $smarty->display('get_pixels_done.tpl');
  exit;
}

// if we get here, there is a problem
$app->abort("Invalid step value");

?>
