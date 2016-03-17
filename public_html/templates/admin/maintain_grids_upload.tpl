{assign var="page_title" value="##Edit Grid##"}
{assign var="scripts" value="/tabber.js"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the grid size of## {$grid->width|escape} x
{$grid->height|escape} ##pixels##.</p>

{show_errors}
{start_form enctype="multipart/form-data"}
<table>

  <tr>
    <td class="label">##Image File##:</td>
    <td><input name="file" type="file" size="80" /></td>
  </tr>

  <tr>
    <td class="label">##Image Lighten Factor##:</td>
    <td><input name="lighten" size="4" value="{$smarty.request.lighten|escape}" />% ##(0-100, 0=no change)##</td>
  </tr>

</table>

{foreach key=name item=value from=$hidden}
<input type="hidden" name="{$name|escape}" value="{$value|escape}" />
{/foreach}

<p>
<input name="submit_button" type="submit" value="##Upload##" />&nbsp;&nbsp;
<input name="submit_button" type="submit" value="##Cancel##" />
</p>

{end_form}

{include file="admin/footer.inc.tpl"}
