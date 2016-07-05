<?php /* Smarty version 2.6.12, created on 2016-06-17 02:31:47
         compiled from admin/login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/login.tpl', 5, false),array('function', 'show_errors', 'admin/login.tpl', 7, false),array('function', 'start_form', 'admin/login.tpl', 8, false),array('function', 'end_form', 'admin/login.tpl', 22, false),)), $this); ?>
<?php $this->assign('page_title', 'Administrator Login'); ?>
<?php $this->assign('hide_menu', '1'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>
  <tr>
    <td class="label">User Name:</td>
    <td><input name="user" size="20" /></td>
  </tr>
  <tr>
    <td class="label">Password:</td>
    <td><input name="pass" type="password" size="20" /></td>
  </tr>
</table>
<p>
  <input type="submit" value="Log In" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>