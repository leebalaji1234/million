{assign var="page_title" value="##Administrator Login##"}
{assign var="hide_menu" value="1"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table>
  <tr>
    <td class="label">User Name:</td>
    <td><input name="user" size="20" /></td>
  </tr>
  <tr>
    <td class="label">Password:</td>
    <td><input name="pass" type="password" size="20" /></td>
  </tr>
</table>
<p>
  <input type="submit" value="##Log In##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
