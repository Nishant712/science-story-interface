<?php 
include("config.php");
$conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
$input_data = $_POST["input_data"];
$parsed_input = explode(":",$input_data);
$lesson_id = $parsed_input[0];
$day = $parsed_input[1];
$sql = "select days from lesson where lesson_id = $lesson_id";
mysql_select_db('microstory_db');
$result = mysql_query( $sql, $conn );
while($row = mysql_fetch_array($result)) {
	$days = $row['days'];
}

$parsed_days = explode(",",$days);
if(sizeof($parsed_days) == 1) {
	$sql_final = "delete from lesson where lesson_id = $lesson_id";
} elseif(sizeof($parsed_days) > 1) {
	$final_days = "";
	foreach ($parsed_days as $temp){
		if($temp == $day) {
			continue;
		} else {
			$final_days = $final_days.$temp.",";
		}
	}
	$final_days=substr($final_days, 0, -1);
	$sql_final = "update lesson set days = '$final_days' where lesson_id = $lesson_id";
}
mysql_select_db('microstory_db');
$result_final = mysql_query( $sql_final, $conn );
echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://memories.tamu.edu/lesson_plan.php\">";
mysql_close($conn);
?>