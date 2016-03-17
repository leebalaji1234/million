<?php

require_once('admin_config.php');

if ($app->is_post()) {
  @set_time_limit(300);
  $dh = opendir(SMARTY_COMPILE_DIR);
  while (($file = readdir($dh)) !== false) {
    $path = SMARTY_COMPILE_DIR . $file;
    if (is_file($path) && preg_match('/\.tpl\.php$/', $path))
      @unlink($path);
  }
  closedir($dh);
  $smarty->display('admin/clear_templates_complete.tpl');
  exit;
}

$smarty->assign('dir', SMARTY_COMPILE_DIR);
$smarty->display('admin/clear_templates.tpl');

?>
