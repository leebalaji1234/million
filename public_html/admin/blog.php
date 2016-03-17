<?php

require_once('admin_config.php');
require_once('blog_article.class.php');

$tbl_blog_article = new Blog_Article;

$blog_articles = $tbl_blog_article->find_all('order by `created_at` desc');

require_once('blog_comment.class.php');
$tbl_blog_comment = new Blog_Comment;
for ($i = 0; $i < count($blog_articles); $i++) {
  $blog_article =& $blog_articles[$i];
  $blog_article->num_comments = $tbl_blog_comment->count('where `blog_article_id`=?', array($blog_article->id));
}

$smarty->assign_by_ref('blog_articles', $blog_articles);
$smarty->display('admin/blog.tpl');

?>
