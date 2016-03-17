<?php

require_once('admin_config.php');
require_once('email_template.class.php');
require_once('snippet.class.php');

$tbl = new Email_Template;
$id =& $_REQUEST['id'];

if (!isset($id)) {
  // display main list
  $templates = $tbl->find_all('order by name');
  $smarty->assign_by_ref('templates', $templates);
  $smarty->display('admin/email_templates.tpl');
  exit;
}

$template = $tbl->get($id);

if ($app->is_post()) {

    // just save snippets; template row itself is not edited
    Snippet::save_from_request($template->snippet_key_subject());
    Snippet::save_from_request($template->snippet_key_body());
    $app->redirect();

}
else {
  Snippet::get_to_request($template->snippet_key_subject());
  Snippet::get_to_request($template->snippet_key_body());
}

// (re)display edit form
$smarty->assign_by_ref('template', $template);
$smarty->display('admin/email_templates_edit.tpl');

?>
