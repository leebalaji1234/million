{assign var="page_title" value="##Clear Cache##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Smarty integration##</p>

##Smarty root path:## <input type="text" name="options[smarty_root_path]" value="{$smarty.request.setting.smarty_root_path}">
##Smarty URL:## <input type="text" name="options[smarty_url]" value="{$smarty.request.setting.smarty_url}">
{start_form}
  <input type="submit" value="##Save##" />
{end_form}

{include file="admin/footer.inc.tpl"}
