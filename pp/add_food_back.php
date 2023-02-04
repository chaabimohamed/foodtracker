<?php
session_start();
require "config.php";
$iduser=$_SESSION['id'];
$protein=$_POST['fp'];
$food_name=$_POST['fn'];
$carbo=$_POST['fc'];
$fat=$_POST['ff'];
$calories =$_POST['fcc'];

if(!(empty($iduser)|| empty($protein)|| empty($food_name)|| empty($carbo)|| empty($fat)||empty($calories))){
        $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');
        $sql = "INSERT INTO food(name,protein,carbohydrates,fat,calories,iduser) VALUES ('$food_name'
        ,$protein,$carbo,$fat,$calories,$iduser)";
        if($conn->query($sql) === TRUE ){
            // regester user
            header('location:add_food.php');
            
        }
        else {
            header('location:../404/');
        };


}else{
     header('location:../404/');
}




?>
