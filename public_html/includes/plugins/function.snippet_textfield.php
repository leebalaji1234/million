<?php

// smarty plugin: {snippet_textfield name="key" ...}
// creates a snippet editing text field to edit the specified
// snippet key. all parameters except for name are added to
// the input text field.

function smarty_function_snippet_textfield($params, &$smarty)
{
  require_once('snippet.class.php');
  if (empty($params['name'])) {
    $smarty->trigger_error('snippet_textfield: missing name parameter');
    return;
  }
  $name = $params['name'];
  unset($params['name']);
  return Snippet::textfield_html($name, $params);
}

?>
