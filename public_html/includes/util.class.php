<?php

// util.class.php
// utility routines

class Util
{

  // checks for empty datetime, or returns empty datetime value
  function empty_datetime($check = false)
  {
    if ($check !== false)
      return !preg_match('/[^0: -]/', $check);
    return '0000-00-00 00:00:00';
  }

  // create a CAPTCHA image and store details in session object
  function captcha_create()
  {
    global $app;
    require_once('Text/CAPTCHA.php');

    $_SESSION['captcha'] = array();
    $captcha =& $_SESSION['captcha'];

    $options = array(
      'font_size' => 28,
      'font_path' => PEAR_DIR . '../fonts/',
      'font_file' => 'Abscissa.ttf',
    );
    $c = Text_CAPTCHA::factory('Image');
    $ret = $c->init(160, 80, null, $options);
    if (PEAR::isError($ret))
      $app->abort('Error generating CAPTCHA: ', $ret->getMessage());
    $captcha['phrase'] = $c->getPhrase();

    $png = $c->getCAPTCHAAsPNG();
    if (PEAR::isError($png))
      $app->abort('Error generating CAPTCHA image: ', $png->getMessage());
    $captcha['image'] = $png;

  }

  // release session resources used by captcha
  function captcha_destroy()
  {
    unset($_SESSION['captcha']);
  }

  // return phrase for current captcha image
  function captcha_phrase()
  {
    $captcha =& $_SESSION['captcha'];
    return @$captcha['phrase'];
  }

  // return URL for current captcha image
  function captcha_url()
  {
    global $app;
    return $app->url('/captcha_image.php', array('x' => time()));
  }

  // process expired regions if necessary. if $force is true, the
  // check is made regardless of the setting of settings.expires_check_at
  function process_expired_regions($force = false)
  {
    global $app;
    $now = Util::epoch_to_datetime();
    if (!$force && $now < $app->setting->expires_check_at)
      return;

    $dirty_grids = array();

    // set a far future date for the next check. we will reset this
    // to an earlier date if we find a region that has an event in
    // the future. otherwise, no further checks need to be made until
    // the next time a region is saved.
    $check = '2100-01-01 00:00:00';

    // process all active or expired regions
    require_once('region.class.php');
    $tbl_region = new Region;
    $regions = $tbl_region->find_all('where `status`=? or `status`=?',
    array(REGION_ACTIVE, REGION_EXPIRED));
    foreach ($regions as $k => $region)
    {

      // check for expiration
      if ($region->expires_at >= $now && $region->expires_at < $check)
        $check = $region->expires_at;
      if ($region->expires_at <= $now && !Util::empty_datetime($region->expires_at) && $region->status == REGION_ACTIVE) {
        // expire the region
        $region->status = REGION_EXPIRED;
        $dirty_grids[$region->grid_id] = true;
        $region->save();
      }

      // check for reminder needed
      if ($region->reminder_at >= $now && $region->reminder_at < $check)
        $check = $region->reminder_at;
      if ($region->reminder_at <= $now && !Util::empty_datetime($region->reminder_at) && $region->status == REGION_ACTIVE) {
        // send renewal reminder
        Util::send_renewal_reminder($region);
        $region->reminder_at = Util::empty_datetime();
        $region->save();
      }

      // check for purge needed
      if ($region->purge_at >= $now && $region->purge_at < $check)
      $check = $region->purge_at;
      if ($region->purge_at <= $now && !Util::empty_datetime($region->purge_at) && $region->status == REGION_EXPIRED) {
        // purge expired region 
        $dirty_grids[$region->grid_id] = true;
        $region->delete();
      }

    }

    // mark any grids that had a region expired or purged
    require_once('grid.class.php');
    $tbl_grid = new Grid;
    foreach ($dirty_grids as $k => $grid_id)
    {
      $grid = $tbl_grid->get($grid_id);
      $grid->is_dirty = 1;
      $grid->save();
    }

    // update the time for the next check
    $app->setting->expires_check_at = $check;
    $app->setting->save();
  }

  // send renewal reminder email 
  function send_renewal_reminder($region)
  {
    global $app;
    $template = 'renewal_reminder';
    $update_url_param = array('id' => $region->id);
    if (!$app->setting->user_accounts)
      $update_url_param['digest'] = $app->digest(array($region->id));
    $app->mail($region->email, $template, array(
      '[url]' => $region->url,
      '[update_url]' => $app->url('/update.php', $update_url_param, true, true),
      '[expires_at]' => $region->expires_at,
      '[purge_at]' => $region->purge_at == Util::empty_datetime() ? '(none)' : $region->purge_at,
      '[email]' => $region->email,
    ));
  }

  // convert MySQL-compatible datetime literal to a date string
  function datetime_to_date($datetime)
  {
    // TODO: make this locale-sensitive?
    return substr($datetime, 0, 10);
  }

  // convert epoch seconds to MySQL-compatible datetime literal
  function epoch_to_datetime($secs = false)
  {
    if ($secs === false) $secs = time();
    return strftime('%Y-%m-%d %H:%M:%S', $secs);
  }

  // given a status code, width, and height, return an appropriate image
  // to cover a region of that status
  function status_image($status, $width, $height)
  {
    global $app;
    if ($status == REGION_PENDING) {
      $bgcolor = REGION_PENDING_BG;
      $fgcolor = REGION_PENDING_FG;
      $letter = REGION_PENDING_LETTER;
    }
    elseif ($status == REGION_SUSPENDED) {
      $bgcolor = REGION_SUSPENDED_BG;
      $fgcolor = REGION_SUSPENDED_FG;
      $letter = REGION_SUSPENDED_LETTER;
    }
    elseif ($status == REGION_EXPIRED) {
      $bgcolor = REGION_EXPIRED_BG;
      $fgcolor = REGION_EXPIRED_FG;
      $letter = REGION_EXPIRED_LETTER;
    }
    else {
      $bgcolor = REGION_RESERVED_BG;
      $fgcolor = REGION_RESERVED_FG;
      $letter = REGION_RESERVED_LETTER;
    }
    $img = imagecreatetruecolor($width, $height);
    list($r, $g, $b) = Util::str_to_rgb($bgcolor);
    $bg = imagecolorallocate($img, $r, $g, $b);
    list($r, $g, $b) = Util::str_to_rgb($fgcolor);
    $fg = imagecolorallocate($img, $r, $g, $b);
    imagefill($img, 0, 0, $bg);
    if ($app->setting->interlaced_images) imageinterlace($img, 1);
    imagestring($img, 1, 1, 1, $letter, $fg);
    return $img;
  }

  // given string of six hex digits, return array of 3 color values
  function str_to_rgb($str)
  {
    return array(
      hexdec(substr($str, 0, 2)),
      hexdec(substr($str, 2, 2)),
      hexdec(substr($str, 4, 2)),
    );
  } 

  // convert an image to grayscale
  // (this code adapted from 
  // http://fundisom.com/phpsnippets/snip/image_editing/grayscale_an_image/)
  // $lighten will make the image lighter (e.g. 0.5 will change black to
  // 50% gray)
  function grayscale_image($img, $lighten = 0)
  {
    $x = imagesx($img);
    $y = imagesy($img);
   
    for($i = 0; $i < $y; $i++) {
      for($j = 0; $j < $x; $j++) {
        $pos = imagecolorat($img, $j, $i);
        $f = imagecolorsforindex($img, $pos);
        $gst = $f['red'] * 0.15 + $f['green'] * 0.5 + $f['blue'] * 0.35;
        $gst = $gst * (1 - $lighten) + 256 * $lighten;
        $col = imagecolorresolve($img, $gst, $gst, $gst);
        imagesetpixel($img, $j, $i, $col);
      }
    } 
  }

  // lighten an image by a percentage from 0 to 1
  // (e.g. 0.5 will change black to 50% gray)
  function lighten_image($img, $lighten = 0)
  {
    $x = imagesx($img);
    $y = imagesy($img);

    // nothing to do if factor is zero
    $lighten = max(0, min(1, $lighten));
    if ($lighten == 0) return;

    $factor = (1 - $lighten);
    $offset = 256 * $lighten;
   
    for($i = 0; $i < $y; $i++) {
      for($j = 0; $j < $x; $j++) {
        $pos = imagecolorat($img, $j, $i);
        $f = imagecolorsforindex($img, $pos);
        $r = $f['red'] * $factor + $offset;
        $g = $f['green'] * $factor + $offset;
        $b = $f['blue'] * $factor + $offset;
        $col = imagecolorresolve($img, $r, $g, $b);
        imagesetpixel($img, $j, $i, $col);
      }
    } 
  }

  // return a nested array of predefined images for use by
  // predefined_images.inc.tpl templates
  function predefined_images() {
    global $app;
    
    $images = array();
    $d1 = dir(PACKAGE_ROOT . 'images/pixels');
    while ($e1 = $d1->read()) {
      if ($e1 == '.' || $e1 == '..') continue;
      $path = $d1->path . '/' . $e1;
      if (!is_dir($path)) continue;
      $images[$e1] = array();
      $d2 = dir($path);
      while ($e2 = $d2->read()) {
        $path2 = $d2->path . '/' . $e2;
        if (is_dir($path2)) continue;
        $images[$e1][] = 'images/pixels/' . $e1 . '/' . $e2;
      }
    }

    //sort functionality.
    list($sort_function, $order_type) = explode("#", $app->setting->order_image_galleries);
    
    $sort_function($images, constant($order_type));

    return $images;
  }

  // takes an uploaded image from $_FILES, or a predefined image from
  // $_REQUEST['predefined_image'] and converts it to PNG
  // format and resizes to $w x $h pixels. The resulting image data
  // is stored as a string in $_SESSION[$session_key]. Returns true
  // on success or false on failure ($app->errors contains errors)
  function process_image_upload($w, $h, $name = 'file', $session_key = 'image'){
    global $app;
   
    //verify for upload images settings
    if (count($_FILES) && !$app->setting->upload_images) 
      return 0;
      
    // temporarily increase memory limit for large image manipulation
    if (defined('PUBLISH_MEMORY_LIMIT'))
      @ini_set('memory_limit', PUBLISH_MEMORY_LIMIT);

    // if a predefined image was selected, grab it
    if (!empty($_REQUEST['predefined_image'])) {
    	$fname = PACKAGE_ROOT . $_REQUEST['predefined_image'];
    } else {

    	// make sure we have a valid file
      // error_reporting(E_ALL);
      // ini_set('display_errors',1);
      // echo @$_FILES['file']['tmp_name'];exit;
    	if (!is_uploaded_file(@$_FILES[$name]['tmp_name'])
        || @$_FILES[$name]['size'] == 0) {
        $app->error('##Please upload a valid file##');
        return false;
      }

 
      // move the upload to the temp dir (in case open_basedir in effect)
      $fname = TEMP_DIR . basename($_FILES[$name]['tmp_name']); 
       
     // echo $fname;exit;
      if (!@move_uploaded_file($_FILES[$name]['tmp_name'], $fname))
      $app->abort('##Unable to move uploaded file to temp dir##');



    }

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
    $dst = imagecreatetruecolor($w, $h);
    $white = imagecolorallocate($dst, 255, 255, 255);
    imagefill($dst, 0, 0, $white);
    imagecopyresampled($dst, $img, 0, 0, 0, 0, $w, $h, $info[0], $info[1]);
    imagedestroy($img);
    $img = $dst;
    
    // save the image to the session as PNG
    if ($app->setting->interlaced_images) imageinterlace($img, 1);
    ob_start();
    imagepng($img);
    $_SESSION[$session_key] = ob_get_contents();
    ob_end_clean();
    
    // zap the temp file (but not predefined image)
    if (empty($_REQUEST['predefined_image']))
      @unlink($fname);

    return true;
  }

  // validate email address. not really sophisticated, just checks
  // for an @ sign with something on either side
  function valid_email($addr) {
  	if (preg_match('/.@./', $addr) || preg_match ("/[\r\n]/", $addr))
  		return true;
  	else
  		return false; 
  }

  // given a MySQL datetime value YYYY-MM-DD HH:MI:SS, return RFC822
  // format timestamp for use in RSS feeds
  function rfc822_datetime($datetime)
  {
    return gmstrftime('%a, %d %e %b %Y %H:%M:%S GMT', strtotime($datetime));
  }

}

?>
