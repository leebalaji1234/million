{assign var="page_title" value="##Delete Newsletter##"}
{include file="admin/header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

{start_form}
<p>
  <strong>##WARNING!##</strong> ##Deleting a newsletter will permanently remove it from the database.##
</p>
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to delete the newsletter## <strong>{snippet|escape name='newsletter_title' seq=$newsletter->id}</strong>
</p>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input name="submit_button" type="submit" value="##Delete##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
