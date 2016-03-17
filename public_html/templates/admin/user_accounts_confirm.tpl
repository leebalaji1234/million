{assign var="page_title" value="##Delete User Account##"}
{include file="admin/header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

{start_form}
<p>
  <strong>##WARNING!##</strong> ##Deleting a user account will permanently remove it from the database.##
</p>
<p>
  <input type="checkbox" name="confirm" value="confirm" /> ##Yes, I want to delete the user account of## {$user->first_name|escape} {$user->last_name|escape}.
</p>
<p>
  ##What should be done with the user's regions, if any?##<br/>
  {html_yesno name='delete_regions' yes='##Delete them##' no='##Assign them to administrator##'}
</p>
<p>
  <input type="hidden" name="id" value="{$smarty.request.id|escape}" />
  <input type="hidden" name="action" value="{$smarty.request.action|escape}" />
  <input name="submit_button" type="submit" value="##Delete##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
