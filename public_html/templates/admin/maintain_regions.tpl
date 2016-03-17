{assign var="page_title" value="##Maintain Regions##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function allows you to change a region's status or other
parameters##</p>

<p>##Select Grid##:
{section name=grid loop=$grids}
{if $grids[grid]->id == $grid->id}
<strong>{$grids[grid]->name|escape}</strong>
{else}
<a href="{url|escape}?grid_id={$grids[grid]->id|escape}">{$grids[grid]->name|escape}</a>
{/if}
{if !$smarty.section.grid.last} | {/if}
{/section}
</p>

<div>
  <map name="grid_{$grid->id}">{$map}</map>
  <img src="{$grid->url()|escape}" alt="" usemap="#grid_{$grid->id}" border="0" />
</div>

{include file="admin/footer.inc.tpl"}
