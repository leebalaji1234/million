239
a:4:{s:8:"template";a:5:{s:14:"volunteers.tpl";b:1;s:12:"html.inc.tpl";b:1;s:15:"toolbar.inc.tpl";b:1;s:14:"header.inc.tpl";b:1;s:14:"footer.inc.tpl";b:1;}s:9:"timestamp";i:1461612690;s:7:"expires";i:1461616290;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://localhost/gp/public_html/style.css" />
  <link rel="alternate" type="application/rss+xml" title= "Latest Pixels" href="http://localhost/gp/public_html/rss_latest_pixels.php" />
  <link rel="alternate" type="application/rss+xml" title= "Top Pixels" href="http://localhost/gp/public_html/rss_top_pixels.php" />
  <link rel="alternate" type="application/rss+xml" title= "Blog Articles" href="http://localhost/gp/public_html/rss_blog_articles.php" />
  <title>MD - Volunteer Register </title>

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
                                              <li><a href="http://localhost/gp/public_html/login.php">Log In</a> </li>
                &nbsp;&nbsp;
                <li><a href="http://localhost/gp/public_html/signup.php">Register</a></li>
                &nbsp;&nbsp;
                               
            </ul>
          </div>
        </div>
  </div> 

</div> 
<div>
<div class="section">
  <div class="container">
<!-- <h1>Volunteer Register </h1> -->  

<form method="post" action="/gp/public_html/volunteer.php" enctype="multipart/form-data" class="form-horizontal">
  
<div class="row">
 <!--  <div class="alert alert-primary col-md-10 text-center">
        <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Thanks for Register to us!</strong> You will be receive an email with your code. You can use code on the upload art
      </div> -->
          <div class="col-md-12">
            <div class="panel panel-default">
              <div  >
                <span class="text-primary col-md-5"> <h4><strong>Volunteer Register | Get Volunteer Code</strong></h4>
                   </span> 
              <p class="text-left col-md-6">
                
                <div class="input-group ">
                   
                <input type="text" class="form-control" id="getemail" placeholder="Enter registered email">

              
               <span class="input-group-btn">
                <a class="btn btn-success" type="submit" onclick="getVolunteercode($('#getemail').val());">Show Code</a>
                </span>
                 
                </div>

                 

            </p>
                  <hr/>
              </div>
              <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">Name</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="name" id="title1" class="form-control" palceholder="Enter name ..." value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="email" id="title1" class="form-control" palceholder="Enter email ..." value="" />
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-sm-2">
                      <label for="file1" class="control-label">Phone</label>
                    </div>
                    <div class="col-sm-5"> 
                      <input  name="phone" id="title1" class="form-control" palceholder="Enter phone ..." value="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">Address</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <textarea name="address" id="desc" class="form-control" palceholder="address  here ..."  ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">Country</label>
                    </div>
                    <div class="col-sm-5"> 
                      <select name="country" id="theme1" class="form-control" onchange="countrySelect(this.value);" >
                      <option value="">Choose country</option> 
                                                <option  value='1'  >Afghanistan </option>
                                                <option  value='2'  >Albania </option>
                                                <option  value='3'  >Algeria </option>
                                                <option  value='4'  >American Samoa </option>
                                                <option  value='5'  >Andorra </option>
                                                <option  value='6'  >Angola </option>
                                                <option  value='7'  >Anguilla </option>
                                                <option  value='8'  >Antarctica </option>
                                                <option  value='9'  >Antigua And Barbuda </option>
                                                <option  value='10'  >Argentina </option>
                                                <option  value='11'  >Armenia </option>
                                                <option  value='12'  >Aruba </option>
                                                <option  value='13'  >Australia </option>
                                                <option  value='14'  >Austria </option>
                                                <option  value='15'  >Azerbaijan </option>
                                                <option  value='16'  >Bahamas The </option>
                                                <option  value='17'  >Bahrain </option>
                                                <option  value='18'  >Bangladesh </option>
                                                <option  value='19'  >Barbados </option>
                                                <option  value='20'  >Belarus </option>
                                                <option  value='21'  >Belgium </option>
                                                <option  value='22'  >Belize </option>
                                                <option  value='23'  >Benin </option>
                                                <option  value='24'  >Bermuda </option>
                                                <option  value='25'  >Bhutan </option>
                                                <option  value='26'  >Bolivia </option>
                                                <option  value='27'  >Bosnia and Herzegovina </option>
                                                <option  value='28'  >Botswana </option>
                                                <option  value='29'  >Bouvet Island </option>
                                                <option  value='30'  >Brazil </option>
                                                <option  value='31'  >British Indian Ocean Territory </option>
                                                <option  value='32'  >Brunei </option>
                                                <option  value='33'  >Bulgaria </option>
                                                <option  value='34'  >Burkina Faso </option>
                                                <option  value='35'  >Burundi </option>
                                                <option  value='36'  >Cambodia </option>
                                                <option  value='37'  >Cameroon </option>
                                                <option  value='38'  >Canada </option>
                                                <option  value='39'  >Cape Verde </option>
                                                <option  value='40'  >Cayman Islands </option>
                                                <option  value='41'  >Central African Republic </option>
                                                <option  value='42'  >Chad </option>
                                                <option  value='43'  >Chile </option>
                                                <option  value='44'  >China </option>
                                                <option  value='45'  >Christmas Island </option>
                                                <option  value='46'  >Cocos (Keeling) Islands </option>
                                                <option  value='47'  >Colombia </option>
                                                <option  value='48'  >Comoros </option>
                                                <option  value='49'  >Congo </option>
                                                <option  value='50'  >Congo The Democratic Republic Of The </option>
                                                <option  value='51'  >Cook Islands </option>
                                                <option  value='52'  >Costa Rica </option>
                                                <option  value='53'  >Cote D'Ivoire (Ivory Coast) </option>
                                                <option  value='54'  >Croatia (Hrvatska) </option>
                                                <option  value='55'  >Cuba </option>
                                                <option  value='56'  >Cyprus </option>
                                                <option  value='57'  >Czech Republic </option>
                                                <option  value='58'  >Denmark </option>
                                                <option  value='59'  >Djibouti </option>
                                                <option  value='60'  >Dominica </option>
                                                <option  value='61'  >Dominican Republic </option>
                                                <option  value='62'  >East Timor </option>
                                                <option  value='63'  >Ecuador </option>
                                                <option  value='64'  >Egypt </option>
                                                <option  value='65'  >El Salvador </option>
                                                <option  value='66'  >Equatorial Guinea </option>
                                                <option  value='67'  >Eritrea </option>
                                                <option  value='68'  >Estonia </option>
                                                <option  value='69'  >Ethiopia </option>
                                                <option  value='70'  >External Territories of Australia </option>
                                                <option  value='71'  >Falkland Islands </option>
                                                <option  value='72'  >Faroe Islands </option>
                                                <option  value='73'  >Fiji Islands </option>
                                                <option  value='74'  >Finland </option>
                                                <option  value='75'  >France </option>
                                                <option  value='76'  >French Guiana </option>
                                                <option  value='77'  >French Polynesia </option>
                                                <option  value='78'  >French Southern Territories </option>
                                                <option  value='79'  >Gabon </option>
                                                <option  value='80'  >Gambia The </option>
                                                <option  value='81'  >Georgia </option>
                                                <option  value='82'  >Germany </option>
                                                <option  value='83'  >Ghana </option>
                                                <option  value='84'  >Gibraltar </option>
                                                <option  value='85'  >Greece </option>
                                                <option  value='86'  >Greenland </option>
                                                <option  value='87'  >Grenada </option>
                                                <option  value='88'  >Guadeloupe </option>
                                                <option  value='89'  >Guam </option>
                                                <option  value='90'  >Guatemala </option>
                                                <option  value='91'  >Guernsey and Alderney </option>
                                                <option  value='92'  >Guinea </option>
                                                <option  value='93'  >Guinea-Bissau </option>
                                                <option  value='94'  >Guyana </option>
                                                <option  value='95'  >Haiti </option>
                                                <option  value='96'  >Heard and McDonald Islands </option>
                                                <option  value='97'  >Honduras </option>
                                                <option  value='98'  >Hong Kong S.A.R. </option>
                                                <option  value='99'  >Hungary </option>
                                                <option  value='100'  >Iceland </option>
                                                <option  value='101'  >India </option>
                                                <option  value='102'  >Indonesia </option>
                                                <option  value='103'  >Iran </option>
                                                <option  value='104'  >Iraq </option>
                                                <option  value='105'  >Ireland </option>
                                                <option  value='106'  >Israel </option>
                                                <option  value='107'  >Italy </option>
                                                <option  value='108'  >Jamaica </option>
                                                <option  value='109'  >Japan </option>
                                                <option  value='110'  >Jersey </option>
                                                <option  value='111'  >Jordan </option>
                                                <option  value='112'  >Kazakhstan </option>
                                                <option  value='113'  >Kenya </option>
                                                <option  value='114'  >Kiribati </option>
                                                <option  value='115'  >Korea North </option>
                                                <option  value='116'  >Korea South </option>
                                                <option  value='117'  >Kuwait </option>
                                                <option  value='118'  >Kyrgyzstan </option>
                                                <option  value='119'  >Laos </option>
                                                <option  value='120'  >Latvia </option>
                                                <option  value='121'  >Lebanon </option>
                                                <option  value='122'  >Lesotho </option>
                                                <option  value='123'  >Liberia </option>
                                                <option  value='124'  >Libya </option>
                                                <option  value='125'  >Liechtenstein </option>
                                                <option  value='126'  >Lithuania </option>
                                                <option  value='127'  >Luxembourg </option>
                                                <option  value='128'  >Macau S.A.R. </option>
                                                <option  value='129'  >Macedonia </option>
                                                <option  value='130'  >Madagascar </option>
                                                <option  value='131'  >Malawi </option>
                                                <option  value='132'  >Malaysia </option>
                                                <option  value='133'  >Maldives </option>
                                                <option  value='134'  >Mali </option>
                                                <option  value='135'  >Malta </option>
                                                <option  value='136'  >Man (Isle of) </option>
                                                <option  value='137'  >Marshall Islands </option>
                                                <option  value='138'  >Martinique </option>
                                                <option  value='139'  >Mauritania </option>
                                                <option  value='140'  >Mauritius </option>
                                                <option  value='141'  >Mayotte </option>
                                                <option  value='142'  >Mexico </option>
                                                <option  value='143'  >Micronesia </option>
                                                <option  value='144'  >Moldova </option>
                                                <option  value='145'  >Monaco </option>
                                                <option  value='146'  >Mongolia </option>
                                                <option  value='147'  >Montserrat </option>
                                                <option  value='148'  >Morocco </option>
                                                <option  value='149'  >Mozambique </option>
                                                <option  value='150'  >Myanmar </option>
                                                <option  value='151'  >Namibia </option>
                                                <option  value='152'  >Nauru </option>
                                                <option  value='153'  >Nepal </option>
                                                <option  value='154'  >Netherlands Antilles </option>
                                                <option  value='155'  >Netherlands The </option>
                                                <option  value='156'  >New Caledonia </option>
                                                <option  value='157'  >New Zealand </option>
                                                <option  value='158'  >Nicaragua </option>
                                                <option  value='159'  >Niger </option>
                                                <option  value='160'  >Nigeria </option>
                                                <option  value='161'  >Niue </option>
                                                <option  value='162'  >Norfolk Island </option>
                                                <option  value='163'  >Northern Mariana Islands </option>
                                                <option  value='164'  >Norway </option>
                                                <option  value='165'  >Oman </option>
                                                <option  value='166'  >Pakistan </option>
                                                <option  value='167'  >Palau </option>
                                                <option  value='168'  >Palestinian Territory Occupied </option>
                                                <option  value='169'  >Panama </option>
                                                <option  value='170'  >Papua new Guinea </option>
                                                <option  value='171'  >Paraguay </option>
                                                <option  value='172'  >Peru </option>
                                                <option  value='173'  >Philippines </option>
                                                <option  value='174'  >Pitcairn Island </option>
                                                <option  value='175'  >Poland </option>
                                                <option  value='176'  >Portugal </option>
                                                <option  value='177'  >Puerto Rico </option>
                                                <option  value='178'  >Qatar </option>
                                                <option  value='179'  >Reunion </option>
                                                <option  value='180'  >Romania </option>
                                                <option  value='181'  >Russia </option>
                                                <option  value='182'  >Rwanda </option>
                                                <option  value='183'  >Saint Helena </option>
                                                <option  value='184'  >Saint Kitts And Nevis </option>
                                                <option  value='185'  >Saint Lucia </option>
                                                <option  value='186'  >Saint Pierre and Miquelon </option>
                                                <option  value='187'  >Saint Vincent And The Grenadines </option>
                                                <option  value='188'  >Samoa </option>
                                                <option  value='189'  >San Marino </option>
                                                <option  value='190'  >Sao Tome and Principe </option>
                                                <option  value='191'  >Saudi Arabia </option>
                                                <option  value='192'  >Senegal </option>
                                                <option  value='193'  >Serbia </option>
                                                <option  value='194'  >Seychelles </option>
                                                <option  value='195'  >Sierra Leone </option>
                                                <option  value='196'  >Singapore </option>
                                                <option  value='197'  >Slovakia </option>
                                                <option  value='198'  >Slovenia </option>
                                                <option  value='199'  >Smaller Territories of the UK </option>
                                                <option  value='200'  >Solomon Islands </option>
                                                <option  value='201'  >Somalia </option>
                                                <option  value='202'  >South Africa </option>
                                                <option  value='203'  >South Georgia </option>
                                                <option  value='204'  >South Sudan </option>
                                                <option  value='205'  >Spain </option>
                                                <option  value='206'  >Sri Lanka </option>
                                                <option  value='207'  >Sudan </option>
                                                <option  value='208'  >Suriname </option>
                                                <option  value='209'  >Svalbard And Jan Mayen Islands </option>
                                                <option  value='210'  >Swaziland </option>
                                                <option  value='211'  >Sweden </option>
                                                <option  value='212'  >Switzerland </option>
                                                <option  value='213'  >Syria </option>
                                                <option  value='214'  >Taiwan </option>
                                                <option  value='215'  >Tajikistan </option>
                                                <option  value='216'  >Tanzania </option>
                                                <option  value='217'  >Thailand </option>
                                                <option  value='218'  >Togo </option>
                                                <option  value='219'  >Tokelau </option>
                                                <option  value='220'  >Tonga </option>
                                                <option  value='221'  >Trinidad And Tobago </option>
                                                <option  value='222'  >Tunisia </option>
                                                <option  value='223'  >Turkey </option>
                                                <option  value='224'  >Turkmenistan </option>
                                                <option  value='225'  >Turks And Caicos Islands </option>
                                                <option  value='226'  >Tuvalu </option>
                                                <option  value='227'  >Uganda </option>
                                                <option  value='228'  >Ukraine </option>
                                                <option  value='229'  >United Arab Emirates </option>
                                                <option  value='230'  >United Kingdom </option>
                                                <option  value='231'  >United States </option>
                                                <option  value='232'  >United States Minor Outlying Islands </option>
                                                <option  value='233'  >Uruguay </option>
                                                <option  value='234'  >Uzbekistan </option>
                                                <option  value='235'  >Vanuatu </option>
                                                <option  value='236'  >Vatican City State (Holy See) </option>
                                                <option  value='237'  >Venezuela </option>
                                                <option  value='238'  >Vietnam </option>
                                                <option  value='239'  >Virgin Islands (British) </option>
                                                <option  value='240'  >Virgin Islands (US) </option>
                                                <option  value='241'  >Wallis And Futuna Islands </option>
                                                <option  value='242'  >Western Sahara </option>
                                                <option  value='243'  >Yemen </option>
                                                <option  value='244'  >Yugoslavia </option>
                                                <option  value='245'  >Zambia </option>
                                                <option  value='246'  >Zimbabwe </option>
                                              </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="desc" class="control-label">State</label>
                    </div>
                    <div class="col-sm-5"> 
                       
                      <select name="state" id="state" class="form-control" onchange="stateSelect(this.value);"> 
                         
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="title1" class="control-label">City</label>
                    </div>
                    <div class="col-sm-5"> 
                     <select name="city" id="city" class="form-control" > 
                         
                      </select>
                    </div>
                  </div>
                  
                               <div class="form-group ">
                     
                    <div class="col-sm-5 col-sm-offset-2 well"> 
                     <input name="phrase" size="10" value="" />&nbsp;
                     <img src="http://localhost/gp/public_html/captcha_image.php?x=1461612690" style="vertical-align: middle;border-radius:20px;border:2px solid grey;" alt="CAPTCHA Image" />
                      <p class="text-muted">Enter text from image at right</p> 
                    </div>
                  </div>
                         
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                       
                      
                       <input name="submit_button" type="submit" class="btn btn-primary" value="Continue &gt;&gt;" /> 
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>


</form>
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