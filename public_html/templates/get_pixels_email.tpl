{assign var="page_title" value="##Enter Your E-Mail Address##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{include file="get_pixels_order_status.inc.tpl"}

<p>##Please enter your e-mail address so we can contact you about your pixels.
We will send a special link to this address that you can use to change your
pixel image, URL, or title.##</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Your E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Re-Enter E-Mail Address##:</td>
    <td><input name="email_confirm" size="80" value="{$smarty.request.email_confirm|escape}" /></td>
  </tr>

</table>

<input type="hidden" name="step" value="{$step|escape}" />

<p>
<input name="submit" type="submit" value="##Continue## &gt;&gt;" />&nbsp;&nbsp;
</p>
{end_form}

{include file="footer.inc.tpl"}
