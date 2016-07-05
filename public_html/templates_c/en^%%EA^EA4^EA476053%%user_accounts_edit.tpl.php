<?php /* Smarty version 2.6.12, created on 2016-06-17 02:33:08
         compiled from admin/user_accounts_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/user_accounts_edit.tpl', 4, false),array('function', 'show_errors', 'admin/user_accounts_edit.tpl', 6, false),array('function', 'start_form', 'admin/user_accounts_edit.tpl', 7, false),array('function', 'html_yesno', 'admin/user_accounts_edit.tpl', 42, false),array('function', 'end_form', 'admin/user_accounts_edit.tpl', 57, false),)), $this); ?>
<?php $this->assign('page_title', 'Edit User Account'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table width="100%">

  <tr>
    <td class="label">User ID:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">E-Mail Address:</td>
    <td><input name="email" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Password:</td>
    <td><input name="pass" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['pass'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /> (Must be at least 5 characters long)</td>
  </tr>

  <tr>
    <td class="label">First Name:</td>
    <td><input name="first_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Last Name:</td>
    <td><input name="last_name" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['last_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Date Created:</td>
    <td><input name="created_at" size="20" value="<?php echo ((is_array($_tmp=$_REQUEST['created_at'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr style="vertical-align: baseline">
    <td class="label">Confirmed?</td>
    <td><?php echo smarty_function_html_yesno(array('name' => 'is_confirmed'), $this);?>
</td>
  </tr>

  <tr>
    <td class="label">Digest:</td>
    <td><input name="digest" size="40" value="<?php echo ((is_array($_tmp=$_REQUEST['digest'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

</table>

<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<p>
<input type="submit" name="submit_button" value="Save" />
&nbsp;&nbsp;
<?php echo smarty_function_end_form(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="action" value="delete" />
<input type="submit" name="submit_button" value="Delete" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>