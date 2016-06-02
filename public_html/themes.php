<?php
require_once('config.php');
require_once('util.class.php'); 
require_once('content.class.php');
 
  
 
$tbl = new content;
 
 
 

$content = $tbl->find('where content_name ="theme_description"'); 
  
$smarty->assign_by_ref('content', $content->content_description);
  
$smarty->clear_all_cache();   
$smarty->display('theme_description.tpl'); 
?>