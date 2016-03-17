{assign var="page_title" value="##Tell A Friend##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

{if $smarty.session.flash}<p>{flash}</p>{/if}

<p>##Tell a friend about## {$app->setting->site_name|escape}:</p>

{show_errors}
{start_form}
<table>

  <tr>
    <td class="label">##Your Name##:</td>
    <td><input name="from_name" size="30" value="{$smarty.request.from_name|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Your E-Mail Address##:</td>
    <td><input name="from_email" size="40" value="{$smarty.request.from_email|escape}" /></td>
  </tr>

  <tr>
    <td class="label">##Your Friend's E-Mail Address##:</td>
    <td><input name="to_email" size="40" value="{$smarty.request.to_email|escape}" /></td>
  </tr>

</table>

<p>
  <input type="submit" value="##Send##" />
</p>
{end_form}

{include file="footer.inc.tpl"}
