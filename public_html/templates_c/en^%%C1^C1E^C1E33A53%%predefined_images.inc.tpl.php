<?php /* Smarty version 2.6.12, created on 2016-03-18 11:29:04
         compiled from predefined_images.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'predefined_images.inc.tpl', 5, false),array('function', 'url', 'predefined_images.inc.tpl', 8, false),)), $this); ?>

<div class="tabber">

  <?php $_from = $this->_tpl_vars['predefined_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dir'] => $this->_tpl_vars['image_list']):
?>
  <div class="tabbertab" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
    <h3><?php echo ((is_array($_tmp=$this->_tpl_vars['dir'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
    <?php $_from = $this->_tpl_vars['image_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image_url']):
?>
    <a href="#" onclick="select_image('<?php echo ((is_array($_tmp=$this->_tpl_vars['image_url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
'); return false"><img src="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => "/".($this->_tpl_vars['image_url'])), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
" style="margin: 3px" alt="" border="0" /></a>
    <?php endforeach; endif; unset($_from); ?>
  </div>
  <?php endforeach; endif; unset($_from); ?>

</div>

<input type="hidden" name="predefined_image" value="" />

<?php echo '
<script type="text/javascript">
function select_image(img)
{
  var f = document.forms[0];
  f.predefined_image.value = img;
  f.submit();
}
</script>
'; ?>
