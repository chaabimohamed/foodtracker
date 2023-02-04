<?php
session_start();
require "config.php";


$date = $_GET["date"];
$idFdate = $_GET['dateid'];
$iduser=$_SESSION['id'];
$namef = $_POST['select'];

if($namef == 'Select'){
    header('location:index.php');
}else{
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');

    $sql = "SELECT * FROM food where iduser=$iduser";
    $res = $conn->query($sql);
    //var_dump($res);

    if ($res->num_rows > 0 ) {
        while($rs = $res->fetch_assoc()) {
            if ($namef == $rs['name']){
                $fid=$rs['id'];
                $sqlinsert = "insert into food_date(food_id,log_date_id) values('$fid','$idFdate')";
                if($conn->query($sqlinsert) === TRUE){
                    header('location:day.php?date='.$date.'&id='.$idFdate);            
            };
        };
     };
    };

}


?>