<?php

// blog_article.class.php
// ORM model for blog_articles table

require_once('model.class.php');
require_once('util.class.php');

class Blog_Article extends Model
{

  // cascade delete to comments and snippets
  function delete()
  {
    require_once('blog_comment.class.php');
    require_once('snippet.class.php');
    $tbl = new Blog_Comment;
    $tbl->delete_all('where blog_article_id=?', array($this->id()));
    $tbl = new Snippet;
    $tbl->delete_all('where snippet_key like \'blog_article_%\' and snippet_seq=? and is_internal', array($this->id()));
    parent::delete();
  }

  // provide default for created_at column
  function save()
  {
    if ($this->_new_row && !isset($this->created_at))
      $this->created_at = Util::epoch_to_datetime();
    return parent::save();
  }

  function created_at_rfc822()
  {
    return Util::rfc822_datetime($this->created_at);
  }

}

?>
