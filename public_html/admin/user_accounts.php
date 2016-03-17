<?php

require_once('admin_config.php');
require_once('user.class.php');
require_once('util.class.php');

$id =& $_REQUEST['id'];

$tbl_user = new User;

// show/edit individual record
if (isset($id)) {

  $user = $tbl_user->get($id);
  $smarty->assign_by_ref('user', $user);

  if ($app->is_post()) {
  	$smarty->clear_all_cache();
    // handle delete
    if (@$_REQUEST['action'] == 'delete') {
      if (!@$_REQUEST['confirm']) {
        $smarty->display('user_accounts_confirm.tpl');
        exit;
      }

      // reassign or delete user's regions. if we delete, mark
      // the associated grid as changed so it will be republished
      require_once('grid.class.php');
      require_once('region.class.php');
      $tbl_grid = new Grid;
      $tbl_region = new Region;
      $regions = $tbl_region->find_all('where `user_id`=?', array($user->id));
      foreach ($regions as $k => $region) {
        if ($_REQUEST['delete_regions']) {
          $grid = $tbl_grid->get($region->grid_id);
          $region->delete();
          $grid->is_dirty = 1;
          $grid->save();
        }
        else {
          $region->user_id = 0;
          $region->save();
        }
      }

      // now delete the user account
      $user->delete();
      $app->redirect('admin/user_accounts.php');
    }

    // handle save
    if (empty($_REQUEST['email']))
      $app->error('##E-Mail address is required##');
    elseif (!Util::valid_email($_REQUEST['email']))
      $app->error('##Invalid e-mail address##');
    if (empty($_REQUEST['first_name']))
      $app->error('##First name is required##');
    if (empty($_REQUEST['last_name']))
      $app->error('##Last name is required##');
    if (strlen(@$_REQUEST['pass']) < 5)
      $app->error('##Password must be at least 5 characters##');
    if (empty($app->errors)) {
      $user->email = $_REQUEST['email'];
      $user->pass = $_REQUEST['pass'];
      $user->first_name = $_REQUEST['first_name'];
      $user->last_name = $_REQUEST['last_name'];
      $user->created_at = $_REQUEST['created_at'];
      $user->is_confirmed = $_REQUEST['is_confirmed'];
      $user->digest = $_REQUEST['digest'];
      $user->save();
      $app->redirect();
    }
  }
  else {
    $_REQUEST['email'] = $user->email;
    $_REQUEST['pass'] = $user->pass;
    $_REQUEST['first_name'] = $user->first_name;
    $_REQUEST['last_name'] = $user->last_name;
    $_REQUEST['created_at'] = $user->created_at;
    $_REQUEST['is_confirmed'] = $user->is_confirmed;
    $_REQUEST['digest'] = $user->digest;
  }

  $smarty->display('admin/user_accounts_edit.tpl');
  exit;

}

// show list of all users
$users = $tbl_user->find_all('order by last_name, first_name');

$smarty->assign_by_ref('users', $users);
$smarty->display('admin/user_accounts.tpl');

?>
