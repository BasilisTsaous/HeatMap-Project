<?php
    session_start();
	include_once("connect.php");

		
	$q = "DELETE FROM activity";
	if($conn->query($q)){
		echo 1;
	}
	else{
		echo $conn->error;
	}
	
	$q = "DELETE FROM area";
	if($conn->query($q)){
		echo 1;
	}
	else{
		echo $conn->error;
	}
	
	$q = "DELETE FROM time";
	if($conn->query($q)){
		echo 1;
	}
	else{
		echo $conn->error;
	}
	
	
?>