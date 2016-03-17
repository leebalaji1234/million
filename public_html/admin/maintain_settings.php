<?php

require_once('admin_config.php');

if ($app->is_post()) {
  foreach ($app->setting->attr() as $name => $val)
    $app->setting->$name = @$_REQUEST[$name];
  if ($app->setting->validate()) {
  	if (isset($_REQUEST['seo_status']) 
  			&& isset($_SESSION['seo_status'])
  			&& $_SESSION['seo_status'] != 'seo_status'){
  		require_once('grid.class.php');
  		@set_time_limit(120);
  		$tbl = new Grid;
  		$grids = $tbl->find_all();
  		foreach ($grids as $k => $grid) {
  			unset($grid->seo_status);
  			$grid->publish(true);
  		}
  	}

    $app->setting->save();
    $smarty->clear_all_cache();
    $app->redirect('/admin/index.php');
  }
} else {
  foreach ($app->setting->attr() as $name => $val){
    $_REQUEST[$name] = $val;
  }
}

$seo_optimization = array(
	'standard' => 'Standard (without SEO)',
	'optimized' => 'Optimized (links with redirect for click)',
	'high_optimized' => 'High optimized (direct links)'
);

$order_image_galleries = array(
  'ksort#SORT_REGULAR' => 'Sort(REGULAR)', 
  'ksort#SORT_NUMERIC' => 'Sort(NUMERIC)', 
  'ksort#SORT_STRING' => 'Sort(STRING)', 
  'krsort#SORT_REGULAR' => 'Sort(REGULAR) in reverse order', 
  'krsort#SORT_NUMERIC' => 'Sort(NUMERIC) in reverse order', 
  'krsort#SORT_STRING' => 'Sort(STRING) in reverse order'
);

$smarty->assign('order_image_galleries', $order_image_galleries);
$smarty->assign('seo_optimization', $seo_optimization);
$smarty->assign('captchas_supported', $app->captchas_supported());
//$smarty->debugging = true;
$smarty->display('admin/maintain_settings.tpl');

?>
