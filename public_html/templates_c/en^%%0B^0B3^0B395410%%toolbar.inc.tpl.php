<?php /* Smarty version 2.6.12, created on 2016-03-16 00:27:06
         compiled from toolbar.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'toolbar.inc.tpl', 5, false),array('function', 'language_selector', 'toolbar.inc.tpl', 39, false),array('modifier', 'escape', 'toolbar.inc.tpl', 5, false),)), $this); ?>
<div class="toolbar">
  <table width="100%">
    <tr>
      <td>
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/index.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Home</a>
        &nbsp;&nbsp;
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/get_pixels.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Get Pixels</a>
        &nbsp;&nbsp;
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/pixel_list.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Pixel List</a>
        &nbsp;&nbsp;
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/tell_a_friend.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Tell a Friend</a>
        &nbsp;&nbsp;
        <?php if ($this->_tpl_vars['app']->setting->link_to_us_enabled): ?>
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/link_to_us.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Link to Us</a>
        &nbsp;&nbsp;
        <?php endif; ?>
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/blog.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Blog</a>
        <?php if ($this->_tpl_vars['app']->setting->rss_feeds_enabled()): ?>
        &nbsp;&nbsp;
        <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/rss.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">RSS</a>
        <?php endif; ?>
      </td>
      <td align="right">
        <?php if ($this->_tpl_vars['app']->setting->user_accounts): ?>
          <?php if ($_SESSION['user_id']): ?>
            Welcome, <strong><?php echo $_SESSION['first_name']; ?>
 <?php echo $_SESSION['last_name']; ?>
</strong>
            &nbsp;&nbsp;
            <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/account.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Your Account</a>
            &nbsp;&nbsp;
            <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/logout.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Log Out</a>
            &nbsp;&nbsp;
          <?php else: ?>
            <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/login.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Log In</a>
            &nbsp;&nbsp;
            <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/signup.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
">Create Account</a>
            &nbsp;&nbsp;
          <?php endif; ?>
        <?php endif; ?>
        <?php echo smarty_function_language_selector(array(), $this);?>

      </td>
    </tr>
  </table>
</div>