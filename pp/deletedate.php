<?php
include 'config.php';
$id=$_GET["id"];
if(!(empty($id))){
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');

	//insert new user
    $sql = "Delete from food_date WHERE log_date_id = $id";
    $res = $conn->query($sql);
	if($res === TRUE){
            $sql = "Delete from log_date WHERE id=$id ;";
            $res = $conn->query($sql);
			// regester user
            header('location:index.php');
            
    	};
    }else{  
        header('location:../404/');
    }
 




?>
