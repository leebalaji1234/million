<?php /* Smarty version 2.6.12, created on 2016-03-18 11:28:58
         compiled from get_pixels_region.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'explode', 'get_pixels_region.tpl', 2, false),array('modifier', 'escape', 'get_pixels_region.tpl', 6, false),array('function', 'show_errors', 'get_pixels_region.tpl', 10, false),array('function', 'start_form', 'get_pixels_region.tpl', 11, false),array('function', 'end_form', 'get_pixels_region.tpl', 31, false),)), $this); ?>
<?php $this->assign('page_title', 'Select Your Pixels'); ?>
<?php $this->assign('scripts', ((is_array($_tmp=',')) ? $this->_run_mod_handler('explode', true, $_tmp, '/gr.js,/rubberband.js,/Dom.js') : explode($_tmp, '/gr.js,/rubberband.js,/Dom.js'))); ?>
<?php $this->assign('body_attr', "onLoad=\"moveCanvas('grid')\""); ?>
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

<?php echo smarty_function_start_form(array(), $this);?>

<p>Click and drag your mouse to select a region of pixels.&nbsp;&nbsp;<input type="submit" value="Continue &gt;&gt;" />
</p>
<p>Selected: <strong><span id="selection">(none)</span></strong></p>
<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="grid_id" value="<?php echo ((is_array($_tmp=$_REQUEST['grid_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="x" value="0" />
<input type="hidden" name="y" value="0" />
<input type="hidden" name="w" value="0" />
<input type="hidden" name="h" value="0" />
<input type="hidden" name="free_square" value="<?php echo $this->_tpl_vars['grid']->free_square; ?>
" />
<input type="hidden" name="free_paid" value="<?php echo $_REQUEST['free_paid']; ?>
" />
<input type="hidden" name="selectable_square_size" value="<?php echo $this->_tpl_vars['grid']->selectable_square_size; ?>
" />
<input type="hidden" name="max_w" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->region_max_width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="max_h" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->region_max_height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="pixel_price" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->single_pixel_price())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="decimal_point" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']->decimal_point)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="thousands_separator" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lang']->thousands_separator)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="currency_symbol" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['app']->setting->currency_symbol)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="pixels_text" value="pixels" />
<?php echo smarty_function_end_form(array(), $this);?>


<div id="grid" style="width: <?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
px; height: <?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
px;">
<div id="canvas" style="background-image: url('<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url(true))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
'); position: absolute; left: 0; top: 0; width: <?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
px; height: <?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
px; overflow: hidden; visibility: hidden;" onMouseDown="startLine();" onMouseUp="stopLine();"></div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>