<?php

require_once('config.php');

// if the "link to us" feature is disabled, go to the index page
if (!$app->setting->link_to_us_enabled)
  $app->redirect('/index.php');

require_once('includes/link_banner.class.php');
require_once('includes/link_link.class.php');

$tbl_link_banner = new Link_Banner;
$tbl_link_link = new Link_Link;

$banners = $tbl_link_banner->find_all('order by id');
$links = $tbl_link_link->find_all('order by id');

$smarty->assign('link_banners', $banners);
$smarty->assign('link_links', $links);
$smarty->display('link_to_us.tpl', 'link_to_us|'.$cache_id);

?>