<?php /* Smarty version 2.6.12, created on 2016-03-18 02:25:24
         compiled from admin/blog.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'admin/blog.tpl', 4, false),array('function', 'url', 'admin/blog.tpl', 19, false),array('function', 'snippet', 'admin/blog.tpl', 19, false),)), $this); ?>
<?php $this->assign('page_title', 'Blog'); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<table class="grid">

  <tr>
    <th>Id</th>
    <th>Date</th>
    <th>Title</th>
    <th>Comments</th>
  </tr>

  <?php $_from = $this->_tpl_vars['blog_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog_article']):
?>
  <tr>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blog_article']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['blog_article']->created_at)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    <td><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/blog_article.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['blog_article']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=smarty_function_snippet(array('name' => 'blog_article_title','seq' => $this->_tpl_vars['blog_article']->id), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
</a></td>
    <td align="center"><?php if ($this->_tpl_vars['blog_article']->num_comments): ?><a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/blog_comments.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['blog_article']->id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['blog_article']->num_comments; ?>
</a><?php else: ?>0<?php endif; ?></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>

</table>

<p>
  <a href="<?php echo ((is_array($_tmp=smarty_function_url(array('href' => '/admin/blog_article.php'), $this))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp));?>
?new=1">New Article</a>
</p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin/footer.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>