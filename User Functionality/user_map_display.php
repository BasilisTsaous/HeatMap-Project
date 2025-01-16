<?php 

session_start();
include("connect.php");
//include(login.php);


$currentmonth =date('m');

$query = "SELECT COUNT(*) AS visited
			  FROM activity 
			  INNER JOIN area ON activity.area_id = area.id 
			  INNER JOIN time ON area.time_id = time.id
			  INNER JOIN user ON area.user_id = user.id
			  WHERE user_id = ".$_SESSION["id"]." AND month(timestamp)=".$currentmonth."
			  ";
$result = $conn->query($query);
$row = $result->fetch_array();


//Emfanise to score gia trexwn mhna
if($row["visited"] != 0){
	$query = "SELECT COUNT(*) AS visited
			  FROM activity 
			  INNER JOIN area ON activity.area_id = area.id 
			  INNER JOIN time ON area.time_id = time.id
			  INNER JOIN user ON area.user_id = user.id
			  WHERE user_id = ".$_SESSION["id"]." AND month(timestamp)=".$currentmonth." AND (activity.type = 'WALKING' OR activity.type = 'ON_BICYCLE' OR activity.type = 'ON_FOOT' OR activity.type = 'RUNNING')
			  ";
$result = $conn->query($query);
$row2 = $result->fetch_array();
$currentmonth_score = $row2["visited"]/$row["visited"] * 100;
}
else{
	$currentmonth_score = 0;
}


//Emfanise to score gia prohgoymenous mhnes
$year_score = array();
$query = "SELECT COUNT(*) AS visited , month(timestamp) , year(timestamp)
			  FROM activity 
			  INNER JOIN area ON activity.area_id = area.id 
			  INNER JOIN time ON area.time_id = time.id
			  INNER JOIN user ON area.user_id = user.id
			  WHERE user_id = ".$_SESSION["id"]." AND time.timestamp >=  DATE_SUB(NOW(),INTERVAL 1 YEAR)
			  GROUP BY month(timestamp)
			  ";
$result = $conn->query($query);

while($row = $result->fetch_array()){
	if($row["visited"] != 0){
	  $query = "SELECT COUNT(*) AS visited
				  FROM activity 
				  INNER JOIN area ON activity.area_id = area.id 
				  INNER JOIN time ON area.time_id = time.id
				  INNER JOIN user ON area.user_id = user.id	
				  WHERE user_id = ".$_SESSION["id"]." AND month(timestamp)=".$row["month(timestamp)"]." AND year(timestamp)=".$row["year(timestamp)"]." AND (activity.type = 'WALKING' OR activity.type = 'ON_BICYCLE' OR activity.type = 'ON_FOOT' OR activity.type = 'RUNNING') 
				  ";
	$result2 = $conn->query($query);			  
	$row2 = $result->fetch_array();
	$year_score[] = array('date' => $row["month(timestamp)"]." ".$row["year(timestamp)"] , "pososto" => $row2["visited"]/$row["visited"] * 100 );
	}
	else{
		$year_score[] = array('date' => $row["month(timestamp)"]." ".$row["year(timestamp)"] , "pososto" => 0);
	}	
	
}	
	
//Periodos eggrafwn user
$query = "SELECT MIN(timestamp) , MAX(timestamp)
			 FROM area
			 INNER JOIN time ON area.time_id = time.id
			 INNER JOIN user ON area.user_id = user.id
			 WHERE user_id = ".$_SESSION["id"]." 
			 ";
$result	= $conn->query($query);
$row = $result->fetch_array();
$records[] = array("begin" => date("d-m-Y", strtotime($row["MIN(timestamp)"])), "end" => date("d-m-Y",strtotime($row["MAX(timestamp)"])));

//Teleytaio upload user
$query = "SELECT upload 
			FROM user
			WHERE id = ".$_SESSION["id"]." 
			 ";
$result	= $conn->query($query);
$row = $result->fetch_array();				 
$last_upload[] = array("last" => date("d-m-Y",strtotime($row["upload"])));
	
echo json_encode(array("month_echo_score" => $currentmonth_score, "year_echo_score" => $year_score, "user_records" => $records, "upload" => $last_upload);

$conn->close();	


?>