<?php 
include('config.php');
$id=$_GET['id'];

 $key=$_GET['id'];




$fet1=mysql_query("select * from mp_email_templates where id='$id'");

 while($row11=mysql_fetch_array($fet1))
        {
		echo	$row11['parameters'];
        }
		
		
		
		
		
	echo "select * from mp_snippets where snippet_key='$key'";
		$fet=mysql_query("select * from mp_snippets where snippet_key='$key'");
 while($row=mysql_fetch_array($fet))
        {
		echo	$row['snippet_text'];
        }
?>
