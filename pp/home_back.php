<?php
session_start();
require "config.php";
$iduser=$_SESSION["id"];
$date=$_POST["date"];
$_SESSION["date"]=$date;


if(!(empty($iduser)|| empty($date))){
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');
    $sql = "INSERT INTO log_date(entry_date,iduser) VALUES ('$date',$iduser);";
    if($conn->query($sql) === TRUE){
        // regester user
        header('location:index.php');
    
    }

}else{
     header('location:../404/');
}



?>
