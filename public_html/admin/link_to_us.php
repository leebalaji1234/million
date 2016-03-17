<?php

require_once('admin_config.php');
require_once('includes/link_banner.class.php');
require_once('includes/link_link.class.php');
require_once('PHP/Compat/Function/file_get_contents.php');

$tbl_link_banner = new Link_Banner;
$tbl_link_link = new Link_Link;

$banners = $tbl_link_banner->find_all('order by id');
$links = $tbl_link_link->find_all('order by id');

if ($app->is_post()) {

  // validate arguments
  $fname = null;
  if (!empty($_FILES['banner_file_new']['name'])) {
    $file =& $_FILES['banner_file_new'];
    // make sure we have a valid upload file
    if (!is_uploaded_file($file['tmp_name'])
      || $file['size'] == 0) {
        $app->error('##Please upload a valid banner file##');
    }
    else {
      // move the file to the temp dir (in case open_basedir in effect)
      $fname = TEMP_DIR . basename($file['tmp_name']);
      if (!@move_uploaded_file($file['tmp_name'], $fname))
        $app->abort('##Unable to move uploaded file to temp dir##');
      // check the image type
      if (!$info = getimagesize($fname))
        $app->error('##The file does not appear to be a valid image##');
      elseif ($info[2] < 1 || $info[2] > 3)
        $app->error('##The image must be in GIF, JPG, or PNG format##');
    }
  }

  if (empty($app->errors)) {

  	//clean all cache if we enable/disble this feature
  	if (isset($_REQUEST['link_to_us_enabled']) && $app->setting->link_to_us_enabled != $_REQUEST['link_to_us_enabled'])
  		$smarty->clear_all_cache();
    // adjust feature enabled
    $app->setting->link_to_us_enabled = $_REQUEST['link_to_us_enabled'];
    $smarty->clear_cache(null, 'link_to_us');
    $app->setting->save();

    // update/delete existing banners
    foreach ($banners as $banner) {
      if (@$_REQUEST['banner_delete'][$banner->id])
        $banner->delete();
      else {
        $banner->html = @$_REQUEST['banner_html'][$banner->id];
        $smarty->clear_cache(null, 'link_to_us');
        $banner->save();
      }
    }

    // create new banner if requested
    if ($fname) {
      $banner = new Link_Banner;
      $banner->image = file_get_contents($fname);
      if ($info[2] == 1)
        $banner->mime_type = 'image/gif';
      elseif ($info[2] == 2)
        $banner->mime_type = 'image/jpeg';
      else
        $banner->mime_type = 'image/png';
      $banner->html = $_REQUEST['banner_html_new'];
      if (empty($banner->html))
        $banner->html = '<a href="[site_url]" target="_blank"><img src="[banner_url]" border="0" alt="[site_name]" /></a>';
      $smarty->clear_cache(null, 'link_to_us');
      $banner->save();
    }

    // update/delete existing links
    foreach ($links as $link) {
      if (@$_REQUEST['link_delete'][$link->id])
        $link->delete();
      else {
        $link->html = @$_REQUEST['link_html'][$link->id];
        $smarty->clear_cache(null, 'link_to_us');
        $link->save();
      }
    }

    // create new link if requested
    if (!empty($_REQUEST['link_html_new'])) {
      $link = new Link_Link;
      $link->html = $_REQUEST['link_html_new'];
      $smarty->clear_cache(null, 'link_to_us');
      $link->save();
    }

    $app->redirect();
  }
}
else {
  $_REQUEST['link_to_us_enabled'] = $app->setting->link_to_us_enabled;
  foreach ($banners as $banner) {
    $banner->publish();
    $_REQUEST['banner_html'][$banner->id] = $banner->html;
  }
  foreach ($links as $link) {
    $_REQUEST['link_html'][$link->id] = $link->html;
  }
}

$smarty->assign('banners', $banners);
$smarty->assign('links', $links);
$smarty->display('admin/link_to_us.tpl');

?>
