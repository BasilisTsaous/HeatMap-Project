<?php
session_start();

	
	include_once('connect.php');

	if (isset($_POST['signup'])){
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		
	
		$sql_query = "insert into user(first,last,email,password,type) values ('$first','$last','$email','$pass','1');";
	    
		
		if($conn->query($sql_query) == TRUE){
			echo 1;
		}
		else{
			echo 0;
		}
		
	}

?>