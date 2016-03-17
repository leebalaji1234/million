<?php

require_once('admin_config.php');
require_once('grid.class.php');

$tbl = new Grid;
$grids = $tbl->find_all('order by display_order');
if (empty($grids))
  $app->abort('No grids defined');
if (!isset($_REQUEST['grid_id'])) $_REQUEST['grid_id'] = $grids[0]->id();
$grid = $tbl->get($_REQUEST['grid_id']);

// build custom map so we direct to edit page for all regions
$map = $grid->areas($app->url('/admin/edit_region.php') . '?id=');

$smarty->assign('map', $map);
$smarty->assign('grid', $grid);
$smarty->assign('grids', $grids);
$smarty->clear_all_cache();
$smarty->display('admin/maintain_regions.tpl');

?>
