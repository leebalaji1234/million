<?php

require_once('admin_config.php');
require_once('newsletter.class.php');

$tbl_newsletter = new Newsletter;
$newsletters = $tbl_newsletter->find_all('order by `created_at` desc');
$smarty->assign_by_ref('newsletters', $newsletters);
$smarty->display('admin/newsletters.tpl');

?>
