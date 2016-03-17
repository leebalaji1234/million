{assign var="page_title" value="##Create Account##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Use this form to create an account on## {$app->setting->site_name|escape}.
##If you already have an account, you may## <a href="{url|escape href='/login.php'}">##Log In##</a> ##instead##.</p>

<p>##Your E-Mail address will be your account login.##</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Enter your E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Re-enter your E-Mail Address##:</td>
    <td><input name="email_confirm" size="80" value="{$smarty.request.email_confirm|escape}" /></td>
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
    <td class="label">##Create a Password##:</td>
    <td><input type="password" name="pass" size="20" value="{$smarty.request.pass|escape}" /> ##(Must be at least 5 characters long)##</td>
  </tr>

  <tr>
    <td class="label">##Re-enter Password##:</td>
    <td><input type="password" name="pass_confirm" size="20" value="{$smarty.request.pass_confirm|escape}" /></td>
  </tr>

</table>
<p>
  <input type="submit" value="##Create Account##" />
</p>
{end_form}

{include file="footer.inc.tpl"}
