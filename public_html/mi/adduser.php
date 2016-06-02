<?php 
include('config.php');
if (!empty($_POST['submit']))
{	
$email = mysql_real_escape_string($_POST['email']);
$pass = mysql_real_escape_string($_POST['pass']);
$first_name = mysql_real_escape_string($_POST['first_name']);
$last_name = mysql_real_escape_string($_POST['last_name']);
$is_confirmed = mysql_real_escape_string($_POST['is_confirmed']);
$country = mysql_real_escape_string($_POST['country']);
$state = mysql_real_escape_string($_POST['state']);
$city = mysql_real_escape_string($_POST['city']);
$dob = mysql_real_escape_string($_POST['dob']);
$age = mysql_real_escape_string($_POST['age']);
$user_type = mysql_real_escape_string($_POST['user_type']);
//save data
error_reporting(0);
if($user_type=='entrants')
{ 
echo  $query1="insert into mp_users(email,pass,created_at,first_name,last_name,is_confirmed,country,state,city,dob,age)values('$email','$pass','now();','$first_name','$last_name','$is_confirmed','$country','$state','$city','$dob','$age')";  
}
if($user_type=='volunteers')
{ 
 $query1="insert into mp_volunteers(name,country,state,city,email,created_at,status)values('$first_name','$country','$state','$city','$email','now();','$is_confirmed')";   
}
if($user_type=='admin')
{ 
 $query1="insert into mp_admin_users(first_name,pass)values('$first_name','$pass')";   
}
mysql_query($query1);
$message = "User Added Sucesfull ";
echo "<script type='text/javascript'>alert('$message');window.location.href='adduser.php';</script>";
//echo "<font color='blue'>Congrates !</font>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Million Dollar Drawings</title>
<!-- Bootstrap Styles-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- Custom Styles-->
<link href="assets/css/custom-styles.css" rel="stylesheet" />
<!-- Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!---- Additional Start --->
<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
<!--<script src="https://tinymce.cachefly.net/4.3/tinymce.min.js"></script>-->
<script>
  tinymce.init({
    selector: '#mytextarea',
	plugins: "image code table"
	
  });
  </script>
<!--- Additional End --->
<script language="javascript" type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }	
	function getState(countryId) {			
		var strURL="findState.php?country="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;
						document.getElementById('citydiv').innerHTML='<select name="city">'+
						'<option>Select City</option>'+
				        '</select>';						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(countryId,stateId) {		
		var strURL="findCity.php?country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>


 <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css">
</head>
<body>
<div id="wrapper"> 
  <!--/. NAV TOP  -->
  <?php include('menudash.php'); ?>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper" >
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-header"> User Management </h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading"> Add New User
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">User Type</label>
                      <select class="form-control"  name="user_type">
                        <option value="" selected="selected">Select User Type</option>
                        <option value="entrants">Entrants</option>
                         <option value="volunteers">Volunteers</option>
                        <option value="admin">Admin</option>
                     </select>
                    </div>    
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Email Id *</label>
                        <input type="text" class="form-control" name="email" id="inputSuccess" required>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Password *</label>
                        <input type="password" class="form-control" name="pass" id="inputSuccess" required>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">First Name *</label>
                        <input type="text" class="form-control" name="first_name" id="inputSuccess" required>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Last Name *</label>
                        <input type="text" class="form-control" name="last_name" id="inputSuccess" required>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">User Status *</label>
                        <select class="form-control"  name="is_confirmed">
                          <option value="" selected="selected" required>Select User Status</option>
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Entrants Country</label>
                        <select class="form-control" name="country" onChange="getState(this.value)">
                          <option value="">Select Country</option>
                          <?php
	$query="SELECT * FROM mp_countries";
$result=mysql_query($query);
	 while ($row=mysql_fetch_array($result)) { ?>
                          <option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Entrants State</label>
                        <div id="statediv">
                          <select class="form-control" name="state" >
                            <option>Select State</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Entrants City</label>
                        <div id="citydiv">
                          <select class="form-control" name="city">
                            <option>Select City</option>
                          </select>
                        </div>
                      </div>                      
                   <script type="text/javascript">

function getAge(){
    var dob = document.getElementById('date').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('age').value=age;
}

  $("#date").datepicker({
 
});
  
  $(document).ready(function () {
                
                $('#date').datepicker({
                    format: "dd/mm/yyyy"
                });  
				 });
  </script>
  
      <div class="form-group has-success">
<label class="control-label" for="inputSuccess">Date of Birth</label>
 <input type="text" class="form-control" value="" id="date" name="dob" onblur="getAge();" />
 </div>
    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Age</label>
<input type="text" id="age" name="age" value="" class="form-control" placeholder="Age">
</div>
                      
                   <script src="assets/js/jquery-1.9.1.min.js"></script> 
                      <script src="assets/js/bootstrap-datepicker.js"></script> 
                      <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });              
            });
        </script>    
                      
                      
                    
                      <button class="btn btn-default" type="submit" value="submit" name="submit">Submit</button>
                    </form>
                  </div>
                  <!-- /.col-lg-6 (nested) --> 
                  <!-- /.col-lg-6 (nested) --> 
                </div>
                <!-- /.row (nested) --> 
              </div>
              <!-- /.panel-body --> 
            </div>
            <!-- /.panel --> 
          </div>
          <!-- /.col-lg-12 --> 
        </div>
        <footer>
          <p>All Right Reserved. Developed By: <a href="#"> Way2winsoftware.com</a></p>
        </footer>
      </div>
      <!-- /. PAGE INNER  --> 
    </div>
    <!-- /. PAGE WRAPPER  --> 
  </div>
</div>
<!-- /. WRAPPER  --> 
<!-- JS Scripts--> 
<!-- jQuery Js --> 
<!--<script src="assets/js/jquery-1.10.2.js"></script>--> 
<!-- Bootstrap Js --> 
<script src="assets/js/bootstrap.min.js"></script> 
<!-- Metis Menu Js --> 
<script src="assets/js/jquery.metisMenu.js"></script> 
<!-- Custom Js --> 
<script src="assets/js/custom-scripts.js"></script>
</body>
</html>
