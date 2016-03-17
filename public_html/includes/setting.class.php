<?php

// setting.class.php
// ORM model for settings table

require_once('model.class.php');
require_once('util.class.php');

class Setting extends Model
{

  function validate()
  {
    $this->validate_required('##Site Name##', $this->site_name);
    $this->validate_required('##Currency Symbol##', $this->currency_symbol);
    $this->validate_required('##Administrator E-Mail Address##', $this->admin_email);
    $this->validate_expr('##Administrator E-Mail Address##', Util::valid_email($this->admin_email), '##does not appear to be a valid address##');
    $this->validate_int('##Grid Columns##', $this->grid_columns);
    $this->validate_int('##RSS Latest Pixels Feed Size##', $this->rss_latest_pixels);
    $this->validate_int('##RSS Top Pixels Feed Size##', $this->rss_top_pixels);
    $this->validate_int('##RSS Blog Articles Feed Size##', $this->rss_blog_articles);
    return parent::validate();
  }

  function rss_feeds_enabled()
  {
    return $this->rss_latest_pixels > 0
      || $this->rss_top_pixels > 0
      || $this->rss_blog_articles > 0;
  }

}

?>
