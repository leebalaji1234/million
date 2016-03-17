<?php

// blog_comment.class.php
// ORM model for blog_comments table

require_once('model.class.php');
require_once('util.class.php');

class Blog_Comment extends Model
{

  function save()
  {
    if ($this->_new_row && !isset($this->created_at))
      $this->created_at = Util::epoch_to_datetime();
    return parent::save();
  }

  function validate()
  {
    $this->validate_required('##Your Name##', $this->author);
    $this->validate_required('##Your Comment##', $this->body);
    return parent::validate();
  }

}

?>
