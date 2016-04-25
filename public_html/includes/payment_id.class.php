<?php

// payment_id.class.php
// ORM model for payment_ids table

require_once('model.class.php');

class Payment_Id extends Model
{

  // class method to allocate a payment id
  function next_id()
  {
    $tbl = new Payment_Id;
    $row = $tbl->get(1, false);
    // print_r($row);exit;
    @$row->payment_id++;
    $row->save();
    return $row->payment_id;
  }

}

?>
