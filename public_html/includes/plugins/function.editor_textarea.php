<?php

// smarty plugin: {editor_textarea name="field" [use_editor=true|false] ...}
// creates a text area, using editor if admin setting is enabled; otherwise,
// using simple textarea element
// parameters except for name and use_editor are added to the input textarea.

function smarty_function_editor_textarea($params, &$smarty)
{
  global $app;
  if (empty($params['name'])) {
    $smarty->trigger_error('snippet_textarea: missing name parameter');
    return;
  }
  if (!isset($params['use_editor']))
    $params['use_editor'] = $app->setting->use_fckeditor;
  $name = $params['name'];
  unset($params['name']);
  $use_editor = $params['use_editor'];
  unset($params['use_editor']);

  if ($app->setting->use_fckeditor && $use_editor) {

    // create fckeditor field
    require_once('fckeditor.inc.php');
    $ed = new FCKeditor($name);
    $ed->BasePath = DOC_ROOT . 'FCKeditor/';
    $ed->Config['LinkBrowserURL'] = $ed->BasePath . 'editor/filemanager/browser/default/browser.html?Connector=connectors/php/connector.php';
    $ed->Config['ImageBrowserURL'] = $ed->BasePath . 'editor/filemanager/browser/default/browser.html?Type=Image&Connector=connectors/php/connector.php';
    $ed->Config['FlashBrowserURL'] = $ed->BasePath . 'editor/filemanager/browser/default/browser.html?Type=Flash&Connector=connectors/php/connector.php';
    $ed->Value = @$_REQUEST[$name];
    $ed->Height = 300;
    $html = $ed->CreateHTML();

  }
  else {

    // create textarea field
    $params = array_merge(array('rows' => '8', 'style' => 'width: 100%'), $params);
    $html = '<textarea name="' . htmlspecialchars($name) . '" ' . $app->array_to_attrs($params) . '>' .htmlspecialchars(@$_REQUEST[$name]) . '</textarea>';

  }

  return $html;

}

?>
