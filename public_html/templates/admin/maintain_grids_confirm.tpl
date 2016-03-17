{assign var="page_title" value="##Delete Grid##"}
{include file="admin/header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

{start_form}
<p>
  <strong>##WARNING!##</strong> ##Deleting a grid will delete <strong>ALL</strong> associated regions for that grid from the database.##
</p>
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to delete grid## '{$grid->name|escape}' ##and all its associated regions##
</p>
<p>
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="delete" value="true" />
  <input name="submit_button" type="submit" value="##Delete##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
