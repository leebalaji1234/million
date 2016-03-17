<?php /* Smarty version 2.6.12, created on 2016-03-16 01:37:15
         compiled from admin/test_email.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/test_email.tpl', 4, false),array('function', 'show_errors', 'admin/test_email.tpl', 23, false),array('function', 'start_form', 'admin/test_email.tpl', 24, false),array('function', 'end_form', 'admin/test_email.tpl', 37, false),)), $this); ?>
<?php $this->assign('page_title', 'Test Email'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<p>This function allows you to send a test email to verify your email
configuration settiongs.</p>

<h3>Current Email Settings</h3>

<p>Your current email configuration, from <tt>config.php</tt> is:</p>

<dl>
  <dd><tt>define(MAIL_TYPE, '<?php echo ((is_array($_tmp=@MAIL_TYPE)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
  <dd><tt>define(SMTP_HOST, '<?php echo ((is_array($_tmp=@SMTP_HOST)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
  <dd><tt>define(SMTP_PORT, '<?php echo ((is_array($_tmp=@SMTP_PORT)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
  <dd><tt>define(SMTP_AUTH, '<?php echo ((is_array($_tmp=@SMTP_AUTH)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
  <dd><tt>define(SMTP_USER, '<?php echo ((is_array($_tmp=@SMTP_USER)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
  <dd><tt>define(SMTP_PASS, '<?php echo ((is_array($_tmp=@SMTP_PASS)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
  <dd><tt>define(SM_PATH, '<?php echo ((is_array($_tmp=@SM_PATH)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');</tt></dd>
</dl>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>

  <tr>
    <td class="label">Send Test Message To Address:</td>
    <td><input type="text" name="email" size="50" /></td>
  </tr>

</table>

<p>
  <input type="submit" value="Send Test Message" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>