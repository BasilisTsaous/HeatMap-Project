<?php

session_start();
include("connect.php");
//include("login.php");


//if (isset($_POST['ld'])){
		$year_1 = $_POST["year_1"];
		$year_2 = $_POST["year_2"];	
		$month_1 = $_POST["month_1"];
		$month_2 = $_POST["month_2"];
		

//Percentage per activity type
   /* $query = "SELECT COUNT(*) AS visited
				  FROM activity 
				  INNER JOIN area ON activity.area_id = area.id 
				  INNER JOIN time ON area.time_id = time.id
				  INNER JOIN user ON area.user_id = user.id
				  WHERE user_id = ".$_SESSION["id"]." AND year(timestamp)>=".$year_1." AND year(timestamp)<=".$year_2." AND month(timestamp)>=".$month_1." AND month(timestamp)<=".$month_2."
				  ";
	$result = $conn->query($query);
    $pososto = array();	

    while($row = $result->fetch_array()){
        if($row["visited"] != 0){
			$query = "SELECT COUNT(*) AS visited , activity.type
					  FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON area.time_id = time.id
					  INNER JOIN user ON area.user_id = user.id
					  WHERE user_id = ".$_SESSION["id"]." AND year(timestamp)>=".$year_1." AND year(timestamp)<=".$year_2." AND month(timestamp)>=".$month_1." AND month(timestamp)<=".$month_2."
					  GROUP BY type";
				  
			result2 = $conn->query($query);
			while($row2 = $result2->fetch_array()){
            $pososto[] = array('activity_type' => $row2["type"], "p" => $row2["visited"]/$row["visited"] * 100);	
		    }
        }
		else {
			$query = "SELECT DISTINCT activity.type
					  FROM activity 
					  INNER JOIN area ON activity.area_id = area.id 
					  INNER JOIN time ON area.time_id = time.id
					  INNER JOIN user ON area.user_id = user.id
					  WHERE user_id = ".$_SESSION["id"]." ";
			
            result2 = $conn->query($query);	
            while($row2 = $result2->fetch_array()){
                $pososto[] = array('activity_type' => $row2["type"], "p" => 0);				
			}  
		}
	} */


//Day with the most records per type of activity
  	$query = "CREATE OR REPLACE VIEW view_1 AS
	          SELECT DAYNAME(timestamp) AS day, type, COUNT(*) AS visited
			  FROM activity 
			  INNER JOIN area ON activity.area_id = area.id 
			  INNER JOIN time ON area.time_id = time.id
			  INNER JOIN user ON area.user_id = user.id
			  WHERE user_id = ".$_SESSION["id"]." AND year(timestamp)>=".$year_1." AND year(timestamp)<=".$year_2." AND month(timestamp)>=".$month_1." AND month(timestamp)<=".$month_2."
			  GROUP BY day(timestamp),type
			  ORDER BY type,COUNT(*) ";
	$result = $conn->query($query);

    $query = "SELECT day, type, visited  
			  FROM `view_1` 
			  WHERE visited IN (SELECT MAX(visited) FROM view_1 GROUP BY type)";
	$result2 = $conn->query($query);
	
	$day_of_week = array();
	while($row = $result2->fetch_array()){
		$day_of_week[] = array("day" => $row["day"], "activity" => $row["type"], "eggrafes" => $row["visited"]);
	}	


//Hour of the dat with the most records per type of activity
    $query = "CREATE OR REPLACE VIEW view_2 AS
	          SELECT HOUR(timestamp) AS hour, type, COUNT(*) AS visited
			  FROM activity 
			  INNER JOIN area ON activity.area_id = area.id 
			  INNER JOIN time ON area.time_id = time.id
			  INNER JOIN user ON area.user_id = user.id
			  WHERE user_id = ".$_SESSION["id"]." AND year(timestamp)>=".$year_1." AND year(timestamp)<=".$year_2." AND month(timestamp)>=".$month_1." AND month(timestamp)<=".$month_2."
			  GROUP BY hour(timestamp),type
			  ORDER BY type,COUNT(*) ";
	$result = $conn->query($query);
	
	$query = "SELECT hour, type, visited  
			  FROM `view_2` 
			  WHERE visited IN (SELECT MAX(visited) FROM view_2 GROUP BY type)";
	$result2 = $conn->query($query);
	
	$hour_of_day = array();
	while($row = $result2->fetch_array()){
		$hour_of_day[] = array("hour" => $row["hour"], "activity" => $row["type"], "eggrafes" => $row["visited"]);
	}	
	
	
/*$query = "SELECT DISTINCT longt,lat,COUNT(*) AS visited
	          FROM area
              INNER JOIN time ON area.time_id = time.id
			  INNER JOIN user ON area.user_id = user.id
			  WHERE user_id = ".$_SESSION["id"]." AND year(timestamp)>=".$year_1." AND year(timestamp)<=".$year_2." AND month(timestamp)>=".$month_1." AND month(timestamp)<=".$month_2."
	          GROYP BY longt,lat    
              ";
	$result = $conn->query($query);
    $max = 0;
    $areas = array();
    while($row = $result->fetch_array()){	
	    $areas[] = array("longitude" => $row["longt"] , "latitude" => $row["lat"] , "count" => $row["visited"]);
		    if ($max < $row["visited"]){
			   $max = $row["visited"];
			}
	}
	
	$map_areas = array("max" => $max , "areas" => $areas);	*/
	
	
	echo json_encode(array(/*"pososto" => $pososto,*/ "day" => $day_of_week, "hour" => $hour_of_day/*, "areas" => $map_areas*/));
	$conn->close();	
	
?>
