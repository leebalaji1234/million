<?php
$s = json_decode(@file_get_contents('mp_states.json'),true);

$states = [];
 foreach($s['RECORDS'] as $k=> $arr){
     $m['id'] = $arr['id'];
     $m['name'] = $arr['name'];
     $m['country'] = $arr['country_id'];
    $states[$arr['country_id']][] = $m;
 }

$c = json_decode(@file_get_contents('mp_cities.json'),true);

$cities = [];
 foreach($c['RECORDS'] as $k=> $arr){
    $m['id'] = $arr['id'];
     $m['name'] = $arr['name'];
     $m['state'] = $arr['state_id'];
     
    $cities[$arr['state_id']][] = $m;
 } 
 ?>