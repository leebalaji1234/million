{assign var='stylesheets' value=','|explode:'/style.css,/admin.css'}
{include file='html.inc.tpl'}
<body {$body_attr}>
{include file='admin/toolbar.inc.tpl'}
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr valign="top">
  {if !$hide_menu}<td>{include file='admin/menu.inc.tpl'}</td>{/if}
  <td width="100%"><div class="content">
  {if $app->install_files_present}{include file='install_files_present.inc.tpl'}{/if}
