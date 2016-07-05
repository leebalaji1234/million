<?php /* Smarty version 2.6.12, created on 2016-06-10 02:47:34
         compiled from admin/header.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'admin/header.inc.tpl', 1, false),)), $this); ?>
<?php $this->assign('stylesheets', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, '/style.css,/admin.css') : explode($_tmp, '/style.css,/admin.css'))); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'html.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body <?php echo $this->_tpl_vars['body_attr']; ?>
>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/toolbar.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr valign="top">
  <?php if (! $this->_tpl_vars['hide_menu']): ?><td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/menu.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td><?php endif; ?>
  <td width="100%"><div class="content">
  <?php if ($this->_tpl_vars['app']->install_files_present):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'install_files_present.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>