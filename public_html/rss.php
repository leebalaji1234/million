<?php

require_once('config.php');

$smarty->display('rss.tpl', 'rss|'.$cache_id);

?>
