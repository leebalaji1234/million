<?php

require_once('admin_config.php');

if ($app->is_post()) {
  @set_time_limit(300);
  $app->save();
	$smarty->clear_all_cache();
}

$smarty->display('admin/joomla_integration.tpl');

?>
