<?php /* Smarty version 2.6.12, created on 2016-03-20 13:12:53
         compiled from admin/clear_cache.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/clear_cache.tpl', 4, false),array('function', 'start_form', 'admin/clear_cache.tpl', 8, false),array('function', 'end_form', 'admin/clear_cache.tpl', 10, false),)), $this); ?>
<?php $this->assign('page_title', 'Clear Cache'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<p>This function will delete all cached pages</p>

<?php echo smarty_function_start_form(array(), $this);?>

  <input type="submit" value="Clear Cache Now" />
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>