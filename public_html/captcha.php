<?php
require_once('config.php');
require_once('util.class.php'); 
Util::captcha_create();
echo Util::captcha_url();exit;