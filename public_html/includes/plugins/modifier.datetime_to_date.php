<?php

// smarty modifier: {datetime_to_date}
// formats a number using standard PHP datetime_to_date() function,
// using current language decimal point and thousands separator

require_once('util.class.php');

function smarty_modifier_datetime_to_date($datetime)
{
  return Util::datetime_to_date($datetime);
}

?>
