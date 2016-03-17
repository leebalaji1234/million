<?php

// admin.class.php
// admin object, provides admin-specific routines

require_once('app.inc.php');
require_once('admin_user.class.php');

class Admin
{

  // check for valid administrator login. redirect to the login
  // page if not valid.
  function check_auth()
  {
    global $app;
    if (!$app->is_admin())
      $app->redirect('/admin/login.php');
  }

  // attempt to login with given username/password. if valid,
  // sets session indicator and returns true. otherwise, returns
  // false
  function login($user, $pass)
  {
    $_SESSION['is_admin'] = false;
    $t =& new Admin_User;
    $row = $t->get(1, false);
    if (is_null($row->id())) {
      $row->id = 1;
      $row->user = 'admin';
      $row->pass = md5('admin');
      $row->save();
    }
    if ($user == $row->user && md5($pass) == $row->pass)
      $_SESSION['is_admin'] = true;
    return $_SESSION['is_admin'];
  }

  // log administrator out
  function logout()
  {
    unset($_SESSION['is_admin']);
  }

}

?>
