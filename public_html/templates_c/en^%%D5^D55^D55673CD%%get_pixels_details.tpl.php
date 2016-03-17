<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:35
         compiled from get_pixels_details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels_details.tpl', 4, false),array('function', 'show_errors', 'get_pixels_details.tpl', 14, false),array('function', 'start_form', 'get_pixels_details.tpl', 15, false),array('function', 'end_form', 'get_pixels_details.tpl', 40, false),)), $this); ?>
<?php $this->assign('page_title', 'Describe Your Pixels'); ?>
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

<p>Specify the URL for the site your pixels will be linked to. It must start
with <tt>http://</tt> or <tt>https://</tt>. You may also specify an optional
title and alt tag value for your pixels. If you leave the title blank, your URL
will be used as the title. If you leave the alt tag value blank, the title (or
URL) will be used.</p>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table>

  <tr>
    <td class="label">URL for Your Site:</td>
    <td><input name="url" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Title for Your Pixels:</td>
    <td><input name="title" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

  <tr>
    <td class="label">Alt Tag Value for Your Pixels:</td>
    <td><input name="alt" size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
  </tr>

</table>

<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<p>
<input name="submit" type="submit" value="Continue &gt;&gt;" />&nbsp;&nbsp;
</p>
<?php echo smarty_function_end_form(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<p>
<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="skip_details" value="true">
<input name="submit" type="submit" value="I will fill details later &gt;&gt;" />&nbsp;&nbsp;
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>