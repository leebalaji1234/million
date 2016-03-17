{assign var='stylesheets' value='/style.css'}
{include file='html.inc.tpl'}
<body {$body_attr}>
{include file='toolbar.inc.tpl'}
<div class="content">
{if $app->install_files_present}{include file='install_files_present.inc.tpl'}{/if}
