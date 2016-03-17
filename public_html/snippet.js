/***
 *
 * snippet.js
 * helper functions for snippet editing
 *
 ***/

// switches edit field contents when language is changed
function snippetSelect(basename, form, focus)
{
  var _select = form.elements[basename + '[_select]'];
  var _code = form.elements[basename + '[_code]'];
  var _text = form.elements[basename + '[_text]'];

  // if the field is linked to an FCKeditor get the editor contents
  var oEditor;
  try { oEditor = FCKeditorAPI.GetInstance(basename + '[_text]'); }
  catch(e) {}
  if (oEditor)
    oEditor.UpdateLinkedField();

  // switch texts and language
  var lang_from = _code.value;
  var lang_to = _select.value;
  var text_from = form.elements[basename + '[' + lang_from + ']'];
  var text_to = form.elements[basename + '[' + lang_to + ']'];
  text_from.value = _text.value;
  _text.value = text_to.value;
  _code.value = lang_to;

  // if the field is linked to an FCKeditor, update the editor contents
  if (oEditor) {
    oEditor.SetHTML(oEditor.LinkedField.value);
    oEditor.ResetIsDirty();
  }

  if (focus)
    _text.focus();
}

// when form is submitted, update all the snippet editors
function snippetSubmit(form)
{
  for (var i = 0; i < form.elements.length; i++) {
    var m = form.elements[i].name.match(/(_snippets\[.*?\])\[_select]/);
    if (m)
      snippetSelect(m[1], form, false);
  }
}
