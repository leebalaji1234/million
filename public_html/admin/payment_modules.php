<?php

require_once('admin_config.php');
require_once('payment_module.class.php');
require_once('payment_config.class.php');

$tbl = new Payment_Module;

$id =& $_REQUEST['id'];

if ($app->is_post()) {
  $module = $tbl->get(@$_REQUEST['id']);
  $module->require_class();
  $obj = new $module->module_key;
  if (@$_REQUEST['_enable'] && !$module->is_enabled) {
    $obj->before_enable();
    $config = $obj->configuration();
    $obj->update($config);
    $module->is_enabled = 1;
    $module->save();
    $app->redirect();
  }
  if (@$_REQUEST['_disable'] && $module->is_enabled) {
    $module->is_enabled = 0;
    $module->save();
    $app->redirect();
  }
  if (@$_REQUEST['_configure'] && $module->is_enabled) {
    $_REQUEST['display_order'] = $module->display_order;
    $smarty->assign('module', $module);
    $smarty->assign('paymod_data', $obj->configuration());
    $obj->before_edit_configuration();
    $smarty->display('admin/payment_modules_configure.tpl');
    exit;
  }
  if (@$_REQUEST['_saveconfig'] && $module->is_enabled) {
    $errs = $obj->validate_configuration(@$_REQUEST['configuration']);
    foreach($errs as $k => $err)
      $app->error($err);
    if (!empty($app->errors)) {
      $smarty->assign('module', $module);
      $smarty->assign('paymod_data', @$_REQUEST['configuration']);
      $smarty->display('admin/payment_modules_configure.tpl');
      exit;
    }
    $module->display_order = $_REQUEST['display_order'];
    $module->save();
    $obj->update((isset($_REQUEST['configuration']) ? $_REQUEST['configuration'] : '' ));
  }
  $app->redirect();
}

$modules = $tbl->find_all('order by `name`');
$smarty->assign_by_ref('modules', $modules);

$smarty->display('admin/payment_modules.tpl');

?>
