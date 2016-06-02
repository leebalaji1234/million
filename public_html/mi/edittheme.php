<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();
$name = mysql_real_escape_string($_POST['name']);
$description = mysql_real_escape_string($_POST['description']);
$display_order = mysql_real_escape_string($_POST['display_order']);
$category_id = mysql_real_escape_string($_POST['category_id']);
$status = mysql_real_escape_string($_POST['status']);
 mysql_query("update mp_themes set name='$name',description='$description',display_order='$display_order',category_id='$category_id',status='$status' where id='{$_GET['id']}'");
//exit; 
$message = "Theme Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='alltheme.php';</script>";
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
            <h1 class="page-header"> Theme Management </h1>
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
                            $sql=mysql_query("select * from mp_themes where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Theme Name *</label>
                        <input type="text" class="form-control" name="name" id="inputSuccess" value="<?php echo $row['name'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Theme Description *</label>
                        <textarea id="mytextarea" name="description" value="<?php echo $row['description'];?>"><?php echo $row['description'];?></textarea>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Display Order *</label>
                        <input type="text" class="form-control" name="display_order" id="inputSuccess" value="<?php echo $row['display_order'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Category Name *</label>
                        <?php 	
						 $ci=$row['category_id'];						
						$query23=mysql_query("select * from mp_theme_categories where id='$ci'");
 while($row23=mysql_fetch_array($query23))
        {
		$ci=$row23['name'];
        }					
						
			$query = mysql_query("SELECT * FROM mp_theme_categories"); // Run your query			
echo '<select name="category_id" class="form-control" required>'; 
// Open your drop down box results, outputing the options one by one

?> <option value="<?php echo  $ci; ?>"><?php echo  $ci; ?></option><?php

//echo '<option value="">Select Category Name</option>';
while ($row = mysql_fetch_array($query)) {	
	echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
echo '</select>';// Close your drop down box
 ?>
                      </div>
                    
                     <?php
                            $sql=mysql_query("select * from mp_themes where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Theme Status</label>
                        <?php $ts=$row['status'];  ?>
                        <select name="status" class="form-control" required>
                        <option <?php if($ts=='') { echo $se='selected = "selected"'; } ?>>Select Theme Status</option>
                        <option <?php if($ts=='1') { echo $i='selected = "selected"';	 } ?> value="1">Active</option>
                        <option <?php if($ts=='0') { echo $i='selected = "selected"';	 } ?> value="0">Inactive</option>
                      </select>
                        * </div>
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
