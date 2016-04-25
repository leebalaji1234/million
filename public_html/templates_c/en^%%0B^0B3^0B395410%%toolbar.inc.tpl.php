<?php /* Smarty version 2.6.12, created on 2016-04-24 04:13:10
         compiled from toolbar.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'toolbar.inc.tpl', 17, false),array('modifier', 'escape', 'toolbar.inc.tpl', 17, false),)), $this); ?>
<div class="section">
  <div class="navbar navbar-default navbar-fixed-top" style="-webkit-box-shadow:inset 22px 22px 22px 22px #FC3059;
box-shadow:inset 22px 22px 22px 22px #ffffff;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="padding:3px;"><img height="50" alt="Brand" src="images/logo.png"></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li >
                <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/index.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
"><i class="fa fa-home"></i></a>
              </li>
              <li class="active">
                <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/get_pixels.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Become Sponsor !</a>
              </li>
              <li>
                <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/drawings.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Drawings</a>
              </li>
               <li <?php if (pagename == 'volunteer'): ?> class="active" <?php endif; ?>>
                <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/volunteer.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Volunteers</a>
              </li>
              <?php if ($this->_tpl_vars['app']->setting->user_accounts): ?>
                <?php if ($_SESSION['user_id']): ?>
                <li> <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/account.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Welcome,  <?php echo $_SESSION['first_name']; ?>
 <?php echo $_SESSION['last_name']; ?>
 </a>
                </li>
               <!--  <li>
                <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/account.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Your Account</a>
                </li> -->
                <li>
                <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/logout.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Log Out</a>
                </li>
              <?php else: ?>
                <li><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/login.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Log In</a> </li>
                &nbsp;&nbsp;
                <li><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/signup.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Register</a></li>
                &nbsp;&nbsp;
                <?php endif; ?>
              <?php endif; ?> 
            </ul>
          </div>
        </div>
  </div> 

</div> 