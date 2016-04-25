<?php
require_once('config.php');
require_once('util.class.php'); 
require_once('volunteer.class.php');
require_once('country.class.php');

  
 
$tbl_country = new Countrie;
Util::captcha_create();
$smarty->assign('captcha_url', Util::captcha_url());
if ($app->is_post()) {
	$smarty->caching = false;
  if (empty($_REQUEST['email']))
    $app->error('##Please enter your e-mail address##');
  elseif (!Util::valid_email($_REQUEST['email']))
    $app->error('##That does not appear to be a valid e-mail address##');  
  if (empty($_REQUEST['name']))
    $app->error('##Please enter your  name##');
   if (empty($_REQUEST['phone']))
    $app->error('##Please enter your phone no##');
   if (empty($_REQUEST['address']))
    $app->error('##Please enter your address##');
  if (empty($_REQUEST['country']))
     $app->error('##Please enter country##');
  if (empty($_REQUEST['state']))
     $app->error('##Please enter state##');
  if (empty($_REQUEST['city']))
     $app->error('##Please enter city##'); 
  if (@$_REQUEST['phrase'] != Util::captcha_phrase())
     $app->error('##The text from the image was not entered correctly##');   
  if (empty($app->errors)) {

    // make sure user doesn't already exist, and create user row.
    // assign a digest computed from a random number. this is used
    // by the confirmation process.
   
    $tbl = new Volunteer;
    $tbl->lock();
    $user = $tbl->find('where email=?', array($_REQUEST['email']));
    if (!$user->_new_row)
      $app->error('##An account with that email address already exists.##');
    else {
      $user->email = $_REQUEST['email']; 
      $user->name = $_REQUEST['name'];
      $user->phone = $_REQUEST['phone'];
      $user->address = $_REQUEST['address'];
      $user->country = $_REQUEST['country'];
      $user->state = $_REQUEST['state'];
      $user->city = $_REQUEST['city'];
      $user->created_at = Util::epoch_to_datetime();
      $user->status = 0;
      $user->digest = $app->digest(array(rand()));
      $user->save();
    }
    $tbl->unlock();

    if (empty($app->errors)) {

      // send confirmation email
      $app->mail($user->email, 'volunteer_code', array(
        '[confirm_url]' => $app->url('/volunteer_confirm.php', array(
            'id' => $user->id,
            'digest' => $user->digest,
          ), true, true),
        '[name]' => $user->name
      ));

      // show thank you page
      $app->redirect('/volunteer_done.php');

    }
  }
}


$countries = $tbl_country->find_all();  
$smarty->assign_by_ref('countries', $countries); 
  
 $pagename = 'volunteer'; 
$smarty->display('volunteers.tpl'); 
?>