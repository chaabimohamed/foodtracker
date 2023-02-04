<?php
include 'config.php';
$idf=$_GET["idf"];
$dateid=$_GET['date'];
$idd = $_GET['idd'];

$durl = 'day.php?date='.$dateid.'&id='.$idd;

if(!(empty($idf))){
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');

    $sql = "Delete from food_date WHERE id = $idf";
    $res = $conn->query($sql);
	if($res === TRUE){
            header('location:'.$durl);
            
    	};
    }else{

        header('location:../404/');
    }
 




?>
