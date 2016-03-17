<?php

require_once('admin_config.php');
require_once('language.class.php');

$tbl = new Language;
$action = @$_REQUEST['action'];

if (!isset($action)) {

  // display main list
  $all_langs = $lang->all_languages();
  foreach ($all_langs as $k => $row) {
    $all_langs[$k]->default = $row->code == DEFAULT_LANGUAGE;
    $all_langs[$k]->url = $app->url(false, array('action' => 'edit', 'id' => $row->id));
  }
  $smarty->assign('all_langs', $all_langs);
  $smarty->display('admin/maintain_languages.tpl');
  exit;

}

// check parameters
if ($action != 'new' && $action != 'edit' && $action != 'delete')
  $app->abort('##Invalid action##');

// fetch or initialize row
if ($action == 'new') {
  $row = new Language;
}
else {
  $id = @$_REQUEST['id'];
  $row = $tbl->get($id);
}

// set an indicator if this is default language
$default = $action == 'edit' && $id == $lang->language_id(DEFAULT_LANGUAGE);

if ($app->is_post()) {
	$smarty->clear_all_cache();
	if ($_REQUEST['action'] == 'delete') {
    if ($row->code == DEFAULT_LANGUAGE)
      $app->abort('##Cannot delete default language##');
    if (@$_REQUEST['confirm'] != 'confirm') {
      $smarty->display('admin/maintain_languages_confirm.tpl');
      exit;
    }
    $row->delete();
    $app->redirect();
  }
  $row->code = $_REQUEST['code'];
  $row->name = $_REQUEST['name'];
  $row->decimal_point = $_REQUEST['decimal_point'];
  $row->thousands_separator = $_REQUEST['thousands_separator'];
  if ($row->validate()) {
    $row->save();
    $app->redirect();
  }
}
else {
  // if not a repost, initialize form vars
  foreach ($row->attr() as $name => $val) {
    $_REQUEST[$name] = $val;
  }
}

// show new/edit form
$smarty->assign('default', $default);
$smarty->display('admin/maintain_languages_edit.tpl');

?>
