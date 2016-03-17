<?php

// smarty plugin: {html_select_date_translated}
// same as html_select_date, but uses language-specific month names

// TODO: just a pass-through now; implement language translation

function smarty_function_html_select_date_translated($params, &$smarty)
{
  global $app;

  require_once($smarty->_get_plugin_filepath('function', 'html_select_date'));
  return smarty_function_html_select_date($params, $smarty);
}

?>
