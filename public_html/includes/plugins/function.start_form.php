<?php

// smarty plugin: {start_form}
// returns a form start tag

require_once('app.inc.php');

function smarty_function_start_form($params, &$smarty)
{
  global $app;

  $temp = array_merge(array(
    'method' => 'post', 'action' => $app->url(),
  ), $params);
  return '<form ' . $app->array_to_attrs($temp) . '>';
}

?>
