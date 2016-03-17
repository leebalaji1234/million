<?php

require_once('admin_config.php');

if ($app->is_post()) {
  require_once('grid.class.php');
  @set_time_limit(120);
  $tbl = new Grid;
  $grids = $tbl->find_all();
  foreach ($grids as $k => $grid) {
  	$grid->publish(true);
  }
  $smarty->display('admin/republish_grids_complete.tpl');
  exit;
}

$smarty->display('admin/republish_grids.tpl');

?>
