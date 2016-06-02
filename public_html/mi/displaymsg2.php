<?php 
include('config.php');
$id=$_GET['id'];

 $key=$_GET['id'];

		$fet=mysql_query("select * from mp_snippets where snippet_key='$key'");
 while($row=mysql_fetch_array($fet))
        {
		echo	$row['snippet_text'];
        }
?>



