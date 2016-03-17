<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:39
         compiled from get_pixels_email.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels_email.tpl', 4, false),array('function', 'show_errors', 'get_pixels_email.tpl', 12, false),array('function', 'start_form', 'get_pixels_email.tpl', 13, false),array('function', 'end_form', 'get_pixels_email.tpl', 33, false),)), $this); ?>
<?php $this->assign('page_title', "Enter Your E-Mail Address"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "get_pixels_order_status.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<p>Please enter your e-mail address so we can contact you about your pixels.
We will send a special link to this address that you can use to change your
pixel image, URL, or title.</p>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>

  <tr>
    <td class="label">Your E-Mail Address:</td>
    <td><input name="email" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Re-Enter E-Mail Address:</td>
    <td><input name="email_confirm" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

</table>

<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<p>
<input name="submit" type="submit" value="Continue &gt;&gt;" />&nbsp;&nbsp;
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>