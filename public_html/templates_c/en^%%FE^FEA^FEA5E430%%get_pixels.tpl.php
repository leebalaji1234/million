<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:12
         compiled from get_pixels.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels.tpl', 4, false),array('modifier', 'number_format', 'get_pixels.tpl', 11, false),array('function', 'snippet', 'get_pixels.tpl', 7, false),array('function', 'start_form', 'get_pixels.tpl', 12, false),array('function', 'end_form', 'get_pixels.tpl', 19, false),)), $this); ?>
<?php $this->assign('page_title', 'Get Pixels'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php unset($this->_sections['grid']);
$this->_sections['grid']['name'] = 'grid';
$this->_sections['grid']['loop'] = is_array($_loop=$this->_tpl_vars['grids']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['grid']['show'] = true;
$this->_sections['grid']['max'] = $this->_sections['grid']['loop'];
$this->_sections['grid']['step'] = 1;
$this->_sections['grid']['start'] = $this->_sections['grid']['step'] > 0 ? 0 : $this->_sections['grid']['loop']-1;
if ($this->_sections['grid']['show']) {
    $this->_sections['grid']['total'] = $this->_sections['grid']['loop'];
    if ($this->_sections['grid']['total'] == 0)
        $this->_sections['grid']['show'] = false;
} else
    $this->_sections['grid']['total'] = 0;
if ($this->_sections['grid']['show']):

            for ($this->_sections['grid']['index'] = $this->_sections['grid']['start'], $this->_sections['grid']['iteration'] = 1;
                 $this->_sections['grid']['iteration'] <= $this->_sections['grid']['total'];
                 $this->_sections['grid']['index'] += $this->_sections['grid']['step'], $this->_sections['grid']['iteration']++):
$this->_sections['grid']['rownum'] = $this->_sections['grid']['iteration'];
$this->_sections['grid']['index_prev'] = $this->_sections['grid']['index'] - $this->_sections['grid']['step'];
$this->_sections['grid']['index_next'] = $this->_sections['grid']['index'] + $this->_sections['grid']['step'];
$this->_sections['grid']['first']      = ($this->_sections['grid']['iteration'] == 1);
$this->_sections['grid']['last']       = ($this->_sections['grid']['iteration'] == $this->_sections['grid']['total']);
?>
  <h2><?php echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'grid_title','seq' => $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
</h2>
  <div><?php echo smarty_function_snippet(array('name' => 'grid_description','seq' => $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id), $this);?>
</div>
  <?php if ($this->_tpl_vars['grids'][$this->_sections['grid']['index']]->allow_free_paid == 'true' && $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->pixel_price > 0): ?>
    <p>Price: Free for blocls with square less than <?php echo $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->free_square; ?>
 pixels
 and <?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->pixel_price)) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 per <?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->selectable_square_size)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->selectable_square_size)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixel block (<?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->single_pixel_price_formatted())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 per pixel) for regions contain more than <?php echo $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->free_square; ?>
 pixels
  <?php echo smarty_function_start_form(array(), $this);?>

  <p>
	<input type="hidden" name="free_paid" value="paid">
  	<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<input type="hidden" name="grid_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<input type="submit" name="choose" value="<?php echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'grid_buy_button','seq' => $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id,'default' => 'Buy Pixels'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
" /> <small>Click below to purchase pixels</small>
  </p>
  <?php echo smarty_function_end_form(array(), $this);?>

  <?php echo smarty_function_start_form(array(), $this);?>

  <p>
	<input type="hidden" name="free_paid" value="free">
  	<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<input type="hidden" name="grid_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<input type="submit" name="choose" value="<?php echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'grid_get_free_button','seq' => $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id,'default' => 'Get Free Pixels'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
" /> <small>Click below to get free pixels. You may choose up to <?php echo $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->free_square; ?>
 free pixels. </small>
  </p>
  <?php echo smarty_function_end_form(array(), $this);?>

  </p>
  <?php else: ?>
     <?php echo smarty_function_start_form(array(), $this);?>

  	<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<input type="hidden" name="grid_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <?php if ($this->_tpl_vars['grids'][$this->_sections['grid']['index']]->pixel_price == 0): ?>
    <p>Price: Free</p>
    <?php else: ?>
    <p>Price: <?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->pixel_price)) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 per <?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->selectable_square_size)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->selectable_square_size)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixel block (<?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->single_pixel_price_formatted())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 per pixel)</p>
    <?php endif; ?>
  <p><input type="submit" value="<?php if ($this->_tpl_vars['grids'][$this->_sections['grid']['index']]->pixel_price == 0): ?>Get Now >><?php else:  echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'grid_buy_button','seq' => $this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id,'default' => "Buy Now >>"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); endif; ?>" /></p>
  <?php echo smarty_function_end_form(array(), $this);?>

  <?php endif; ?>
<?php endfor; endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>