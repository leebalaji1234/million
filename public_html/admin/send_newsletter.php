<?php

require_once('admin_config.php');
require_once('newsletter.class.php');
require_once('snippet.class.php');
require_once('util.class.php');

$tbl_newsletter = new Newsletter;

if ($app->is_post()) {
  $merge_addresses =& $_REQUEST['merge_addresses'];
  if (!empty($merge_addresses)) {

    $merge = array();

    if ($merge_addresses == 'pixels') {
      require_once('region.class.php');
      $tbl = new Region;
      $rows = $tbl->find_all();
      foreach ($rows as $k => $row) {
        $merge[] = $row->email;
      }
    }
    if ($merge_addresses == 'users') {
      require_once('user.class.php');
      $tbl = new User;
      $rows = $tbl->find_all();
      foreach ($rows as $k => $row) {
        $merge[] = $row->email;
      }
    }
    if ($merge_addresses == 'admin')
      $merge[] = $app->setting->admin_email;

    $addr = array();
    foreach (explode("\n", $_REQUEST['addr']) as $k => $v) {
      $v = trim($v);
      if (!empty($v)) $addr[] = $v;
    }
    $addr = array_merge($addr, $merge);
    $addr = array_unique($addr);
    asort($addr);
    $_REQUEST['addr'] = implode("\r\n", $addr) . "\r\n";

  }
  else {

    // validate addresses
    $addr = array();
    foreach (explode("\n", $_REQUEST['addr']) as $k => $v) {
      $v = trim($v);
      if (!empty($v)) $addr[] = $v;
    }
    $addr = array_unique($addr);
    asort($addr);

    if (empty($addr))
      $app->error('##Please enter at least one e-mail address##');
    foreach ($addr as $k => $v) {
      if (!Util::valid_email($v))
        $app->error("'$v' ##does not appear to be a valid e-mail address##");
    }

    if (empty($app->errors)) {
      send_newsletter($addr);
      $smarty->display('admin/send_newsletter_complete.tpl');
      exit;
    }

  }
}

// build array for newsletter dropdown list
$rows = $tbl_newsletter->find_all('order by `created_at` desc');
$newsletters = array();
foreach ($rows as $k => $row) {
  $newsletters[$row->id] = Snippet::snippet_text('newsletter_title', $row->id);
}
$smarty->assign_by_ref('newsletters', $newsletters);

$smarty->display('admin/send_newsletter.tpl');

// send newsletter to each address in given list
function send_newsletter(&$addr) {

  global $app;

  $subject = Snippet::snippet_text('newsletter_title', $_REQUEST['id']);
  $body = Snippet::snippet_text('newsletter_body', $_REQUEST['id']);
  foreach ($addr as $k => $to)
    $app->send_mail($to, $subject, $body);

}

?>
