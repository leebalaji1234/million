<?php

require_once('config.php');
require_once('grid.class.php');
require_once('region.class.php');
require_once('user.class.php');

$app->check_login();

$tbl_user = new User;
$user = $tbl_user->get($_SESSION['user_id']);

$tbl_region = new Region;

// set default params
$o =& $_REQUEST['o'];
$a =& $_REQUEST['a'];
$q =& $_REQUEST['q'];
if (!isset($o)) $o = 3;
if (!isset($a)) $a = 0;

// determine sort order
$order = 'width*height';
if ($o == 2) $order = "if(title='',url,title)";
if ($o == 1) $order = 'created_on';
if (($o != 2 && $a == 0) || ($o == 2 && $a == 1)) $order = "$order desc";

$regions = $tbl_region->find_all('where user_id=? and status=? and if(title=\'\',url,title) like ? order by !', array($_SESSION['user_id'], REGION_ACTIVE, "%$q%", $order));

$smarty->assign_by_ref('regions', $regions);
$smarty->assign_by_ref('user', $user);

$smarty->display('account.tpl', 'account|'.$cache_id);

?>
