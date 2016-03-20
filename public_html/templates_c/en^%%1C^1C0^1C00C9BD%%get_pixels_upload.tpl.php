<?php /* Smarty version 2.6.12, created on 2016-03-18 11:29:04
         compiled from get_pixels_upload.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels_upload.tpl', 5, false),array('function', 'show_errors', 'get_pixels_upload.tpl', 10, false),array('function', 'start_form', 'get_pixels_upload.tpl', 11, false),array('function', 'end_form', 'get_pixels_upload.tpl', 45, false),)), $this); ?>
<?php $this->assign('page_title', 'Upload Your Image'); ?>
<?php $this->assign('scripts', "/tabber.js"); ?>
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


<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('enctype' => "multipart/form-data"), $this);?>

<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
<?php if ($this->_tpl_vars['app']->setting->upload_images): ?>
<p>Upload a GIF, JPG, or PNG image. It will automatically be converted to PNG
format and resized to the region size of <?php echo ((is_array($_tmp=$_REQUEST['w'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x
<?php echo ((is_array($_tmp=$_REQUEST['h'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels.</p>
<table>

<tr>
    <td class="label">Image File:</td>
    <td><input name="file" type="file" size="80" /></td>
  </tr>

</table>
<?php endif; ?>
<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="w" value="<?php echo ((is_array($_tmp=$_REQUEST['w'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="h" value="<?php echo ((is_array($_tmp=$_REQUEST['h'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<?php if ($this->_tpl_vars['app']->setting->upload_images): ?>
  <p>
  <input name="submit_button" type="submit" value="Continue &gt;&gt;" />&nbsp;&nbsp;
  </p>
<?php endif; ?>
  
<?php if ($this->_tpl_vars['grid']->images_gallery): ?>
	<?php if ($this->_tpl_vars['app']->setting->upload_images): ?>
	<p>Or select from one of the predefined images below:</p>
	<?php else: ?>
	<p>Select from one of the predefined images below:</p>
	<?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'predefined_images.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>