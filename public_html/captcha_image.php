<?php

require('config.php');

// captcha_image.php
// returns the PNG captcha image from the session data

$data = @$_SESSION['captcha']['image'];
if ($data) {
  header('Content-Type: image/png');
  echo $data;
}
else {
  header('HTTP/1.0 404 Not Found');
  echo 'Not found';
}

?>
