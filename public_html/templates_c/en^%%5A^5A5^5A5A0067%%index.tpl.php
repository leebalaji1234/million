<?php /* Smarty version 2.6.12, created on 2016-06-17 02:31:52
         compiled from admin/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'show_errors', 'admin/index.tpl', 5, false),array('function', 'start_form', 'admin/index.tpl', 6, false),array('function', 'url', 'admin/index.tpl', 45, false),array('function', 'end_form', 'admin/index.tpl', 65, false),array('modifier', 'escape', 'admin/index.tpl', 16, false),array('modifier', 'number_format', 'admin/index.tpl', 55, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/header.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo $this->_tpl_vars['app']->setting->site_name; ?>
 Administration Area</h1>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array(), $this);?>


<table>

  <tr>
    <td colspan="2"><h2>Site Status</h2></td>
  </tr>

  <tr>
    <td class="label">Script Version:</td>
    <td><?php echo ((is_array($_tmp=@PACKAGE_VERSION)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

  <tr>
    <td class="label">Public Site Status:</td>
    <td>
    <?php if ($this->_tpl_vars['app']->setting->site_down): ?>
      <span class="error"><strong>Down for Maintenance</strong></span>
      <input type="hidden" name="do" value="site_up" />
      &nbsp; <input type="submit" value="Activate Site" />
    <?php else: ?>
      Up
      <input type="hidden" name="do" value="site_dn" />
      &nbsp; <input type="submit" value="Deactivate Site for Maintenance" />
    <?php endif; ?>
    </td>
  </tr>

  <tr>
    <td colspan="2"><h2>Grid Performance</h2></td>
  </tr>

  <tr>
    <td class="label">Number of Grids:</td>
    <td><?php echo $this->_tpl_vars['num_grids']; ?>
</td>
  </tr>

  <?php $_from = $this->_tpl_vars['grids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grid']):
?>
  <tr>
    <td class="label"><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => "/admin/maintain_regions.php"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?grid_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']['grid']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['grid']['grid']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
    <td>
      <?php $_from = $this->_tpl_vars['grid']['zones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['zone']):
?><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['zone']['src'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" width="<?php echo $this->_tpl_vars['zone']['pct']*3; ?>
" height="16" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['zone']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['zone']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /><?php endforeach; endif; unset($_from); ?>
      &nbsp; <?php echo $this->_tpl_vars['grid']['pct']; ?>
% active
    </td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>

  <tr>
    <td class="label">Overall Pixels:</td>
    <td>Active: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['active_pixels'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels, Inactive: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['inactive_pixels'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels, Available: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['avail_pixels'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels, Total: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['total_pixels'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels</td>
  </tr>

  <tr>
    <td class="label">Overall Peformance:</td>
    <td><?php echo $this->_tpl_vars['active_pct']; ?>
% active</td>
  </tr>

</table>

<?php echo smarty_function_end_form(array(), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin/footer.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>