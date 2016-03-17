<?php /* Smarty version 2.6.12, created on 2016-03-16 00:28:05
         compiled from admin/payment_modules.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/payment_modules.tpl', 4, false),array('function', 'start_form', 'admin/payment_modules.tpl', 17, false),array('function', 'end_form', 'admin/payment_modules.tpl', 26, false),)), $this); ?>
<?php $this->assign('page_title', 'Payment Modules'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<table class="grid">
  <tr>
    <th>Module</th>
    <th>Display Order</th>
    <th>Action</th>
  </tr>
  <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
  <tr>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['module']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td align="center"><?php if ($this->_tpl_vars['module']->is_enabled):  echo ((is_array($_tmp=$this->_tpl_vars['module']->display_order)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>&nbsp;<?php endif; ?></td>
    <td>
      <?php echo smarty_function_start_form(array('style' => "margin-top: 0; margin-bottom: 0"), $this);?>

      <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['module']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
      <?php if ($this->_tpl_vars['module']->is_enabled): ?>
      <input type="submit" name="_configure" value="Configure" />
      &nbsp;&nbsp;
      <input type="submit" name="_disable" value="Disable" />
      <?php else: ?>
      <input type="submit" name="_enable" value="Enable" />
      <?php endif; ?>
      <?php echo smarty_function_end_form(array(), $this);?>

    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>