<?php /* Smarty version 2.6.12, created on 2016-03-18 11:34:57
         compiled from pixel_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'pixel_list.tpl', 4, false),array('modifier', 'datetime_to_date', 'pixel_list.tpl', 29, false),array('modifier', 'number_format', 'pixel_list.tpl', 31, false),array('function', 'start_form', 'pixel_list.tpl', 6, false),array('function', 'end_form', 'pixel_list.tpl', 13, false),)), $this); ?>
<?php $this->assign('page_title', 'Pixel List'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php echo smarty_function_start_form(array('method' => 'get'), $this);?>

<p>
<input name="q" size="30" value="<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php if (isset ( $_REQUEST['o'] )): ?><input type="hidden" name="o" value="<?php echo ((is_array($_tmp=$_REQUEST['o'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /><?php endif; ?>
<?php if (isset ( $_REQUEST['a'] )): ?><input type="hidden" name="a" value="<?php echo ((is_array($_tmp=$_REQUEST['a'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /><?php endif; ?>
<input type="submit" value="Find" />
</p>
<?php echo smarty_function_end_form(array(), $this);?>


<table class="grid">
  <tr>
    <th><a href="?o=1<?php if ($_REQUEST['o'] == 1 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Date</a></th>
    <th><a href="?o=2<?php if ($_REQUEST['o'] == 2 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Site</a></th>
    <th><a href="?o=3<?php if ($_REQUEST['o'] == 3 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Pixels</a></th>
    <?php if ($this->_tpl_vars['app']->setting->pixel_list_by_clicks): ?>
    <th><a href="?o=4<?php if ($_REQUEST['o'] == 4 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Clicks</a></th>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['app']->setting->pixel_list_enable_images): ?>
    <th>Images</th>
    <?php endif; ?>
  </tr>
  <?php unset($this->_sections['region']);
$this->_sections['region']['name'] = 'region';
$this->_sections['region']['loop'] = is_array($_loop=$this->_tpl_vars['regions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['region']['show'] = true;
$this->_sections['region']['max'] = $this->_sections['region']['loop'];
$this->_sections['region']['step'] = 1;
$this->_sections['region']['start'] = $this->_sections['region']['step'] > 0 ? 0 : $this->_sections['region']['loop']-1;
if ($this->_sections['region']['show']) {
    $this->_sections['region']['total'] = $this->_sections['region']['loop'];
    if ($this->_sections['region']['total'] == 0)
        $this->_sections['region']['show'] = false;
} else
    $this->_sections['region']['total'] = 0;
if ($this->_sections['region']['show']):

            for ($this->_sections['region']['index'] = $this->_sections['region']['start'], $this->_sections['region']['iteration'] = 1;
                 $this->_sections['region']['iteration'] <= $this->_sections['region']['total'];
                 $this->_sections['region']['index'] += $this->_sections['region']['step'], $this->_sections['region']['iteration']++):
$this->_sections['region']['rownum'] = $this->_sections['region']['iteration'];
$this->_sections['region']['index_prev'] = $this->_sections['region']['index'] - $this->_sections['region']['step'];
$this->_sections['region']['index_next'] = $this->_sections['region']['index'] + $this->_sections['region']['step'];
$this->_sections['region']['first']      = ($this->_sections['region']['iteration'] == 1);
$this->_sections['region']['last']       = ($this->_sections['region']['iteration'] == $this->_sections['region']['total']);
?>
  <tr>
    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->created_on)) ? $this->_run_mod_handler('datetime_to_date', true, $_tmp) : smarty_modifier_datetime_to_date($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td><a <?php echo $this->_tpl_vars['regions'][$this->_sections['region']['index']]->clickthrough_link(); ?>
><?php echo ((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->title())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
    <td style="text-align: right"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->width*$this->_tpl_vars['regions'][$this->_sections['region']['index']]->height)) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <?php if ($this->_tpl_vars['app']->setting->pixel_list_by_clicks): ?>
    <td style="text-align: right"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->clicks)) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['app']->setting->pixel_list_enable_images): ?>
    <td><img src="show_image.php?rid=<?php echo $this->_tpl_vars['regions'][$this->_sections['region']['index']]->id; ?>
" /></td>
    <?php endif; ?>
  </tr>
  <?php endfor; endif; ?>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>