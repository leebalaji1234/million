244
a:4:{s:8:"template";a:5:{s:19:"account_details.tpl";b:1;s:12:"html.inc.tpl";b:1;s:15:"toolbar.inc.tpl";b:1;s:14:"header.inc.tpl";b:1;s:14:"footer.inc.tpl";b:1;}s:9:"timestamp";i:1461450807;s:7:"expires";i:1461454407;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://localhost/gp/public_html/style.css" />
  <link rel="alternate" type="application/rss+xml" title= "Latest Pixels" href="http://localhost/gp/public_html/rss_latest_pixels.php" />
  <link rel="alternate" type="application/rss+xml" title= "Top Pixels" href="http://localhost/gp/public_html/rss_top_pixels.php" />
  <link rel="alternate" type="application/rss+xml" title= "Blog Articles" href="http://localhost/gp/public_html/rss_blog_articles.php" />
  <title>MD - Account Details</title>

  <!-- drawing module dependencies -->
   <script type="text/javascript" src="custom_lib/cdn/jquery.min.js"></script>
    <script type="text/javascript" src="custom_lib/cdn/bootstrap.min.js"></script>
   <link href="custom_lib/cdn/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="custom_lib/cdn/bootstrap.css" rel="stylesheet" type="text/css">
     
    <script type="text/javascript" src="js/custom.js"></script>
    <!--<script type="text/javascript" src="twitter_plugin/tweecool.js"></script>-->
    <script type="text/javascript" src="twitter_plugin/twitterfeeds.js"></script>

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
</head><body  ng-app="md">
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
                <a href="http://localhost/gp/public_html/index.php"><i class="fa fa-home"></i></a>
              </li>
              <li class="active">
                <a href="http://localhost/gp/public_html/get_pixels.php">Become Sponsor !</a>
              </li>
              <li>
                <a href="http://localhost/gp/public_html/drawings.php">Drawings</a>
              </li>
               <li >
                <a href="http://localhost/gp/public_html/volunteer.php">Volunteers</a>
              </li>
                                              <li> <a href="http://localhost/gp/public_html/account.php">Welcome,  balaji1 arumugam </a>
                </li>
               <!--  <li>
                <a href="http://localhost/gp/public_html/account.php">Your Account</a>
                </li> -->
                <li>
                <a href="http://localhost/gp/public_html/logout.php">Log Out</a>
                </li>
                             
            </ul>
          </div>
        </div>
  </div> 

</div> 
<div>
<div class="section">
  <div class="container">
    <div class="row">
          <div class="col-md-12">
<h3 class="text-info">Account Details</h3>
<hr/>
 


<form method="post" action="/gp/public_html/account_details.php" class="form-horizontal">
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >First Name:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="first_name" class="form-control" size="20" value="balaji1" />
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Last Name:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="last_name" class="form-control" size="20" value="arumugam" />
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >E-Mail Address:</label>
  </div>
  <div class="col-sm-5"> 
   <p   class="form-control" >leebalaji@gmail.com</p>
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >New E-Mail Address:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email" class="form-control" size="20" value="" /> (Leave blank to keep current address)
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Re-Enter New E-Mail Address:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="email_confirm" class="form-control" size="20" value="" /> 
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Password:</label>
  </div>
  <div class="col-sm-5"> 
   ************
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >New Password:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="pass"  type="password" class="form-control" size="20" value="" /> (Leave blank to keep current password)
  </div>
</div>
<div class="form-group">
  <div class="col-sm-3">
    <label class="control-label" >Re-Enter New Password:</label>
  </div>
  <div class="col-sm-5"> 
   <input name="pass_confirm"  type="password" class="form-control" size="20" value="" />  
  </div>
</div>
 <div class="form-group">
<div class="col-sm-offset-3 col-sm-6">
   <input type="submit" value="Save Changes" class="btn btn-primary" name="submit_button"> 
</div>
</div>
 
</form>
</div>
</div>
</div>
</div>
<!-- footer -->
<div class="section">
  <div class="navbar navbar-default navbar-fixed-bottom" style="-webkit-box-shadow:inset 22px 22px 22px 22px #FC3059;
box-shadow:inset 22px 22px 22px 22px #ffffff;">
        <div class="container">
          <div class="navbar-header">
            <a class="navbar-brand"><span>Copyright@2016 milliondollardrawings.com</span></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="index.php#drawings">Top Drawings</a>
              </li>
              <li>
                <a href="index.php#sponsors">Top Sponsors</a>
              </li>
              <li>
                <a href="index.php#volunteers">Top Volunteers</a>
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
      </div>
      </div>
    </div>
  </body>
</html>