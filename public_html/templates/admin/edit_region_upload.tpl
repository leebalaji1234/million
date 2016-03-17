{assign var="page_title" value="##Edit Region##"}
{assign var="scripts" value="/tabber.js"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the region size of## {$region->width|escape} x
{$region->height|escape} ##pixels##.</p>

{show_errors}
{start_form enctype="multipart/form-data"}
<table>

  <tr>
    <td class="label">##Image File##:</td>
    <td><input name="file" type="file" size="80" /></td>
  </tr>

</table>

{foreach key=name item=value from=$smarty.request}
<input type="hidden" name="{$name}" value="{$value|escape}" />
{/foreach}

<p>
<input name="submit_button" type="submit" value="##Upload##" />&nbsp;&nbsp;
<input name="submit_button" type="submit" value="##Cancel##" />
</p>

<p>##Or, select from a one of the predefined images below:##</p>
{include file='predefined_images.inc.tpl'}

{end_form}

{include file="admin/footer.inc.tpl"}
