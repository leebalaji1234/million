 {assign var="page_title" value="##Drawings##"}
{include file="header.inc.tpl"} 

<!-- <p>{$page_title|escape}</p>  -->

{start_form id="drawings"}
<input type="hidden" name="step" value="{$step|escape}" />
<input type="hidden" id="selectDrawing" name="drawingid"  value=""/>
 <div class="section"  >
      <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
          {foreach item=theme from=$themes} 
            <li class="hastheme label-info"  onclick="$('.hastheme').removeClass('active');$(this).addClass('active');">
              <a href="#">{$theme->name}</a>
            </li>
          {/foreach}
          
          
        </ul>
      </div>
      <div class="col-md-10">
        <div class="btn-group">
          <a href="#" class="btn btn-success">All</a>
          <a href="#" class="btn btn-success">Most Recents</a>
          <a href="#" class="btn btn-success">Most Populars</a> 
          <a href="#" class="btn btn-success">Most Likes</a>  
          <a href="#" class="btn btn-success">Innovation Themes</a>
          <a href="#" class="btn btn-success">Age 6 - 9</a>
          <a href="#" class="btn btn-success">Age 10 - 18</a>
          <a href="#" class="btn btn-success">Age above 18</a>
           <input class="btn btn-default col-md-2" type="text" placeholder="Search age"><i class="btn btn-default fa fa-icon fa-search"></i>
        </div>
        <p></p>
        <div class="btn-group col-md-offset-3"> 
           
          
         
          <a href="#" class="btn btn-default">India</a>
          <select class="btn btn-default">
            <option>Other</option>
            <option>USA</option>
            <option>Sri lanka</option>
          </select>
          <input type="text" placeholder="Search text here..." class="btn btn-default">
          <i class="btn btn-default fa fa-icon fa-search"></i>
          <a href="upload_drawing.php" class="btn btn-warning">Upload Drawing</a>
        </div>
        
        <div class="well ">
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus
            ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
            sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed
            odio dui.</p>
        </div>
        <drawingscontroller></drawingscontroller>
        <!-- <div class="col-md-3" ng-repeat="x in drawings">
          <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
          <h2>A title1{literal}{/literal}</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
            <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            <br>Ut enim ad minim veniam, quis nostrud
          </p>
          <p><button class="btn btn-danger text-left"><i class="fa fa-icon fa-report"></i>Report</button><button class="btn btn-info text-right" onclick="$('#selectDrawing').val(1);$('#drawings').submit();">Sponsor</button></p>
        </div> -->
        <!-- <div class="col-md-3">
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
        </div> -->
      </div>
    </div>
{end_form}

  