{assign var="page_title" value="##Newsletters##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Select a newsletter title to edit or delete a newsletter. Select the
"Copy" link to create a new newsletter by copying an existing one. Select
the "New Newsletter" link to create a new, blank newsletter.##</p>

<table class="grid">

  <tr>
    <th>##Date##</th>
    <th>##Title##</th>
    <th>&nbsp;</th>
  </tr>

  {foreach item=newsletter from=$newsletters}
  <tr>
    <td>{$newsletter->created_at|escape}</td>
    <td><a href="{url|escape href='/admin/newsletter.php'}?id={$newsletter->id|escape}">{snippet|escape name='newsletter_title' seq=$newsletter->id}</a></td>
    <td>[<a href="{url|escape href='/admin/newsletter.php'}?new=1&amp;id={$newsletter->id|escape}">##Copy##</a>]</td>
  </tr>
  {/foreach}

</table>

<p>
  <a href="{url|escape href='/admin/newsletter.php'}?new=1">##New Newsletter##</a>
</p>

{include file="admin/footer.inc.tpl"}
