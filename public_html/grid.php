<?php 

require_once('config.php');
require_once('grid.class.php');

// handle clickthrough
if (isset($_REQUEST['r'])) {
  require_once('region.class.php');
  $tbl = new Region;
  $region = $tbl->get($_REQUEST['r'], false);
  if (is_null($region->id()) || $region->status != REGION_ACTIVE)
    $app->redirect();
  $region->clicks++;
  $region->save();
  header("Location: " . $region->url);
  exit;
}

// process any region expiration events
require_once('util.class.php');
Util::process_expired_regions();

// fetch the grid with the specified id
$tbl = new Grid;
$grid = $tbl->get(@$_REQUEST['id']);

$smarty->assign('grid', $grid);
$smarty->display('grid.tpl');

?>
