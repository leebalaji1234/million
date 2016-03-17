{assign var="page_title" value="##Upload Your Image##"}
{assign var="scripts" value="/tabber.js"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{include file="get_pixels_order_status.inc.tpl"}


{show_errors}
{start_form enctype="multipart/form-data"}
<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
{if $app->setting->upload_images}
<p>##Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the region size of## {$smarty.request.w|escape} x
{$smarty.request.h|escape} ##pixels##.</p>
<table>

<tr>
    <td class="label">##Image File##:</td>
    <td><input name="file" type="file" size="80" /></td>
  </tr>

</table>
{/if}
<input type="hidden" name="step" value="{$step|escape}" />
<input type="hidden" name="w" value="{$smarty.request.w|escape}" />
<input type="hidden" name="h" value="{$smarty.request.h|escape}" />

{if $app->setting->upload_images}
  <p>
  <input name="submit_button" type="submit" value="##Continue## &gt;&gt;" />&nbsp;&nbsp;
  </p>
{/if}
  
{if $grid->images_gallery}
	{if $app->setting->upload_images}
	<p>##Or select from one of the predefined images below:##</p>
	{else}
	<p>##Select from one of the predefined images below:##</p>
	{/if}
	{include file='predefined_images.inc.tpl'}
{/if}

{end_form}

{include file="footer.inc.tpl"}
