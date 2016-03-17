<?php

require_once('admin_config.php');
require_once('payment.class.php');
require_once('region.class.php');
require_once('util.class.php');

$tbl = new Payment;
$id =& $_REQUEST['id'];
$show =& $_REQUEST['show'];
if (!isset($show)) $show = 'all';

// show/edit individual record
if (isset($id)) {

  $payment = $tbl->get($id);

  // set an indicator if the associated region has been removed
  $tbl_region = new Region;
  $region = $tbl_region->get($payment->region_id, false);
  if ($region->_new_row)
    $payment->_region_deleted = true;

  if ($app->is_post()) {
    $payment->notes = $_REQUEST['notes'];
    if (@$_REQUEST['verify'] && !$payment->is_verified) {
      $payment->is_verified = 1;
      $payment->verified_at = Util::epoch_to_datetime();
    }
    if (@$_REQUEST['clear_error'])
      $payment->is_error = 0;
    $payment->save();
    $app->redirect(false, array('show' => $show));
  }
  else {
    $_REQUEST['notes'] = $payment->notes;
  }

  $smarty->assign_by_ref('payment', $payment);
  $smarty->display('admin/payment_history_edit.tpl');
  exit;

}

// set filter
$filter = '';
if ($show == 'error')
  $filter = 'where is_error';
if ($show == 'unverified')
  $filter = 'where not is_verified';

// show list of records
$payments = $tbl->find_all("$filter order by id desc");
$smarty->assign_by_ref('payments', $payments);
$smarty->display('admin/payment_history.tpl');

?>
