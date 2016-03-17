{assign var="page_title" value="##Unexpected Error##"}
{include file='admin/header.inc.tpl'}
<h1>{$page_title|escape}</h1>

<p>##The following unexpected error occurred##:</p>

<div class="error">{$errmsg}</div>

{include file='admin/footer.inc.tpl'}
