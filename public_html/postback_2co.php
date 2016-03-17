<?php

session_start();

$return = var_export($_REQUEST, true);
var_dump(var_export($_REQUEST, true));
var_dump(session_id());
mail('developer@kalexandr.com', 'Post back vars', $return);

?>
