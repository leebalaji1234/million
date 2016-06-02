<?php 
include('config.php');
if (!empty($_POST['submit']))
{	
$content_name = mysql_real_escape_string($_POST['content_name']);
$content_description = mysql_real_escape_string($_POST['content_description']);
//save data
error_reporting(0);
 
 $query1="insert into mp_content(content_name,content_description,content_created_date,last_updated_date_time) values('$content_name','$content_description',now(),'$last_updated_date_time')"; 

mysql_query($query1);

$message = "Content Added Sucesfull ";
echo "<script type='text/javascript'>alert('$message');window.location.href='addcontent.php';</script>";
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
        <h1 class="page-header"> Add Content </h1>
      </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> Add New Content
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-6">
               <form method="post" action="" enctype="multipart/form-data">                  
                  
                  <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Content Name</label>
                      <input type="text" class="form-control" name="content_name" id="inputSuccess" required>
                    </div>                    
                    
                     <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Content Description</label>
                      <textarea id="mytextarea" name="content_description"></textarea>
                    </div>
                                        
                    
                    
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
