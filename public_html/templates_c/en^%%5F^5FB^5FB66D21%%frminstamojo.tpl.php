<?php /* Smarty version 2.6.12, created on 2016-03-18 11:29:23
         compiled from payment/frminstamojo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'payment/frminstamojo.tpl', 2, false),array('function', 'start_form', 'payment/frminstamojo.tpl', 5, false),array('function', 'end_form', 'payment/frminstamojo.tpl', 12, false),array('modifier', 'escape', 'payment/frminstamojo.tpl', 2, false),)), $this); ?>
<p>
  <img src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => 'images/instamojo.png'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
" border="0"   alt="InstaMojo" />
</p>
<blockquote>
<?php echo smarty_function_start_form(array('action' => ((is_array($_tmp=$this->_tpl_vars['module']->action)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>

<?php $_from = $this->_tpl_vars['module']->hidden; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['item']):
?>
<input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endforeach; endif; unset($_from); ?>
<p>
  <input type="submit" value="Pay with <?php echo ((is_array($_tmp=$this->_tpl_vars['module']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 &gt;&gt;" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>

</blockquote>