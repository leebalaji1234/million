{assign var="page_title" value="##Delete Region##"}
{include file="admin/header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

{start_form}
<p>
  <strong>##WARNING!##</strong> ##Deleting a region will permanently remove it from the database.##
</p>
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to delete this region.##
</p>
<p>
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input name="submit_button" type="submit" value="##Delete##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
