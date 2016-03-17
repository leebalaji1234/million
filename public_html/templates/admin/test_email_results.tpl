{assign var="page_title" value="##Test Email##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##The following test message was sent.##</p>

<table>

  <tr>
    <td>From:</td>
    <td><tt>{$from|escape}</tt></td>
  </tr>

  <tr>
    <td>To:</td>
    <td><tt>{$email|escape}</tt></td>
  </tr>

  <tr>
    <td>Subject:</td>
    <td><tt>{$subject|escape}</tt></td>
  </tr>

  <tr>
    <td>Body:</td>
    <td><tt>{$body|escape}</tt></td>
  </tr>

</table>

{if $err}
<p>##The following error was returned by PEAR::Mail:##</p>
<p><tt>{$err|escape}</tt></p>
{else}
<p>##PEAR::Mail did not return any errors.##</p>
{/if}


{include file="admin/footer.inc.tpl"}
