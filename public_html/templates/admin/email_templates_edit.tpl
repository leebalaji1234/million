{assign var="page_title" value="##Edit Email Template##"}
{assign var="scripts" value="/snippet.js"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form onSubmit="snippetSubmit(this); return true;"}
<table>

  <tr>
    <td class="label">##Template Name##:</td>
    <td>{$template->name|escape}</td>
  </tr>

  <tr>
    <td class="label">##Subject##:</td>
    <td>{snippet_textfield name=$template->snippet_key_subject() size="50"}</td>
  </tr>

  <tr valign="top">
    <td class="label">##Body##:</td>
    <td>{snippet_textarea name=$template->snippet_key_body() use_editor=$app->setting->html_email rows="12"}</td>
  </tr>

  <tr valign="top">
    <td class="label">##Parameters Available##:</td>
    <td>{$template->parameters|escape}</td>
  </tr>

</table>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input name="submit" type="submit" value="##Save##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
