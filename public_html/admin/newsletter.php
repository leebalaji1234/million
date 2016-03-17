<?php

require_once('admin_config.php');
require_once('newsletter.class.php');
require_once('snippet.class.php');

$new =& $_REQUEST['new'];
$id =& $_REQUEST['id'];

$tbl_newsletter = new Newsletter;
$newsletter = new Newsletter;
if (!$new) {
  $newsletter = $tbl_newsletter->get($id);
  $smarty->assign_by_ref('newsletter', $newsletter);
}

if ($app->is_post()) {

  if (@$_REQUEST['action'] == 'delete') {
    if (!@$_REQUEST['confirm']) {
      $smarty->display('admin/newsletter_confirm.tpl');
      exit;
    }
    $newsletter->delete();
    $app->redirect('/admin/newsletters.php');
  }

  if (Snippet::is_request_empty('newsletter_title'))
    $app->error('##Default language version of title is required##');
  if (Snippet::is_request_empty('newsletter_body'))
    $app->error('##Default language version of body is required##');
  if (empty($app->errors)) {
    if ($newsletter->validate()) {
      $newsletter->save();
      Snippet::save_from_request('newsletter_title', $newsletter->id);
      Snippet::save_from_request('newsletter_body', $newsletter->id);
      $app->redirect('/admin/newsletters.php');
    }
  }

}
else {
  $temp_id = @$newsletter->id;
  if ($new && $id) $temp_id = $id;     // initialize as copy
  Snippet::get_to_request('newsletter_title', @$temp_id);
  Snippet::get_to_request('newsletter_body', @$temp_id);
}

$smarty->display('admin/newsletter.tpl');

?>
