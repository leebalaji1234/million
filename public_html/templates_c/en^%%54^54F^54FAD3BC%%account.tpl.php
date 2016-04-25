<?php /* Smarty version 2.6.12, created on 2016-04-24 04:03:04
         compiled from account.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'account.tpl', 7, false),array('modifier', 'implode', 'account.tpl', 35, false),array('modifier', 'datetime_to_date', 'account.tpl', 41, false),array('function', 'url', 'account.tpl', 9, false),)), $this); ?>
<?php $this->assign('page_title', 'Your Account'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info" > <?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h3> 
<hr/>
<p class="text-right"><a class="btn btn-info" href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/account_details.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Edit Profile</a></p>
 <h4 class="text-info"> Drawings </h4> 
<hr/>
 

<table class="table table-bordered table-condensed table-hover table-striped">
  <tr>
    <th class="text-primary"> Drawing</th>   
    <th class="text-primary text-center"> Clicks</th>
    <th class="text-primary text-center"> Likes</th>
    <th class="text-primary text-center"> Reports</th>
    <th class="text-primary text-center"> Sponsors</th>
    <th class="text-primary text-center" > Amount</th>
    <th class="text-primary text-center" > Status</th>
    <th class="text-primary text-center"> Created</th>
     
  </tr>
  <?php unset($this->_sections['drawing']);
$this->_sections['drawing']['name'] = 'drawing';
$this->_sections['drawing']['loop'] = is_array($_loop=$this->_tpl_vars['drawings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['drawing']['show'] = true;
$this->_sections['drawing']['max'] = $this->_sections['drawing']['loop'];
$this->_sections['drawing']['step'] = 1;
$this->_sections['drawing']['start'] = $this->_sections['drawing']['step'] > 0 ? 0 : $this->_sections['drawing']['loop']-1;
if ($this->_sections['drawing']['show']) {
    $this->_sections['drawing']['total'] = $this->_sections['drawing']['loop'];
    if ($this->_sections['drawing']['total'] == 0)
        $this->_sections['drawing']['show'] = false;
} else
    $this->_sections['drawing']['total'] = 0;
if ($this->_sections['drawing']['show']):

            for ($this->_sections['drawing']['index'] = $this->_sections['drawing']['start'], $this->_sections['drawing']['iteration'] = 1;
                 $this->_sections['drawing']['iteration'] <= $this->_sections['drawing']['total'];
                 $this->_sections['drawing']['index'] += $this->_sections['drawing']['step'], $this->_sections['drawing']['iteration']++):
$this->_sections['drawing']['rownum'] = $this->_sections['drawing']['iteration'];
$this->_sections['drawing']['index_prev'] = $this->_sections['drawing']['index'] - $this->_sections['drawing']['step'];
$this->_sections['drawing']['index_next'] = $this->_sections['drawing']['index'] + $this->_sections['drawing']['step'];
$this->_sections['drawing']['first']      = ($this->_sections['drawing']['iteration'] == 1);
$this->_sections['drawing']['last']       = ($this->_sections['drawing']['iteration'] == $this->_sections['drawing']['total']);
?>
     
  <tr>
    <td><img src='<?php echo $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->drawing_image; ?>
'  class="img-responsive" width="150" height="150"/><br/><?php echo $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->title; ?>
<br/><?php echo $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->description; ?>
</td>

    <td class="text-center"> <?php echo $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->clicks; ?>
</td>
    <td class="text-center"><?php echo $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->likes; ?>
</td>
    <td class="text-center"><?php echo $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->reports; ?>
</td>
    <td class="text-center"> <?php $_from = $this->_tpl_vars['allSponsor']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['myId'] => $this->_tpl_vars['i']):
?>
   <?php if ($this->_tpl_vars['myId'] == $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->id):  echo ((is_array($_tmp=', ')) ? $this->_run_mod_handler('implode', true, $_tmp, $this->_tpl_vars['i']['title']) : implode($_tmp, $this->_tpl_vars['i']['title'])); ?>
 <?php endif; ?></li>
<?php endforeach; endif; unset($_from); ?></td>
    <td class="text-center"><?php $_from = $this->_tpl_vars['allSponsor']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['myId'] => $this->_tpl_vars['i']):
?>
   <?php if ($this->_tpl_vars['myId'] == $this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->id):  echo ((is_array($_tmp=', ')) ? $this->_run_mod_handler('implode', true, $_tmp, $this->_tpl_vars['i']['amount']) : implode($_tmp, $this->_tpl_vars['i']['amount'])); ?>
 <?php endif; ?></li>
<?php endforeach; endif; unset($_from); ?></td>
<td class="text-center"><?php if ($this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->status != 0): ?> <span class="label label-danger">Disabled</span> <?php else: ?> <span class="label label-success">Enabled</span> <?php endif; ?></td>
    <td class="text-center"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['drawings'][$this->_sections['drawing']['index']]->created_at)) ? $this->_run_mod_handler('datetime_to_date', true, $_tmp) : smarty_modifier_datetime_to_date($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
     
     
  </tr>
  <?php endfor; endif; ?>
</table>

  
</div>
</div>
</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>