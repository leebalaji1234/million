{assign var="page_title" value="##Export Language Texts##"}
{include file="admin/header.inc.tpl"}

<h1>{$page_title|escape}</h1>

<p>##Langage Texts for language## {$code|escape} ({$name|escape})
## have been exported to##</p>

<p class="indent"><tt>{$path|escape}</tt></p>

{include file="admin/footer.inc.tpl"}
