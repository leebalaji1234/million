<?php
require_once('config.php');
require_once('util.class.php');
require_once('theme.class.php'); 
require_once('theme_category.class.php'); 
$tbl_themes = new Theme; 
$tbl_categories = new Theme_categorie;
$categories = $tbl_categories->find_all('where name != "" order by display_order desc'); 
 if($categories){
 	$arr = [];
 	foreach ($categories as $key => $value) {
 		$themes = $tbl_themes->find_all("where   `category_id` =?  order by display_order asc",array($value->id));  
 		if($value->type == 2){
 			$themes = $tbl_themes->find_all("where   `category_id` =? and `region_id` IS NOT NULL  order by display_order asc",array($value->id));  
 		}
 		 
 		 $themearr = []; 
 		 if($themes){
 		 	$i=0;
 		 	foreach ($themes as $key1 => $value1) {
 		 		$themearr[$i]['theme_id'] =$value1->id;
 		 		$themearr[$i]['name'] =$value1->name;
 		 		$themearr[$i]['description'] =$value1->description;
 		 		$i++;
 		 	}
 		     	
 		 }
 		 $arr[$value->id]['category'] = $value->id;
 		 $arr[$value->id]['name'] = $value->name;
 		 $arr[$value->id]['themes'] = $themearr;
 	}
 }
 $arr = array_reverse($arr);
 
echo json_encode($arr);exit; 