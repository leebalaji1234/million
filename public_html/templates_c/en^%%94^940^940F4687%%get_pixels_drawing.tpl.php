<?php /* Smarty version 2.6.12, created on 2016-03-20 12:56:37
         compiled from get_pixels_drawing.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'get_pixels_drawing.tpl', 4, false),array('function', 'start_form', 'get_pixels_drawing.tpl', 6, false),array('function', 'end_form', 'get_pixels_drawing.tpl', 90, false),)), $this); ?>
 <?php $this->assign('page_title', 'Drawings');  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.inc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

<!-- <p><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>  -->

<?php echo smarty_function_start_form(array('id' => 'drawings'), $this);?>

<input type="hidden" name="step" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['step'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<input type="hidden" id="selectDrawing" name="drawingid"  value=""/>
 <div class="section">
      <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
          <li class="active">
            <a href="#">Nature</a>
          </li>
          <li class="active">
            <a href="#">Brands</a>
          </li>
          <li class="active">
            <a href="#">Messages</a>
          </li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="btn-group">
          <a href="#" class="btn btn-success">All</a>
          <a href="#" class="btn btn-success">Most Recents</a>
          <a href="#" class="btn btn-success">Most Populars</a>
          <a href="#" class="btn btn-success">Most Views</a>
          <a href="#" class="btn btn-success">Most Likes</a>
          <a href="#" class="btn btn-success">Sponsors Views</a>
          <a href="#" class="btn btn-success">Entrants Views</a>
          <a href="#" class="btn btn-success">Intelligence Themes</a>
          <a href="#" class="btn btn-success">Innovation Themes</a>
        </div>
        <p></p>
        <div class="btn-group">
          <a href="#" class="btn btn-default">Age 6 - 9</a>
          <a href="#" class="btn btn-default">Age 10 - 18</a>
          <a href="#" class="btn btn-default">Age above 18</a>
          <input class="btn btn-default" type="text" placeholder="Enter age">
          <a href="#" class="btn btn-default">India</a>
          <select class="btn btn-default">
            <option>Other</option>
            <option>USA</option>
            <option>Sri lanka</option>
          </select>
          <input type="text" placeholder="search here..." class="btn btn-default">
          <i class="btn btn-default fa fa-icon fa-search"></i>
          <a href="#" class="btn btn-warning">Upload Drawing</a>
        </div>
        
        <div class="well">
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus
            ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
            sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed
            odio dui.</p>
        </div>
        <div class="col-md-3">
          <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
          <h2>A title</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
            <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            <br>Ut enim ad minim veniam, quis nostrud
          </p>
          <p><button class="btn btn-danger text-left"><i class="fa fa-icon fa-report"></i>Report</button><button class="btn btn-info text-right" onclick="$('#selectDrawing').val(1);$('#drawings').submit();">Sponsor</button></p>
        </div>
        <div class="col-md-3">
          <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
          <h2>A title</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
            <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            <br>Ut enim ad minim veniam, quis nostrud</p>
        </div>
        <div class="col-md-3">
          <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive img-rounded">
          <h2>A title</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
            <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            <br>Ut enim ad minim veniam, quis nostrud</p>
        </div>
        <div class="col-md-3">
          <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
          <h2>A title</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
            <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            <br>Ut enim ad minim veniam, quis nostrud</p>
        </div>
      </div>
    </div>
<?php echo smarty_function_end_form(array(), $this);?>


  