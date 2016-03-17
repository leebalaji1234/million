{assign var="meta_description" value=$app->setting->site_description}
{if $smarty.session.magnify}{assign var="scripts" value='/tjpzoom.js'}{/if}
{include file='header.inc.tpl'}

<div style="padding-bottom: 5px">
{if $links}
{foreach item=link from=$links}
{$link}&nbsp;&nbsp;&nbsp;
{/foreach}
{/if}
##Pixels Sold##: {$pixels_used|number_format|escape} ##Available##: {$pixels_avail|number_format|escape}&nbsp;&nbsp;{if $smarty.session.magnify}<a href="index.php?magnify=0{if $smarty.request.grid>1}&amp;grid={$smarty.request.grid|escape}{/if}">##Magnifier Off##</a>{else}<a href="index.php?magnify=1{if $smarty.request.grid>1}&amp;grid={$smarty.request.grid|escape}{/if}">##Magnifier On##</a>{/if}</div>
  
<table cellspacing="0" cellpadding="0">
{foreach item=grids from=$rows}
<tr>
{foreach item=grid from=$grids}
<td>{if !$smarty.session.magnify}<map name="grid_{$grid->id}">{$grid->map()}</map>{/if}<div style="float: left"{if $smarty.session.magnify} onmouseover="zoom_on(event,{$grid->width|escape},{$grid->height|escape},'{$grid->url()|escape}');" onmousemove="zoom_move(event);" onmouseout="zoom_off();"{/if}><img src="{$grid->url()|escape}" usemap="#grid_{$grid->id}" width="{$grid->width|escape}" height="{$grid->height|escape}" alt="" border="0" /></div><div style="clear: both"></div></td>
{/foreach}
</tr>
{/foreach}
</table>

<br />
<div align="center"><a target="_blank" style="font-size:10px;color:#999999;font-family: Arial;" href="http://www.tufat.com/millionpixelscript.php">Powered by GPix</a></div>


{include file='wz_tooltip.inc.tpl'}
{include file='footer.inc.tpl'}
