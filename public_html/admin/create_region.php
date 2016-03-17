<?php

require_once('admin_config.php');
require_once('grid.class.php');

$tbl = new Grid;
$grids = $tbl->find_all('order by display_order');
if (empty($grids))
  $app->abort('No grids defined');
if (!isset($_REQUEST['grid_id'])) $_REQUEST['grid_id'] = $grids[0]->id();
$grid = $tbl->get($_REQUEST['grid_id']);

if ($app->is_post()) {
	$smarty->clear_all_cache();
  if ($_REQUEST['w'] == 0)
    $app->error('##Please select a region##');
  elseif (!$grid->is_free_region($_REQUEST['x'], $_REQUEST['y'], $_REQUEST['w'], $_REQUEST['h']))
    $app->error('##That region overlaps one or more existing regions##');
  else {

    // create the region
    $row = new Region;
    $row->grid_id = $_REQUEST['grid_id'];
    $row->x = $_REQUEST['x'];
    $row->y = $_REQUEST['y'];
    $row->width = $_REQUEST['w'];
    $row->height = $_REQUEST['h'];
    $row->status = REGION_RESERVED;

    // set the expiration-related dates if necessary
    $now = time();
    if ($grid->expire_days > 0)
      $row->expires_at = Util::epoch_to_datetime($now + $grid->expire_days * 86400);
    if ($grid->reminder_days > 0)
      $row->reminder_at = Util::epoch_to_datetime($now + ($grid->expire_days - $grid->reminder_days) * 86400);
    if ($grid->purge_days > 0)
      $row->purge_at = Util::epoch_to_datetime($now + ($grid->expire_days + $grid->purge_days) * 86400);

    $row->save();

    // mark the grid dirty
    $grid->is_dirty = 1;
    $grid->save();

    // redirect to the edit screen
    $app->redirect('/admin/edit_region.php', array('id' => $row->id()));
  }
}

$smarty->assign('grid', $grid);
$smarty->assign('grids', $grids);
$smarty->display('admin/create_region.tpl');

?>
