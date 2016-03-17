<?php

require_once('admin_config.php');
require_once('blog_article.class.php');
require_once('snippet.class.php');

$new =& $_REQUEST['new'];
$id =& $_REQUEST['id'];


$tbl_blog_article = new Blog_Article;
$blog_article = new Blog_Article;
if (!$new) {
  $blog_article = $tbl_blog_article->get($id);
  $smarty->assign_by_ref('blog_article', $blog_article);
}
if ($app->is_post()) {

  if (@$_REQUEST['action'] == 'delete') {
    if (!@$_REQUEST['confirm']) {
      $smarty->display('admin/blog_article_confirm.tpl');
      exit;
    }
    $blog_article->delete();
    $app->redirect('/admin/blog.php');
  }

  if (Snippet::is_request_empty('blog_article_title'))
    $app->error('##Default language version of title is required##');
  if (Snippet::is_request_empty('blog_article_body'))
    $app->error('##Default language version of body is required##');
  if (empty($app->errors)) {
    if ($blog_article->validate()) {
			if (empty($blog_article->id)){
				$smarty->clear_all_cache();
    		$blog_article->save();
			} else {
				$smarty->clear_cache(null, 'blog|'.(int)$blog_article->id);
				$blog_article->save();
			}
      Snippet::save_from_request('blog_article_title', $blog_article->id);
      Snippet::save_from_request('blog_article_body', $blog_article->id);
      $app->redirect('/admin/blog.php');
    }
  }

}
else {
  Snippet::get_to_request('blog_article_title', @$blog_article->id);
  Snippet::get_to_request('blog_article_body', @$blog_article->id);
}

$smarty->display('admin/blog_article.tpl');

?>
