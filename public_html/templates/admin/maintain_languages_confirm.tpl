{assign var="page_title" value="##Delete Language##"}
{include file="admin/header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

{start_form}
<p>
  <strong>##WARNING!##</strong> ##Deleting a language will delete <strong>ALL</strong> associated texts for that language from the database.##
</p>
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to delete language## '{$smarty.request.code}' ##and all its associated texts##
</p>
<p>
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="code" value="{$smarty.request.code|escape}" />
  <input name="submit" type="submit" value="##Delete##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
