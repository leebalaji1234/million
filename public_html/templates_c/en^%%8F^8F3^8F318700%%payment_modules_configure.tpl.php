<?php /* Smarty version 2.6.12, created on 2016-03-16 00:28:20
         compiled from admin/payment_modules_configure.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/payment_modules_configure.tpl', 5, false),array('function', 'show_errors', 'admin/payment_modules_configure.tpl', 9, false),array('function', 'start_form', 'admin/payment_modules_configure.tpl', 10, false),array('function', 'end_form', 'admin/payment_modules_configure.tpl', 20, false),)), $this); ?>
<?php $this->assign('page_title', 'Configure Payment Module'); ?>
<?php $this->assign('scripts', "/snippet.js"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['module']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('onSubmit' => "snippetSubmit(this); return true;"), $this);?>

<p>
  <strong>Display Order</strong><br />
  The order in which to display this method when multiple payment methods are available<br />
  <input name="display_order" value="<?php echo ((is_array($_tmp=$_REQUEST['display_order'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="5" />
</p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['module']->config_form(), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$_REQUEST['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="_saveconfig" value="1" />
<p><input type="submit" value="Save Changes" /></p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>