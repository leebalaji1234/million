<?php 

require_once('admin_config.php');
require_once('grid.class.php');
require_once('region.class.php');

if ($app->is_post()) {
  $do =& $_POST['do'];
  if ($do == 'site_up')
    $app->setting->site_down = 0;
  else
    $app->setting->site_down = 1;
  $smarty->clear_all_cache();
  $app->setting->save();
  $app->redirect();
}

$tbl_grid = new Grid;
$tbl_region = new Region;

// fetch all the grids and compute grid performance
$total_pixels = 0;
$total_active_pixels = 0;
$total_inactive_pixels = 0;
$rows = $tbl_grid->find_all('order by display_order');
$grids = array();
foreach ($rows as $grid) {

  # accumulate active/inactive regions and pixels
  $active_regions = 0;
  $active_pixels = 0;
  $inactive_regions = 0;
  $inactive_pixels = 0;
  $stats = $tbl_region->find_all('where grid_id=? group by status', array($grid->id), 'status, count(*) as count, sum(width * height) as pixels');
  foreach ($stats as $stat) {
    if ($stat->status == REGION_ACTIVE) {
      $active_regions += $stat->count;
      $active_pixels += $stat->pixels;
    }
    else {
      $inactive_regions += $stat->count;
      $inactive_pixels += $stat->pixels;
    }
  }
  $grid_pixels = $grid->width * $grid->height;
  $total_pixels += $grid_pixels;
  $total_active_pixels += $active_pixels;
  $total_inactive_pixels += $inactive_pixels;
  $active_pct = round($active_pixels / $grid_pixels * 100);
  $inactive_pct = round($inactive_pixels / $grid_pixels * 100);
  $avail_pixels = $grid_pixels - $active_pixels - $inactive_pixels;
  $avail_pct = 100 - $active_pct - $inactive_pct;

  $zones = array();
  if ($active_pct) {
    $zones[] = array(
      'pct' => $active_pct,
      'title' => sprintf("Active: %s region(s), %s pixels, %d%%",
        number_format($active_regions), number_format($active_pixels), $active_pct),
      'src' => $app->url('/images/st_a.png'),
    );
  }
  if ($inactive_pct) {
    $zones[] = array(
      'pct' => $inactive_pct,
      'title' => sprintf("Inactive: %s region(s), %s pixels, %d%%",
        number_format($inactive_regions), number_format($inactive_pixels), $inactive_pct),
      'src' => $app->url('/images/st_i.png'),
    );
  }
  $zones[] = array(
    'pct' => $avail_pct,
    'title' => sprintf("Available: %s pixels, %d%%", number_format($avail_pixels), $avail_pct),
    'src' => $app->url('/images/st_f.png'),
  );

  $grids[] = array(
    'grid' => $grid,
    'zones' => $zones,
    'pct' => $active_pct,
  );
}

$smarty->assign('grids', $grids);
$smarty->assign('num_grids', count($grids));
$smarty->assign('total_pixels', $total_pixels);
$smarty->assign('active_pixels', $total_active_pixels);
$smarty->assign('inactive_pixels', $total_inactive_pixels);
$smarty->assign('avail_pixels', $total_pixels - $total_active_pixels - $total_inactive_pixels);
$smarty->assign('active_pct', $total_pixels ? round($total_active_pixels / $total_pixels * 100) : 0);
$smarty->display('admin/index.tpl');

?>