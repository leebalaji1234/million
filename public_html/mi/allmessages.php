<?php
include('config.php'); //include of db config file
include ('paginate.php'); //include of paginat page
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
            <div class="panel-heading">Message Management &#8594; Message Details </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12"> 
                  
                  <!--    Context Classes  -->
                  <div class="panel panel-default">
                    <div class="panel-heading">Message Records </div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                          <?php
									
								 


$per_page =30;  // number of results to show per page


$sql="SELECT * FROM mp_snippets";

$result = mysql_query($sql);
//$result = mysql_query("SELECT * FROM events where aduser_id='$aduser_id'");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

if($total_results>0)
{
	?>
                          <thead>
                            <tr>
                              <th>Message Id</th>
                              <th>Message Key</th>
                              <th>Message Description</th>
                              <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

//-------------if page is setcheck------------------//
if (isset($_GET['page']))
 {
	 
     $show_page = $_GET['page'];   
	//$show_page = isset( $_GET['page'] )? $_GET['page']: '';          //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$page = isset($_GET['page']);  

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
 
	//$query=mysql_query("select * from users");
	for ($i = $start; $i < $end; $i++)  
	{
		if ($i == $total_results)
		 {
		 break;
		 }
	?>
                            <tr>
                              <td><?php echo mysql_result($result, $i, 'id');?></td>
                              <td><?php echo mysql_result($result, $i, 'snippet_key');?></td>
                              <td><?php echo mysql_result($result, $i, 'snippet_text');?></td>  
                              <td><a href="editmessages.php?id=<?php echo mysql_result($result, $i, 'id');?>">Edit</a></td>
                            </tr>
                            <?php }  ?>
                            <tr>
                              <td colspan="12" align="right"><?php 
	 $reload = "allmessages.php" . "?tpages=" . $tpages;
                    echo '<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
    <ul class="pagination">';
                    if ($total_pages > 1) {
						
						error_reporting(0);	
                        echo paginate($reload, $show_page, $total_pages);
                    } 
                    echo " </ul>
    </div>";
	?>
                                <?php
}
else
{
echo "No records found";	
	
}
?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!--  end  Context Classes  --> 
                  
                  <!-- display data starts -->
                  <table border="1">
                  </table>
                  <!-- display data end --> 
                  
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
