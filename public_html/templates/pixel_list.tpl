{assign var="page_title" value="##Pixel List##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{start_form method="get"}
<p>
<input name="q" size="30" value="{$smarty.request.q|escape}" />
{if isset($smarty.request.o)}<input type="hidden" name="o" value="{$smarty.request.o|escape}" />{/if}
{if isset($smarty.request.a)}<input type="hidden" name="a" value="{$smarty.request.a|escape}" />{/if}
<input type="submit" value="##Find##" />
</p>
{end_form}

<table class="grid">
  <tr>
    <th><a href="?o=1{if $smarty.request.o==1 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Date##</a></th>
    <th><a href="?o=2{if $smarty.request.o==2 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Site##</a></th>
    <th><a href="?o=3{if $smarty.request.o==3 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Pixels##</a></th>
    {if $app->setting->pixel_list_by_clicks}
    <th><a href="?o=4{if $smarty.request.o==4 && $smarty.request.a==0}&amp;a=1{/if}{if isset($smarty.request.q)}&amp;q={$smarty.request.q|escape}{/if}">##Clicks##</a></th>
    {/if}
    {if $app->setting->pixel_list_enable_images}
    <th>##Images##</th>
    {/if}
  </tr>
  {section name=region loop=$regions}
  <tr>
    <td>{$regions[region]->created_on|datetime_to_date|escape}</td>
    <td><a {$regions[region]->clickthrough_link()}>{$regions[region]->title()|escape}</a></td>
    <td style="text-align: right">{$regions[region]->width*$regions[region]->height|number_format|escape}</td>
    {if $app->setting->pixel_list_by_clicks}
    <td style="text-align: right">{$regions[region]->clicks|number_format|escape}</td>
    {/if}
    {if $app->setting->pixel_list_enable_images}
    <td><img src="show_image.php?rid={$regions[region]->id}" /></td>
    {/if}
  </tr>
  {/section}
</table>

{include file="footer.inc.tpl"}
