<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();

$type=$_GET['type'];
if($type=='entrants')
{
	
 mysql_query("update mp_users set email='$email',pass='$pass',first_name='$first_name',last_name='$last_name',is_confirmed='$is_confirmed',dob='$dob',age='$age' where id='{$_GET['id']}'");

}
if($type=='volunteers')
{
 mysql_query("update mp_volunteers set email='$email',name='$first_name',status='$is_confirmed',country='$country',state='$state',city='$city' where id='{$_GET['id']}'");

}
if($type=='admin')
{
 mysql_query("update mp_admin_users set pass='$pass',user='$first_name' where id='{$_GET['id']}'");
//exit; 
}
$message = "User Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='alluser.php';</script>";
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
        <div class="col-md-6">
          <h1 class="page-header"> User Management </h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default"> 
            <!--<div class="panel-heading">
                            Add New Team Leaders
                        </div>-->
            <div class="panel-body">
              <div class="row">
              <div class="col-lg-6">        
                <form method="post" action="" enctype="multipart/form-data">                
                  <?php	  
				$type=$_GET['type'];
				 
				 if($type=='entrants')
				 {
                  $sql=mysql_query("select * from mp_users where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
                 }
				  if($type=='volunteers')
				 {
               $sql=mysql_query("select * from mp_volunteers where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
                 }
				   if($type=='admin')
				 {
			 $sql=mysql_query("select * from mp_admin_users where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
                 }

         // echo $type=$_GET['type'];
		  
              if($type=='admin')
				 {
					 
					 ?>
                   
                  <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">First Name *</label>
                      <input type="text" class="form-control" name="first_name" id="inputSuccess" value="<?php echo $row['user'];?>" required>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Password *</label>
                      <input type="text" class="form-control" name="pass" id="inputSuccess" value="<?php echo $row['pass'];?>" required>
                    </div> 
                              
                    <?php }
                    
                      if($type=='entrants')
				 {
					 
					 ?>                  
                    <form method="post" action="" enctype="multipart/form-data">  
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Email Id *</label>
                      <input type="text" class="form-control" name="email" id="inputSuccess" value="<?php echo $row['email'];?>" required>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Password *</label>
                      <input type="text" class="form-control" name="pass" id="inputSuccess" value="<?php echo $row['pass'];?>" required>
                    </div>
                    
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">First Name *</label>
                      <input type="text" class="form-control" name="first_name" id="inputSuccess" value="<?php echo $row['first_name'];?>" required>
                    </div>
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Last Name *</label>
                      <input type="text" class="form-control" name="last_name" id="inputSuccess" value="<?php echo $row['last_name'];?>" required>
                    </div>
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Created Date</label>
                      <input type="text" class="form-control" name="created_at" id="inputSuccess" value="<?php echo $row['created_at'];?>" readonly>
                    </div>
                      <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">User Status *</label>
                      
                      <?php $us=$row['is_confirmed'];  ?>
                    <select name="is_confirmed" class="form-control" required>                      
                       <option <?php if($us=='') { echo $se='selected = "selected"'; } ?>>User Status</option>
                        <option <?php if($us=='1') { echo $i='selected = "selected"';	 } ?> value="1">Active</option>
                        <option <?php if($us=='0') { echo $i='selected = "selected"';	 } ?> value="0">Inactive</option></select>
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
 <input type="text" class="form-control" id="date" name="dob"  value="<?php echo $row['dob'];?>"   onblur="getAge();" />
 </div>
    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Age</label>
<input type="text" id="age" name="age" value="<?php echo $row['age'];?>" class="form-control" placeholder="Age" >
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
                 
                 <?php } 
                 
                  if($type=='volunteers' )
				 {
					 
					 ?> 
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Email Id *</label>
                      <input type="text" class="form-control" name="email" id="inputSuccess" value="<?php echo $row['email'];?>" required>
                    </div>
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">First Name *</label>
                      <input type="text" class="form-control" name="first_name" id="inputSuccess" value="<?php echo $row['name'];?>" required>
                    </div>
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Created Date</label>
                      <input type="text" class="form-control" name="created_at" id="inputSuccess" value="<?php echo $row['created_at'];?>" readonly>
                    </div>
                      <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">User Status *</label>
                      
                      <?php $us=$row['status'];  ?>
                    <select name="is_confirmed" class="form-control" required>                      
                       <option <?php if($us=='') { echo $se='selected = "selected"'; } ?>>User Status</option>
                        <option <?php if($us=='1') { echo $i='selected = "selected"';	 } ?> value="1">Active</option>
                        <option <?php if($us=='0') { echo $i='selected = "selected"';	 } ?> value="0">Inactive</option></select>
                    </div>        
                 <?php //echo $row['country'];?>
                    <?php //echo $row['state'];?>
                    <?php //echo $row['city'];?>
                    <?php 
							$cot=$row['country'];
							  $result44 = mysql_query("SELECT * FROM mp_countries WHERE id ='$cot'");
while ($row44 = mysql_fetch_array($result44)) 
{
	 $countryname = $row44['name']; 
}	
?>
                    <?php 
							$st=$row['state'];
							  $result444 = mysql_query("SELECT * FROM mp_states WHERE id ='$st'");
while ($row444 = mysql_fetch_array($result444)) 
{
	  $statename = $row444['name']; 
}	
?>
                    <?php 
							$ct=$row['city'];
							  $result4444 = mysql_query("SELECT * FROM mp_cities WHERE id ='$ct'");
while ($row4444 = mysql_fetch_array($result4444)) 
{
	  $cityname = $row4444['name']; 
}	
?>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer Country</label>
                      <select class="form-control" name="country" onChange="getState(this.value)">
                        <option value="">Select Country</option>
                        <option value="<?php echo  $countryname; ?>" selected><?php echo  $countryname; ?></option>
                        <?php
	$query="SELECT * FROM mp_countries";
$result=mysql_query($query);
	 while ($row=mysql_fetch_array($result)) { ?>
                        <option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer State</label>
                      <div id="statediv">
                        <select class="form-control" name="state" >
                          <option value="<?php echo  $statename; ?>"><?php echo  $statename; ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer City</label>
                      <div id="citydiv">
                        <select class="form-control" name="city">
                          <option value="<?php echo  $cityname; ?>"><?php echo  $cityname; ?></option>
                        </select>
                      </div>
                    </div>
                
                 <?php } ?>
                  <button class="btn btn-default" type="submit" value="update" name="update">Update</button>
                </form>
                 
                </div>
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
