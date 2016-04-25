<?php 
require_once('geo_arrays.php');
  
 // print_r($c['RECORDS']);
// $output_arr = array_map('tester', $s['RECORDS']);
// function tester($val,$key){
// 	global $c; 
  
//   	 $mk[$val['country_id']]= $val['name'];
   
//   return $mk;
// }
// print_r($output_arr);
 

if(isset($_POST) && $_POST['country']){
	 echo json_encode($states[(int)$_POST['country']]);exit;
} 
if(isset($_POST) && $_POST['state']){
	 echo json_encode($cities[(int)$_POST['state']]);exit;
} 

?>