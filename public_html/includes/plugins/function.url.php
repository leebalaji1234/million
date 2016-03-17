<?php

// smarty plugin: {url href="string" [encode=true|false]}
// constructs an application url from required 'href' parameter.
// if 'href' starts with '/', it is taken as an absolute location
// from the application root. otherwise, it is assumed to be a
// relative url, or a full url with scheme (http://blah..) and is
// returned unchanged. returned url is urlencoded unles encode=false

require_once('app.inc.php');

function smarty_function_url($params, &$smarty)
{
  global $app;
  if (!isset($params['href'])) 
    $params['href'] = false;
  if (!isset($params['encode'])) 
    $params['encode'] = true;
  if (!isset($params['full'])) 
    $params['full'] = true;
  return $app->url(@$params['href'], false, @$params['encode'], @$params['full']);
}

?>
