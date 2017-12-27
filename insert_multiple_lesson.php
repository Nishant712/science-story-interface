<?php 
include("config.php");
$conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

$l_ids = $_POST['lesson_ids'];
$lesson_ids = "";
foreach ($l_ids as $lessons){
	$lesson_ids = $lesson_ids.$lessons.",";
}
$lesson_ids=substr($lesson_ids, 0, -1); 
$stories = $_POST['checked_stories'];
//echo $stories;
$stories_arr = explode(",",$stories); 
$lid_arr = explode(",",$lesson_ids);
$length = count($lid_arr);
for ($i = 0; $i < $length; $i++) {
  $sql_update = "update lesson set stories = '$stories' where lesson_id = ".$lid_arr[$i];
  $sql_story = "select stories from lesson where lesson_id = ".$lid_arr[$i];
  mysql_select_db('microstory_db');
  $story_result = mysql_query( $sql_story, $conn );
  $row = mysql_fetch_array($story_result);
  $stories_db = $row['stories'];
  $stories_db_arr = explode(",",$stories_db);
  if(strlen($stories_db)==0) {
	  mysql_select_db('microstory_db');
	  //echo "\n".$sql_update;
	  $update_result = mysql_query( $sql_update, $conn );
  } else {
	  $stories_checked = "";
	  $len = count($stories_arr);
	  $count1 = 0;
	  for($j = 0; $j < $len; $j++) {
		  if (!(in_array($stories_arr[$j], $stories_db_arr))) {
			  $stories_checked = $stories_checked.$stories_arr[$j].",";
			  $count1 = $count1+1;
		  }
	  }
	  $stories_checked=substr($stories_checked, 0, -1);
	  $stories_updated = $stories_db.",".$stories_checked;
	  if($count1 == 0) {
		$stories_updated = substr($stories_updated, 0, -1); 
	  } 
	  $sql_update = "update lesson set stories = '$stories_updated' where lesson_id = ".$lid_arr[$i];
	  //echo "\n".$sql_update;
	  mysql_select_db('microstory_db');
	  $update_result = mysql_query( $sql_update, $conn );
  }
  
}

mysql_close($conn);
echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://memories.tamu.edu/stories.php\">";

?>