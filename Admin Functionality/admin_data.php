<?php
	session_start();
	include_once("connect.php");
	//if (isset($_POST['sub'])){
		$year_1 = $_POST["year_1"];
		$year_2 = $_POST["year_2"];	
		$month_1 = $_POST["month_1"];
		$month_2 = $_POST["month_2"];	
		$day_1 = $_POST["day_1"];
		$day_2 = $_POST["day_2"];	
		$hour_1 = $_POST["hour_1"];
		$hour_2 = $_POST["hour_2"];
		$act = $_POST["act"];
		
		$query = "SELECT lat, longt, COUNT(*) AS visited			
					FROM area
					INNER JOIN time ON area.time_id = time.id
					INNER JOIN activity ON area.id = activity.area_id
					WHERE year(timestamp)>=".$year_1." AND year(timestamp)<=".$year_2." AND month(timestamp)>=".$month_1." AND month(timestamp)<=".$month_2." 
					AND day(timestamp)>=".$day_1." AND day(timestamp)<=".$day_2." AND hour(timestamp)>=".$hour_1." AND hour(timestamp)<=".$hour_2." AND type = '".$act."'
					GROUP BY lat, longt";
					
		//print_r($query);						
	    $result = $conn->query($query);
		$areas = array();
		while($row = $result->fetch_array()){
			$areas[] = array("lat" => floatval($row["lat"]), "lng" => floatval($row["longt"]), "count" => intval($row["visited"]));
		}
		echo json_encode($areas);

		$conn->close();
	//}	
?>