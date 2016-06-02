<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();
$name = mysql_real_escape_string($_POST['name']);
$address = mysql_real_escape_string($_POST['address']);
$email = mysql_real_escape_string($_POST['email']);
$phone = mysql_real_escape_string($_POST['phone']);
$country = mysql_real_escape_string($_POST['country']);
$state = mysql_real_escape_string($_POST['state']);
$status = mysql_real_escape_string($_POST['status']);
$city = mysql_real_escape_string($_POST['city']);

mysql_query("update mp_volunteers set name='$name',address='$address',email='$email',phone='$phone',status='$status',country='$country',state='$state',city='$city',updated_at='now()' where id='{$_GET['id']}'");
$message = "Volunteer Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='allvolunteer.php';</script>";
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
          <h1 class="page-header"> Volunteer Management </h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default"> 
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
                  <form method="post" action="" enctype="multipart/form-data">
                    <?php
                            $sql=mysql_query("select * from mp_volunteers where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer Name *</label>
                      <input type="text" class="form-control" name="name" id="inputSuccess" value="<?php echo $row['name'];?>" required>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer Address *</label>
                      <textarea  name="address" id="inputSuccess" class="form-control" value="<?php echo $row['address'];?>" required><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer Email Id *</label>
                      <input type="email" class="form-control" name="email" id="inputSuccess" value="<?php echo $row['email'];?>" required>
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer Phone *</label>
                      <input type="text" class="form-control" name="phone" id="inputSuccess" value="<?php echo $row['phone'];?>" required>
                    </div>
                    
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Volunteer Status *</label>
                      
                      <?php $us=$row['status'];  ?>
                    <select name="status" class="form-control" required>                      
                       <option <?php if($us=='') { echo $se='selected = "selected"'; } ?>>User Status</option>
                        <option <?php if($us=='1') { echo $i='selected = "selected"';	 } ?> value="1">Active</option>
                        <option <?php if($us=='0') { echo $i='selected = "selected"';	 } ?> value="0">Inactive</option></select>*
                    </div>
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
<script src="assets/js/jquery-1.10.2.js"></script> 
<!-- Bootstrap Js --> 
<script src="assets/js/bootstrap.min.js"></script> 
<!-- Metis Menu Js --> 
<script src="assets/js/jquery.metisMenu.js"></script> 
<!-- Custom Js --> 
<script src="assets/js/custom-scripts.js"></script>
</body>
</html>
