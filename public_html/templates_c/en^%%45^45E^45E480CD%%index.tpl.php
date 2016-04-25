<?php /* Smarty version 2.6.12, created on 2016-04-26 00:36:03
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'index.tpl', 14, false),array('modifier', 'escape', 'index.tpl', 14, false),)), $this); ?>
<?php $this->assign('meta_description', $this->_tpl_vars['app']->setting->site_description); ?>
<?php if ($_SESSION['magnify']):  $this->assign('scripts', '/tjpzoom.js');  endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="section">
  <div class="row" >
     
<div class="col-md-12 label label-info text-muted toolinfo" style="font-weight:bold;padding-right:0px;">
<?php if ($this->_tpl_vars['links']): ?>
<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
<?php echo $this->_tpl_vars['link']; ?>
&nbsp;&nbsp;&nbsp;
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
Pixels Sold: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pixels_used'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 Available: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pixels_avail'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : smarty_modifier_number_format($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&nbsp;&nbsp;<?php if ($_SESSION['magnify']): ?><a class="btn btn-default" href="index.php?magnify=0<?php if ($_REQUEST['grid'] > 1): ?>&amp;grid=<?php echo ((is_array($_tmp=$_REQUEST['grid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><i class="fa fa-1x fa-search-minus"></i></a><?php else: ?><a class="btn btn-default" href="index.php?magnify=1<?php if ($_REQUEST['grid'] > 1): ?>&amp;grid=<?php echo ((is_array($_tmp=$_REQUEST['grid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?>"><i class="fa fa-1x fa-search-plus"></i></a><?php endif; ?>
</div>
<!-- pixel board starts here -->
  <div class="col-md-10 pixelboard">
 
<?php $_from = $this->_tpl_vars['rows']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grids']):
?>
 
<?php $_from = $this->_tpl_vars['grids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['grid']):
?>
 
	<?php if (! $_SESSION['magnify']): ?>
  <map name="grid_<?php echo $this->_tpl_vars['grid']->id; ?>
"><?php echo $this->_tpl_vars['grid']->map(); ?>
</map>
  <?php endif; ?>
  <!-- float: left -->
	<div style=""<?php if ($_SESSION['magnify']): ?> onmouseover="zoom_on(event,<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,'<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');" onmousemove="zoom_move(event);" onmouseout="zoom_off();"<?php endif; ?>><img class="img-responsive" width="100%" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" usemap="#grid_<?php echo $this->_tpl_vars['grid']->id; ?>
"   alt="" border="0" /></div><div style="clear: both"></div>

  <!--  <div style="float: left"<?php if ($_SESSION['magnify']): ?> onmouseover="zoom_on(event,<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,'<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');" onmousemove="zoom_move(event);" onmouseout="zoom_off();"<?php endif; ?>><img   src="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->url())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" usemap="#grid_<?php echo $this->_tpl_vars['grid']->id; ?>
" width="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->width)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" height="<?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->height)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" alt="" border="0" /></div><div style="clear: both"></div> --> 
 
<?php endforeach; endif; unset($_from); ?>
 
<?php endforeach; endif; unset($_from); ?>
</div>
<!-- pixel board ends here -->
 
<!-- twitter page starts here-->
  
<div class="col-md-2  feedswidget" style="display:none;padding-left:0px;">
  <div class="panel panel-primary" style="height:1068px;overflow-y:auto;">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <i class="fa fa-fw fa-twitter"></i>Sponsor Feeds</h3>
              </div>
              <div class="panel-body">
                <div id="tweecool"></div>
              </div>
 </div>
</div>
 <!-- twitter page ends here -->


 <!-- top drawings starts here -->
  
      <div class="container">
        <div class="row" id="drawings">
          <div class="col-md-12">
            <h2 class="text-center text-primary">Top Drawings</h2>
            <p class="text-center">Most likes by peoples.</p>
          </div>
        </div>
        <div class="row">
       
          <?php $_from = $this->_tpl_vars['alldrawings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
          <div class="col-md-2">
           <a href="drawing.php?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['d']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"> <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['d']->drawing_image)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class="center-block img-circle img-responsive">
            <h3 class="text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['d']->title)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
          </a>
            <!-- <p class="text-center">View</a></p> -->
          </div> 
          <?php endforeach; endif; unset($_from); ?>
        </div>
     </div>
     
    <!-- top drawings -->

 <!-- top sponsors starts here -->
  
      <div class="container">
        <div class="row" id="sponsors">
          <div class="col-md-12">
            <h2 class="text-center text-primary">Top Sponsors</h2>
            <p class="text-center">Most sponsored.</p>
          </div>
        </div>
        <div class="row">
       
          <?php $_from = $this->_tpl_vars['alldrawings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
          <div class="col-md-2">
            <img src="http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png" class="center-block img-circle img-responsive" class="center-block img-circle img-responsive">
            <h3 class="text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['d']->title)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
           
            <!-- <p class="text-center">View</a></p> -->
          </div> 
          <?php endforeach; endif; unset($_from); ?>
        </div>
     </div>
     
    <!-- top sponsors -->

 <!-- top volunteers starts here -->
  
      <div class="container">
        <div class="row" id="volunteers">
          <div class="col-md-12">
            <h2 class="text-center text-primary">Top Volunteers</h2>
            <p class="text-center">Most entrants referred.</p>
          </div>
        </div>
        <div class="row">
       
          <?php $_from = $this->_tpl_vars['allvolunteers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
          <div class="col-md-2">
            <img src="http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png" class="center-block img-circle img-responsive">
            <h3 class="text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['v']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
             <p class="text-center">MDD<?php echo ((is_array($_tmp=$this->_tpl_vars['v']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p> 
          </div> 
          <?php endforeach; endif; unset($_from); ?>
        </div>
     </div>
     
    <!-- top volunteers -->


 </div> 
<!-- row ends -->
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'wz_tooltip.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.inc.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>