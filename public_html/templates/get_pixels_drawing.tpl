 {assign var="page_title" value="##Drawings##"}
{include file="header.inc.tpl"} 

<!-- <p>{$page_title|escape}</p>  -->

{start_form id="drawings"}
<input type="hidden" name="step" value="{$step|escape}" />
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
{end_form}

  