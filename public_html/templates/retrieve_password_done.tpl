{assign var="page_title" value="##Password Sent##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Your login details have been sent to your E-Mail address.##</p>

<p><a href="{url|escape href="/login.php"}">##Log In##</a></p>

{include file="footer.inc.tpl"}
