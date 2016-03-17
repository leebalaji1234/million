<?php

require_once('config.php');
require_once('blog_article.class.php');

header('Content-Type: text/xml');

$tbl_blog_article = new Blog_Article;
$items = $tbl_blog_article->find_all('order by `created_at` desc limit !', array($app->setting->rss_blog_articles));

$smarty->assign_by_ref('items', $items);
$smarty->display('rss_blog_articles.tpl', 'blog|rss|'.$cache_id);

?>
