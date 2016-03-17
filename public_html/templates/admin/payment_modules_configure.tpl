{assign var="page_title" value="##Configure Payment Module##"}
{assign var="scripts" value="/snippet.js"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<h2>{$module->name|escape}</h2>

{show_errors}
{start_form onSubmit="snippetSubmit(this); return true;"}
<p>
  <strong>##Display Order##</strong><br />
  ##The order in which to display this method when multiple payment methods are available##<br />
  <input name="display_order" value="{$smarty.request.display_order|escape}" size="5" />
</p>
{include file=$module->config_form()}
<input type="hidden" name="id" value="{$smarty.request.id|escape}" />
<input type="hidden" name="_saveconfig" value="1" />
<p><input type="submit" value="##Save Changes##" /></p>
{end_form}

{include file="admin/footer.inc.tpl"}
