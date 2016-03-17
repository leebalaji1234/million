<?php

// smarty modifier: {number_format}
// formats a number using standard PHP number_format() function,
// using current language decimal point and thousands separator

function smarty_modifier_number_format($number, $decimals = 0)
{
  global $lang;
  return number_format($number, $decimals, $lang->decimal_point, $lang->thousands_separator);
}

?>
