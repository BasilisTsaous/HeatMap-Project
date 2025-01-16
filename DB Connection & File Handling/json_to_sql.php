<?php

session_start();
if ( !isset( $_SESSION['first'] ) && !isset( $_SESSION['last'] ) ) {
	header("Location:index.php");
}

date_default_timezone_set('Europe/Athens');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "locations";

// Create connection
$connect =  mysqli_connect($servername, $username, $password, $dbname);
if(!file_exists($_FILES["file"]["name"]))
{
	move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
}

$connect->query("UPDATE user SET upload = '".date("Y-m-d H:i:s")."'");
$file = file_get_contents($_FILES["file"]["name"]);
$locations = json_decode($file);
$sql = "select max(id) as m_id from area";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
if($row["m_id"] == null){
	$location_id = 0;
}
else{
	$location_id = $row["m_id"] + 1;
}

$sql = "select max(id) as m_id from time";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
if($row["m_id"] == null){
	$time_id = 0;
}
else{
	$time_id = $row["m_id"] + 1;
}

$time = "INSERT INTO time(id, timestamp) VALUES ";
$areas = "INSERT INTO area(id, user_id,time_id, lat, longt, alt, accur, vert_accur) VALUES ";
$activities = "INSERT INTO activity(time_id,area_id,type,confidence) VALUES ";
foreach($locations as $location){
	foreach($location as $element){
		$lon = $element->longitudeE7;
		$lat =  $element->latitudeE7;
		$acc = (isset($element->accuracy)) ? $element->accuracy:  "NULL";
		$alt = (isset($element->altitude)) ? $element->altitude:  "NULL";
		$vert_accur = (isset($element->verticalAccuracy)) ? $element->verticalAccuracy:  "NULL";
		$timestamp = date("Y-m-d H:i:s", $element->timestampMs/1000);
		$time .= "(".$time_id.", '".$timestamp."'),";
		$areas .= "(".$location_id.", ".$_SESSION["id"].", ".$time_id.", ".($lat / 10 ** 7).", ".($lon / 10 ** 7).", ".$alt.", ".$acc." ,".$vert_accur."),";
		$time_id++;
		if(isset($element->activity)){
			foreach($element->activity as $activity){
				$timestamp = date("Y-m-d H:i:s", $activity->timestampMs/1000);
				$time .= "(".$time_id.", '".$timestamp."'),";
				foreach($activity->activity as $act){
					$type = $act->type;
					$confidence = $act->confidence;
					$activities .= "(".$time_id.", ".$location_id.", '".$type."', ".$confidence."),";
				}
				$time_id++;
			}
		}
		$location_id++;
	}
}

if($connect->query(substr($time ,0,-1))){
	echo "Insert time success";
}
else{
	echo "Insert time failed";;
}
print_r(substr($areas ,0,-1));
if($connect->query(substr($areas ,0,-1))){
	echo "Insert areas success";
}
else{
	echo "Insert areas failed";;
} 
if($connect->query(substr($activities ,0,-1))){
	echo "Insert activities success";
}
else{
	echo "Insert activities failed";
} 
?>