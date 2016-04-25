<?php
require_once('config.php');
require_once('util.class.php'); 
require_once('drawing.class.php'); 
require_once('drawing_report.class.php'); 
  
 if(isset($_POST) && $_POST['name'] && $_POST['email']){
 
 	 $tbl_reports = new Drawing_report;
 	 $tbl_reports->name = $_POST['name'];
 	 $tbl_reports->email = $_POST['email'];
 	 $tbl_reports->issue_type = $_POST['issue_type'];
 	 $tbl_reports->drawing_id = $_POST['drawing_id'];
 	 $tbl_reports->issue = $_POST[$_POST["issue_type"].'_issue'];
 	 $tbl_reports->additional_details = $_POST['additional_details'];
 	 $tbl_reports->created_at = Util::epoch_to_datetime();
 	 $tbl_reports->save(); 

 	  $tbl_drawing = new Drawing;
 	  $drawing = $tbl_drawing->get($_POST['drawing_id']);
 	  $drawing->reports = $drawing->reports+1;
 	  $drawing->save();

 	 $mailContent = '';
 	 $mailContent .= "Issue Type : ".$_POST['issue_type']."<br/>";
 	 $mailContent .= "Issue : ".$_POST[$_POST["issue_type"].'_issue']."<br/>";
 	 if(isset($_POST['additional_details']) && $_POST['additional_details'] !=''){
 	 	$mailContent .= "More Detail".$_POST['additional_details']."<br/>";
 	 }
 	 
 	 // send confirmation email
      $app->mail($app->setting->admin_email, 'report_drawing', array(
        '[drawing_url]' => $app->url('/drawing.php', array('id' => $_POST['drawing_id']), true),
        '[report]' => $mailContent
      ));
     echo "true";exit; 
     
 }else{
 	echo "Oops ! Something went wrong. Request Failed !";exit;
 }
  
 

 