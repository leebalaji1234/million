{assign var="page_title" value="##Test Email##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##This function allows you to send a test email to verify your email
configuration settiongs.##</p>

<h3>##Current Email Settings##</h3>

<p>##Your current email configuration, from <tt>config.php</tt> is:##</p>

<dl>
  <dd><tt>define(MAIL_TYPE, '{$smarty.const.MAIL_TYPE|escape}');</tt></dd>
  <dd><tt>define(SMTP_HOST, '{$smarty.const.SMTP_HOST|escape}');</tt></dd>
  <dd><tt>define(SMTP_PORT, '{$smarty.const.SMTP_PORT|escape}');</tt></dd>
  <dd><tt>define(SMTP_AUTH, '{$smarty.const.SMTP_AUTH|escape}');</tt></dd>
  <dd><tt>define(SMTP_USER, '{$smarty.const.SMTP_USER|escape}');</tt></dd>
  <dd><tt>define(SMTP_PASS, '{$smarty.const.SMTP_PASS|escape}');</tt></dd>
  <dd><tt>define(SM_PATH, '{$smarty.const.SM_PATH|escape}');</tt></dd>
</dl>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Send Test Message To Address##:</td>
    <td><input type="text" name="email" size="50" /></td>
  </tr>

</table>

<p>
  <input type="submit" value="##Send Test Message##" />
</p>
{end_form}

{include file="admin/footer.inc.tpl"}
