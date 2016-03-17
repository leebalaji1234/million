{assign var="page_title" value="##Change Password##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function allows you to change the administrator username and/or
password.##</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Current Password##:</td>
    <td><input type="password" name="current_pass" size="20" /></td>
  </tr>

  <tr>
    <td class="label">##User Name##:</td>
    <td><input name="user" size="20" value="{$smarty.request.user|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##New Password##:</td>
    <td><input type="password" name="pass" size="20" /> ##(Leave blank to keep current password)##</td>
  </tr>

  <tr>
    <td class="label">##Re-Type New Password##:</td>
    <td><input type="password" name="pass_confirm" size="20" /></td>
  </tr>

</table>

<p>
  <input type="submit" value="##Save##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
