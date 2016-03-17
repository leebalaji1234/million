<?php

// db.inc.php
// create global $db object (PEAR DB connection)

require_once('DB.php');

// connect to database
$db =& DB::connect(array(
  'username' => DB_USER,
  'password' => DB_PASS,
  'hostspec' => DB_HOST,
  'database' => DB_NAME,
  'phptype' => 'mysql',
));
if (DB::isError($db))
  trigger_error('Unable to connect to database: ' . $db->getMessage(), E_USER_ERROR);

// all communication with database will be in UTF-8
// (no error checking; in case pre-4.1 MySQL)
$db->query("set names 'utf8'");

// disable strict SQL modes for MySQL 5.0.2+
$db->query("set sql_mode=''");

?>
