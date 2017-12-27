<?php 
include("config.php");
$conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

$current_date = $_POST["current_date"];
$week = date("W",strtotime($current_date)); 
$year = date("Y",strtotime($current_date));
$lesson_name = $_POST['lesson_name'];
$start_am_pm = $_POST['start_am_pm'];
$end_am_pm = $_POST['end_am_pm'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$stories = $_POST['storyid'];
$start = explode(":",$start_time);
$end = explode(":",$end_time);
if($start_am_pm == "PM") {
	$start[0] = $start[0] + 12;
}
if($end_am_pm == "PM") {
	$end[0] = $end[0] + 12;
}
$from = $start[0].":".$start[1];
$to = $end[0].":".$end[1];
$sql_insert = "insert into lesson(lesson_name,week_number,current_year,start_time,end_time,days,stories) values('$lesson_name',$week,$year,'$from','$to','monday','$stories')";
mysql_select_db('microstory_db');
$insert_result = mysql_query( $sql_insert, $conn );
echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://memories.tamu.edu/stories.php\">";
mysql_close($conn);
?>