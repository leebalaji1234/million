<?php

// smarty plugin: {html_yesno}
// returns HTML for a Yes/No value as radio buttons

function smarty_function_html_yesno($params, &$smarty) {
  global $lang;

  if (empty($params['name'])) {
    $smarty->trigger_error('snippet: missing name parameter');
    return;
  }
  
  $params = array_merge(array('yes' => $lang->language_translate('##Yes##'), 'no' => $lang->language_translate('##No##')), $params);
  $html .= '<input type="radio" name="' . htmlspecialchars($params['name']) . '" value="1"';
  if ((@$_REQUEST[$params['name']] && @$_REQUEST[$params['name']] != 'true') || @$_REQUEST[$params['name']] == 'true') $html .= ' checked="checked"';
  $html .= ' />' . $params['yes'];
  $html .= '<input type="radio" name="' . htmlspecialchars($params['name']) . '" value="0"';
  if (!@$_REQUEST[$params['name']]  && @$_REQUEST[$params['name']] != 'false' || @$_REQUEST[$params['name']] == 'false') $html .= ' checked="checked"';
  $html .= ' />' . $params['no'];
  return $html;
}

?>