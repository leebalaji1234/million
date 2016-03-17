<?php

// smarty plugin: 
// {snippet name="key" [seq="n"] [default="string"] [language="code"]}
// returns snippet text for given key

function smarty_function_snippet($params, &$smarty)
{
  require_once('snippet.class.php');
  if (empty($params['name'])) {
    $smarty->trigger_error('snippet: missing name parameter');
    return;
  }
  $params = array_merge(array('seq' => 0), $params);
  return Snippet::snippet_text($params['name'], @$params['seq'], @$params['default'], @$params['language']);
}

?>
