<?php   
  require_once('config.php');  
  require_once('country.class.php');
  
 
$tbl_country = new Countrie;
$countries = $tbl_country->find_all(); 
// require_once('theme.class.php');
// $tbl_themes = new Theme;
// $themes = $tbl_themes->find_all();  
// $smarty->assign_by_ref('themes', $themes);
// $smarty->display('get_pixels_drawing.tpl'); 
    
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 

  <!-- drawing module dependencies -->
   <script type="text/javascript" src="angular_includes/js/jquery.min.js"></script>
    <script type="text/javascript" src="custom_lib/cdn/bootstrap.min.js"></script>
   <link href="custom_lib/cdn/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="custom_lib/cdn/bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/custom.js"></script>

    <!-- <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css"> 
    <script type="text/javascript" src="js/custom.js"></script>-->
<!-- angular js includes  -->
        <script type='text/javascript' src='angular_includes/js/angular.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-sanitize.min.js'></script>
         <script type='text/javascript' src='angular_includes/js/angular-socialshare.js'></script>

        <!-- 
        <script type='text/javascript' src='angular_includes/js/angular-animate.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-resource.js'></script>
        <script type='text/javascript' src='angular_includes/js/angular-cookies.js'></script>
        <script type='text/javascript' src='angular_includes/js/dirPagination.js'></script>    -->
         <script type="text/javascript" src="angular_includes/js/app.js"></script>
         <link rel="stylesheet" type="text/css" href="weather/weather.css">
     
          


</head>
<body  ng-app="md" id="weather-background" class="default-weather">
  <canvas id="time-canvas">
 </canvas>
  <div    >
       <canvas id="rain-canvas">

        </canvas>

        <canvas id="cloud-canvas">

        </canvas>

        <canvas id="weather-canvas">

        </canvas>

        
        <canvas id="lightning-canvas">

        </canvas>
   </div>
  <div class="section" >
  <div  class="navbar navbar-default navbar-fixed-top" style="-webkit-box-shadow:inset 22px 22px 22px 22px #FC3059;
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
                <a href="index.php"><i class="fa fa-home"></i></a>
              </li>
              <li >
                <a href="get_pixels.php?step=2">Become Sponsor !</a>
              </li>
               <li class="active">
                <a href="drawings.php">Drawings</a>
              </li>
              <li>
                <a href="volunteer.php">Volunteers</a>
              </li>
              <?php if($app->setting->user_accounts) {?>
                <?php if($_SESSION['user_id']) {?>
                <li> <a href="account.php" class="trimtext">Welcome, <strong><!-- <?php echo $_SESSION['first_name']."  ". $_SESSION['last_name']; ?> -->My Profile</strong></a>
                </li>
                 
                <li>
                <a href="logout.php">Log Out</a>
                </li>
               <?php }else{?>
                <li><a href="login.php">Log In</a> </li>
                &nbsp;&nbsp;
                <li><a href="signup.php">Register</a></li>
                &nbsp;&nbsp;
                <?php }?>
         <?php }?> 
            </ul>
          </div>
        </div>
  </div>

  <!-- footer navbar -->
<!-- <div class="navbar navbar-default navbar-fixed-bottom" style="-webkit-box-shadow:inset 22px 22px 22px 22px #FC3059;
box-shadow:inset 22px 22px 22px 22px #ffffff;">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand"><span>Copyright@2016 milliondollardrawings.com</span></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#entrants">Top Entrants</a>
              </li>
              <li>
                <a href="#volunteers">Top Volunteers</a>
              </li>
              <li>
                <a href="#drawings">Top Drawings</a>
              </li>
              <li>
                <a href="#">Press</a>
              </li>
              <li>
                <a href="#">FAQ</a>
              </li>
              <li>
                <a href="#">Press</a>
              </li>
              <li>
                <a href="#">Testimonials</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div> -->
</div>
	<!-- <div class="toolbar">
  <table width="100%">
    <tr>
      <td>
        <a href="index.php">Home</a>
        &nbsp;&nbsp;
        <a href="get_pixels.php">Become Sponsor</a>
        &nbsp;&nbsp;
        <a href="drawings.php">Drawings</a>
         
      </td>
      <td align="right">
        <?php if($app->setting->user_accounts) {?>
         <?php if($_SESSION['user_id']) {?>
            Welcome, <strong><?php echo $_SESSION['first_name']."  ". $_SESSION['last_name']; ?></strong>
            &nbsp;&nbsp;
            <a href="account.php">Your Account</a>
            &nbsp;&nbsp;
            <a href="logout.php">Log Out</a>
            &nbsp;&nbsp;
          <?php }else{?>
            <a href="login.php">Log In</a>
            &nbsp;&nbsp;
            <a href="signup.php">Create Account</a>
            &nbsp;&nbsp;
          <?php }?>
         <?php }?>
        
      </td>
    </tr>
  </table>
</div>
 -->
 <?php if($_SESSION['drawing']['error'] ==1) {
          $_SESSION['drawing']['error'] = 0;
      ?>
       
      <div class="alert alert-danger col-md-12 text-center" style="z-index: 99999;">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(this).parent().slideToggle();">×</button>
        Maximum upload limit reached. contact administrator for further details
      </div>
    
    <?php }?>
    <?php if($_SESSION['drawing']['success'] ==1) {
          $_SESSION['drawing']['success'] = 0;
      ?>
     
      <div class="alert alert-success col-md-12 text-center" style="z-index: 99999;">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="$(this).parent().slideToggle();">×</button>
        Thanks for your upload! upload Process completed !
      </div>
     
    <?php }?>
	<div class="section"  >

      <div class="col-md-2">
        
        <themescontroller></themescontroller>

      </div>
      
      <div class="col-md-10">
        <div class="btn-group">
           
          <a href="#" class="filters btn btn-success" onclick="$('.filters').removeClass('active');" ng-click="sort('created')">Most Recents  <i class="fa fa-icon fa-arrow-down" ng-if="reverse == true"></i> </a> 
          <a href="#" class="filters btn btn-default" onclick="$('.filters').removeClass('active');" ng-click="countrysearch('101','India')">INDIA</a>
          <a href="#" class="filters btn btn-default" onclick="$('.filters').removeClass('active');" ng-click="countrysearch('231','United States')">USA</a>
          <a href="#" class="filters btn btn-default" onclick="$('.filters').removeClass('active');" ng-click="countrysearch('230','United Kingdom')">UK</a>
           
           <select   class="btn btn-default col-md-2 text-left" ng-model="countryselected" id="countryselection" ng-change="countrysearch(countryselected,this)" >
                      <option value="">Choose country</option> 
                        <?php foreach($countries as $c) {?> 
                        <option  value="<?php echo $c->id; ?>"><?php echo $c->name; ?> </option>
                        <?php } ?>
                      </select>
          <a href="#" class="filters btn btn-success" onclick="$('.filters').removeClass('active');$(this).addClass('active');$('.agecategory').toggle();">Age <i class="fa fa-caret-right"></i></a>
          <a href="#" class="filters agecategory btn btn-default" onclick="$('.filters').removeClass('active');" style="display:none;" ng-click="agesearch(6,9)" >6 - 9</a>
          <a href="#" class="filters agecategory btn btn-default" onclick="$('.filters').removeClass('active');" style="display:none;" ng-click="agesearch(10,13)">10 - 13</a>
           <a href="#" class="filters agecategory btn btn-default" onclick="$('.filters').removeClass('active');" style="display:none;" ng-click="agesearch(14,18)">14 - 18</a>
          <a href="#" class="filters agecategory btn btn-default" onclick="$('.filters').removeClass('active');" style="display:none;" ng-click="agesearch(18,100)">Above 18</a> 
          
          <input type="text" ng-model="search" placeholder="Search drawing name here..." class="btn btn-default">
           
          <a href="upload_drawing.php" class="btn btn-warning">Upload Drawing</a>
         <?php if($_SESSION['order_status']['w'] && $_SESSION['order_status']['h'] && $_SESSION['order_status']['step'] && $_SESSION['order_status']['grid_id']){ ?>
          <a   class="btn btn-warning" ng-click="onSkipSponsor()" >Just want to be a part of this innovation >> </a>
         <!--  <button class="btn btn-primary" onclick="window.history.back();">Back</button>  -->
          <?php } ?>
        </div>

        <ul id="breadcrumb" class="breadcrumb" style="color:white;display:none;background:none;">
              <li class="allfilters theme_all">
                <span class="theme"> -</span>
              </li>
              <li class="allfilters country_all" >
                <span class="country"> -</span>
              </li>
              <li class="allfilters age_all">
                <span class="age">-</span>
              </li>
              
        </ul>
       
       
        <hr/>
        <div class="well" style="display:none;">
          <button type="button" onclick="$(this).parent().slideToggle();" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <p id="themeDescWindow"></p>

        </div>
        <drawingscontroller></drawingscontroller>

        <!-- <div class="col-md-3" ng-repeat="x in drawings">
          <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
          <h2>A title1literal}/literal}</h2>
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

    <script type="text/javascript" src="weather/weather.js"></script>
</body>
</html>