{assign var="page_title" value="##Select Your Pixels##"}
{assign var="scripts" value=','|explode:'/gr.js,/rubberband.js,/Dom.js'}
{assign var="body_attr" value="onLoad=\"moveCanvas('grid')\""}
{include file="header.inc.tpl"}
 
<div class="col-md-10 well"  >
	 
{show_errors}
{start_form}

<span class="text-primary"><strong>##Selected##: <span id="selection">(##none##)</span></span></strong>
<p class="text-info text-left">##Click and drag your mouse to select a region of pixels.## <span class="col-md-offset-5"><input type="submit" class="btn btn-primary"value="## >> Continue##  " /></span>
</p>
<!-- <p>##Selected##: <strong><span id="selection">(##none##)</span></strong></p> -->
<input type="hidden" name="step" value="{$step|escape}" />
<input type="hidden" name="grid_id" value="{$smarty.request.grid_id|escape}" />
<input type="hidden" name="x" value="0" />
<input type="hidden" name="y" value="0" />
<input type="hidden" name="w" value="0" />
<input type="hidden" name="h" value="0" />
<input type="hidden" name="free_square" value="{$grid->free_square}" />
<input type="hidden" name="free_paid" value="{$smarty.request.free_paid}" />
<input type="hidden" name="selectable_square_size" value="{$grid->selectable_square_size}" />
<input type="hidden" name="max_w" value="{$grid->region_max_width|escape}" />
<input type="hidden" name="max_h" value="{$grid->region_max_height|escape}" />
<input type="hidden" name="pixel_price" value="{$grid->single_pixel_price()|escape}" />
<input type="hidden" name="decimal_point" value="{$lang->decimal_point|escape}" />
<input type="hidden" name="thousands_separator" value="{$lang->thousands_separator|escape}" />
<input type="hidden" name="currency_symbol" value="{$app->setting->currency_symbol|escape}" />
<input type="hidden" name="pixels_text" value="##pixels##" />
{end_form}

<div id="grid" style="width: {$grid->width|escape}px; height: {$grid->height|escape}px;">
<div id="canvas" style="background-image: url('{$grid->url(true)|escape}'); position: absolute; left: 0; top: 0; width: {$grid->width|escape}px; height: {$grid->height|escape}px; overflow: hidden; visibility: hidden;" onMouseDown="startLine();" onMouseUp="stopLine();">
</div>
   
 </div>
</div>
<div class="col-md-2 well">
	<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title text-center badge">1</h3>
	</div>
	<div class="panel-body">
	  
	  <strong>Allow you to post an image/logo</strong> with your <strong>Company Name, Company Message, Charity Chosen, Pixels Sponsored</strong> and your <strong>Website Address</strong> with a <strong>LINK</strong> linking back to your website. 

	  
	</div>
	</div>

	<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title text-center badge">2</h3>
	</div>
	<div class="panel-body">
	  
	 <strong>You will own this space for 4 years from the websites launch date.</strong> The website is guaranteed to be up for 4 years from its launch date. 
   
  
	</div>
	</div>

	<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title text-center badge">3</h3>
	</div>
	<div class="panel-body">
	  
	<strong>You will never pay per click</strong> no matter how many click throughs you get from the life of your sponsorship.
   
  
	</div>
	</div>
 



</div>

{include file="footer.inc.tpl"}
 