<?php

// grid.class.php
// ORM model for grids table

require_once('model.class.php');
require_once('util.class.php');

class Grid extends Model {
  var $selectable_square_size = 10;
	
  function validate() {
    global $app;

    $this->validate_required('##Grid Name##', $this->name);
    $this->validate_size();
    $this->validate_expr('##Gridline Color##', preg_match('/^[0-9A-Fa-f]{6}$/', $this->grid_color), '##must be a string of six hex digits##');
    if ($this->validate_int('##Gridline Transparency##', $this->grid_transparency))
      $this->validate_range('##Gridline Transparency##', $this->grid_transparency, 0, 100);
    $this->validate_expr('##Background Color##', preg_match('/^[0-9A-Fa-f]{6}$/', $this->background_color), '##must be a string of six hex digits##');
    if ($this->validate_int('##Maximum Region Width##', $this->region_max_width)) {
      $this->validate_expr('##Maximum Region Width##', $this->region_max_width >= 0, '##must be >= 0##');
      $this->validate_expr('##Maximum Region Width##', $this->region_max_width % $this->selectable_square_size == 0, '##must be a multiple of## ' . $this->selectable_square_size);
    }
    if ($this->validate_int('##Maximum Region Height##', $this->region_max_height)) {
      $this->validate_expr('##Maximum Region Height##', $this->region_max_height >= 0, '##must be >= 0##');
      $this->validate_expr('##Maximum Region Height##', $this->region_max_height % $this->selectable_square_size == 0, '##must be a multiple of## ' . $this->selectable_square_size);
    }
    if ($this->validate_int('##Region Expiration Days##', $this->expire_days))
      $this->validate_expr('##Region Expiration Days##', $this->expire_days >= 0, '##must be >= 0##');
    if ($this->validate_int('##Region Reminder Days##', $this->reminder_days))
      $this->validate_expr('##Region Reminder Days##', $this->reminder_days >= 0, '##must be >= 0##');
    if ($this->validate_int('##Region Purge Days##', $this->purge_days))
      $this->validate_expr('##Region Purge Days##', $this->purge_days >= 0, '##must be >= 0##');
    return parent::validate();
  }

  // validate only size parameters (used when creating new grid)
  function validate_size() {
    if ($this->validate_int('##Grid Width##', $this->width))
      if ($this->validate_range('##Grid Width##', $this->width, $this->selectable_square_size, GRID_SIZE_MAX))
      $this->validate_expr('##Grid Width##', (!$this->selectable_square_size || $this->width % $this->selectable_square_size == 0), '##must be a multiple of## ' . $this->selectable_square_size);
    if ($this->validate_int('##Grid Height##', $this->height))
      if ($this->validate_range('##Grid Height##', $this->height, $this->selectable_square_size, GRID_SIZE_MAX))
        $this->validate_expr('##Grid Height##', (!$this->selectable_square_size || $this->height % $this->selectable_square_size == 0), '##must be a multiple of## ' . $this->selectable_square_size);
    return parent::validate();
  }

  // publish a grid and its contents to GRIDS_DIR directory
  // if $force is false, the grid is only published if is_dirty
  // flag is set
  function publish($force = false) {
    global $app;

    if (!$this->is_dirty && !$force) return;
    require_once('region.class.php');

    // temporarily increase memory limit for large image manipulation
    if (defined('PUBLISH_MEMORY_LIMIT'))
      @ini_set('memory_limit', PUBLISH_MEMORY_LIMIT);

    if (!empty($this->background_image)) {
      // create image from background image
      $img = imagecreatefromstring($this->background_image);
      $img_gray = imagecreatefromstring($this->background_image);
    } else {
    	// create image of appropriate size with background color
    	list($r, $g, $b) = Util::str_to_rgb($this->background_color);
      $img = imagecreatetruecolor($this->width, $this->height);
      $bg = imagecolorallocate($img, $r, $g, $b);
      imagefill($img, 0, 0, $bg);
      $img_gray = imagecreatetruecolor($this->width, $this->height);
      $bg = imagecolorallocate($img_gray, $r, $g, $b);
      imagefill($img_gray, 0, 0, $bg);
    }

    // draw the grid lines
    list($r, $g, $b) = Util::str_to_rgb($this->grid_color);
    $alpha = $this->grid_transparency / 100 * 127;
    $gl = imagecolorallocatealpha($img, $r, $g, $b, $alpha);
    $gl_gray = imagecolorallocatealpha($img_gray, $r, $g, $b, $alpha);
    $x = 0;
    while ($x < $this->width) {
      imageline($img, $x, 0, $x, $this->height - 1, $gl);
      imageline($img_gray, $x, 0, $x, $this->height - 1, $gl_gray);
      $x += $this->selectable_square_size - 1;
      imageline($img, $x, 0, $x, $this->height - 1, $gl);
      imageline($img_gray, $x, 0, $x, $this->height - 1, $gl_gray);
      $x += 1;
    }
    $y = 0;
    while ($y < $this->height) {
    	imageline($img, 0, $y, $this->width - 1, $y, $gl);
      imageline($img_gray, 0, $y, $this->width - 1, $y, $gl_gray);
      $y += $this->selectable_square_size - 1;
      imageline($img, 0, $y, $this->width - 1, $y, $gl);
      imageline($img_gray, 0, $y, $this->width - 1, $y, $gl_gray);
      $y += 1;
    }
    
    $this->pixels_used = 0;

    // merge all regions into grid
    $areas = array();
    $tbl_regions = new Region;
    $regions = $tbl_regions->find_all('where grid_id=?', array($this->id()));
    foreach ($regions as $region) {

    	// merge region image
      $region_img = $region->image($region);
      imagecopy($img, $region_img, $region->x, $region->y, 0, 0, $region->width, $region->height);
      Util::grayscale_image($region_img, GRAYSCALE_LIGHTEN);
      imagecopy($img_gray, $region_img, $region->x, $region->y, 0, 0, $region->width, $region->height);
      unset($region_image);

      // add region to map
      $areas[] = $region->area();

      // count region area
      $this->pixels_used += $region->width * $region->height;
      
    }

    $this->map = implode('', $areas);

    // write the normal image
    $path = $this->path();
    if ($app->setting->palette_images) imagetruecolortopalette($img, false, 256);
		if ($app->setting->interlaced_images) imageinterlace($img, 1);
    touch($path); 
    imagepng($img, $path);

    // write the grayscale image
    $path = $this->path(true);
    if ($app->setting->palette_images) imagetruecolortopalette($img_gray, false, 256);
    if ($app->setting->interlaced_images) imageinterlace($img_gray, 1);
    touch($path); imagepng($img_gray, $path);

    // free image memory
    imagedestroy($img);

    // clear the dirty flag on the grid
    $this->is_dirty = 0;
    $this->save();
  }

  // return filename for this grid. if $grayscale is true, the name of the
  // grayscale file is returned
  function filename($grayscale)
  {
    $name = 'grid_' . $this->id;
    if ($grayscale)
      $name .= '_gray';
    return $name . '.png';
  }

  // return filesystem path for a grid, given its order.  if $grayscale is
  // true, the path to the grayscale file is returned.
  function path($grayscale = false)
  {
    return GRIDS_DIR . $this->filename($grayscale);
  }

  // Returns a url for a grid, given its order. If $grayscale is true, the path
  // to the grayscale file is returned. The grid is republished if necessary,
  // on the presumption that it is about to be displayed.
  function url($grayscale = false) {
    global $app;
    if ($this->is_dirty || !file_exists($this->path($grayscale)))
      $this->publish(true);
    return $app->url('/grids/' . $this->filename($grayscale), array('x' => time()));
  }

  // returns map for this grid, republishing the grid if necessary.
  function map()
  {
    $this->publish();
    return $this->map;
  }

  // returns string of all <area> tags for this grid's regions.
  // attributes are as for Region::area()
  function areas($url = false) {
    // merge all regions into grid
    $areas = '';
    require_once('region.class.php');
    $tbl = new Region;
    $regions = $tbl->find_all('where grid_id=?', array($this->id()));
    foreach ($regions as $region)
      $areas .= $region->area($url);
    return $areas;
  }

  // returns true if the specified region area consists entirely of free
  // pixels.
  function is_free_region($x, $y, $w, $h)
  {
    require_once('region.class.php');
    $tbl = new Region;
    $row = $tbl->find('where grid_id=? and not (x+width <= ? or x >= ? or y+height <= ? or y >= ?)', array($this->id(), $x, $x + $w, $y, $y + $h));
    return is_null($row->id());
  }

  // cascade delete to regions and snippets, and delete images
  function delete()
  {
    require_once('region.class.php');
    require_once('snippet.class.php');
    $tbl = new Region;
    $tbl->delete_all('where grid_id=?', array($this->id()));
    $tbl = new Snippet;
    $tbl->delete_all('where snippet_key like \'grid_%\' and snippet_seq=? and is_internal', array($this->id()));
    @unlink($this->path());
    @unlink($this->path(true));
    parent::delete();
  }

  // return price for a single pixel
  function single_pixel_price()
  {
    return $this->pixel_price / ($this->selectable_square_size * $this->selectable_square_size);
  }

  // return formatted price for a single pixel
  function single_pixel_price_formatted()
  {
    global $lang;
    $s = number_format($this->single_pixel_price(), 8, $lang->decimal_point, $lang->thousands_separator);
    return preg_replace('/0+$/', '', $s);
  }


}

?>
