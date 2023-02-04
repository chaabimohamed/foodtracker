<?php
session_start();

    include '../pp/config.php';
    $email = $_POST['email'];
    $pass = $_POST['password'];

if(!(empty($email)|| empty($pass))){
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');
	$sql = "SELECT id,fullname,email,password FROM register WHERE email='$email' and password='$pass';";
    $res = $conn->query($sql);
    if ($res->num_rows == 1) {
        $rs = $res ->fetch_array();
        //send status (login or logout and name)
        $status = 'logout';
        $index = '../pp';
        $url = $index;
        $_SESSION['fullname']=$rs['fullname'];
        $_SESSION['status']=$status;
        $_SESSION['id']=$rs['id'];
        header('location:'.$url);
        //echo 'Hello '.$rs['fullname'];
    }else{
        //redirected to page error 404
        header('location:../404/');
    }
 


}else{
     header('location:../404/');
}
    
?>
