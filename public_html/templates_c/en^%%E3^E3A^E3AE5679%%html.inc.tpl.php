<?php /* Smarty version 2.6.12, created on 2016-06-18 02:26:48
         compiled from html.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'html.inc.tpl', 2, false),array('modifier', 'default', 'html.inc.tpl', 2, false),array('function', 'url', 'html.inc.tpl', 16, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['language_code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 'en') : smarty_modifier_default($_tmp, 'en')); ?>
" lang="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['language_code'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, 'en') : smarty_modifier_default($_tmp, 'en')); ?>
">
<head>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if ($this->_tpl_vars['meta_description']): ?>
  <meta name="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['meta_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['meta_robots']): ?>
  <meta name="robots" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['meta_robots'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endif; ?>
<?php $_from = $this->_tpl_vars['stylesheets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stylesheet']):
?>
  <link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => $this->_tpl_vars['stylesheet']), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
" />
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['app']->setting->rss_latest_pixels > 0): ?>
  <link rel="alternate" type="application/rss+xml" title= "Latest Pixels" href="<?php echo smarty_function_url(array('href' => '/rss_latest_pixels.php'), $this);?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['app']->setting->rss_top_pixels > 0): ?>
  <link rel="alternate" type="application/rss+xml" title= "Top Pixels" href="<?php echo smarty_function_url(array('href' => '/rss_top_pixels.php'), $this);?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['app']->setting->rss_blog_articles > 0): ?>
  <link rel="alternate" type="application/rss+xml" title= "Blog Articles" href="<?php echo smarty_function_url(array('href' => '/rss_blog_articles.php'), $this);?>
" />
<?php endif; ?>
<?php $_from = $this->_tpl_vars['scripts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['script']):
?>
  <script type="text/javascript" src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => $this->_tpl_vars['script']), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
"></script>
<?php endforeach; endif; unset($_from); ?>
  <title><?php echo ((is_array($_tmp=$this->_tpl_vars['site_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  if ($this->_tpl_vars['page_title']): ?> - <?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));  endif; ?></title>

  <!-- drawing module dependencies -->
   <script type="text/javascript" src="custom_lib/cdn/jquery.min.js"></script>
    <script type="text/javascript" src="custom_lib/cdn/bootstrap.min.js"></script>
   <link href="custom_lib/cdn/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="custom_lib/cdn/bootstrap.css" rel="stylesheet" type="text/css">
     
    <script type="text/javascript" src="js/custom.js"></script>
    <!--<script type="text/javascript" src="twitter_plugin/tweecool.js"></script>-->
    

    <!-- <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css"> 
    <script type="text/javascript" src="js/custom.js"></script>-->
<!-- angular js includes 
        <script type='text/javascript' src='angular_includes/js/angular.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-route.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-animate.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-resource.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-cookies.js'></script>
        <script type='text/javascript' src='angular_includes/js/dirPagination.js'></script>   
         <script type="text/javascript" src="angular_includes/js/app.js"></script> -->
</head>