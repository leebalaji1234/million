<?php

require_once('config.php');
require_once('region.class.php');

header('Content-Type: text/xml');

$tbl_region = new Region;
$items = $tbl_region->find_all('where status=? order by created_on desc limit !', array(REGION_ACTIVE, $app->setting->rss_latest_pixels));

$smarty->assign_by_ref('items', $items);
$smarty->display('rss_latest_pixels.tpl', 'index|pixels|lates|'.$cache_id);

?>
