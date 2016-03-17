{assign var="page_title" value="##Retrieve Password##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Enter your E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>

</table>
<p>
  <input type="submit" value="##Send My Password##" />
</p>
{end_form}

{include file="footer.inc.tpl"}
