<?php

require_once('admin_config.php');
require_once('grid.class.php');
require_once('snippet.class.php');

$tbl = new Grid;
$action = @$_REQUEST['action'];

// temporarily increase memory limit for large image manipulation
if (defined('PUBLISH_MEMORY_LIMIT'))
  @ini_set('memory_limit', PUBLISH_MEMORY_LIMIT);

// display main list if no action
if (empty($action)) {
  $rows = $tbl->find_all('order by display_order');
  $smarty->assign('rows', $rows);
  $smarty->display('admin/maintain_grids.tpl');
  exit;
}

// check parameters
if ($action != 'new' && $action != 'edit' && $action != 'move_up')
  $app->abort('##Invalid action##');

$smarty->assign('images_gallery_options', array('Disable', 'Enable'));
// handle new grid creation
if ($action == 'new') {
  if ($app->is_post()) {
    $row = new Grid;
    $row->width = $_REQUEST['width'];
    $row->height = $_REQUEST['height'];
    if ($row->validate_size()) {
      $row->name = 'Pixels';
      $max = $tbl->find('', array(), 'max(`display_order`) as `max`');
      $row->display_order = isset($max->max) ? $max->max + 1 : 1;
      $row->grid_color = 'E0E0E0';
      $row->grid_transparency = 0;
      $row->background_color = 'F0F0F0';
      $row->pixel_price = '1.00';
      $row->background_image = '';
      $row->background_thumbnail_image = '';
      $row->expire_days = 0;
      $row->reminder_days = 0;
      $row->purge_days = 0;
      $row->save();
      $smarty->clear_all_cache();
      $smarty->clear_compiled_tpl();
      $app->redirect(false, array('action' => 'edit', 'id' => $row->id()));
    }
  }
  else {
    $_REQUEST['width'] = 1000;
    $_REQUEST['height'] = 1000;
  }
  $smarty->display('admin/maintain_grids_new.tpl');
  exit;
}

// fetch row for grid being edited or moved
$id = @$_REQUEST['id'];
$row = $tbl->get($id);

// handle move-up
if ($app->is_post() && @$_REQUEST['action'] == 'move_up') {

  // to move up, we exchange display_order's with the row above this one
  $prior = $tbl->find('where display_order<? order by display_order desc', array($row->display_order));
  if (is_null($prior->id()))
    $app->abort('##Unable to find grid with prior display_order##');
  $temp = $prior->display_order;
  $prior->display_order = $row->display_order;
  $row->display_order = $temp;
  $prior->save();
  $row->save();
  $smarty->clear_all_cache();
  $smarty->clear_compiled_tpl();
  $app->redirect();
}

// handle save or delete
$template = 'admin/maintain_grids_edit.tpl';
$smarty->assign_by_ref('grid', $row);
if ($app->is_post()) {
	$smarty->clear_all_cache();
  $smarty->clear_compiled_tpl();
  //die(__LINE__.__FILE__);
	if (@$_REQUEST['upload_image'])
    handle_upload_image();
  elseif (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'true') {
    if (!@$_REQUEST['confirm']) {
      $smarty->assign_by_ref('grid', $row);
      $smarty->display('admin/maintain_grids_confirm.tpl');
      exit;
    }
    $row->delete();
    unset($_SESSION['background_image']);
    unset($_SESSION['image']);
    $smarty->clear_compiled_tpl();
    $smarty->clear_all_cache();
    $app->redirect();
  } else {
    // copy params to row
    $row->name = $_REQUEST['name'];
    $row->grid_color = $_REQUEST['grid_color'];
    $row->grid_transparency = $_REQUEST['grid_transparency'];
    $row->background_color = $_REQUEST['background_color'];
    $row->pixel_price = $_REQUEST['pixel_price'];
    $row->region_max_width = $_REQUEST['region_max_width'];
    $row->region_max_height = $_REQUEST['region_max_height'];
    $row->expire_days = $_REQUEST['expire_days'];
    $row->reminder_days = $_REQUEST['reminder_days'];
    $row->purge_days = $_REQUEST['purge_days'];
    $row->allow_free_paid = ($_REQUEST['allow_free_paid'] == '1') ? ('true') : ('false');
    $row->free_square = $_REQUEST['free_square'];
    $row->selectable_square_size = $_REQUEST['selectable_square_size'];
    $row->images_gallery  = $_REQUEST['images_gallery'];
		
		// validate and save
    if ($row->validate()) {
      $row->background_image = $_SESSION['background_image'];
      $row->background_thumbnail_image = $_SESSION['image'];
      $row->is_dirty = 1;
      $row->save();
      Snippet::save_from_request('grid_title', $row->id());
      Snippet::save_from_request('grid_buy_button', $row->id());
      Snippet::save_from_request('grid_description', $row->id());
      unset($_SESSION['background_image']);
      unset($_SESSION['image']);
      $app->redirect();
   }
  }
} else {
  // initialize request params from row
  @$_REQUEST['id'] = $row->id();
  @$_REQUEST['name'] = $row->name;
  @$_REQUEST['width'] = $row->width;
  @$_REQUEST['height'] = $row->height;
  @$_REQUEST['grid_color'] = $row->grid_color;
  @$_REQUEST['grid_transparency'] = $row->grid_transparency;
  @$_REQUEST['background_color'] = $row->background_color;
  @$_REQUEST['pixel_price'] = $row->pixel_price;
  @$_REQUEST['region_max_width'] = $row->region_max_width;
  @$_REQUEST['region_max_height'] = $row->region_max_height;
  @$_REQUEST['expire_days'] = $row->expire_days;
  @$_REQUEST['reminder_days'] = $row->reminder_days;
  @$_REQUEST['purge_days'] = $row->purge_days;
  @$_REQUEST['allow_free_paid'] = $row->allow_free_paid;
  @$_REQUEST['free_square'] = $row->free_square;
  @$_REQUEST['selectable_square_size'] = $row->selectable_square_size;
  @$_REQUEST['images_gallery'] = $row->images_gallery;
  Snippet::get_to_request('grid_title', $row->id(), 'Pixels');
  Snippet::get_to_request('grid_buy_button', $row->id(), 'Buy Pixels');
  Snippet::get_to_request('grid_description', $row->id(), '(Description of Pixels)');
  $_SESSION['background_image'] = $row->background_image;
  $_SESSION['image'] = $row->background_thumbnail_image;
}

// display new/edit form
$smarty->display($template);

function handle_upload_image() {
  global $template, $smarty;
  @set_time_limit(120);
  if ($_REQUEST['upload_image'] == 1) {
    // show form to upload image
    $_REQUEST['lighten'] = 0;
    $_REQUEST['upload_image'] = 2;
    $hidden = request_to_hidden();
    unset($hidden['lighten']);
    $smarty->assign('hidden', $hidden);
    $template = 'admin/maintain_grids_upload.tpl';
  }
  elseif ($_REQUEST['upload_image'] == 2) {
    // handle uploaded image
    if (@$_REQUEST['submit_button'] != 'Cancel') {
      if (!process_image_upload()) {
        $hidden = request_to_hidden();
        unset($hidden['lighten']);
        unset($hidden['file']);
        $smarty->assign('hidden', $hidden);
        $template = 'admin/maintain_grids_upload.tpl';
      }
    }
  }
  elseif ($_REQUEST['upload_image'] == 3) {
    // clear image
    $_SESSION['background_image'] = '';
    $_SESSION['image'] = '';
  }
}

function process_image_upload() {
  global $app, $row;

  // temporarily increase memory limit for large image manipulation
  if (defined('PUBLISH_MEMORY_LIMIT'))
    @ini_set('memory_limit', PUBLISH_MEMORY_LIMIT);

  // make sure we have a valid file
  if (!is_uploaded_file(@$_FILES['file']['tmp_name'])
    || @$_FILES['file']['size'] == 0) {
    $app->error('##Please upload a valid file##');
    return false;
  }

  // move the upload to the temp dir (in case open_basedir in effect)
  $fname = TEMP_DIR . basename($_FILES['file']['tmp_name']);
  if (!@move_uploaded_file($_FILES['file']['tmp_name'], $fname))
    $app->abort('##Unable to move uploaded file to temp dir##');

  // check the image type
  if (!$info = getimagesize($fname)) {
    $app->error('##The file does not appear to be a valid image##');
    return false;
  }
  if ($info[2] < 1 || $info[2] > 3) {
    $app->error('##The image must be in GIF, JPG, or PNG format##');
    return false;
  }

  // read the image and resize it
  if ($info[2] == 1)
    $img = imagecreatefromgif($fname);
  elseif ($info[2] == 2)
    $img = imagecreatefromjpeg($fname);
  else
    $img = imagecreatefrompng($fname);

  // resize it and apply solid white background in case source
  // image has transparency
  $w = $row->width;
  $h = $row->height;
  $dst = imagecreatetruecolor($w, $h);
  $white = imagecolorallocate($dst, 255, 255, 255);
  imagefill($dst, 0, 0, $white);
  imagecopyresampled($dst, $img, 0, 0, 0, 0, $w, $h, $info[0], $info[1]);
  imagedestroy($img);
  $img = $dst;

  // lighten the image
  require_once('util.class.php');
  Util::lighten_image($img, $_REQUEST['lighten'] / 100);

  // save the image to the session as PNG
  ob_start();
  imagepng($img);
  $_SESSION['background_image'] = ob_get_contents();
  ob_end_clean();

  // create the thumbnail as maximum of 100x100 pixels
  $scale_factor = min( min(1.0, 100.0 / $w), min(1.0, 100.0 / $h) );
  $tw = $scale_factor * $w;
  $th = $scale_factor * $h;
  $dst = imagecreatetruecolor($tw, $th);
  $white = imagecolorallocate($dst, 255, 255, 255);
  imagefill($dst, 0, 0, $white);
  imagecopyresampled($dst, $img, 0, 0, 0, 0, $tw, $th, $w, $h);
  imagedestroy($img);
  $img = $dst;

  // save the image to the session as PNG
  ob_start();
  imagepng($img);
  $_SESSION['image'] = ob_get_contents();
  ob_end_clean();
  imagedestroy($img);

  // zap the temp file
  @unlink($fname);

  return true;
}

// return an array of key/values for creating hidden fields from
// all request fields, expanding arrays as necessary
function request_to_hidden(){
  $hidden = array();
  _add_to_hidden($hidden, $_REQUEST);
  return $hidden;
}

function _add_to_hidden(&$to, &$from, $prefix = '') {
  foreach ($from as $name => $value) {
    if (is_array($value)) {
      if (empty($prefix)) 
        $new_prefix = $name; 
      else 
        $new_prefix = $prefix . '[' . $name . ']';
      _add_to_hidden($to, $value, $new_prefix);
    }
    else {
      if (!empty($prefix))
        $name = $prefix . '[' . $name . ']';
      $to[$name] = $value;
    }
  }
}

?>
