{assign var="page_title" value="##Maintain Languages##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##The following languages are available. Select a language to edit its
description or delete it.##</p>

<table class="grid">
  <tr>
    <th>##Language##</th>
  </tr>
  {section name="lang" loop=$all_langs}
  <tr>
    <td><a href="{$all_langs[lang]->url|escape}">{$all_langs[lang]->name|escape}</a>{if $all_langs[lang]->default} (Default){/if}</td>
  </tr>
  {/section}
</table>

<p><a href="{url}?action=new">##Add a Language##</a></p>

{include file="admin/footer.inc.tpl"}
