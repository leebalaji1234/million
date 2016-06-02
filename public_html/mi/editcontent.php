<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();

$content_name = mysql_real_escape_string($_POST['content_name']);
$content_description = mysql_real_escape_string($_POST['content_description']);
$content_created_date = mysql_real_escape_string($_POST['content_created_date']);
 mysql_query("update mp_contents set content_name='$content_name',content_description='$content_description',content_created_date='$content_created_date',last_updated_date_time=now() where content_id='{$_GET['content_id']}'");
$message = "Content Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='allcontent.php';</script>";
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
        <div class="col-md-6">
          <h1 class="page-header"> Content Management </h1>
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
						    $sql=mysql_query("select * from mp_contents where content_id='{$_GET['content_id']}'");
$row=mysql_fetch_array($sql);
?>
   <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Content Name</label>
                      <input type="text" class="form-control" name="content_name" id="inputSuccess" value="<?php echo $row['content_name'];?>" required>
                    </div>                    
                    
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Content Description</label>
                      <textarea id="mytextarea" name="content_description" value="<?php echo $row['content_description'];?>"><?php echo $row['content_description'];?></textarea>
                    </div>
                                        
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Content Created Date</label>
                      <input type="text" class="form-control" name="content_created_date" id="inputSuccess" value="<?php echo $row['content_created_date'];?>" readonly>
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
