<?php

require_once('config.php');
require_once('util.class.php');

// if admin has not enabled user accounts, redirect to home page
if (!$app->setting->user_accounts) $app->redirect('/index.php');

if ($app->is_post()) {
	$smarty->caching = false;
  if (empty($_REQUEST['email']))
    $app->error('##Please enter your e-mail address##');
  elseif (!Util::valid_email($_REQUEST['email']))
    $app->error('##That does not appear to be a valid e-mail address##');
  elseif ($_REQUEST['email_confirm'] != $_REQUEST['email'])
    $app->error('##Your re-entered email address does not match; please check##');
  if (empty($_REQUEST['first_name']))
    $app->error('##Please enter your first name##');
  if (empty($_REQUEST['last_name']))
    $app->error('##Please enter your last name##');
  if (strlen(@$_REQUEST['pass']) < 5)
    $app->error('##Please create a password of at least 5 characters##');
  elseif ($_REQUEST['pass_confirm'] != $_REQUEST['pass'])
    $app->error('##Your re-entered password does not match; please check##');

  if (empty($app->errors)) {

    // make sure user doesn't already exist, and create user row.
    // assign a digest computed from a random number. this is used
    // by the confirmation process.
    require_once('user.class.php');
    $tbl = new User;
    $tbl->lock();
    $user = $tbl->find('where email=?', array($_REQUEST['email']));
    if (!$user->_new_row)
      $app->error('##An account with that email address already exists.##');
    else {
      $user->email = $_REQUEST['email'];
      $user->pass = $_REQUEST['pass'];
      $user->first_name = $_REQUEST['first_name'];
      $user->last_name = $_REQUEST['last_name'];
      $user->created_at = Util::epoch_to_datetime();
      $user->is_confirmed = 0;
      $user->digest = $app->digest(array(rand()));
      $user->save();
    }
    $tbl->unlock();

    if (empty($app->errors)) {

      // send confirmation email
      $app->mail($user->email, 'signup_confirm', array(
        '[confirm_url]' => $app->url('/signup_confirm.php', array(
            'id' => $user->id,
            'digest' => $user->digest,
          ), true, true),
        '[first_name]' => $user->first_name,
        '[last_name]' => $user->last_name,
      ));

      // show thank you page
      $app->redirect('/signup_done.php');

    }
  }
}

$smarty->display('signup.tpl', 'signup|'.$cache_id);

?>
