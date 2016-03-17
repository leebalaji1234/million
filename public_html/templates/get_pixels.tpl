{assign var="page_title" value="##Get Pixels##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{section name=grid loop=$grids}
  <h2>{snippet|escape name="grid_title" seq=$grids[grid]->id}</h2>
  <div>{snippet name="grid_description" seq=$grids[grid]->id}</div>
  {if $grids[grid]->allow_free_paid == 'true' && $grids[grid]->pixel_price > 0}
    <p>##Price:## ##Free## ##for blocls with square less than## {$grids[grid]->free_square} ##pixels##
 ##and## {$app->setting->currency_symbol}{$grids[grid]->pixel_price|number_format:2|escape} ##per## {$grids[grid]->selectable_square_size|escape} x {$grids[grid]->selectable_square_size|escape} ##pixel block## ({$app->setting->currency_symbol}{$grids[grid]->single_pixel_price_formatted()|escape} ##per pixel##) ##for regions contain more than## {$grids[grid]->free_square} pixels
  {start_form}
  <p>
	<input type="hidden" name="free_paid" value="paid">
  	<input type="hidden" name="step" value="{$step|escape}" />
	<input type="hidden" name="grid_id" value="{$grids[grid]->id|escape}" />
	<input type="submit" name="choose" value="{snippet|escape name="grid_buy_button" seq=$grids[grid]->id default="##Buy Pixels##"}" /> <small>##Click below to purchase pixels##</small>
  </p>
  {end_form}
  {start_form}
  <p>
	<input type="hidden" name="free_paid" value="free">
  	<input type="hidden" name="step" value="{$step|escape}" />
	<input type="hidden" name="grid_id" value="{$grids[grid]->id|escape}" />
	<input type="submit" name="choose" value="{snippet|escape name="grid_get_free_button" seq=$grids[grid]->id default="##Get Free Pixels##"}" /> <small>Click below to get free pixels. You may choose up to {$grids[grid]->free_square} free pixels. </small>
  </p>
  {end_form}
  </p>
  {else}
     {start_form}
  	<input type="hidden" name="step" value="{$step|escape}" />
	<input type="hidden" name="grid_id" value="{$grids[grid]->id|escape}" />
    {if $grids[grid]->pixel_price == 0}
    <p>##Price:## ##Free##</p>
    {else}
    <p>##Price:## {$app->setting->currency_symbol}{$grids[grid]->pixel_price|number_format:2|escape} ##per## {$grids[grid]->selectable_square_size|escape} x {$grids[grid]->selectable_square_size|escape} ##pixel block## ({$app->setting->currency_symbol}{$grids[grid]->single_pixel_price_formatted()|escape} ##per pixel##)</p>
    {/if}
  <p><input type="submit" value="{if $grids[grid]->pixel_price == 0}##Get Now >>##{else}{snippet|escape name="grid_buy_button" seq=$grids[grid]->id default="##Buy Now >>##"}{/if}" /></p>
  {end_form}
  {/if}
{/section}

{include file="footer.inc.tpl"}
