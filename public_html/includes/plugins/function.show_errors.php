<?php

// smarty plugin: {show_errors}
// checks $app->errors for any accumulated error messages. if
// found, returns HTML representing those errors

require_once('app.inc.php');

function smarty_function_show_errors($params, &$smarty)
{
  global $app;
  if (empty($app->errors))
    return '';
  $html = '<ul class="error">';
  foreach ($app->errors as $k => $err) {
    $html .= '<li>' . htmlspecialchars($err) . '</li>';
  }
  $html .= '</ul>';
  return $html;
}

?>
