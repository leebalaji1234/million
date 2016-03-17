{assign var="page_title" value="##Thank You##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Thank you for your renewal!##</p>

<p><a href="{url|escape href="/update.php"}?id={$smarty.request.id|escape}&amp;email={$smarty.request.email|escape}&amp;digest={$smarty.request.digest|escape}">##Return to Your Pixels##</a></p>

{include file="footer.inc.tpl"}
