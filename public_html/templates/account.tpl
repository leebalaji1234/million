{assign var="page_title" value="##Account##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<h2>##Your Pixels##</h2>

<blockquote>

<p>##Click on a site to update your pixels##</p>

<table class="grid">
  <tr>
    <th><a href="?o=1{if $smarty.request.o==1 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Date##</a></th>
    <th><a href="?o=2{if $smarty.request.o==2 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Site##</a></th>
    <th><a href="?o=3{if $smarty.request.o==3 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Pixels##</a></th>
  </tr>
  {section name=region loop=$regions}
  <tr>
    <td>{$regions[region]->created_on|datetime_to_date|escape}</td>
    <td><a href="{url|escape href='/update.php'}?id={$regions[region]->id|escape}">{$regions[region]->title()|escape}</a></td>
    <td style="text-align: right">{$regions[region]->width*$regions[region]->height|number_format|escape}</td>
  </tr>
  {/section}
</table>

</blockquote>

<h2>##Your Details##</h2>

<blockquote>

<table>

  <tr>
    <td class="label">##E-Mail Address##:</td>
    <td>{$user->email|escape}</td>
  </tr>

</table>
<p>
  <a href="{url|escape href='/account_details.php'}">##Edit Your Details##</a>
</p>

</blockquote>

{include file="footer.inc.tpl"}
