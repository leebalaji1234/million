<?php /* Smarty version 2.6.12, created on 2016-03-18 02:25:36
         compiled from admin/payment_history.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/payment_history.tpl', 4, false),array('modifier', 'number_format', 'admin/payment_history.tpl', 27, false),array('function', 'url', 'admin/payment_history.tpl', 7, false),)), $this); ?>
<?php $this->assign('page_title', 'Payment History'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<p>Show: 
<?php if ($_REQUEST['show'] != 'unverified' && $_REQUEST['show'] != 'error'): ?><strong>All</strong><?php else: ?><a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?show=all">All</a><?php endif; ?> |
<?php if ($_REQUEST['show'] == 'unverified'): ?><strong>Unverified</strong><?php else: ?><a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?show=unverified">Unverified</a><?php endif; ?> |
<?php if ($_REQUEST['show'] == 'error'): ?><strong>Errors</strong><?php else: ?><a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?show=error">Errors</a><?php endif; ?>
</p>

<table class="grid">

  <tr>
    <th>Id</th>
    <th>Method</th>
    <th>Amount</th>
    <th>Completed</th>
    <th>Verified?</th>
    <th>Error?</th>
  </tr>

  <?php $_from = $this->_tpl_vars['payments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['payment']):
?>
  <tr>
    <td><a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;show=<?php echo ((is_array($_tmp=$_REQUEST['show'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->payment_method)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td style="text-align: right"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['payment']->amount)) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->completed_at)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td style="text-align: center"><?php if ($this->_tpl_vars['payment']->is_verified): ?>Yes<?php else: ?>No<?php endif; ?></td>
    <td style="text-align: center"><?php if ($this->_tpl_vars['payment']->is_error): ?>Yes<?php else: ?>No<?php endif; ?></td>
  </tr>
  <?php endforeach; else: ?>
  <tr>
    <td colspan="6">No matching payments found</td>
  </tr>
  <?php endif; unset($_from); ?>

</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>