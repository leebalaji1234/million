<?php 
//init variable for cache 
if (isset($_REQUEST['grid']))
	$grid = (int)$_REQUEST['grid'];
else 
	$grid = 1;

require_once('config.php');
require_once('grid.class.php');
//clean cache init
unset($grid);

// handle magnifier toggle
if (isset($_REQUEST['magnify'])) {
	$_SESSION['magnify'] = !empty($_REQUEST['magnify']);
  $args = array();
  if (@$_REQUEST['grid'] > 1)
    $args['grid'] = $_REQUEST['grid'];
  $app->redirect(false, $args);
} else {
	if (isset($_REQUEST['grid']))
		$grid = (int)$_REQUEST['grid'];
	else
		$grid = 1;
}

// handle clickthrough
if (isset($_REQUEST['r'])) {
  require_once('region.class.php');
  $tbl = new Region;
  $region = $tbl->get($_REQUEST['r'], false);
  if (is_null($region->id()) || $region->status != REGION_ACTIVE)
    $app->redirect();

  if (empty($_SESSION['user_id']) && empty($_SESSION['is_admin'])) {
    $region->clicks++;
    $region->save();
    $smarty->clear_all_cache(null, 'index|search');
  }

  header("Location: " . $region->url);
  exit;
}

// process any region expiration events
require_once('util.class.php');
Util::process_expired_regions();

// fetch all the grids
$tbl = new Grid;
$grids = $tbl->find_all('order by display_order');

// make sure grid columns are >= 1
$c = max(1, $app->setting->grid_columns);

// if multiple grid pages are used, build links to the other pages, and then
// get only the requested grid
if ($app->setting->multiple_grid_pages) {
  require_once('snippet.class.php');
  $g =& $_REQUEST['grid'];
  $g = max(1, $g);
  $g = min(count($grids), $g);
	$links = array();
  for ($i = 0; $i < count($grids); $i++) {
    $title = htmlspecialchars(Snippet::snippet_text('grid_title', $grids[$i]->id, '##Pixels##'));
    if ($i == $g - 1)
      $links[] = '<strong>' . $title . '</strong>';
    else {
      $params = array();
      if ($i > 0)
        $params = array('grid' => $i + 1);
      $links[] = '<a href="' . htmlspecialchars($app->url(false, $params)) . '">' . $title . '</a>';
    }
  }
  $smarty->assign('links', $links);
  $grids = array($grids[$g - 1]);
  $c = 1;
}

// arrange grids into rows/columns
$rows = array();
while (!empty($grids)) {
  $row = array();
  for ($i = 0; $i < $c; $i++) {
    if (!empty($grids))
      $row[] = array_shift($grids);
  }
  $rows[] = $row;
}


$smarty->assign('rows', $rows);
$smarty->display('index.tpl', 'index|'.(int)$_SESSION['magnify'].'|'.(int)$grid.'|'.$cache_id);

?>
