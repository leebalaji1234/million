<?php /* Smarty version 2.6.12, created on 2016-03-18 11:56:48
         compiled from account_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'account_details.tpl', 4, false),array('function', 'show_errors', 'account_details.tpl', 6, false),array('function', 'start_form', 'account_details.tpl', 7, false),array('function', 'end_form', 'account_details.tpl', 62, false),)), $this); ?>
<?php $this->assign('page_title', 'Account Details'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>

  <tr>
    <td class="label">First Name:</td>
    <td><input name="first_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </tr>

  <tr>
    <td class="label">Last Name:</td>
    <td><input name="last_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['last_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td class="label">E-Mail Address:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->email)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">New E-Mail Address:</td>
    <td><input name="email" size="40" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Leave blank to keep current address)</td>
  </tr>

  <tr>
    <td class="label">Re-Enter New E-Mail Address:</td>
    <td><input name="email_confirm" size="40" value="<?php echo ((is_array($_tmp=$_REQUEST['email_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td class="label">Password:</td>
    <td>**********</td>
  </tr>

  <tr>
    <td class="label">New Password:</td>
    <td><input name="pass" type="password" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Leave blank to keep current password)</td>
  </tr>

  <tr>
    <td class="label">Re-Enter New Password:</td>
    <td><input name="pass_confirm" type="password" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

</table>
<p>
  <input type="submit" value="Save Changes" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>