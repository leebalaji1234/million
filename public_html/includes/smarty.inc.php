<?php

// smarty.inc.php
// create global $smarty object

// globals used:
//   $lang

require_once('Smarty.class.php');

// initialize smarty object.
$smarty = new Smarty;
$smarty->template_dir = SMARTY_TEMPLATE_DIR;
$smarty->compile_dir = SMARTY_COMPILE_DIR;
$smarty->cache_dir = SMARTY_CACHE_DIR;
if (isset($_GET['SMARTY_DEBUG'])) $smarty->debugging = true;

//smarty language fix
$language_id = (empty($_GET['lang']) ? (empty($_COOKIE['mp_language']) ? DEFAULT_LANGUAGE : $_COOKIE['mp_language']) : $_GET['lang']);

$smarty->compile_id = $language_id;

//caching
$dirname = array_pop(explode('/', dirname($_SERVER["PHP_SELF"])));
$filename = basename($_SERVER["PHP_SELF"]);

//variables initiation
if (!isset($_SESSION['magnify'])){
	$_SESSION['magnify'] = 0;
}


//track cache session data
if (isset($_SESSION['flash']) && isset($_SESSION['flash']))
	$session_suffix = md5($_SESSION['flash']);
else
	$session_suffix = 0;

//hangle lang change
if (!isset($_COOKIE['mp_language'])){
  setcookie('mp_language', DEFAULT_LANGUAGE);
} elseif (isset($_REQUEST['lang']) && $_COOKIE['mp_language'] != $_REQUEST['lang']){
  setcookie('mp_language', $_REQUEST['lang']);
}

if (isset($_SESSION['user_id'])){
	$cache_id = $_COOKIE['mp_language'].'_'.$_SESSION['user_id'];
} elseif (isset($_COOKIE['mp_language'])) {
	$cache_id = $_COOKIE['mp_language'];
} else {
	$cache_id = DEFAULT_LANGUAGE;
}

//xdebug_var_dump($cache_id, $_COOKIE['mp_language']);

$excluded_files = array(
	'signup_confirm.php',
	'autorizenet_return.php',
	'renew.php',
	'retrieve_password.php',
	'secpay_return.php',
	'update.php'
);

if ($dirname == 'admin' || $dirname == 'install' ||  in_array($filename, $excluded_files))
	$smarty->caching = 0;
else {
	$smarty->caching = true;
	$smarty->compile_check = true;
	
	switch ($filename) {
		case 'index.php':
			if (!isset($_REQUEST['magnify'])
			&& !isset($_REQUEST['r']) 
			&& $smarty->is_cached('index.tpl', 'index|'.(int)$_SESSION['magnify'].'|'.(int)$grid.'|'.$cache_id)){
				$smarty->display('index.tpl', 'index|'.(int)$_SESSION['magnify'].'|'.(int)$grid.'|'.$cache_id);
				exit;
			}
			break;

		case 'show_image.php':
			if (isset($_REQUEST['rid'])
  			&& (int)$_REQUEST['rid'] > 0 
        && $smarty->is_cached('show_image.tpl', 'show_image|'.(int)$_REQUEST['rid'])) {
        header('Content-Type: image/png');
				$smarty->display('show_image.tpl', 'show_image|'.(int)$_REQUEST['rid']);
				exit;
			}
			break;
	
		case 'get_pixels.php':
			$cache_step = (isset($_REQUEST['step']) ? ((int)$_REQUEST['step']) : 0 );
			switch ($cache_step){
				case '0':
					if ($smarty->is_cached('get_pixels.tpl', 'get_pixels|'.$cache_step.'|'.$cache_id)){
						$smarty->display('get_pixels.tpl', 'get_pixels|'.$cache_step.'|'.$cache_id);
						exit;
					}
				break;
				
				case '1': 
					if ($smarty->is_cached('get_pixels_region.tpl', 'get_pixels|'.$cache_id)){
						$smarty->display('get_pixels_region.tpl', 'get_pixels|'.$cache_id);
						exit;
					}
				break;

				default:
					$smarty->caching = 0;			
			}
		break;
	
		case 'login.php':
			if (!count($_POST) && $smarty->is_cached('login.tpl', 'login|'.$cache_id)){
        $_REQUEST['email'] = @$_SESSION['email'];
        if (!isset($_REQUEST['email']) || empty($_REQUEST['email'])) $_REQUEST['email'] = '';
				$smarty->display('login.tpl', 'login|'.$cache_id);
				exit;
			}
		break;
	
		case 'signup.php':
			if (!count($_POST) && $smarty->is_cached('signup.tpl', 'signup|'.$cache_id)){
				$smarty->display('signup.tpl', 'signup|'.$cache_id);
				exit;
			}
		break;
		
		case 'rss.php':
			if ($smarty->is_cached('rss.tpl', 'rss|'.$cache_id)){
				$smarty->display('rss.tpl', 'rss|'.$cache_id);
				exit;
			}
		break;
		
		case 'rss_top_pixels.php':
			if ($smarty->is_cached('rss_top_pixels.tpl', 'index|pixels|top|'.$cache_id)){
				$smarty->display('rss_top_pixels.tpl', 'index|pixels|top|'.$cache_id);
				exit;
			}
		break;
		
		case 'rss_latest_pixels.php':
			if ($smarty->is_cached('rss_latest_pixels.tpl', 'index|pixels|lates|'.$cache_id)){
				$smarty->display('rss_latest_pixels.tpl', 'index|pixels|lates|'.$cache_id);
				exit;
			}
		break;
	
		case 'rss_blog_articles.php':
			if ($smarty->is_cached('rss_blog_articles.tpl', 'blog|rss|'.$cache_id)){
				$smarty->display('rss_blog_articles.tpl', 'blog|rss|'.$cache_id);
				exit;
			}
		break;
		
		case 'blog.php':
			$month =& $_REQUEST['month'];
			if ($smarty->is_cached('blog.tpl', 'blog|'.$month.'|'.$cache_id)){
				$smarty->display('blog.tpl', 'blog|'.$month.'|'.$cache_id);
				exit;
			}
		break;
		
		case 'blog_article.php':
			if (!count($_POST) && $smarty->is_cached('blog_article.tpl', 'blog|'.(int)$_REQUEST['id'].'|'.$cache_id)){
				$smarty->display('blog_article.tpl', 'blog|'.(int)$_REQUEST['id'].'|'.$cache_id);
				exit;
			}
		break;
		
		case 'pixel_list.php':
			if ($smarty->is_cached('pixel_list.tpl', "index|search|$q|$o|$a|".$cache_id)){
				$smarty->display('pixel_list.tpl', "index|search|$q|$o|$a|".$cache_id);
				exit;
			}
		break;
		
		case 'tell_a_friend.php':
			if (count($_POST) < 3 && $smarty->is_cached('tell_a_friend.tpl', 'tell_a_friend|'.$session_suffix.'|'.$cache_id)){
				$smarty->display('tell_a_friend.tpl', 'tell_a_friend|'.$session_suffix.'|'.$cache_id);
				exit;
			}
		break;

		case 'link_to_us.php':
			if ($smarty->is_cached('link_to_us.tpl', 'link_to_us|'.$cache_id)){
				$smarty->display('link_to_us.tpl', 'link_to_us|'.$cache_id);
				exit;
			}
		break;
			
		case 'account.php':
			if (!count($_POST) && $smarty->is_cached('account.tpl', 'account|'.$cache_id)){
				$smarty->display('account.tpl', 'account|'.$cache_id);
				exit;
			}
		break;
		
		case 'account_details.php':
			if (!count($_POST) && $smarty->is_cached('account_details.tpl', 'account|'.$cache_id)){
				$smarty->display('account_details.tpl', 'account|'.$cache_id);
				exit;
			}
		break;

	}
}
	
// set absolute plugins dirs (custom, then standard) for performance
$smarty->plugins_dir = array(
  INCLUDES_DIR . 'plugins',
  SMARTY_DIR . 'plugins'
);

// setup smarty to handle language-specific texts
$smarty->compile_id = DEFAULT_LANGUAGE;
$smarty->register_prefilter('_prefilter_language_translate');

// prefilter for smarty templates to translate embedded multi-language
// strings.
function _prefilter_language_translate($source, &$smarty) 
{
  global $lang;
  return $lang->language_translate($source);
}

?>
