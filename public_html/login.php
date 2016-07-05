<?php 

require_once('config.php');

error_reporting(E_ALL);
// if admin has not enabled user accounts, redirect to home page
if (!$app->setting->user_accounts) $app->redirect('/index.php');

// process log in post. if 'after_login' is defined in session,
// redirect there after login. otherwise, redirect to home page.
$doPostLogin = false;
if(isset($_COOKIE['email']) && isset($_COOKIE['password']) && !empty($_COOKIE['email']) && !empty($_COOKIE['password'])){
  $doPostLogin = true;
  $_REQUEST['email'] = $_COOKIE['email'];
  $_REQUEST['pass'] = $_COOKIE['password'];

}
if ($app->is_post() || $doPostLogin) {
	$smarty->caching = false;
  if (empty($_REQUEST['email']))
    $app->error('##Please enter your e-mail address##');
  else {

    if (isset($app->setting->integration) && $app->setting->integration == 'joomla_integration'){
        define('INC_DIR', true);
        require_once('includes/joomlaCMS.php');
        $user = $GLOBALS['fc_config']['cms'];
    } else {
        require_once('user.class.php');
        $tbl = new User;
        $user = $tbl->find('where email=?', array($_REQUEST['email']));
    }

    if ($user->_new_row || @md5($_REQUEST['pass']) != $user->pass)
      $app->error('##Your e-mail address or password is incorrect##');
    elseif (!$user->is_confirmed)
      $app->error('##Your e-mail address has not been confirmed. Please visit the link given in the confirmation email sent to you.##');
    else {
      // set login credentials in session
      $_SESSION['user_id'] = $user->id;
      $_SESSION['email'] = $user->email;
      $_SESSION['first_name'] = $user->first_name;
      $_SESSION['last_name'] = $user->last_name;
      if(isset($_REQUEST['rememberme'])){
        setcookie("email", $user->email, time() + (365 * 24 * (60 * 60)));
        setcookie("password", md5($_REQUEST['pass']), time() + (365 * 24 * (60 * 60)));  
      }
      
      // redirect
      unset($_SESSION['before_login']);
      $url = @$_SESSION['after_login'];
      unset($_SESSION['after_login']);
      if (!isset($url)) $url = $app->url('/index.php');
      header("Location: $url");
      exit;
    }
  }
}
else {
  $_REQUEST['email'] = @$_SESSION['email'];
}

if (!isset($_REQUEST['email']) || empty($_REQUEST['email'])) $_REQUEST['email'] = '';

$smarty->display('login.tpl', 'login|'.$cache_id.$_REQUEST['email']);

?>
