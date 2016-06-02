<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();
$snippet_key = mysql_real_escape_string($_POST['snippet_key']);
$snippet_text = mysql_real_escape_string($_POST['snippet_text']);
$email_key = mysql_real_escape_string($_POST['email_key']);

 mysql_query("update mp_snippets set snippet_key='$email_key',snippet_text='$snippet_text' where id='{$_GET['id']}'");

$message = "Message Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='allmessages.php';</script>";
//header('location:addteamleaders.php');
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
            <h1 class="page-header"> Message Management </h1>
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
                            $sql=mysql_query("select * from mp_snippets where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>
                    <?php 
              $sk=$row['snippet_key'];
							  
?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Message Type *</label>
                        <?php 
					  $query = mysql_query("SELECT * FROM mp_email_templates"); // Run your query			
echo '<select name="email_key" class="form-control" onchange="showHint(this.value);" required>'; 
// Open your drop down box results, outputing the options one by one
echo '<option value="" >Select Message Type</option>';
?>
                        <option value="<?php echo  $sk; ?>" selected><?php echo  $sk; ?></option>
                        <?php
while ($row = mysql_fetch_array($query)) {	
echo '<option value="'.$row['email_key'].'">'.$row['email_key'].'</option>';
  // echo '<option value="'.$row['username'].','.$row['id'].'">'.$row['username'].'</option>';
}
echo '</select>';// Close your drop down box
 ?>
                      
                        <script type="text/javascript">
 function showHint(str) {
	// alert('hi');
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
        xmlhttp.open("GET","displaymsg2.php?id="+str,true);
        xmlhttp.send();
    }
}
</script> 
                      </div>
                      
                       <?php
					    $sql=mysql_query("select * from mp_snippets where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>

                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Mail Subject</label>
                        <input type="text" class="form-control" name="snippet_key" id="inputSuccess" value="<?php echo $row['snippet_key'];?>" required>
                      </div>
                    <div class="form-group has-success" >
                        <label class="control-label" for="inputSuccess">Message Body</label>                  
                        <textarea class="form-control" name="snippet_text" rows="3" id="message" value="<?php echo $row['snippet_text'];?>" ><?php echo $row['snippet_text'];?></textarea>
                      </div>
                      <?php 
					  $query22 = mysql_query("SELECT * FROM mp_email_templates"); // Run your query	
while ($row22 = mysql_fetch_array($query22)) {	
echo $row22['parameters'];
}
 ?>
 <br />
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
