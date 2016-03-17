<?php

// lang.class.php
// multi-language support
//
// global variables used:
//   $app
//   $db
//   $smarty
//
// global constants used:
//   LANGUAGE_COOKIE_NAME

require_once('app.inc.php');
require_once('smarty.inc.php');
require_once('language.class.php');
require_once('language_text.class.php');

class Lang {
  var $code = DEFAULT_LANGUAGE;       // current language code

  // compute a digest for a text string. to handle innocuous reformatting
  // changes and DOS/UNIX line ending variations, the string is 'canonicalized'
  // using the following process:
  // * leading whitespace removed
  // * trailing whitespace removed
  // * all sequences of one or more internal whitespace chars are converted
  //   to a single space
  function digest($text) {
    $s = preg_replace('/^\s+/', '', $text);
    $s = preg_replace('/\s+$/', '', $s);
    $s = preg_replace('/\s+/', ' ', $s);
/*
if ($s != $text) {
  echo '<pre>';
  print_r(array('text='=>$text, 'md5(text)='=>md5($text), 's='=>$s, 'md5(s)='=>md5($s)));
  exit;
}
*/
    return md5($s);
  }

  // retrieve language_id for a language code, or NULL if the code cannot be
  // found.
  function language_id($code) {
    global $app, $db;

    $t = new Language;
    $row = $t->find('where code=?', array($code));
    return $row->id();
  }

  // translates any embedded strings surrounded by double-# pairs,
  // according to current language
  function language_translate($text)
  {
    // (\x23 is '#' char)
    return preg_replace_callback('/\x23\x23(.+?)\x23\x23/s', 
      create_function('$m', 'return $GLOBALS["lang"]->language_text($m[1]);'), 
      $text
    );
  }

  // given a text string in DEFAULT_LANGUAGE, return translated string for
  // requested language, or current language if none specified.
  function language_text($text, $code = false)
  {
    global $app;

    // get language from session if none specified
    if ($code === false) $code = $this->code;

    // as a shortcut, we don't try to translate if current
    // language is DEFAULT_LANGUAGE
    if ($code != DEFAULT_LANGUAGE) {

      // compute a digest from the text and try to fetch the translation
      // based on the digest.
      $digest = $this->digest($text);
      $tbl = new Language_Text;
      $row = $tbl->find('where language_id=? and digest=?', array($this->language_id($code), $digest));
      if (!is_null($row->id()))
        return $row->language_text;

    }

    // either we are using default language, or a translation couldn't
    // be found. strip any text after first pipe char and return that.
    return preg_replace('/\|.*/', '', $text);

  }

  // set current language to value in $code if possible.
  // silently leaves lang unchanged if specified lang is invalid.
  // the language cookie is sent to the client if $setcookie
  // is true.
  function set_language($code, $setcookie = false)
  {
    global $smarty;
    $tbl = new Language;
    $row = $tbl->find('where code=?', array($code));
    if (!is_null($row->id())) {
      $this->code = $row->code;
      $this->decimal_point = str_replace('?', ' ', $row->decimal_point);
      $this->thousands_separator = str_replace('?', ' ', $row->thousands_separator);
      $smarty->compile_id = $this->code;
      if ($setcookie)
        setcookie(LANGUAGE_COOKIE_NAME, $this->code, time() + 86400 * 3650, str_replace('%2F', '/', rawurlencode(DOC_ROOT)));
    }
  }

  // return an array of all languages, as objects, with
  // optional order clause
  function all_languages($order = false)
  {
    global $app;

    // default order will be by name, with default language
    // at top
    $tbl = new Language;
    if ($order === false)
      $order = 'code <> ' . $tbl->_quote(DEFAULT_LANGUAGE) . ', name';
    return $tbl->find_all("order by $order");
  }

  // export language texts for a language to an XML file. if
  // $all is false, only texts in the default language that do
  // not exist in the specified language are exported. Otherwise
  // all texts are exported.
  function export_language_texts($id, $path, $all = false)
  {
    global $app, $db;

    $tbl = new Language;
    $row = $tbl->get($id);
    $default_id = $this->language_id(DEFAULT_LANGUAGE);

    // fetch all the default texts
    $tbl = new Language_Text;
    $rows = $tbl->find_all('where language_id=? order by language_text', array($default_id));

    // start the XML document
    $fh = @fopen($path, 'wb');
    if (!$fh)
      $app->abort("##Unable to create## '$path'");
    @fwrite($fh, '<?xml version="1.0" encoding="utf-8"?>' . "\n");
    @fwrite($fh, '<language code="' . htmlspecialchars($row->code) . '" name="' . htmlspecialchars($row->name) . '" decimal_sep="' . htmlspecialchars($row->decimal_point) . '" thousand_sep="' . htmlspecialchars($row->thousands_separator) . '">' . "\n");

    // loop through the default language texts
    foreach ($rows as $k => $default) {
      $app->check_db_error($default);

      // get the corresponding foreign language text
      $foreign = $tbl->find('where language_id=? and digest=?', array($id, $default->digest));
      $foreign_text = @$foreign->language_text;

      // skip already translated texts unless we're exporting all
      if (!is_null($foreign_text) && !$all) continue;

      // if we don't have a translation, put the default text into
      // an XML comment
      if (is_null($foreign_text))
        $foreign_text = '<!--' . htmlspecialchars($default->language_text) . '-->';
      else
        $foreign_text = htmlspecialchars($foreign_text);

      // write the element
      @fwrite($fh, '  <text digest="' . htmlspecialchars($default->digest) . '">' . $foreign_text . '</text>' . "\n");
    }

    // close the XML document
    @fwrite($fh, '</language>' . "\n");
    fclose($fh);
  }

  // import language texts from specified XML file
  function import_language_texts($id, $path)
  {
    global $app;

    // get the language details and open the file
    $row = new Language;
    $row = $row->get($id);
    if ($row->code == DEFAULT_LANGUAGE)
      $app->abort("The default language cannot be imported");
    $fh = @fopen($path, 'rb');
    if (!$fh)
      $app->abort("##Unable to open## '$path'");

    // setup stream parser
    $xml = xml_parser_create('UTF-8');
    xml_parser_set_option($xml, XML_OPTION_CASE_FOLDING, false);
    xml_parser_set_option($xml, XML_OPTION_TARGET_ENCODING, 'UTF-8');
    $obj = new LangImportHandler;
    $obj->language_id = $id;
    xml_set_object($xml, $obj);
    xml_set_element_handler($xml, 'start_element', 'end_element');
    xml_set_character_data_handler($xml, 'character_data');

    // parse the document in chunks
    while ($data = fread($fh, 4096)) {
      xml_parse($xml, $data, feof($fh))
        or $app->abort("##XML Parsing Error in## '", $path, "': ", xml_error_string(xml_get_error_code($xml)), ' ##Line##:', xml_get_current_line_number($xml), ' ##Column##:', xml_get_current_column_number($xml), '. ##Not all texts were imported##.');
    }
    @fclose($fh);

    // free the parser
    xml_parser_free($xml);

    // report any application errors during parsing
    if (!empty($app->errors))
      $app->abort(implode(' ', $app->errors));
  }

}

// class to receive SAX events while importing language texts
class LangImportHandler
{
  var $language_id;
  var $digest;
  var $text;

  function start_element($parser, $tag, $attr)
  {
    global $app;
    if ($tag == 'language') {
      unset($this->digest);
      unset($this->text);

      // when <language> tag is seen, check the code="xx" value
      $this->code = $attr['code'];
      $tbl = new Language;
      $language = $tbl->find('where code=?', array($this->code));
      if (is_null($language->id()) || $language->id() != $this->language_id)
        $app->error('&lt;language&gt; ##element does not match requested language to import##');
      else {
        // update language attributes if present in XML
        if (isset($attr['name']))
          $language->name = $attr['name'];
        if (isset($attr['decimal_sep']))
          $language->decimal_point = $attr['decimal_sep'];
        if (isset($attr['thousand_sep']))
          $language->thousands_separator = $attr['thousand_sep'];
        $language->save();
      }
    }
    if (!empty($app->errors)) return;
    if ($tag != 'text') return;
    $this->digest = $attr['digest'];
    $this->text = '';
  }

  function end_element($parser, $tag)
  {
    global $app, $db;
    if (!empty($app->errors)) return;
    if ($tag != 'text') return;
    $this->text = trim($this->text);
    if (!empty($this->text)) {
      $tbl = new Language_Text;
      $row = $tbl->find('where language_id=? and digest=?', array($this->language_id, $this->digest));
      if (is_null($row->id())) {
        $row->language_id = $this->language_id;
        $row->digest = $this->digest;
      }
      $row->language_text = $this->text;
      $row->save();
    }
    unset($this->digest);
    unset($this->text);
  }

  function character_data($parser, $data)
  {
    if (!isset($this->digest)) return;
    $this->text .= $data;
  }

}

?>
