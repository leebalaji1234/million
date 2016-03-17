<?php

require_once('config.php');
require_once('region.class.php');
require_once('util.class.php');

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
    $smarty->display('update_email.tpl');
    exit;
  }
}

require_once('grid.class.php');
$tbl_grid = new Grid;
$grid = $tbl_grid->get($region->grid_id);

$template = 'update.tpl';

if ($app->is_post()) {
  if (@$_REQUEST['upload_image'] == 1) {
    // show form to upload image
    $_REQUEST['upload_image'] = 2;
    $template = 'update_upload.tpl';
  }
  elseif (@$_REQUEST['upload_image'] == 2) {
    // handle uploaded image
    if (@$_REQUEST['submit_button'] != 'Cancel') {
      if (!Util::process_image_upload($region->width, $region->height))
        $template = 'update_upload.tpl';
    }
  }
  else {
    // update region
    $region->url = @$_REQUEST['url'];
    $region->title = @$_REQUEST['title'];
    $region->alt = @$_REQUEST['alt'];
    $region->image = @$_SESSION['image'];
    if ($region->validate()) {
      $region->save();
      $grid->is_dirty = 1;
      $grid->save();
      unset($_SESSION['image']);
      if ($app->setting->user_accounts){
      	$smarty->clear_all_cache();
      	$app->redirect('/account.php');
      }
      $template = 'update_done.tpl';
    }
  }
  $smarty->clear_all_cache();
}
else {
  $_SESSION['image'] = $region->image;
  $_REQUEST['url'] = $region->url;
  $_REQUEST['title'] = $region->title;
  $_REQUEST['alt'] = $region->alt;

  if (Util::empty_datetime($region->expires_at))
    $region->expires_at = '';
  if (Util::empty_datetime($region->purge_at))
    $region->purge_at = '';
}

$smarty->assign_by_ref('grid', $grid);
$smarty->assign_by_ref('region', $region);
if (!Util::empty_datetime($region->expires_at) && $grid->expire_days > 0) {
  $param = array();
  $param['id'] = $region->id;
  if (!$app->setting->user_accounts) {
    $param['email'] = @$_REQUEST['email'];
    $param['digest'] = @$_REQUEST['digest'];
  }
  $smarty->assign('renew_url', $app->url('/renew.php', $param));
}
$smarty->display($template);

?>
