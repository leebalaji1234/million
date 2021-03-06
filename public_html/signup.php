<?php

require_once('config.php');
require_once('util.class.php');
require_once('country.class.php');
require_once('city.class.php');

$tbl_city = new Citie; 

function calculateAge($dob){
if(isset($dob) && $dob){
  $birthDate = $_POST['dob'];//"12/17/1987"//mm/dd/YYYY; 
    $birthDate = explode("/", $birthDate); 
   $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2])); 
   $arrage['currentage'] = $age;
   return $age;
} else{
  return false;
}

}
// if admin has not enabled user accounts, redirect to home page
if (!$app->setting->user_accounts) $app->redirect('/index.php');
$error = false;
if ($app->is_post()) {
	$smarty->caching = false;
   if(isset($_REQUEST['dob']) && !empty($_REQUEST['dob'])){
    list($mm,$dd,$yyyy) = explode('/',trim($_REQUEST['dob']));
        if (!checkdate($mm,$dd,$yyyy)) {
                $error = true;
        }
   }
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
  if (strlen(@$_REQUEST['pass']) < 8)
    $app->error('##Please create a password of at least 8 characters##');
  elseif ($_REQUEST['pass_confirm'] != $_REQUEST['pass'])
    $app->error('##Your re-entered password does not match; please check##');
  if($_REQUEST['dob']=='')
    $app->error('Please enter Date of Birth with format [mm/dd/YYYY]');
  else if( !empty($_REQUEST['dob']) && $error == true)
    $app->error('## Please enter valid Date of Birth mm/dd/YYYY##');   
  if (empty($_REQUEST['country']))
     $app->error('##Please enter country##');
  if (empty($_REQUEST['state']))
     $app->error('##Please enter state##');
  if (empty($_REQUEST['city']))
     $app->error('##Please enter city##');
  if (@$_REQUEST['phrase'] != Util::captcha_phrase())
     $app->error('##The text from the image was not entered correctly ##');      
  if (empty($app->errors)) {

    // make sure user doesn't already exist, and create user row.
    // assign a digest computed from a random number. this is used
    // by the confirmation process.
    require_once('user.class.php');
    $tbl = new User;
    // $tbl->lock();
    $user = $tbl->find('where email=?', array($_REQUEST['email']));
    if (!$user->_new_row)
      $app->error('##An account with that email address already exists.##');
    else {
      if (isset($_REQUEST['city']) && $_REQUEST['city'] == 'addnew' && !empty($_REQUEST['manualcity'])){
        $cityexists = $tbl_city->find('where name=? and state_id=?', array($_REQUEST['manualcity'],$_REQUEST['state']));
        if (!$cityexists->_new_row){
            $cityexists->name = $_REQUEST['manualcity'];
            $cityexists->state_id = $_REQUEST['state'];
            $cityexists->save();
            $_REQUEST['city'] = $cityexists->id;
        }else{
            // $tbl->unlock();
            $tbl_city->lock();
            $tbl_city->name = $_REQUEST['manualcity'];
            $tbl_city->state_id = $_REQUEST['state'];
            $tbl_city->save();
            $tbl_city->unlock();
            // $tbl->lock();
            $_REQUEST['city'] = $tbl_city->id;;
        }
        
      } 
          $user->email = $_REQUEST['email'];
          $user->pass = md5($_REQUEST['pass']);
          $user->first_name = $_REQUEST['first_name'];
          $user->last_name = $_REQUEST['last_name'];
          $user->dob = $_REQUEST['dob'];
          $user->age = calculateAge($_REQUEST['dob']);
          $user->country = $_REQUEST['country'];
          $user->state = $_REQUEST['state'];
          $user->city = $_REQUEST['city'];
          $user->created_at = Util::epoch_to_datetime();
          $user->is_confirmed = 0;
          $user->digest = $app->digest(array(rand()));
          $user->save();
          // $tbl->unlock();
      
     
    }
    

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

Util::captcha_create();
$smarty->assign('captcha_url', Util::captcha_url());

$tbl_country = new Countrie;
$countries = $tbl_country->find_all();  
$smarty->assign_by_ref('countries', $countries); 

$smarty->display('signup.tpl', 'signup|'.$cache_id);

?>
