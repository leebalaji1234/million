<?php /* Smarty version 2.6.12, created on 2016-04-24 03:47:49
         compiled from drawing.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'drawing.tpl', 6, false),array('modifier', 'implode', 'drawing.tpl', 24, false),array('function', 'show_errors', 'drawing.tpl', 7, false),array('function', 'end_form', 'drawing.tpl', 38, false),)), $this); ?>
<?php $this->assign('page_title', 'Drawing Detail');  $this->assign('pagename', 'volunteer');  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="section">
  <div class="container">
<!-- <h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1> -->  
<?php echo smarty_function_show_errors(array(), $this);?>

 
  
<div class="row">
 <!--  <div class="alert alert-primary col-md-10 text-center">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Thanks for Register to us!</strong> You will be receive an email with your code. You can use code on the upload art
      </div> -->
          <div class="col-md-12">
            <div class="panel panel-default">
              <div  >
                <span class="text-primary col-md-5"> <h4> </h4>
                   </span> 
                
              </div>
              <div class="panel-body">
                 <p class="text-center text-primary"><i class="fa fa-fw fa-child fa-3x"></i><?php echo $this->_tpl_vars['drawing']->username; ?>
     <i class="fa fa-fw fa-hand-o-up fa-3x"></i>Clicks :<?php echo $this->_tpl_vars['drawing']->clicks; ?>
  <i class="fa fa-fw fa-heart fa-3x"></i>Likes :<?php echo $this->_tpl_vars['drawing']->likes; ?>
  <i class="fa fa-fw fa-flag fa-3x text-danger"></i>Reports :<?php echo $this->_tpl_vars['drawing']->reports; ?>
  </p>
            <p class="text-left text-warning"><i class="fa fa-fw fa-graduation-cap fa-3x"></i>Sponsors :   <?php echo ((is_array($_tmp=', ')) ? $this->_run_mod_handler('implode', true, $_tmp, $this->_tpl_vars['drawing']->sponsors['title']) : implode($_tmp, $this->_tpl_vars['drawing']->sponsors['title'])); ?>
</p> 
                <p><h3 class="text-info"><?php echo $this->_tpl_vars['drawing']->title; ?>
</h3>
                <img src="<?php echo $this->_tpl_vars['drawing']->image; ?>
" class="img-responsive"></p>
            <p class="well"><?php echo $this->_tpl_vars['drawing']->description; ?>
  </p>
            <hr/>
            <h3 class="text-info">Make Of Art</h3>
            <p class="text-center"> <iframe width="660" height="315" src="<?php echo $this->_tpl_vars['drawing']->proof; ?>
" frameborder="0" allowfullscreen>
</iframe> </p>
              </div>
            </div>
          </div>
        </div>


<?php echo smarty_function_end_form(array(), $this);?>

</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 