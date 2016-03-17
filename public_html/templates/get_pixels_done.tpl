{assign var="page_title" value="##Thank You##"}
{include file="header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Thank you for your order!##</p>

<p>##Your confirmation number is## <strong>{$smarty.request.region_id|escape}</strong>. ##Please keep this number in case you need to contact us about your pixels.##</p>

<p>##You will receive an e-mail from us shortly with instructions on how
to update your pixels.##</p>

<p><a href="{url|escape href="/index.php"}">##Return to Home Page##</a></p>

{include file="footer.inc.tpl"}
