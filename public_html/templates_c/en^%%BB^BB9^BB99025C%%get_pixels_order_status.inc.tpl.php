<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:14
         compiled from get_pixels_order_status.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'get_pixels_order_status.inc.tpl', 6, false),array('modifier', 'escape', 'get_pixels_order_status.inc.tpl', 10, false),array('function', 'snippet', 'get_pixels_order_status.inc.tpl', 15, false),array('function', 'url', 'get_pixels_order_status.inc.tpl', 21, false),)), $this); ?>
<div class="indent">
<table>
  <?php if ($_SESSION['payment_controller'] == 'renew'): ?>
  <tr>
    <td class="label">Renewal Amount:</td>
    <td><?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=$this->_tpl_vars['order_status']['amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2)); ?>
</td>
  </tr>
  <tr>
    <td class="label">Renewal Term:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->expire_days)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 days (through <?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['new_expires_at'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</td>
  </tr>
  <?php else: ?>
  <tr>
    <td class="label">Your Selection:</td>
    <td><?php echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'grid_title','seq' => $this->_tpl_vars['grid']->id), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); if ($this->_tpl_vars['order_status']['w']): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['w'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['h'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels<?php if ($this->_tpl_vars['order_status']['amount'] != 0): ?>, <?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=$this->_tpl_vars['order_status']['amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2));  endif;  endif; ?></td>
  </tr>
  <?php endif; ?>
  <?php if ($_SESSION['image']): ?>
  <tr>
    <td class="label">Your Image:</td>
    <td><img src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/session_image.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?x=<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="Uploaded Image" style="vertical-align: middle" /> (Actual Size)</td>
  </tr>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['order_status']['url']): ?>
  <tr>
    <td class="label">URL for Your Site:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  <tr>
    <td class="label">Title for Your Pixels:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  <tr>
    <td class="label">Alt Tag Value for Your Pixels:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['order_status']['email']): ?>
  <tr>
    <td class="label">Your E-Mail Address:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  <?php endif; ?>
</table>
</div>