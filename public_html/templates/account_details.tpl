{assign var="page_title" value="##Account Details##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##First Name##:</td>
    <td><input name="first_name" size="20" value="{$smarty.request.first_name|escape}" />
  </tr>

  <tr>
    <td class="label">##Last Name##:</td>
    <td><input name="last_name" size="20" value="{$smarty.request.last_name|escape}" />
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td class="label">##E-Mail Address##:</td>
    <td>{$user->email|escape}</td>
  </tr>

  <tr>
    <td class="label">##New E-Mail Address##:</td>
    <td><input name="email" size="40" value="{$smarty.request.email|escape}" /> (##Leave blank to keep current address##)</td>
  </tr>

  <tr>
    <td class="label">##Re-Enter New E-Mail Address##:</td>
    <td><input name="email_confirm" size="40" value="{$smarty.request.email_confirm|escape}" /></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td class="label">##Password##:</td>
    <td>**********</td>
  </tr>

  <tr>
    <td class="label">##New Password##:</td>
    <td><input name="pass" type="password" size="20" value="{$smarty.request.pass|escape}" /> (##Leave blank to keep current password##)</td>
  </tr>

  <tr>
    <td class="label">##Re-Enter New Password##:</td>
    <td><input name="pass_confirm" type="password" size="20" value="{$smarty.request.pass_confirm|escape}" /></td>
  </tr>

</table>
<p>
  <input type="submit" value="##Save Changes##" />
</p>
{end_form}

{include file="footer.inc.tpl"}
