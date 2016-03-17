<?php

require_once('admin_config.php');

if ($app->is_post()) {
  if (empty($_REQUEST['id']))
    $app->error('##Please select a Language##');
  else {
    $row = new Language;
    $row = $row->get($_REQUEST['id']);
    $path = TEMP_DIR . 'lang_' . $row->code . '.xml';
    $smarty->assign('code', $row->code);
    $smarty->assign('name', $row->name);
    $smarty->assign('path', $path);
    if (file_exists($path) && !@$_REQUEST['confirm']) {
      $smarty->display('admin/export_language_texts_confirm.tpl');
      exit;
    }
    @set_time_limit(300);
    $lang->export_language_texts($_REQUEST['id'], $path, $_REQUEST['type'] == 'all');
    $smarty->display('admin/export_language_texts_complete.tpl');
    exit;
  }
}
else {
  $_REQUEST['type'] = 'new';
}

$ids = array();
foreach ($lang->all_languages() as $k => $row) {
  if ($row->code != DEFAULT_LANGUAGE)
    $ids[$row->id] = htmlspecialchars("$row->code ($row->name)");
}

$smarty->assign('ids', $ids);
$smarty->assign('types', array('all' => $lang->language_translate('##All Texts##'), 'new' => $lang->language_translate('##Only Untranslated Texts##')));
$smarty->display('admin/export_language_texts.tpl');

?>
