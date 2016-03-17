{assign var="page_title" value="##Edit User Account##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{show_errors}
{start_form}
<table width="100%">

  <tr>
    <td class="label">##User ID##:</td>
    <td>{$user->id|escape}</td>
  </tr>

  <tr>
    <td class="label">##E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Password##:</td>
    <td><input name="pass" size="20" value="{$smarty.request.pass|escape}" /> ##(Must be at least 5 characters long)##</td>
  </tr>

  <tr>
    <td class="label">##First Name##:</td>
    <td><input name="first_name" size="20" value="{$smarty.request.first_name|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Last Name##:</td>
    <td><input name="last_name" size="20" value="{$smarty.request.last_name|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Date Created##:</td>
    <td><input name="created_at" size="20" value="{$smarty.request.created_at|escape}" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">##Confirmed##?</td>
    <td>{html_yesno name="is_confirmed"}</td>
  </tr>

  <tr>
    <td class="label">##Digest##:</td>
    <td><input name="digest" size="40" value="{$smarty.request.digest|escape}" /></td>
  </tr>

</table>

<input type="hidden" name="id" value="{$user->id|escape}" />

<p>
<input type="submit" name="submit_button" value="##Save##" />
&nbsp;&nbsp;
{end_form}
{start_form}
<input type="hidden" name="id" value="{$user->id|escape}" />
<input type="hidden" name="action" value="delete" />
<input type="submit" name="submit_button" value="##Delete##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
