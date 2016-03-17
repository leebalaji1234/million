{assign var="page_title" value="##Unexpected Error##"}
{include file='header.inc.tpl'}
<h1>{$page_title|escape}</h1>

<p>##The following unexpected error occurred##:</p>

<div class="error">{$errmsg}</div>

{include file='footer.inc.tpl'}
