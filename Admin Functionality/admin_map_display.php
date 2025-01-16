<?php

session_start();
include_once("connect.php");

//Diaxwrsimos drastiriotitwn
	
$query = "SELECT  COUNT(*) AS visited			
				FROM activity
				INNER JOIN time ON activity.time_id = time.id
				INNER JOIN area ON activity.area_id = area.id";
				
	$result = $conn->query($query);
	$row = $result->fetch_array();
	$table1 = array();
	$table2 = array();
	$table3 = array();
	$table4 = array();
	$table5 = array();
	$table6 = array();	
		
	
if($row["visited"] > 0){
		$count = $row["visited"];
		$query = "SELECT type , COUNT(*) AS visited
		              FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON area.time_id = time.id
					  GROUP BY type";
					  
		$result = $conn->query($query);
		while($row = $result->fetch_array()){
			$table1[] = array("type" => $row["type"], "pososto" => $row["visited"]/$count * 100);
		}
		
		$query = "SELECT email ,activity.type ,COUNT(*)  AS visited
		              FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON area.time_id = time.id
					  INNER JOIN user ON area.user_id = user.id
					  GROUP BY user_id";
					  
		$result = $conn->query($query);
		while($row = $result->fetch_array()){
			$table2[] = array("user" => $row["email"], "pososto" => $row["visited"]/$count * 100);
		}
		
		$query = "SELECT month(timestamp) ,COUNT(*) AS visited
		              FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON activity.time_id = time.id
					  GROUP BY month(timestamp)";
					  
		$result = $conn->query($query);
		while($row = $result->fetch_array()){
			$table3[] = array("month" => $row["month(timestamp)"], "pososto" => $row["visited"]/$count * 100);
		} 
		
		$query = "SELECT day(timestamp) ,COUNT(*) AS visited
		              FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON activity.time_id = time.id
					  GROUP BY day(timestamp)";
					  
		$result = $conn->query($query);
		while($row = $result->fetch_array()){
			$table4[] = array("day" => $row["day(timestamp)"], "pososto" => $row["visited"]/$count * 100);
		} 
		
		$query = "SELECT hour(timestamp) ,COUNT(*) AS visited
		              FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON activity.time_id = time.id
					  GROUP BY hour(timestamp)";
					  
		$result = $conn->query($query);
		while($row = $result->fetch_array()){
			$table5[] = array("hour" => $row["hour(timestamp)"], "pososto" => $row["visited"]/$count * 100);
		} 
		
		$query = "SELECT year(timestamp) ,COUNT(*) AS visited
		              FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON activity.time_id = time.id
					  GROUP BY year(timestamp)";
					  
		$result = $conn->query($query);
		while($row = $result->fetch_array()){
			$table6[] = array("year" => $row["year(timestamp)"], "pososto" => $row["visited"]/$count * 100);
		} 
	}
	
	echo json_encode(array("t1" => $table1, "t2" => $table2, "t3" => $table3, "t4" => $table4, "t5" => $table5, "t6" => $table6));
    
    $conn->close();	

?>
