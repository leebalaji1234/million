<?php

require_once('config.php');

if (isset($_REQUEST['rid']) && is_numeric($_REQUEST['rid'])) {
	$sql = 'SELECT * FROM '.DB_PREFIX.'regions WHERE id='.(int)$_REQUEST['rid'];
	$res =& $db->query($sql);
	$row =& $res->fetchRow(DB_FETCHMODE_OBJECT);
	header('Content-Type: image/png');
	$smarty->assign('image', $row->image);
	$smarty->display('show_image.tpl', 'show_image|'.(int)$_REQUEST['rid']);
} else {
	header("HTTP/1.0 404 Not Found");
}

?>
