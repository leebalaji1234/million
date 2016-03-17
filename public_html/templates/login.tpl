{assign var="page_title" value="##Login##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{$smarty.session.before_login}

<p>##Don't have an account?## <a href="{url href='/signup.php'}">##Sign Up Now##</a>.</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Enter your E-Mail Address##:</td>
    <td><input name="email" size="80" value="{$smarty.request.email|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Password##:</td>
    <td><input type="password" name="pass" size="20" /> <a href="{url href='/retrieve_password.php'}">##Forgot your Password?##</a></td>
  </tr>

</table>
<p>
  <input type="submit" value="##Log In##" />
</p>
{end_form}

{include file="footer.inc.tpl"}
