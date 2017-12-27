<?php 
include("config.php");
$conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
$lesson_id = $_POST['lesson_id'];
$objective = $_POST["editor1"];
$story = $_POST['story_ids'];
$sql = "update lesson set lesson_objective = '$objective' where lesson_id = $lesson_id";
$sql_story = "update lesson set stories = '$story' where lesson_id = $lesson_id";
mysql_select_db('microstory_db');
$result = mysql_query( $sql, $conn );
$result_story = mysql_query( $sql_story, $conn );
echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://memories.tamu.edu/lesson_plan.php\">";
mysql_close($conn);
?>