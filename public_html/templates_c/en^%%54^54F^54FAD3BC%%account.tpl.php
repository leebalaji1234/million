<?php /* Smarty version 2.6.12, created on 2016-03-18 11:56:42
         compiled from account.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'account.tpl', 4, false),array('modifier', 'datetime_to_date', 'account.tpl', 20, false),array('modifier', 'number_format', 'account.tpl', 22, false),array('function', 'url', 'account.tpl', 21, false),)), $this); ?>
<?php $this->assign('page_title', 'Account'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<h2>Your Pixels</h2>

<blockquote>

<p>Click on a site to update your pixels</p>

<table class="grid">
  <tr>
    <th><a href="?o=1<?php if ($_REQUEST['o'] == 1 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Date</a></th>
    <th><a href="?o=2<?php if ($_REQUEST['o'] == 2 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Site</a></th>
    <th><a href="?o=3<?php if ($_REQUEST['o'] == 3 && $_REQUEST['a'] == 0): ?>&amp;a=1<?php endif;  if (isset ( $_REQUEST['q'] )): ?>&amp;q=<?php echo ((is_array($_tmp=$_REQUEST['q'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>">Pixels</a></th>
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
    <td><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/update.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->title())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
    <td style="text-align: right"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['regions'][$this->_sections['region']['index']]->width*$this->_tpl_vars['regions'][$this->_sections['region']['index']]->height)) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  <?php endfor; endif; ?>
</table>

</blockquote>

<h2>Your Details</h2>

<blockquote>

<table>

  <tr>
    <td class="label">E-Mail Address:</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->email)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>

</table>
<p>
  <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/account_details.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Edit Your Details</a>
</p>

</blockquote>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>