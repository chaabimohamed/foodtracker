<?php
    include '../pp/config.php';
    $e = $_POST['email'];
    $p = $_POST['password'];
    $n = $_POST['name'];

if(!(empty($e)|| empty($p)|| empty($n))){
    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');

	//insert new user
	$sql = "SELECT * FROM register WHERE email='$e' and password='$p';";
    $res = $conn->query($sql);
    if ($res->num_rows == 0) {
		$sqlu = "INSERT INTO register(fullname,email,password) VALUES ('$n','$e','$p')";
		if($conn->query($sqlu) === TRUE){
			// regester user
            header('location:../login/');
            
    	};
    }else{
    	//error
        //404.php 
        header('location:../404/');
        //echo 'try agin! user name or passowrd invalid!';
    }
 


}else{
     header('location:../404/');
}

?>
