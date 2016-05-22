{assign var='stylesheets' value='/style.css'}
{include file='html.inc.tpl'}
<body {$body_attr} ng-app="md"  >
{include file='toolbar.inc.tpl'}

<div>
{if $app->install_files_present}{include file='install_files_present.inc.tpl'}{/if}
