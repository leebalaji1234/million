<?php

require_once('config.php');
require_once('blog_article.class.php');
require_once('blog_comment.class.php');

$tbl_blog_article = new Blog_Article;
$tbl_blog_comment = new Blog_Comment;

// identify available months
$months = array();
$rows = $tbl_blog_article->find_all('order by 1 desc', array(), 'distinct date_format(created_at, \'%Y%m\') as `month`, date_format(created_at, \'%M, %Y\') as `month_name`');
foreach ($rows as $k => $row)
  $months[$row->month] = $row->month_name;
$smarty->assign_by_ref('months', $months);

// determine selected month
$month =& $_REQUEST['month'];
if (empty($month))
  $month = array_shift((array_keys($months)));

$blog_articles = $tbl_blog_article->find_all('where date_format(created_at, \'%Y%m\')=? order by `created_at` desc', array($month));

for ($i = 0; $i < count($blog_articles); $i++) {
  $blog_article =& $blog_articles[$i];
  $blog_article->num_comments = $tbl_blog_comment->count('where `blog_article_id`=?', array($blog_article->id));
}

$smarty->assign_by_ref('blog_articles', $blog_articles);
$smarty->display('blog.tpl', 'blog|'.$month.'|'.$cache_id);
?>
