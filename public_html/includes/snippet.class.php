<?php

// snippet.class.php
// ORM model for snippets table

require_once('model.class.php');
require_once('lang.inc.php');

class Snippet extends Model
{

  // class functions

  // creates a snippet row with text for default language if one
  // does not already exist
  function initialize($snippet_key, $snippet_seq = 0, $default = '')
  {
    global $lang;
    $tbl = new Snippet;
    $default_id = $lang->language_id(DEFAULT_LANGUAGE);
    $snippet = $tbl->find('where snippet_key=? and snippet_seq=? and language_id=?', array($snippet_key, $snippet_seq, $default_id));
    if ($snippet->_new_row) {
      $snippet->snippet_key = $snippet_key;
      $snippet->snippet_seq = $snippet_seq;
      $snippet->language_id = $default_id;
      $snippet->snippet_text = $default;
      $snippet->save();
    }
  }

  // return snippet text for given key. if $language is omitted, defaults
  // to current language. if no text for current language is found, text
  // for default language is used. if neither is found, $default is used.
  function snippet_text($snippet_key, $snippet_seq = 0, $default = '', $language = false)
  {
    global $app, $lang;
    if (empty($language))
      $language = $lang->code;
    $language_id = $lang->language_id($language);
    if (empty($language_id))
      $app->abort(sprintf('##Snippet::snippet: invalid language code## "%s"'), $langauge);
    $tbl = new Snippet;
    $snippet = $tbl->find('where snippet_key=? and snippet_seq=? and language_id=?', array($snippet_key, $snippet_seq, $language_id));
    if (is_null($snippet->id())) {
      if ($language != DEFAULT_LANGUAGE)
        return Snippet::snippet_text($snippet_key, $snippet_seq, $default, DEFAULT_LANGUAGE);
      return $default;
    }
    return $snippet->snippet_text;
  }

  // populates request variables for snippet content. $default
  // is used for the DEFAULT_LANGUAGE content if no row is present
  function get_to_request($snippet_key, $snippet_seq = 0, $default = '') {
    global $lang;
    $langs = $lang->all_languages();
    $req =& $_REQUEST['_snippets'][$snippet_key];
    $tbl = new Snippet;

    foreach ($langs as $l) {
      $snippet = $tbl->find('where snippet_key=? and snippet_seq=? and language_id=?', array($snippet_key, $snippet_seq, $l->id()));
      if (!is_null($snippet->id())) {
        $text = $snippet->snippet_text;
      }
      elseif ($l->code == DEFAULT_LANGUAGE)
        $text = $default;
      else
        $text = '';
      $req[$l->code] = $text;
    }
  }

  // given a snippet key, returns true if the request value is
  // empty for the given language
  function is_request_empty($snippet_key, $code = DEFAULT_LANGUAGE)
  {
    $req =& $_REQUEST['_snippets'][$snippet_key];
    return empty($req[$code]);
  }

  // stores snippet texts from request variables.
  function save_from_request($snippet_key, $snippet_seq = 0, $is_internal = false)
  {
    global $lang;

    $langs = $lang->all_languages();
    $req =& $_REQUEST['_snippets'][$snippet_key];
    $tbl = new Snippet;

    foreach ($langs as $l) {
      $snippet = $tbl->find('where snippet_key=? and snippet_seq=? and language_id=?', array($snippet_key, $snippet_seq, $l->id()));
      if (!empty($req[$l->code])) {
        $snippet->snippet_key = $snippet_key;
        $snippet->snippet_seq = $snippet_seq;
        $snippet->language_id = $l->id();
        $snippet->snippet_text = @$req[$l->code];
        $snippet->is_internal = $is_internal;
        $snippet->save();
      }
      elseif (!$snippet->_new_row)
        $snippet->delete();
    }
  }

  // delete all snippet texts for a given key/seq
  function remove($snippet_key, $snippet_seq = 0)
  {
    $tbl = new Snippet;
    $tbl->delete_all('where snippet_key=? and snippet_seq=?', 
      array($snippet_key, $snippet_seq));
  }

  // returns HTML for a text field to edit given snippet,
  // taking all parameters from $_REQUEST
  function textfield_html($snippet_key, $params = array())
  {
    global $app, $lang;

    $langs = $lang->all_languages();
    $basename = htmlspecialchars("_snippets[$snippet_key]");
    $html = '';
    $req =& $_REQUEST['_snippets'][$snippet_key];

    // set default language for editing if necessary
    if (empty($req['_code']))
      $req['_code'] = $lang->code;

    // create hidden field for current language
    $html .= '<input type="hidden" name="' . $basename . '[_code]" value="' . htmlspecialchars($req['_code']) . '" />';

    // create hidden fields for each language
    foreach ($langs as $l) {
      $html .= '<input type="hidden" name="' . $basename . '[' . htmlspecialchars($l->code) . ']" value="' . htmlspecialchars(@$req[$l->code]) . '" />';
    }

    // start div to hold selector and text field
    $html .= '<div class="snippet">';

    // create text input field
    $html .= '<input name="' . $basename . '[_text]" value="' . htmlspecialchars(@$req[$req['_code']]) . '" ' . $app->array_to_attrs($params) . ' />';

    $html .= '&nbsp;';

    // create language selector
    $html .= '<select name="' . $basename . '[_select]" onchange="snippetSelect(\'' . $basename . '\', this.form, true)">';
    foreach ($langs as $l) {
      $html .= '<option value="' . htmlspecialchars($l->code) .  '"' .
        ($l->code == $req['_code'] ? ' selected="selected"' : '') .
        '>' . htmlspecialchars($l->name) . '</option>';
    }
    $html .= '</select>';

    // close div
    $html .= '</div>';

    return $html;
  }

  // returns HTML for a textarea to edit given snippet,
  // taking all parameters from $_REQUEST. if $use_editor is true,
  // FCKeditor will be used (if enabled by admin)
  function textarea_html($snippet_key, $params = array(), $use_editor = true)
  {
    global $app, $lang;

    $langs = $lang->all_languages();
    $basename = htmlspecialchars("_snippets[$snippet_key]");
    $html = '';
    $req =& $_REQUEST['_snippets'][$snippet_key];

    // set default language for editing if necessary
    if (empty($req['_code']))
      $req['_code'] = $lang->code;

    // create hidden field for current language
    $html .= '<input type="hidden" name="' . $basename . '[_code]" value="' . htmlspecialchars($req['_code']) . '" />';

    // create hidden fields for each language
    foreach ($langs as $l) {
      $html .= '<input type="hidden" name="' . $basename . '[' . htmlspecialchars($l->code) . ']" value="' . htmlspecialchars(@$req[$l->code]) . '" />';
    }

    // start div to hold selector and textarea
    $html .= '<div class="snippet">';

    // create language selector
    $html .= '<select name="' . $basename . '[_select]" onchange="snippetSelect(\'' . $basename . '\', this.form, true)" style="vertical-align:top">';
    foreach ($langs as $l) {
      $html .= '<option value="' . htmlspecialchars($l->code) .  '"' .
        ($l->code == $req['_code'] ? ' selected="selected"' : '') .
        '>' . htmlspecialchars($l->name) . '</option>';
    }
    $html .= '</select>';

    $html .= '<br />';

    if ($app->setting->use_fckeditor && $use_editor) {

      // create fckeditor field
      require_once('fckeditor.inc.php');
      $ed = new FCKeditor($basename . '[_text]');
      $ed->BasePath = DOC_ROOT . 'FCKeditor/';
      $ed->Config['LinkBrowserURL'] = $ed->BasePath . 'editor/filemanager/browser/default/browser.html?Connector=connectors/php/connector.php';
      $ed->Config['ImageBrowserURL'] = $ed->BasePath . 'editor/filemanager/browser/default/browser.html?Type=Image&Connector=connectors/php/connector.php';
      $ed->Config['FlashBrowserURL'] = $ed->BasePath . 'editor/filemanager/browser/default/browser.html?Type=Flash&Connector=connectors/php/connector.php';
      $ed->Value = @$req[$req['_code']];
      $ed->Height = 300;
      $html .= $ed->CreateHTML();

    }
    else {

      // create textarea field
      $html .= '<textarea name="' . $basename . '[_text]" ' . $app->array_to_attrs($params) . '>' .htmlspecialchars(@$req[$req['_code']]) . '</textarea>';

    }

    // close div
    $html .= '</div>';

    return $html;
  }

}

?>