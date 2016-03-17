<?php

require_once('admin_config.php');
require_once('language_text.class.php');

$dirs = array(
  PACKAGE_ROOT,
  PACKAGE_ROOT . 'admin/',
  INCLUDES_DIR,
  INCLUDES_DIR . 'plugins/',
  SMARTY_TEMPLATE_DIR,
  SMARTY_TEMPLATE_DIR . 'admin/',
  SMARTY_TEMPLATE_DIR . 'admin/payment/',
  SMARTY_TEMPLATE_DIR . 'payment/',
);

if ($app->is_post()) {
	$smarty->clear_all_cache();

  @set_time_limit(300);

  // scan each directory and grab .tpl, .php files
  // extract unique text strings to an array
  $files = 0;
  $texts = array();
  foreach ($dirs as $k => $dir) {
    $dh = opendir($dir);
    while (($file = readdir($dh)) !== false) {
      $path = "$dir$file";
      if (is_file($path) && preg_match('/\.(php|tpl)$/', $path)) {
        $body = implode('', file($path));

        // sanity check: if the file contains an odd number of double-hash
        // pairs, there is a problem.
        $n = substr_count($body, '#' . '#');
        if ($n % 2 == 1)
          $app->abort('There is an odd number of #', '# pairs in the file ', $path, '. Please check the file and correct the problem before proceeding.');
        preg_match_all('/\x23\x23\s*(.*?)\s*\x23\x23/s', $body, $matches);
        $texts = array_merge($texts, $matches[1]);
        $files++;
      }
    }
  }

  // fetch the default language id
  $id = $lang->language_id(DEFAULT_LANGUAGE);

  // store each text if it isn't already there
  $texts = array_unique($texts);
  $t = new Language_Text;
  foreach ($texts as $k => $text) {
    $digest = $lang->digest($text);
    $row = $t->find('where language_id=? and digest=?', array($id, $digest));
    if (is_null($row->id())) {
      $row->language_id = $id;
      $row->digest = $digest;
    }
    $row->language_text = $text;
    $row->save();
  }

  // show results
  $smarty->assign('files', $files);
  $smarty->assign('texts', count($texts));
  $smarty->display('admin/update_language_texts_complete.tpl');
  exit;
}

$smarty->assign('dirs', $dirs);
$smarty->display('admin/update_language_texts.tpl');

?>
