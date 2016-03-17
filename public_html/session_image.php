<?php

require('config.php');

// session_image.php
// returns the PNG image from the session data

$data = @$_SESSION['image'];
if ($data) {
  header('Content-Type: image/png');
  echo $data;
}
else {
  header('HTTP/1.0 404 Not Found');
  echo 'Not found';
}

?>
