{assign var="page_title" value="##Describe Your Pixels##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{include file="get_pixels_order_status.inc.tpl"}

<p>##Specify the URL for the site your pixels will be linked to. It must start
with <tt>http://</tt> or <tt>https://</tt>. You may also specify an optional
title and alt tag value for your pixels. If you leave the title blank, your URL
will be used as the title. If you leave the alt tag value blank, the title (or
URL) will be used.##</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##URL for Your Site##:</td>
    <td><input name="url" size="80" value="{$smarty.request.url|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Title for Your Pixels##:</td>
    <td><input name="title" size="80" value="{$smarty.request.title|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Alt Tag Value for Your Pixels##:</td>
    <td><input name="alt" size="80" value="{$smarty.request.alt|escape}" /></td>
  </tr>

</table>

<input type="hidden" name="step" value="{$step|escape}" />

<p>
<input name="submit" type="submit" value="##Continue## &gt;&gt;" />&nbsp;&nbsp;
</p>
{end_form}
{start_form}
<p>
<input type="hidden" name="step" value="{$step|escape}" />
<input type="hidden" name="skip_details" value="true">
<input name="submit" type="submit" value="##I will fill details later## &gt;&gt;" />&nbsp;&nbsp;
</p>
{end_form}

{include file="footer.inc.tpl"}