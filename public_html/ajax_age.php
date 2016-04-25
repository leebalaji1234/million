<?php 
 
if(isset($_POST) && $_POST['dob']){
	$birthDate = $_POST['dob'];//"12/17/1987"; 
    $birthDate = explode("/", $birthDate); 
   $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2])); 
   $arrage['currentage'] = $age;
   echo json_encode($arrage);
   exit;
} 
?>