<?php /* Smarty version 2.6.12, created on 2016-03-18 02:26:30
         compiled from admin/payment_history_edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/payment_history_edit.tpl', 4, false),array('function', 'show_errors', 'admin/payment_history_edit.tpl', 6, false),array('function', 'start_form', 'admin/payment_history_edit.tpl', 7, false),array('function', 'url', 'admin/payment_history_edit.tpl', 17, false),array('function', 'end_form', 'admin/payment_history_edit.tpl', 73, false),)), $this); ?>
<?php $this->assign('page_title', 'Edit Payment History'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>

<table width="100%">

  <tr>
    <td class="label">Payment ID:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Region ID:</td>
    <td><?php if ($this->_tpl_vars['payment']->_region_deleted):  echo ((is_array($_tmp=$this->_tpl_vars['payment']->region_id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 (Deleted)<?php else: ?><a href="<?php echo smarty_function_url(array('href' => '/admin/edit_region.php'), $this);?>
?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->region_id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->region_id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><?php endif; ?></td>
  </tr>

  <tr>
    <td class="label">Email:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->email)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Payment Method:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->payment_method)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Amount:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->amount)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Completed?</td>
    <td><?php if ($this->_tpl_vars['payment']->is_completed):  echo ((is_array($_tmp=$this->_tpl_vars['payment']->completed_at)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>No<?php endif; ?></td>
  </tr>

  <tr>
    <td class="label">Verified?</td>
    <td><?php if ($this->_tpl_vars['payment']->is_verified):  echo ((is_array($_tmp=$this->_tpl_vars['payment']->verified_at)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  else: ?>No <input type="checkbox" name="verify" value="1" /> Change to 'Verified'<?php endif; ?></td>
  </tr>

  <tr style="vertical-align: top">
    <td class="label">Verification Variables:</td>
    <td><?php if ($this->_tpl_vars['payment']->verified_vars): ?><pre><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->verified_vars)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</pre><?php endif; ?></td>
  </tr>

  <tr>
    <td class="label">Error?</td>
    <td><?php if ($this->_tpl_vars['payment']->is_error): ?>Yes <input type="checkbox" name="clear_error" value="1" /> Clear Error Status<?php else: ?>No<?php endif; ?></td>
  </tr>

  <tr>
    <td class="label">Transaction ID:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->txn_id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr style="vertical-align: top">
    <td class="label">Notes:</td>
    <td><textarea name="notes" style="width: 100%" rows="8"><?php echo ((is_array($_tmp=$_REQUEST['notes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  </tr>

</table>

<input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" name="show" value="<?php echo $_REQUEST['show']; ?>
" />

<p>
<input type="submit" value="Save" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>