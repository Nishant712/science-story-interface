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
$days = $_POST['checkbox'];
$days_sql = "";
foreach ($days as $check_box){
	$days_sql = $days_sql.$check_box.",";
}
$days_sql=substr($days_sql, 0, -1);
$sql_insert = "insert into lesson(lesson_name,week_number,current_year,start_time,end_time,days) values('$lesson_name',$week,$year,'$from','$to','$days_sql')";
mysql_select_db('microstory_db');
//echo $sql_insert;
$insert_result = mysql_query( $sql_insert, $conn );
echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://memories.tamu.edu/lesson_plan.php?current_date=$current_date\">";
mysql_close($conn);
?>