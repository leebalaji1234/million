<?php

// smarty plugin: {snippet_textarea name="key" [use_editor=true|false] ...}
// creates a snippet editing text field to edit the specified snippet key. all
// parameters except for name and use_editor are added to the input textarea.

function smarty_function_snippet_textarea($params, &$smarty)
{
  require_once('snippet.class.php');
  if (empty($params['name'])) {
    $smarty->trigger_error('snippet_textarea: missing name parameter');
    return;
  }
  if (!isset($params['use_editor']))
    $params['use_editor'] = true;
  $name = $params['name'];
  unset($params['name']);
  $use_editor = $params['use_editor'];
  unset($params['use_editor']);
  return Snippet::textarea_html($name, $params, $use_editor);
}

?>
