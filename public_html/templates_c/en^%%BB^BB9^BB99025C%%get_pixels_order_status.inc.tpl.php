<?php /* Smarty version 2.6.12, created on 2016-06-18 01:52:57
         compiled from get_pixels_order_status.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'snippet', 'get_pixels_order_status.inc.tpl', 7, false),array('function', 'url', 'get_pixels_order_status.inc.tpl', 45, false),array('modifier', 'escape', 'get_pixels_order_status.inc.tpl', 7, false),array('modifier', 'number_format', 'get_pixels_order_status.inc.tpl', 8, false),)), $this); ?>
<div class="panel panel-default">
              <div class="panel-heading">
                <span class="text-primary"> <strong>Current Order Status</strong> </span>
              </div>
              <div class="panel-body">
<?php if ($_SESSION['payment_controller'] != 'renew'): ?>
<h5 class="text-info"><?php echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'grid_title','seq' => $this->_tpl_vars['grid']->id), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
</h5> 
<p class="text-danger">Current Selection : <strong><?php if ($this->_tpl_vars['order_status']['w']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['w'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 x <?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['h'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 pixels<?php if ($this->_tpl_vars['order_status']['amount'] != 0): ?>, Price  : <?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=$this->_tpl_vars['order_status']['amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2));  endif;  endif; ?>
      <?php if ($this->_tpl_vars['inramount']): ?> | <i class="fa fa-inr"></i> <?php echo $this->_tpl_vars['inramount'];  endif; ?></strong></p>
<?php endif; ?>

<?php if ($this->_tpl_vars['order_status']['url']): ?>
<div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">Site URL </h5> 
  <h5 class="text-primary"><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h5> 
  </div>
 </div>  
 <div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">Title </h5> 
  <h5 class="text-primary"><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h5> 
  </div>
 </div> 
 <div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">Mouseover Text </h5> 
  <h5 class="text-primary"><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['alt'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h5> 
  </div>
 </div>  
  <?php endif; ?>
  <?php if ($this->_tpl_vars['order_status']['email']): ?>
  <div class="col-sm-3"> 
  <div class="form-group">
   <h5 class="text-danger">Email </h5> 
  <h5 class="text-primary"><?php echo ((is_array($_tmp=$this->_tpl_vars['order_status']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h5> 
  </div>
 </div> 
   
  <?php endif; ?>
<?php if ($_SESSION['image']): ?>
<div class="col-sm-12"> 
<div class="form-group">
   <h5 class="text-danger">Image </h5>
   <img src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/session_image.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?x=<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="Uploaded Image" style="vertical-align: middle" /> (Actual Size) 
</div>
</div>
<?php endif; ?>
<?php $this->assign('c', $this->_tpl_vars['order_status']['step']-1); ?>
<p class="text-right"> <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => "/get_pixels.php"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?step=<?php echo ((is_array($_tmp=$this->_tpl_vars['c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="btn btn-primary">Back</a></p>

<!-- 

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
 pixels<?php if ($this->_tpl_vars['order_status']['amount'] != 0): ?>, <?php echo $this->_tpl_vars['app']->setting->currency_symbol;  echo ((is_array($_tmp=$this->_tpl_vars['order_status']['amount'])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2) : smarty_modifier_number_format($_tmp, 2));  endif;  endif; ?>
      <?php if ($this->_tpl_vars['inramount']): ?><i class="fa fa-inr"></i> <?php echo $this->_tpl_vars['inramount'];  endif; ?>
    </td>
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
</div> -->
</div>
</div>