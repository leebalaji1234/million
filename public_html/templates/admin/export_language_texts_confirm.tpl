{assign var="page_title" value="##Export Language Texts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p><strong>##WARNING!##</strong> ##The export file## <tt>{$path|escape}</tt>
##already exists##.</p>

<p>##Do you wish to overwrite this file?##</p>

{start_form}
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to overite the file##
</p>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="type" value="{$smarty.request.type|escape}" />
  <input name="submit" type="submit" value="##Export Texts##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
