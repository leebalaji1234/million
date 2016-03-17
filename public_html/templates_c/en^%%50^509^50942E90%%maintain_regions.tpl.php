<?php /* Smarty version 2.6.12, created on 2016-03-16 01:37:31
         compiled from admin/maintain_regions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/maintain_regions.tpl', 4, false),array('function', 'url', 'admin/maintain_regions.tpl', 14, false),)), $this); ?>
<?php $this->assign('page_title', 'Maintain Regions'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<p>This function allows you to change a region's status or other
parameters</p>

<p>Select Grid:
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
<?php if ($this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id == $this->_tpl_vars['grid']->id): ?>
<strong><?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong>
<?php else: ?>
<a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?grid_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['grids'][$this->_sections['grid']['index']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
<?php endif; ?>
<?php if (! $this->_sections['grid']['last']): ?> | <?php endif; ?>
<?php endfor; endif; ?>
</p>

<div>
  <map name="grid_<?php echo $this->_tpl_vars['grid']->id; ?>
"><?php echo $this->_tpl_vars['map']; ?>
</map>
  <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="" usemap="#grid_<?php echo $this->_tpl_vars['grid']->id; ?>
" border="0" />
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>