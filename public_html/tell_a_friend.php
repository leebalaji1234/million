<?php

require_once('config.php');
require_once('util.class.php');

if ($app->is_post()) {
  if (empty($_REQUEST['from_name']))
    $app->error('##Please enter your name.##');
  if (empty($_REQUEST['from_email']))
    $app->error('##Please enter your E-Mail address.##');
  elseif (!Util::valid_email($_REQUEST['from_email']))
    $app->error('##Your E-Mail address does not appear to be a valid address##');
  if (empty($_REQUEST['to_email']))
    $app->error("##Please enter your friend's E-Mail address.##");
  elseif (!Util::valid_email($_REQUEST['to_email']))
    $app->error("##Your friend's E-Mail address does not appear to be a valid address##");
  if (empty($app->errors)) {

    // send the email))
    $app->mail($_REQUEST['to_email'], 'tell_a_friend', array(
      '[site_url]' => $app->url('/index.php', array(), true, true),
      '[from_name]' => $_REQUEST['from_name'],
    ), $_REQUEST['from_email']);

    // save settings and redirect
    $_SESSION['name'] = $_REQUEST['from_name'];
    $_SESSION['email'] = $_REQUEST['from_email'];
    $_SESSION['flash'] = $lang->language_translate('##Your recommendation has been sent to## <strong>' . htmlspecialchars($_REQUEST['to_email']) . '</strong> . ##Thank you##.');

    $smarty->clear_cache('tell_a_friend.tpl', 'tell_a_friend|'.$session_suffix.'|'.$cache_id);
    $app->redirect();
  }
}
else {
  if (!isset($_SESSION['name']))
    $_SESSION['name'] = trim(@$_SESSION['first_name'] . ' ' . @$_SESSION['last_name']);

  $_REQUEST['from_name'] = @$_SESSION['name'];
  $_REQUEST['from_email'] = @$_SESSION['email'];
  
  //hack for problem with 'link to as' problem
  if ($_REQUEST['from_name'] == 'link_to_us_enabled'){
  	$_REQUEST['from_name'] = '';
  	$_SESSION['name'] = '';
  }
}

if (count($_POST))
	$smarty->caching = 0;
	
	
$smarty->display('tell_a_friend.tpl', 'tell_a_friend|'.$session_suffix.'|'.$cache_id);

?>
