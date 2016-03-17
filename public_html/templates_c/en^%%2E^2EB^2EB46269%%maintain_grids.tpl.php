<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:02
         compiled from admin/maintain_grids.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/maintain_grids.tpl', 4, false),array('function', 'url', 'admin/maintain_grids.tpl', 14, false),array('function', 'start_form', 'admin/maintain_grids.tpl', 17, false),array('function', 'end_form', 'admin/maintain_grids.tpl', 21, false),)), $this); ?>
<?php $this->assign('page_title', 'Maintain Grids'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<table class="grid">
  <tr>
    <th>Name</th>
    <th>Size</th>
    <th>Move</th>
  </tr>
  <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['rows']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
  <tr>
    <td><a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?action=edit&amp;id=<?php echo ((is_array($_tmp=$this->_tpl_vars['rows'][$this->_sections['i']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['rows'][$this->_sections['i']['index']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['rows'][$this->_sections['i']['index']]->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$this->_tpl_vars['rows'][$this->_sections['i']['index']]->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td align="center"><?php if ($this->_sections['i']['first']): ?>&nbsp;<?php else: ?>
    <?php echo smarty_function_start_form(array(), $this);?>

    <input type="hidden" name="action" value="move_up" />
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['rows'][$this->_sections['i']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
    <input type="image" src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/images/sm_uparrow.gif'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
" alt="Up Arrow" title="Move Up" />
    <?php echo smarty_function_end_form(array(), $this);?>

    <?php endif; ?></td>
  </tr>
  <?php endfor; endif; ?>
</table>

<p><a href="<?php echo ((is_array($_tmp=smarty_function_url(array(), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?action=new">Add a Grid</a></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>