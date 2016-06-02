<?php 
include('config.php');
if (!empty($_POST['submit']))
{	
//$message_type = mysql_real_escape_string($_POST['message_type']);
$snippet_key = mysql_real_escape_string($_POST['snippet_key']);
$snippet_text = mysql_real_escape_string($_POST['snippet_text']);
$email_key = mysql_real_escape_string($_POST['email_key']);
//save data
error_reporting(0);
 $query1="REPLACE INTO mp_snippets(`snippet_key`,`snippet_text`)VALUES('$email_key','$snippet_text')";

mysql_query($query1);
$message = "Message Added Sucesfull ";
echo "<script type='text/javascript'>alert('$message');window.location.href='addmessages.php';</script>";
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
	plugins: "image code table", 
	mode : "exact",
        elements : "message"
	
  });  
  </script>
  <!--- Additional End --->
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
            <h1 class="page-header"> Messages Management </h1>
          </div>
      </div>
        <!-- /. ROW  -->
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading"> Add New Message
                <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                    <form method="post" action="" enctype="multipart/form-data">
                        
                        <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Message Type *</label>
                        <?php 
					  $query = mysql_query("SELECT * FROM mp_email_templates"); // Run your query			
echo '<select name="email_key" class="form-control" onchange="showHint(this.value);" required>'; 
// Open your drop down box results, outputing the options one by one
echo '<option value="" >Select Message Type</option>';
while ($row = mysql_fetch_array($query)) {	
echo '<option value="'.$row['email_key'].'">'.$row['email_key'].'</option>';
  // echo '<option value="'.$row['username'].','.$row['id'].'">'.$row['username'].'</option>';
}
echo '</select>';// Close your drop down box
 ?>
                       
                        <script type="text/javascript">
 function showHint(str) {
	 //alert('hi');
    if (str == "") {
        document.getElementById("message").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("message").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","displaymsg.php?id="+str,true);
        xmlhttp.send();
    }
}
</script> 
                      </div>
                      <div id="message" >
                      </div>
                      <br />
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
<script src="assets/js/jquery-1.10.2.js"></script> 
<!-- Bootstrap Js --> 
<script src="assets/js/bootstrap.min.js"></script> 
<!-- Metis Menu Js --> 
<script src="assets/js/jquery.metisMenu.js"></script> 
<!-- Custom Js --> 
<script src="assets/js/custom-scripts.js"></script>
</body>
</html>
