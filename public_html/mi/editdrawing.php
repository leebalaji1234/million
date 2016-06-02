<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();
$status = mysql_real_escape_string($_POST['status']);
$title = mysql_real_escape_string($_POST['title']);
$description = mysql_real_escape_string($_POST['description']);
$ip_address = mysql_real_escape_string($_POST['ip_address']);
$like_count = mysql_real_escape_string($_POST['like_count']);
$proof_file = mysql_real_escape_string($_POST['proof_file']);
$is_sponsored = mysql_real_escape_string($_POST['is_sponsored']);
$likes = mysql_real_escape_string($_POST['likes']);
$reports = mysql_real_escape_string($_POST['reports']);
$clicks = mysql_real_escape_string($_POST['clicks']);
$volunteer_id = mysql_real_escape_string($_POST['volunteer_id']);
		//for image
$drawing_image=$_FILES['drawing_image']['name'];
$drawing_size=$_FILES['drawing_image']['size'];
  mysql_query("update mp_drawings set status='$status',title='$title',description='$description',ip_address='$ip_address',drawing_image='$drawing_image',drawing_size='$drawing_size',like_count='$like_count',proof_file='$proof_file',is_sponsored='$is_sponsored',likes='$likes',reports='$reports',clicks='$clicks',volunteer_id='$volunteer_id' where id='{$_GET['id']}'");
//save user's image
move_uploaded_file($_FILES['drawing_image']['tmp_name'],"images/drawings/".$_FILES['drawing_image']['name']);
$message = "Drawing Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='alldrawing.php';</script>";
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
                            $sql=mysql_query("select * from mp_drawings where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">User Name </label>
                        <?php $ui=$row['user_id'];
							  $result77 = mysql_query("SELECT * FROM mp_users WHERE id ='$ui'");
while ($row77 = mysql_fetch_array($result77)) 
{
	 $username = $row77['first_name']; 
}	
?>
                        <input type="text" class="form-control" name="user_id" id="inputSuccess" value="<?php echo $username;?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Theme Id</label>
                        <?php $ti=$row['theme_id'];
							  $result88 = mysql_query("SELECT * FROM mp_themes WHERE id ='$ti'");
while ($row88 = mysql_fetch_array($result88)) 
{
	 $themename = $row88['name']; 
}	
?>
                        <input type="text" class="form-control" name="theme_id" id="inputSuccess" value="<?php echo $themename;?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Drawing Image Status *</label>
                        <?php $ds=$row['status'];  ?>
                        <select name="status" class="form-control" required>
                        <option <?php if($ds=='') { echo $ds='selected = "selected"'; } ?>>Drawing Image Status</option>
                        <option <?php if($ds=='1') { echo $ds='selected = "selected"';	 } ?> value="1">Active</option>
                        <option <?php if($ds=='0') { echo $ds='selected = "selected"';	 } ?> value="0">Inactive</option>
                      </select>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Drawing Title *</label>
                        <input type="text" class="form-control" name="title" id="inputSuccess" value="<?php echo $row['title'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Drawing Description *</label>
                        <textarea id="mytextarea" name="description" value="<?php echo $row['description'];?>" required><?php echo $row['description'];?></textarea>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">IP Address</label>
                        <input type="text" class="form-control" name="ip_address" id="inputSuccess" value="<?php echo $row['ip_address'];?>" required>
                      </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess"  >Drawing Image</label>
                        <?php $pi=$row['drawing_image']; ?>
                        <img src="images/drawings/<?php echo $row['drawing_image']; ?>" width="60px" height="60px" />
                        <input type="file" name="drawing_image" value="<?php //echo $row['drawing_image']; ?>" id="inputSuccess" style="display:none !important;">
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Drawing Size</label>
                        <input type="text" class="form-control" name="drawing_size" id="inputSuccess" value="<?php echo $row['drawing_size'];?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Like Count</label>
                        <input type="text" class="form-control" name="like_count" id="inputSuccess" value="<?php echo $row['like_count'];?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Proof File</label>
                        <input type="text" class="form-control" name="proof_file" id="inputSuccess" style="display:none !important" value="<?php echo $row['proof_file'];?>" ><a href="<?php echo $row['proof_file'];?>" target="_blank"><?php echo $row['proof_file'];?></a>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Create Date</label>
                        <input type="text" class="form-control" name="is_watermark" id="inputSuccess" value="<?php echo $row['created_at'];?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor Id</label>
                        <input type="text" class="form-control" name="is_sponsored" id="inputSuccess" value="<?php echo $row['is_sponsored'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Likes </label>
                        <input type="text" class="form-control" name="likes" id="inputSuccess" value="<?php echo $row['likes'];?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Reports</label>
                        <input type="text" class="form-control" name="reports" id="inputSuccess" value="<?php echo $row['reports'];?>" >
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Clicks</label>
                        <input type="text" class="form-control" name="clicks" id="inputSuccess" value="<?php echo $row['clicks'];?>" readonly>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Volunteer ID</label>
                        <input type="text" class="form-control" name="volunteer_id" id="inputSuccess" value="MDD<?php echo $row['volunteer_id'];?>" readonly>
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
