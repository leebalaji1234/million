<?php

require_once('admin_config.php');
require_once('language.class.php');

if ($app->is_post()) {
	$smarty->clear_all_cache();
	if (empty($_REQUEST['id']))
    $app->error('##Please select a Language##');
  else {
    $row = new Language;
    $row = $row->get($_REQUEST['id']);
    $path = TEMP_DIR . 'lang_' . $row->code . '.xml';
    $smarty->assign('code', $row->code);
    $smarty->assign('name', $row->name);
    $smarty->assign('path', $path);
    @set_time_limit(300);
    $lang->import_language_texts($_REQUEST['id'], $path);
    $smarty->display('admin/import_language_texts_complete.tpl');
    exit;
  }
}
else {
  unset($_REQUEST['id']);
}

$ids = array();
foreach ($lang->all_languages() as $k => $row) {
  if ($row->code == DEFAULT_LANGUAGE) continue;
  $path = TEMP_DIR . 'lang_' . $row->code . '.xml';
  if (file_exists($path))
    $ids[$row->id] = htmlspecialchars("$row->code ($row->name)");
}

$smarty->assign('ids', $ids);
$smarty->display('admin/import_language_texts.tpl');

?>
