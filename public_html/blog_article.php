<?php

require_once('config.php');
require_once('blog_article.class.php');

$tbl_blog_article = new Blog_Article;
$blog_article = $tbl_blog_article->get(@$_REQUEST['id']);

$smarty->assign_by_ref('blog_article', $blog_article);

if ($app->setting->blog_comments) {

  require_once('blog_comment.class.php');

  $tbl_blog_comment = new Blog_Comment;
  $blog_comments = $tbl_blog_comment->find_all('where `blog_article_id`=? order by `created_at` desc', array($blog_article->id));
  $smarty->assign_by_ref('blog_comments', $blog_comments);

  if ($app->is_post()) {
  	$smarty->clear_cache(null, 'blog');
    $blog_comment = new Blog_Comment;
    $blog_comment->blog_article_id = $blog_article->id;
    $blog_comment->author = @$_REQUEST['author'];
    $blog_comment->body = @$_REQUEST['body'];
    if ($app->captchas_supported()) {
      if (@$_REQUEST['phrase'] != Util::captcha_phrase())
        $app->error('##The text from the image was not entered correctly##');
    }
    if (empty($app->errors)) {
      if ($blog_comment->validate()) {
        $blog_comment->save();
        $app->redirect('/blog.php');
      }
    }
  }
  else {
    $_REQUEST['author'] = 'Anonymous';
  }

  // create a captcha for posting comment
  if ($app->captchas_supported()) {
    Util::captcha_create();
    $smarty->assign('captcha_url', Util::captcha_url());
  }

}

$smarty->display('blog_article.tpl', 'blog|'.(int)$_REQUEST['id'].'|'.$cache_id);

?>
