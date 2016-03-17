<?php

// smarty plugin: {flash}
// returns contents of session 'flash', clearing the flash afterward

function smarty_function_flash($params, &$smarty)
{
  $flash = @$_SESSION['flash'];
  unset($_SESSION['flash']);
  return $flash;
}

?>
