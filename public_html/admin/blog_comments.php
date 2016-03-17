<?php

require_once('admin_config.php');
require_once('blog_article.class.php');
require_once('blog_comment.class.php');

$tbl_blog_article = new Blog_Article;
$tbl_blog_comment = new Blog_Comment;

$blog_article = $tbl_blog_article->get(@$_REQUEST['id']);
$blog_comments = $tbl_blog_comment->find_all('where `blog_article_id`=? order by `created_at` desc', array($blog_article->id));
$smarty->assign_by_ref('blog_article', $blog_article);
$smarty->assign_by_ref('blog_comments', $blog_comments);

if ($app->is_post()) {
	$smarty->clear_cache(null, 'blog');

  // update or delete the comments
  foreach ($blog_comments as $k => $blog_comment) {
    if (@$_REQUEST['delete'][$blog_comment->id])
      $blog_comment->delete();
    else {
      $blog_comment->author = @$_REQUEST['author'][$blog_comment->id];
      $blog_comment->body = @$_REQUEST['body'][$blog_comment->id];
      $blog_comment->save();
    }
  }
  $app->redirect('/admin/blog.php');

}

$smarty->display('admin/blog_comments.tpl');

?>
