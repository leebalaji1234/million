{assign var="page_title" value="##Email Templates##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<table class="grid">
  <tr>
    <th>Template</th>
  </tr>
  {foreach item="template" from=$templates}
  <tr>
    <td><a href="{url|escape}?id={$template->id|escape}">{$template->name|escape}</a></td>
  </tr>
  {/foreach}
</table>

{include file="admin/footer.inc.tpl"}
