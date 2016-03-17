{assign var="page_title" value="##Create Region##"}
{assign var="scripts" value=','|explode:'/gr.js,/rubberband.js,/Dom.js'}
{assign var="body_attr" value="onload=\"moveCanvas('grid')\""}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function allows you to create a region on one of your grids.  The
region will initially be "Reserved", but you may change its status and other
parameters after creating it.##</p>

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

{show_errors}
{start_form}
<p>##Click and drag your mouse to select a region of pixels.##&nbsp;&nbsp;<input type="submit" value="##Create Region##" />
</p>
<p>##Selected##: <strong><span id="selection">(##none##)</span></strong></p>
<input type="hidden" name="grid_id" value="{$grid->id|escape}" />
<input type="hidden" name="x" value="0" />
<input type="hidden" name="y" value="0" />
<input type="hidden" name="w" value="0" />
<input type="hidden" name="h" value="0" />
<input type="hidden" name="selectable_square_size" value="{$grid->selectable_square_size}" />
<input type="hidden" name="pixels_text" value="##pixels##" />
{end_form}

<div id="grid" style="width: {$grid->width|escape}px; height: {$grid->height|escape}px;">
<div id="canvas" style="background-image: url('{$grid->url(true)|escape}'); position: absolute; left: 0; top: 0; width: {$grid->width|escape}px; height: {$grid->height|escape}px; overflow: hidden; visibility: hidden;" onMouseDown="startLine();" onMouseUp="stopLine();"></div>
</div>

{include file="admin/footer.inc.tpl"}