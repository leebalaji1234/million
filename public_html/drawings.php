<?php   
require_once('config.php');  
$smarty->assign_by_ref('regions', $regions);
$smarty->display('get_pixels_drawing.tpl'); 
?>
