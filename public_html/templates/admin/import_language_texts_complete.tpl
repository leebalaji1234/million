{assign var="page_title" value="##Import Language Texts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Langage Texts for language## {$code|escape} ({$name|escape})
## have been imported from##</p>

<p class="indent"><tt>{$path|escape}</tt></p>

{include file="admin/footer.inc.tpl"}
