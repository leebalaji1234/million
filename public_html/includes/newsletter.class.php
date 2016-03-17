<?php

// newsletter.class.php
// ORM model for newsletters table

require_once('model.class.php');
require_once('util.class.php');

class Newsletter extends Model
{

  // cascade delete to snippets
  function delete()
  {
    require_once('snippet.class.php');
    $tbl = new Snippet;
    $tbl->delete_all('where snippet_key like \'newsletter_%\' and snippet_seq=? and is_internal', array($this->id()));
    parent::delete();
  }

  // provide default for created_at column
  function save()
  {
    if ($this->_new_row && !isset($this->created_at))
      $this->created_at = Util::epoch_to_datetime();
    return parent::save();
  }

}

?>
