<?php

// smarty plugin: {language_selector}
// returns a language selection drop-down, with current language
// highlighed.

function smarty_function_language_selector($params, &$smarty)
{
  global $lang, $smarty;
  require_once($smarty->_get_plugin_filepath('function', 'html_options'));
  $all_langs = $lang->all_languages();
  if (count($all_langs) <= 1)
    return '';
  $langs = array();
  foreach ($all_langs as $k => $row) {
    $langs[$row->code] = $row->name;
  }
  $args = '';
  foreach ($_GET as $k => $v) {
    if ($k != 'lang')
      $args .= htmlspecialchars('&' . urlencode($k) . '=' . urlencode($v));
  }
  $options = smarty_function_html_options(array(
    'options' => $langs,
    'selected' => $lang->code,
  ), $smarty);
  $select = '<select id="language_selector" name="lang" onchange="location.href=\'?lang=\' + this.options[this.options.selectedIndex].value + \'' . $args . '\'">' . $options . '</select>';
  return $select;
}

?>
