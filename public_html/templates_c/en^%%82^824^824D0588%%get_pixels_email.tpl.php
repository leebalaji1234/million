<?php /* Smarty version 2.6.12, created on 2016-05-19 23:25:39
         compiled from get_pixels_email.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels_email.tpl', 7, false),array('function', 'show_errors', 'get_pixels_email.tpl', 18, false),array('function', 'start_form', 'get_pixels_email.tpl', 19, false),array('function', 'end_form', 'get_pixels_email.tpl', 91, false),)), $this); ?>
<?php $this->assign('page_title', 'Sponsor Personal Details'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info"><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
<hr/>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "get_pixels_order_status.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<blockquote>
<p class="text-warning">Please enter your e-mail address so we can contact you about your pixels.
</p>
<p class="text-warning">Provide twitter username for display feeds on hompage.
</p>
</blockquote>

<?php echo smarty_function_show_errors(array(), $this);?>

<?php echo smarty_function_start_form(array('class' => "form-horizontal",'id' => 'sponsoremailstep'), $this);?>


<div class="form-group required">
  <div class="col-sm-3">
    <label class="control-label " >Your E-Mail Address</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email" class="form-control" size="80" placeholder="Enter email address here..." value="<?php echo ((is_array($_tmp=$_REQUEST['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </div>
</div>

<div class="form-group required">
  <div class="col-sm-3">
    <label class="control-label" >Re-Enter E-Mail Address</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email_confirm" class="form-control" placeholder="Confirm email address here..." size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['email_confirm'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" ><i class="fa fa-fw fa-twitter"></i> Twitter Username:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="twitter_name" class="form-control" size="80" placeholder="Twitter username here eg.<@username>" value="<?php echo ((is_array($_tmp=$_REQUEST['twitter_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  </div>
</div>
<div class="form-group">
  
  <div class="col-sm-offset-3 col-sm-5"> 
  <label class="control-label" > <input name="own_theme" id="own_theme" type="checkbox" onchange="ownThemeOptionEnabler();" <?php if ($_REQUEST['own_theme']): ?> checked="checked" <?php endif; ?>/> Specify your own Brand theme</label>
  </div>
</div>
<div class="form-group theme_options" <?php if (! $_REQUEST['own_theme']): ?> style="display:none;"<?php endif; ?>>
   
  <div class="col-sm-offset-3 col-sm-5"> 
  <blockquote>
    <p class="text-warning">Extra price applicable for your own theme</p> 
  </blockquote>
    
  </div>
</div>
<div class="form-group theme_options required" <?php if (! $_REQUEST['own_theme']): ?> style="display:none;"<?php endif; ?>>
  <div class="col-sm-3">
    <label class="control-label" >  Theme Name:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="theme_name" class="form-control" placeholder="Enter theme name here ..." size="80" value="<?php echo ((is_array($_tmp=$_REQUEST['theme_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
   <input type="hidden" name="category_id" value="3" />

  </div>
</div>
<div class="form-group theme_options " <?php if (! $_REQUEST['own_theme']): ?> style="display:none;"<?php endif; ?>>
  <div class="col-sm-3">
    <label class="control-label" >  Theme Description:</label>
  </div>
  <div class="col-sm-5"> 
   <textarea name="theme_description" class="form-control" placeholder="Theme description here ..."><?php echo ((is_array($_tmp=$_REQUEST['theme_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>

  </div>
</div>
 <div class="form-group">
<div class="col-sm-offset-3 col-sm-6">
   
  <input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

   <input type="submit" value="Continue &gt;&gt;" class="btn btn-primary" name="submit_button">
   <input type="submit" value="Just want to be a part of this innovation &gt;&gt;" class="btn btn-primary" name="submit_button">  
   
</div>
</div>
 
<?php echo smarty_function_end_form(array(), $this);?>



</div>
</div>
</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>