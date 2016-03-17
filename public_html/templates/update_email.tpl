{assign var="page_title" value="##Update Your Pixels##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Please enter your E-Mail address (used when you purchased the pixels) to 
confirm your identity.##</p>

{show_errors}
{start_form method="get"}
<table>
  <tr>
    <td class="label">##E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>
</table>
<input type="hidden" name="id" value="{$smarty.request.id|escape}" />
<input type="hidden" name="digest" value="{$smarty.request.digest|escape}" />
<p>
  <input type="submit" value="##Continue## &gt;&gt;" />
</p>
{end_form}

{include file="footer.inc.tpl"}
