<?php 
include('config.php');
extract($_POST); 
if (!empty($_POST['update']))
{
session_start();
$title = mysql_real_escape_string($_POST['title']);
$url  = mysql_real_escape_string($_POST['url']);
$alt = mysql_real_escape_string($_POST['alt']);
$email = mysql_real_escape_string($_POST['email']);
$amount = mysql_real_escape_string($_POST['amount']);
$payment_method = mysql_real_escape_string($_POST['payment_method']);
$is_completed = mysql_real_escape_string($_POST['is_completed']);
 mysql_query("update mp_regions set title='$title',url='$url',alt='$alt',email='$email',status='$status' where id='{$_GET['id']}'");
 mysql_query("update mp_payments set amount='$amount',payment_method='$payment_method',is_completed='$is_completed',completed_at='now()' where region_id='{$_GET['id']}'");
$message = "Sponsor Update Sucesfull";
echo "<script type='text/javascript'>alert('$message');window.location.href='allsponsor.php';</script>";
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
            <h1 class="page-header"> Sponsor Management </h1>
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
                            $sql=mysql_query("select * from mp_regions where id='{$_GET['id']}'");
$row=mysql_fetch_array($sql);
?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor Name *</label>
                        <input type="text" class="form-control" name="title" id="inputSuccess" value="<?php echo $row['title'];?>"  required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor URL *</label>
                        <input type="text" class="form-control" name="url" id="inputSuccess"  value="<?php echo $row['url'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Mouse Over Display *</label>
                        <input type="text" class="form-control" name="alt" id="inputSuccess" value="<?php echo $row['alt'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor Email *</label>
                        <input type="text" class="form-control" name="email" id="inputSuccess" value="<?php echo $row['email'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor Status</label>
                        <input type="text" class="form-control" name="status" id="inputSuccess" value="<?php echo $row['status'];?>" required>
                      </div>
                    
                    <?php
                            $sql22=mysql_query("select * from mp_payments where region_id='{$_GET['id']}'");
$row22=mysql_fetch_array($sql22);
?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor Amount *</label>
                        <input type="text" class="form-control" name="amount" id="inputSuccess" value="<?php echo $row22['amount'];?>" required>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Payment Method *</label>
                        <?php $pm=$row22['payment_method'];  ?>
                        <select name="payment_method" class="form-control" required>
                        <option <?php if($pm=='') { echo $se='selected = "selected"'; } ?>>Payment Method</option>
                        <option <?php if($pm=='paypal') { echo $pm='selected = "selected"';	 } ?> value="paypal">Paypal</option>
                        <option <?php if($pm=='normal') { echo $pm='selected = "selected"';	 } ?> value="normal">Normal</option>
                      </select>
                      </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Sponsor Payment Status</label>
                        <?php $ic=$row22['is_completed'];  ?>
                        <select name="is_completed" class="form-control">
                        <option <?php if($ic=='') { echo $se='selected = "selected"'; } ?>>Select Sponsor Payment Status</option>
                        <option <?php if($ic=='1') { echo $ic='selected = "selected"';	 } ?> value="1">Completed</option>
                        <option <?php if($ic=='0') { echo $ic='selected = "selected"';	 } ?> value="0">In Completed</option>
                      </select>
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
