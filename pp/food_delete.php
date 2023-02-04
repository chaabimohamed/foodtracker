<?php
include 'config.php';
$id=$_GET["id"];



if(!(empty($id))){
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');
    $sql1 = "DELETE FROM food_date WHERE food_id=$id;";
    if($conn ->query($sql1)){
        $sql = "Delete from food WHERE id=$id;";
	   if($conn->query($sql)){
            header('location:add_food.php');
            
    	};
         }else{

            header('location:../404/');
        }
    }




?>
