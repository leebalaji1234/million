<?php

// set default params
$o =& $_REQUEST['o'];
$a =& $_REQUEST['a'];
$q =& $_REQUEST['q'];

if (!isset($o)) $o = 3;
if (!isset($a)) $a = 0;
if (!isset($q)) $q = '%';

require_once('config.php');
require_once('grid.class.php');
require_once('region.class.php');

$tbl_region = new Region;


if (!$app->setting->pixel_list_by_clicks and $o >= 4) {
  unset($o);
  unset($a);
}

// determine sort order
$order = 'width*height';
if ($o == 4) $order = 'clicks';
if ($o == 2) $order = "if(title='',url,title)";
if ($o == 1) $order = 'created_on';
if (($o != 2 && $a == 0) || ($o == 2 && $a == 1)) $order = "$order desc";

$regions = $tbl_region->find_all('where status=? and if(title=\'\',url,title) like ? order by !', array(REGION_ACTIVE, "%$q%", $order));


$smarty->assign_by_ref('regions', $regions);
$smarty->display('pixel_list.tpl', "index|search|$q|$o|$a|".$cache_id);

?>
