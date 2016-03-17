<?php

// model.class.php
// class Model, implements ORM pattern
//
// global vars used: 
//    $db, $app
// global constants used: 
//    DB_PREFIX

require_once('db.inc.php');

class Model {

  function Model()
  {
    if (!isset($this->_table_name))
      $this->_table_name = "`" . DB_PREFIX . $this->_plural(strtolower(get_class($this))) . "`";
    $this->_id_name = 'id';
    $this->_new_row = true;
  }

  // return an assoc array of attributes that are defined for the current
  // object, except for id. this does not necessarily reflect the table 
  // attributes, unless the object is the result of a "SELECT *" operation.
  function attr()
  {
    $attr = array();
    foreach (get_object_vars($this) as $k => $v) {
      if (substr($k, 0, 1) != '_' && $k != $this->_id_name)
        $attr[$k] = $v;
    }
    return $attr;
  }

  // get a count of rows, with optional filter
  function count($pred = '', $params = array())
  {
    $row = $this->find($pred, $params, 'count(*) as count');
    return $row->count;
  }

  // delete current row
  function delete()
  {
    if ($this->_new_row || is_null($this->id()))
      $this->raise_error('##Attempt to delete row not saved##');
    $this->delete_all('where `!`=? limit 1', array($this->_id_name, $this->id()));
  }

  // delete multiple rows
  // $pred = conditions and clauses following table name
  // $params = array of parameters to replace into $pred
  function delete_all($pred = '', $params = array())
  {
    global $db;
    $sql = "delete from " . $this->_table_name . " $pred";
    $res = $db->query($sql, $params, DB_FETCHMODE_ASSOC);
    $this->_check_error($res);
  }

  // retrieve one row, or if no row found, a new object.
  // paramaters are as to find_all()
  function find($pred = '', $params = array(), $select = '*') 
  {
    $rows = $this->find_all("$pred limit 1", $params, $select);
    if (empty($rows)) {
      $row = $this->_new_from_attr();
    }
    else
      $row = $rows[0];
    return $row;
  }

  // retrieve a set of rows 
  // $pred = conditions and clauses following table name
  // $params = array of parameters to replace into $pred
  // $select = columns to select
  function find_all($pred = '', $params = array(), $select = '*') {
    global $db;
    $sql = "select $select from " . $this->_table_name . " $pred";
    $res = $db->getAll($sql, $params, DB_FETCHMODE_ASSOC);
    $this->_check_error($res);
    $rows = array();
    foreach ($res as $k => $row) {
      $obj = $this->_new_from_attr($row);
      $obj->_new_row = false;
      $rows[] = $obj;
    }

    return $rows;
  }

  // retrieve a row given its id. if row is not found, an error
  // is raised, unless $raise is false, in which case an object
  // with no attributes set is returned (check with is_null($obj->id()))
  function get($id, $raise = true)
  {
    global $db;
    $row = $db->getRow('
      select * from ! where ! = ?
    ', array($this->_table_name, $this->_id_name, $id), DB_FETCHMODE_ASSOC);
    $this->_check_error($row);
    if (is_null($row) && $raise)
        $this->raise_error(get_class($this) . " ($id) ##not found##");
    $obj = $this->_new_from_attr();
    if (!is_null($row)) {
      $obj->set_attr($row);
      $obj->_new_row = false;
    }
    return $obj;
  }

  // return id of current row
  function id()
  {
    $id_name = $this->_id_name;
    return @$this->$id_name;
  }

  // lock table in requested mode (read/write)
  function lock($mode = 'write')
  {
    global $db;
    $res = $db->query('lock tables ! !', array($this->_table_name, $mode));
  }

  // raise an unexpected database error
  function raise_error($msg)
  {
    global $app;
    $app->abort($msg);
  }

  // save row to database. if _new_row is true, a new row is created
  // and id is set to the newly-created id.
  function save()
  {
    global $db;
    $sql = 'update ';
    if ($this->_new_row)
      $sql = 'insert into ';
    $attr = $this->attr();
    if ($this->_new_row && !is_null($this->id()))
      $attr = array_merge(array($this->_id_name => $this->id()), $attr);
    $sql .= $this->_table_name. ' set ';
    $first = true;
    foreach ($attr as $k => $v) {
      if (!$first) $sql .= ','; else $first = false;
      $sql .= "`$k`=" . $this->_quote($v);
    }
    if (!$this->_new_row)
      $sql .= " where `$this->_id_name`=" . $this->_quote($this->id());
    $res = $db->query($sql);
    $this->_check_error($res);
    if ($this->_new_row) {
      $this->id = $this->_insert_id();
      $this->_new_row = false;
    }
  }

  // given an assoc array of field/value pairs, assigns the attributes to the 
  // current object
  function set_attr($attr)
  {
    foreach ($attr as $k => $v) {
      $this->$k = $v;
    }
  }

  // releases all table locks
  function unlock()
  {
    global $db;
    $res = $db->query('unlock tables');
  }

  // validates current row, returns true if ok, false if
  // not. errors are placed in $app->errors array
  function validate()
  {
    global $app;
    return empty($app->errors);
  }

  // general validation assertion
  function validate_expr($label, $assert, $errmsg)
  {
    if ($assert) return true;
    $this->_validate_error($label, $errmsg);
    return false;
  }

  // validate that $value is an integer
  function validate_int($label, $value, $errmsg = '##must be an integer##')
  {
    return $this->validate_expr($label, preg_match('/^\s*-?\d+\s*$/', $value), $errmsg);
  }

  // validate that $value is between $min and $max, inclusive
  function validate_range($label, $value, $min, $max)
  {
    return $this->validate_expr($label, $value >= $min && $value <= $max, sprintf('##must be between %s and %s##', $min, $max));
  }

  // validate that $value is not blank
  function validate_required($label, $value)
  {
    return $this->validate_expr($label, trim($value) != '', '##is required##');
  }

  // "private" methods

  // check for a database error
  function _check_error($obj, $msg = 'Database Error')
  {
    if (!DB::isError($obj)) return;
    $this->raise_error($msg . ': ' . $obj->getMessage() . '(' . $obj->getUserInfo() . ')');
  }

  // return id of last inserted row (MySQL-specific)
  function _insert_id()
  {
    global $db;
    return mysql_insert_id($db->connection);
  }

  // given as assoc array of attrs, create and return a new row
  // object
  function _new_from_attr($attr = array())
  {
    $class = get_class($this);
    $obj =& new $class;
    $obj->set_attr($attr);
    return $obj;
  }

  // pluralize a name
  function _plural($name) {
    return "${name}s";
  }

  // quote a value
  function _quote($val) {
    global $db;
    return $db->quoteSmart($val);
  }

  // record a validation error
  function _validate_error($label, $errmsg)
  {
    global $app;
    $app->error("$label: ", $errmsg);
    return false;
  }

}

?>
