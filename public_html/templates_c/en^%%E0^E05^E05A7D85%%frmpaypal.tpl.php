<?php /* Smarty version 2.6.12, created on 2016-05-19 23:26:10
         compiled from payment/frmpaypal.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'payment/frmpaypal.tpl', 5, false),array('function', 'start_form', 'payment/frmpaypal.tpl', 9, false),array('function', 'end_form', 'payment/frmpaypal.tpl', 17, false),array('modifier', 'escape', 'payment/frmpaypal.tpl', 5, false),)), $this); ?>
 
 <div class="row">
  <div class="form-group">
  	<div class="col-sm-6"> 
     <img width="200" class="img-responsive" src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => 'images/pay.jpeg'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
"   alt="PayPal" />
   </div>
   <div class="col-sm-6"> 
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
   
  <button type="submit" class="btn btn-primary col-md-4" > >> Pay with <?php echo ((is_array($_tmp=$this->_tpl_vars['module']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</button>
</p>
<?php echo smarty_function_end_form(array(), $this);?>

</blockquote>
  </div>
  </div>
  </div>
 