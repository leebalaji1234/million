<?php

require_once('admin_config.php');

if ($app->is_post()) {
  @set_time_limit(300);
	if ($smarty->clear_all_cache())
  	$smarty->display('admin/clear_cache_complete.tpl');
  exit;
}

$smarty->display('admin/clear_cache.tpl');

?>
