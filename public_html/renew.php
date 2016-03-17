<?php

require_once('config.php');
require_once('region.class.php');
require_once('util.class.php');
require_once('get_pixels.inc.php');

$id =& $_REQUEST['id'];

$tbl = new Region;

// if accounts are enabled, we must be logged in, and the region must belong to
// the logged-in user. otherwise, validate the digest and get the email address
// to confirm.
if ($app->setting->user_accounts) {
  $app->check_login('##Please log in to access your account##');
  $region = $tbl->find('where `id`=? and `user_id`=?', array($id, $_SESSION['user_id']));
  if ($region->_new_row)
    $app->abort('Invalid region id');
}
else {
  $temp = $app->digest(array($id));
  if ($temp != @$_REQUEST['digest'])
    $app->abort('Incorrect digest');
  $region = $tbl->get($id);
  if (@$_REQUEST['email'] != $region->email) {
    if (isset($_REQUEST['email']))
      $app->error('##That email address is not valid. Please enter the address used when you purchased your pixels##');
      $smarty->display('renew_email.tpl');
    exit;
  }
}

$payment_controller = 'renew';

$_SESSION['image'] = $region->image;

require_once('grid.class.php');
$tbl_grid = new Grid;
$grid = $tbl_grid->get($region->grid_id);
$smarty->assign('grid', $grid);

$step =& $_REQUEST['step'];

// check step to make sure we are moving forward through the steps
// and not skipping any steps
if (!isset($order_status['step'])) $order_status['step'] = 1;
if ($step < 1) $step = 1;
if ($step > $order_status['step']) {
  $_GET['step'] = $order_status['step'];
  $app->redirect(false, $_GET);
}
if ($step <= 1) @clear_params(array_keys($order_status));
$order_status['step'] = $step;

$smarty->assign('lang', $lang);
$smarty->assign('step', $step);
$smarty->assign_by_ref('order_status', $order_status);

// step 1: get payment
if ($step == 1) {
  if ($app->is_post()) {
    if (process_payment()) {
      renew_region();
      next_step();
    }
  }
  $order_status['region_id'] = $region->id;
  $order_status['w'] = $region->width;
	$order_status['h'] = $region->height;
	$order_status['amount'] = $region->width * $region->height * $grid->pixel_price / ($grid->selectable_square_size * $grid->selectable_square_size);
  $order_status['url'] = $region->url;
  $order_status['email'] = $region->email;
  $new_expires_at = max($region->expires_at, Util::epoch_to_datetime());
  $new_expires_at = Util::epoch_to_datetime(strtotime($new_expires_at) + $grid->expire_days * 86400);
  $order_status['new_expires_at'] = $new_expires_at;
  allocate_payment_id();
  if (param('amount') > 0) {
    assign_payment_options();
    $smarty->display('get_pixels_payment.tpl');
  }
  else
  $smarty->display('get_pixels_free.tpl');
  exit;
} 

// step 2: thank you
if ($step == 2) {
  load_params('region_id');
  unset($_SESSION['order_status']);        // we can't go back from this step
	$smarty->clear_all_cache();
  $smarty->display('renew_done.tpl');
  exit;
}

// if we get here, there is a problem
$app->abort("Invalid step value");

?>
