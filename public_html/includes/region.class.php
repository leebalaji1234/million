<?php

// region.class.php
// ORM model for regions table

require_once('model.class.php');

class Region extends Model {

  function validate()
  {
    $this->validate_required('##Status##', $this->status);
    if ($this->status == REGION_ACTIVE) {
      $this->validate_required('##Image##', $this->image);
      $this->validate_required('##URL##', $this->url);
    }
    $this->validate_int('##Clicks##', $this->clicks);
    return parent::validate();
  }

  // return an image object for this region. if the region
  // is active, use it's stored image. otherwise, create a simple block
  // of color with a code letter in the corner.
  function image(){
  	if ($this->status == REGION_ACTIVE)
  		if ($this->image && $image = imagecreatefromstring($this->image))
      	return $image;
    return Util::status_image($this->status, $this->width, $this->height);
  }

  // returns an appropriate alt value for the region, using either
  // defined alt value or a status-based value
  function alt()
  {
    if ($this->status == REGION_ACTIVE) {
      $alt = trim($this->alt);
      if (empty($alt)) $alt = $this->title;
    }
    else
      $alt = Region::status_description($this->status);
    return $alt;
  }

  // returns an appropriate title for the region, using either
  // defined title or a status-based title
  function title()
  {
    if ($this->status == REGION_ACTIVE) {
    	$title = trim($this->title);
    	if (empty($title)) $title = trim($this->url);
      if (empty($title)) $title = '(Region ' . $this->id() . ')';
    }
    else
    $title = Region::status_description($this->status);
    return $title;
  }

  // generate a SE-friendly clickthrough link fragment for use an an <a> 
  // or <area> tag.
  function clickthrough_link($href = '/index.php')
  {
    global $app;
    if (empty($this->url))
      return '';
    else
      return ' href="' . htmlspecialchars($this->url) . '" target="_blank"' .
        ' onclick="window.open(\'' . $app->url($href) .'?r=' . 
        htmlspecialchars($this->id()) . '\',\'_blank\');return false;"';
      // return ' href="' . htmlspecialchars($app->url($href)) . '?r=' . htmlspecialchars($this->id()) . '" target="_blank"';
  }

  // returns an HTML <area> tag for this region. if $url is false (default),
  // links are generated as for the home page, with only active regions
  // having a link, with a javascript click-through. If $url is true, all
  // regions will link to the specified url, with the region id appended
  function area($url = false) {
  	global $app;

  	$title = htmlspecialchars($this->title());
  	$alt = htmlspecialchars($this->alt());
/*    if ($url) {
 // generate local urls
 $link = ' href="' . htmlspecialchars($url) . htmlspecialchars($this->id()) . '"';
 $onmouseover = '';
 } else {*/
// generate click-throughs for home page
			$clean_link = ' nohref="nohref" ';
			$link = $clean_link;
			if ($this->status == REGION_ACTIVE){
				// $clean_link = ' href="' . htmlspecialchars($this->url) . '" target="_blank" ';
        $clean_link = ' href="' . htmlspecialchars($app->url($href)) . '?r=' . htmlspecialchars($this->id()) . '" target="_blank"';
				// $link = $clean_link.' onclick="window.open(\'?r=' . htmlspecialchars($this->id()) . '\',\'_blank\');return false;" ';
        $link = $clean_link;
			}
        
      // special escaping rules for wz_tooltip.js
      $temp = str_replace("\\", "\\\\", $title);
      $temp = str_replace("'", "\\'", $temp);
      $temp = str_replace("&lt;", "& lt;", $temp);
      $temp = str_replace("&gt;", "& gt;", $temp);
      $temp = str_replace("&amp;", "& amp;", $temp);
      $onmouseover = ' onmouseover="return escape(\'' . $temp . '\');" ';
    //}
    if (!$url){
  	  switch($app->setting->seo_status){
  		  case 'optimized':
		      return sprintf('<a %s %s><area shape="rect" coords="%d,%d,%d,%d" %s alt="%s" title="%s" %s /></a>',
					  $clean_link,
					  ' onclick="window.open(\'?r=' . htmlspecialchars($this->id()) . '\',\'_blank\');return false;" ',
		    	  $this->x,
		        $this->y,
		        $this->x + $this->width,
		        $this->y + $this->height,
		        $link,
		        $alt,
		        $title,
		        $onmouseover
		      );
  		  break;

  		  case 'high_optimized':
		      return sprintf('<a %s><area shape="rect" coords="%d,%d,%d,%d" %s alt="%s" title="%s" %s /></a>',
					  $clean_link,
		    	  $this->x,
		        $this->y,
		        $this->x + $this->width,
		        $this->y + $this->height,
		        $clean_link,
		        $alt,
		        $title,
		        $onmouseover
		      );
  			  break;
  			  
  		  case 'standard':
  		  default:
		      return sprintf('<area shape="rect" coords="%d,%d,%d,%d"%s alt="%s" title="%s" %s />',
		        $this->x,
		        $this->y,
		        $this->x + $this->width,
		        $this->y + $this->height,
		        $link .= 'onclick="window.open(\'?r=' . htmlspecialchars($this->id()) . '\',\'_blank\');return false;"',
		        $alt,
		        $title,
		        $onmouseover
		     );
  	  }
    } else {
      $link = ' href="' . htmlspecialchars($url) . htmlspecialchars($this->id()) . '"';
      $onmouseover = '';
      return sprintf('<area shape="rect" coords="%d,%d,%d,%d"%s alt="%s" title="%s" %s />',
	      $this->x,
	      $this->y,
	      $this->x + $this->width,
	      $this->y + $this->height,
	      $link,
	      $alt,
	      $title,
	      $onmouseover
      );
    }
  }

  function save()
  {
    if ($this->_new_row && !isset($this->created_on))
      $this->created_on = Util::epoch_to_datetime();
    parent::save();

    // after region is saved, do any expiration processing
    // and update next processing date
    Util::process_expired_regions(true);
  }

  function status_description($status)
  {
    switch ($status) {
      case REGION_ACTIVE:
        return 'Active';
      case REGION_PENDING:
        return 'Pending';
      case REGION_SUSPENDED:
        return 'Suspended';
      case REGION_RESERVED:
        return 'Reserved';
      case REGION_EXPIRED:
        return 'Expired';
    }
    return 'Unknown';
  }

  function created_on_rfc822()
  {
    return Util::rfc822_datetime($this->created_on);
  }

}

?>