<?php

// app.class.php
// application object, provides global routines needed across application

// globals used:
//   $lang
//   $smarty

require_once('lang.inc.php');
require_once('smarty.inc.php');

class App{
  var $error_template = 'error.tpl';
  var $initialized = false;
  var $errors = array();

  // strip slashes recursively through array
  function clean_array(&$arr) 
  {
    foreach ($arr as $k => $v) {
      if (is_array($v))
        App::clean_array($arr[$k]);
      else
        $arr[$k] = stripslashes($v);
    }
  }

  // trim whitespace recursively through array
  function trim_array(&$arr) 
  {
    foreach ($arr as $k => $v) {
      if (is_array($v))
        App::trim_array($arr[$k]);
      else
        $arr[$k] = trim($v);
    }
  }

  // if the given object is a DB::Error object, report an unexpected error.
  function check_db_error($obj, $errmsg = '##Database Error##')
  {
    if (DB::isError($obj))
      $this->abort($errmsg, ': ', $obj->getMessage());
  }

  // report an internal error. takes a variable list of error message strings,
  // which will be concatenated to form the error message. error message may
  // have embedded multi-language strings.
  function abort()
  {
    global $lang, $smarty;

    $args = func_get_args();
    if (empty($args))
      $errmsg = '(##Unknown error##)';
    else
      $errmsg = implode('', $args);

    // if we are still in request initialization phase,
    // don't attempt to display an error template and do
    // language translation. just raise a php error.
    if (!$this->initialized || @$GLOBALS['aborting']) {
      $errmsg = preg_replace('/\x23\x23(.*?)\x23\x23/s', '$1', $errmsg);
      trigger_error($errmsg, E_USER_ERROR);
    }
    $GLOBALS['aborting'] = true;

    // release any database locks, because error reporting will
    // raise errors about the languages table not being locked
    global $db;
    @$db->query('unlock tables');

    // display error using current template and language
    // translation
    $smarty->assign('errmsg', $lang->language_translate($errmsg));
    //we don't know errors or templates which will be shown
    $smarty->caching = false;
    $smarty->display($this->error_template);
    exit;
  }

  // take an "absolute" URL (starting with '/') and make it
  // absolute from doc root. all other urls are passed through.
  // $attrs is optional array of key/value attributes to be added
  // to the URL as a query. if $encode is true, the $url is
  // urlencoded, except for :, /, and # chars, which are assumed
  // to be part of the scheme, path, or fragment. if $full is
  // true, the full scheme, sever, and port portions are added.
  function url($url = false, $attrs = false, $encode = true, $full = true)
  {
    if ($url === false)
      $url = USE_PHP_SELF ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    elseif (substr($url, 0, 1) == '/') {
      $url = DOC_ROOT . substr($url, 1);
      if ($full) {
        $scheme = 'http';
        if (@$_SERVER['HTTPS'] == 'on') $scheme .= 's';
        $url = "$scheme://" . $_SERVER['HTTP_HOST'] . "$url";
      }
    }
    if ($encode) {
      $url = rawurlencode($url);
      $url = str_replace('%2F', '/', $url);
      $url = str_replace('%23', '#', $url);
      $url = str_replace('%3A', ':', $url);
      $url = str_replace('%7E', '~', $url);
    }
    $query = '';
    if (!empty($attrs))
      $query = '?' . $this->array_to_query($attrs);
    return $url . $query;
  }

  // issue a redirect and stop execution. if $url is false, a redirect
  // to self is issued.
  function redirect($url = false, $attrs = false)
  {
    header('Location: ' . $this->url($url, $attrs, true, true));
    exit;
  }

  // convert an assoc array to a string of element attributes,
  // with each attribute value HTML-escaped
  function array_to_attrs($attrs)
  {
    $temp = array();
    foreach ($attrs as $name => $value) {
      $temp[] = $name . '="' . htmlspecialchars($value) . '"';
    }
    return implode(' ', $temp);
  }

  // convert an assoc array to a query string, with each attribute
  // value URL-encoded. The result is NOT html-escaped.
  function array_to_query($attrs = array())
  {
    if (is_array($attrs) && count($attrs)){
      $temp = array();
      foreach ($attrs as $name => $value) {
        $temp[] = rawurlencode($name) . '=' . rawurlencode($value);
      }
      return implode('&', $temp);
    } else {
      return '';
    }
  }

  // returns true if this is a POST request
  function is_post()
  {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  // returns true if administrator is logged in
  function is_admin()
  {
    return @$_SESSION['is_admin'];
  }

  // adds an error message to accumulated request errors.
  // any embedded language texts will be translated
  function error()
  {
    global $lang;
    $args = func_get_args();
    $errmsg = $lang->language_translate(implode('', $args));
    $this->errors[] = $errmsg;
  }

  // sends a standard email
  function mail($to_addr, $email_key, $params = array(), $from_addr = false){
    require_once('email_template.class.php');
    require_once('snippet.class.php');

    // merge common parameters
    $params = array_merge(array(
      '[site_name]' => $this->setting->site_name,
    ), $params);

    // fetch template
    $tbl = new Email_Template;
    $template = $tbl->find('where email_key=?', array($email_key));
    if ($template->_new_row)
      $this->abort('##Invalid email_key value##');

    // get translated subject and body
    $subject = Snippet::snippet_text($template->snippet_key_subject());
    $body = Snippet::snippet_text($template->snippet_key_body());

    // if using HTML mail, escape all parameters
    if ($this->setting->html_email) {
      foreach ($params as $k => $v)
        $params[$k] = htmlspecialchars($v);
    }

    // replace parameters
    $keys = preg_split('/[,\s]+/', $template->parameters);
    foreach ($keys as $k => $key) {
      $subject = str_replace($key, @$params[$key], $subject);
      $body = str_replace($key, @$params[$key], $body);
    }

    // send the mail
    
    $this->send_mail($to_addr, $subject, $body, $from_addr);
  }

  // send an email message
  function send_mail($to_addr, $subject, $body, $from_addr = false, $return_errors = false){
    require_once('Mail.php');
    
    if ($from_addr === false)
      $from_addr = $this->setting->admin_email;
      
    $params = array();
    if (MAIL_TYPE == 'smtp') {
      $params = array(
        'host' => SMTP_HOST,
        'port' => SMTP_PORT,
        'auth' => SMTP_AUTH,
        'username' => SMTP_USER,
        'password' => SMTP_PASS,
      );
    }
    if (MAIL_TYPE == 'sendmail') {
      $params = array(
        'sendmail_path' => SM_PATH,
      );
    }
    $mailer =& Mail::factory(MAIL_TYPE, $params);
    $res = $mailer->send(
      $to_addr,
      array(
      //  'To' => $to_addr,
        'From' => $from_addr,
        'Subject' => $subject,
        'Content-Type' => $this->setting->html_email ? 'text/html; charset=utf-8' : 'text/plain; charset=utf-8',
      ),
      $body
    );
    if (PEAR::isError($res)) {
      error_log('Unable to send mail: ' . $res->getMessage());
      return $res->getMessage();
    }
    return '';
  }

  // create a digest from an array of values and the secret key
  function digest($params = array())
  {
    return md5(implode('', $params) . $this->setting->secret);
  }
  
  // verify that user is logged in, and redirect to login
  // page if necessary
  function check_login($prompt = '')
  {
    global $lang;
    // if admin has not enabled user accounts, redirect to home page
    if (!$this->setting->user_accounts) $this->redirect('/index.php');
    if (@$_SESSION['user_id']) return;
    $_SESSION['before_login'] = $lang->language_translate($prompt);
    $_SESSION['after_login'] = $this->url(false, $_GET, false);
    $this->redirect('/login.php');
  }

  // assign the 'pixels_used' and 'pixels_avail' variables to the
  // global Smarty object
  function assign_pixels_used_avail()
  {
    global $smarty;
    require_once('grid.class.php');
    $tbl = new Grid;
    $grids = $tbl->find_all();
    $pixels_avail = 0;
    $pixels_used = 0;
    foreach ($grids as $k => $grid) {
      $pixels_used += $grid->pixels_used;
      $pixels_avail += $grid->width * $grid->height - $grid->pixels_used;
    }
    $smarty->assign('pixels_avail', $pixels_avail);
    $smarty->assign('pixels_used', $pixels_used);
  }

  // returns true if CAPTCHA's are supported (FreeType support in PHP)
  function captchas_supported()
  {
    return function_exists('imagettftext');
  }

}

?>
