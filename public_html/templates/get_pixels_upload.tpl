{assign var="page_title" value="##Upload Your Image##"}
{assign var="scripts" value="/tabber.js"}
{include file="header.inc.tpl"}

<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info">{$page_title|escape}</h3>
<hr/>

{include file="get_pixels_order_status.inc.tpl"}


{show_errors}
{start_form enctype="multipart/form-data" class="form-horizontal"}
 
{if $app->setting->upload_images}
<blockquote>
<p class="text-warning">##Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the region size of## {$smarty.request.w|escape} x
{$smarty.request.h|escape} ##pixels##.</p>
</blockquote>

<div class="form-group required">
  <div class="col-sm-3">
    <label class="control-label" >##Image File##:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="file" type="file" size="80" id="picture" value="" required />
   <p id="pic_error1" style="display:none; color:#FF0000;">Image formats should be JPG, JPEG, PNG or GIF.</p>
   <p id="pic_error2" style="display:none; color:#FF0000;">Max file size should be 2MB.</p>
  </div>
</div>
 
{/if}
<input type="hidden" name="step" value="{$step|escape}" />
<input type="hidden" name="w" value="{$smarty.request.w|escape}" />
<input type="hidden" name="h" value="{$smarty.request.h|escape}" />

{if $app->setting->upload_images}
  <div class="form-group">
<div class="col-sm-offset-3 col-sm-6">
   

   <input type="submit" value="Continue &gt;&gt;" class="btn btn-primary" name="submit_button"> 
</div>
</div>
{/if}
  
<!-- {if $grid->images_gallery}
	{if $app->setting->upload_images}
	<p>##Or select from one of the predefined images below:##</p>
	{else}
	<p>##Select from one of the predefined images below:##</p>
	{/if}
	{include file='predefined_images.inc.tpl'}
{/if}
 -->
{end_form}

{include file="footer.inc.tpl"}
