<?php
	session_start();
	include_once('connect.php');
	
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$sql_query = "select count(*) as cntUser, id, type, first, last from user where email='$email' and password='$password'";
    $result = mysqli_query($conn,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];
	$usertype = $row['type'];
    if($count > 0 && $usertype==2){
        $_SESSION['first'] = $row['first'];
		$_SESSION['last'] = $row['last']; 
		$_SESSION['type'] = $row['type'];
		$_SESSION['id'] = $row['id'];
        echo 2;
	}else if($count > 0 && $usertype==1){
			$_SESSION['first'] = $row['first'];
			$_SESSION['last'] = $row['last']; 
			$_SESSION['type'] = $row['type'];
			$_SESSION['id'] = $row['id'];
			echo 1;
    }else{
        echo 0;
    }

?>