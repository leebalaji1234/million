<?php

require_once('admin_config.php');
require_once('grid.class.php');
require_once('region.class.php');
require_once('util.class.php');

$tbl = new Region;
if (!isset($_REQUEST['id']))
  $app->abort('##expected id##');
$region = $tbl->get($_REQUEST['id']);

$tbl = new Grid;
$grid = $tbl->get($region->grid_id);

$template = 'admin/edit_region.tpl';

if ($app->is_post()) {
  if (@$_REQUEST['action'] == 'delete') {
      if (!@$_REQUEST['confirm']) {
        $smarty->display('admin/edit_region_confirm.tpl');
        exit;
      }
      $region->delete();
      $grid->is_dirty = 1;
      $grid->save();
      $app->redirect('/admin/maintain_regions.php', array('grid_id' => $grid->id));
  }
	elseif (@$_REQUEST['upload_image'] == 1) {
    // show form to upload image
    $_REQUEST['upload_image'] = 2;
    $predefined_images = Util::predefined_images();
    $smarty->assign_by_ref('predefined_images', $predefined_images);
    $template = 'admin/edit_region_upload.tpl';
  }
  elseif (@$_REQUEST['upload_image'] == 2) {
    // handle uploaded image
    if (@$_REQUEST['submit_button'] != 'Cancel') {
      if (!Util::process_image_upload($region->width, $region->height))
        $template = 'admin/edit_region_upload.tpl';
    }
  }
  else {
    // update region
    $region->status = @$_REQUEST['status'];
    $region->url = @$_REQUEST['url'];
    $region->title = @$_REQUEST['title'];
    $region->alt = @$_REQUEST['alt'];
    $region->email = @$_REQUEST['email'];
    $region->notes = @$_REQUEST['notes'];
    $region->image = @$_SESSION['image'];
    $region->clicks = @$_REQUEST['clicks'];
    $region->expires_at = @$_REQUEST['expires_at'];
    $region->reminder_at = @$_REQUEST['reminder_at'];
    $region->purge_at = @$_REQUEST['purge_at'];
    if ($region->validate()) {
      if (isset($_REQUEST['send_confirmation']) && $_REQUEST['send_confirmation']) {
        require_once('get_pixels.inc.php');
        if ($grid->allow_free_paid == 'true'){
          $app->mail($region->email, 'confirmation_customers_active', array(
            '[site_url]' => $app->url('/'),
            '[banner_url]' => $grid->url(),
            '[site_name]' => $app->setting->site_name,
            '[confirmation_number]' => $region->id,
            '[update_url]' => $app->url('/update.php', array('id' => $region->id), true, true)
            ));
        }
        else {
          send_purchase_confirmation($region, 0);
        }
        $app->error("Purchase confirmation sent");
      }
      else {
        $region->save();
        $grid->is_dirty = 1;
        $grid->save();
        unset($_SESSION['image']);
        $app->redirect('/admin/maintain_regions.php', array('grid_id' => $grid->id()));
      }
    }
  }
}
else {
  foreach ($region->attr() as $name => $val) {
    $_REQUEST[$name] = $val;
  }
  $_SESSION['image'] = $region->image;
}

$smarty->assign('statuses', array(
  REGION_ACTIVE => $lang->language_translate('##Active##'),
  REGION_PENDING => $lang->language_translate('##Pending##'),
  REGION_SUSPENDED => $lang->language_translate('##Suspended##'),
  REGION_RESERVED => $lang->language_translate('##Reserved##'),
  REGION_EXPIRED => $lang->language_translate('##Expired##'),
));
$smarty->assign('region', $region);
$smarty->assign('grid', $grid);
$smarty->display($template);

?>
