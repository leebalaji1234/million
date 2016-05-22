{assign var="page_title" value="##Become a Sponsor##"}
{include file="header.inc.tpl"}
<div class="section">
  <div class="container">
      <!-- tile bar starts -->
      <!-- <div class="row">
          <div class="col-md-12">
             
            <h2 class="text-center text-primary">{$page_title|escape} <i class="fa mark-o fa-exclamation"></i></h2>
            <hr />
          </div>
        </div>  -->
        
      <!-- title bar ends -->
 <div class="row">
 <div class="col-md-12">
 <div class="well text-center">
 <img src="images/ellipsis.gif" />
<p> Please wait loading grid.....</p>
 </div>
 </div>
 </div>     
<div class="row" style="display: none;">
          <div class="col-md-12">
            <div   > 
              {section name=grid loop=$grids}

   <!-- buy button starts -->
   {if $grids[grid]->allow_free_paid != 'true' && $grids[grid]->pixel_price >= 0}
   {start_form id="sectionstep1"}
    <input type="hidden" name="step" value="{$step|escape}" />
  <input type="hidden" name="grid_id" value="{$grids[grid]->id|escape}" />
    {if $grids[grid]->pixel_price == 0}
    <p class="text-success text-right">##Price:## ##Free## <!-- buy button input -->
      <input type="submit" class="btn btn-primary btn-large" value="{if $grids[grid]->pixel_price == 0}##Get Now >>##{else}{snippet|escape name="grid_buy_button" seq=$grids[grid]->id default="##Buy Now >>##"}{/if}" />
      <!-- buy button ends --></p>
    {else}
    <p class="text-success text-right"><strong>##Price:##{$app->setting->currency_symbol}{$grids[grid]->pixel_price|number_format:2|escape} ##per## {$grids[grid]->selectable_square_size|escape} x {$grids[grid]->selectable_square_size|escape} ##pixel block## ({$app->setting->currency_symbol}{$grids[grid]->single_pixel_price_formatted()|escape} ##per pixel##)
      <!-- buy button input -->
      <input type="submit" class="btn btn-primary btn-large" value="{if $grids[grid]->pixel_price == 0}##Get Now >>##{else}{snippet|escape name="grid_buy_button" seq=$grids[grid]->id default="##Buy Now >>##"}{/if}" />
      <!-- buy button ends -->
      </strong>
    </p>
    {/if}
     
  <!-- <p class="text-right"></p> -->
  {end_form}
  {/if}
   <!-- buy button ends -->
<hr />
  <h3 class="text-info">{snippet|escape name="grid_title" seq=$grids[grid]->id}  </h3>
  
  <div>{snippet name="grid_description" seq=$grids[grid]->id}</div>
  {if $grids[grid]->allow_free_paid == 'true' && $grids[grid]->pixel_price > 0}
    <p class="text-success">##Price:## ##Free## ##for blocls with square less than## {$grids[grid]->free_square} ##pixels##
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
     <!-- {start_form}
    <input type="hidden" name="step" value="{$step|escape}" />
  <input type="hidden" name="grid_id" value="{$grids[grid]->id|escape}" />
    {if $grids[grid]->pixel_price == 0}
    <p class="text-danger">##Price:## ##Free##</p>
    {else}
    <p class="text-success"><strong>##Price:## </strong>{$app->setting->currency_symbol}{$grids[grid]->pixel_price|number_format:2|escape} ##per## {$grids[grid]->selectable_square_size|escape} x {$grids[grid]->selectable_square_size|escape} ##pixel block## ({$app->setting->currency_symbol}{$grids[grid]->single_pixel_price_formatted()|escape} ##per pixel##)</p>
    {/if}

  <p class="text-right"><input type="submit" class="btn btn-primary btn-large" value="{if $grids[grid]->pixel_price == 0}##Get Now >>##{else}{snippet|escape name="grid_buy_button" seq=$grids[grid]->id default="##Buy Now >>##"}{/if}" /></p>
  {end_form} -->
  {/if}
{/section}
               
            </div>
          </div>
        </div>

  </div>
</div>
{include file="footer.inc.tpl"}
 