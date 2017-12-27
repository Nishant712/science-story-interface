<?php 
include("config.php");
$conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
if(! $conn )
{
	die('Could not connect: ' . mysql_error());
}

function logConsole($name, $data = NULL, $jsEval = FALSE)
 {
      if (! $name) return false;

      $isevaled = false;
      $type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

      if ($jsEval && (is_array($data) || is_object($data)))
      {
           $data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
           $isevaled = true;
      }
      else
      {
           $data = json_encode($data);
      }

      # sanitalize
      $data = $data ? $data : '';
      $search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
      $replace_array = array('"', '', '', '\\n', '\\n');
      $data = preg_replace($search_array,  $replace_array, $data);
      $data = ltrim(rtrim($data, '"'), '"');
      $data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

$js = <<<JSCODE
\n<script>
 // fallback - to deal with IE (or browsers that don't have console)
 if (! window.console) console = {};
 console.log = console.log || function(name, data){};
 // end of fallback

 console.log('$name');
 console.log('------------------------------------------');
 console.log('$type');
 console.log($data);
 console.log('\\n');
</script>
JSCODE;

      echo $js;
 } # end logConsole

function getWeekDates($year, $week, $start)
{
    $monday = date("Y-m-d", strtotime("{$year}-W{$week}-1")); //Returns the date of monday in week
	$tuesday = date("Y-m-d", strtotime("{$year}-W{$week}-2")); //Returns the date of tuesday in week
	$wednesday = date("Y-m-d", strtotime("{$year}-W{$week}-3")); //Returns the date of wednesday in week
	$thursday = date("Y-m-d", strtotime("{$year}-W{$week}-4")); //Returns the date of thursday in week
    $friday = date("Y-m-d", strtotime("{$year}-W{$week}-5"));   //Returns the date of friday in week
 
    if($start == "monday") {
        return $monday;
    } elseif($start == "tuesday") {
        return $tuesday;
    } elseif($start == "wednesday") {
        return $wednesday;
    } elseif($start == "thursday") {
        return $thursday;
    } elseif($start == "friday") {
        return $friday;
    }
    //return "Week {$week} in {$year} is from {$from} to {$to}.";
}

$current_date = $_GET["date1"];
$week = date("W",strtotime($current_date)); 
//$month = date("M");
//echo strtoupper($month);
$year = date("Y",strtotime($current_date));
$monday_date = getWeekDates($year, $week, "monday");
$tuesday_date = getWeekDates($year, $week, "tuesday");
$wednesday_date = getWeekDates($year, $week, "wednesday");
$thursday_date = getWeekDates($year, $week, "thursday");
$friday_date = getWeekDates($year, $week, "friday");
$monday_month = strtoupper(date("M",strtotime($monday_date)));
$tuesday_month = strtoupper(date("M",strtotime($tuesday_date)));
$wednesday_month = strtoupper(date("M",strtotime($wednesday_date)));
$thursday_month = strtoupper(date("M",strtotime($thursday_date)));
$friday_month = strtoupper(date("M",strtotime($friday_date)));
$monday_daynum = date("d",strtotime($monday_date));
$tuesday_daynum = date("d",strtotime($tuesday_date));
$wednesday_daynum = date("d",strtotime($wednesday_date));
$thursday_daynum = date("d",strtotime($thursday_date));
$friday_daynum = date("d",strtotime($friday_date));
//echo date('Y-m-d', strtotime($start_date. ' + 1 days'));
echo "<div class='weekly_details'>
	  <input type='submit' value='ATTACH STORIES TO LESSON(S)' name='lesson_submit' class='lesson_submit1'>
	  <h3><b>WEEK $week</b></h3>
	  <p><span><img id='date_subtract' src='date_pre.png' alt='date_pre' class='date_pre' onClick='decreaseDate();'></span>$monday_month $monday_daynum - $friday_month $friday_daynum<span><img id='date_add' src='date_next.png' alt='date_next' class='date_next' onClick='increaseDate();'></span></p>
	  </div>
	  <br/>
	  <div class='mon'>
	  <div class='day_details'>
	  <h3><b>MONDAY</b></h3>
	  <p>($monday_month $monday_daynum)</p>
	  </div>
	  <div class='add_daily''>
	  <p onclick=\"document.getElementById('id01').style.display='block'\" style='width:auto;'>&nbsp;&nbsp;+ CREATE NEW LESSON</p>
	  </div>
	  <div class='div1'>";
$sql = "select distinct lesson_id, lesson_name, lesson_objective, week_number, current_year, start_time, end_time, days, stories from lesson where week_number = $week and current_year = $year and days like '%monday%' order by start_time";
mysql_select_db('microstory_db');
$monday_result = mysql_query( $sql, $conn );
while($row_monday = mysql_fetch_array($monday_result)) {
	$lesson_id = $row_monday['lesson_id'];
	$lesson_name = $row_monday['lesson_name'];
	$lesson_objective = $row_monday['lesson_objective'];
	$start_time = $row_monday['start_time'];
	$end_time = $row_monday['end_time'];
	$stories_id = $row_monday['stories'];
	$sql_story_details = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id and s.story_id in (".$stories_id.")";
	mysql_select_db('microstory_db');
	$monday_story_result = mysql_query( $sql_story_details, $conn );
	$start = explode(":",$start_time);
	$end = explode(":",$end_time);
	$start_am_pm = "AM";
	$end_am_pm = "AM";
	if($start[0] > 12) {
		$start[0] = $start[0] - 12;
		$start_am_pm = "PM";
	} elseif($start[0] == 12) {
		$start_am_pm = "PM";
	}
	if($end[0] > 12) {
		$end[0] = $end[0] - 12;
		$end_am_pm = "PM";
	} elseif($end[0] == 12) {
		$end_am_pm = "PM";
	}
	$from = $start[0].":".$start[1]." ".$start_am_pm;
	$to = $end[0].":".$end[1]." ".$end_am_pm;
	echo "<br/>
		<div class='lessons w3-card-4'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<input class='w3-check lesson_checkbox' type='checkbox' name='lesson_ids[]' value='$lesson_id' onclick='enableSubmit()'>
		<h3>$lesson_name</h3>
		<p>$from - $to</p>
		</div>
		</div>
		<br/>
		<div class='lesson_body w3-row'>
		<div class='w3-container'>
		<p>$lesson_objective</p>";
		if(strlen($stories_id)>0) {
		  echo "<img src='book.png' alt='delete' class='book' >";
		}
		echo "</div>
		</div>
		</div>";
		

}
echo "
	</div>
	</div>
	<div class='tue'>
	<div class='day_details'>
	<h3><b>TUESDAY</b></h3>
	<p>($tuesday_month $tuesday_daynum)</p>
	</div>
	<div class='add_daily'>
	<p onclick=\"document.getElementById('id02').style.display='block'\" style='width:auto;'>&nbsp;&nbsp;+ CREATE NEW LESSON</p>
	</div>
	<div class='div2'>";
$sql = "select distinct lesson_id, lesson_name, lesson_objective, week_number, current_year, start_time, end_time, days, stories from lesson where week_number = $week and current_year = $year and days like '%tuesday%' order by start_time";
mysql_select_db('microstory_db');
$tuesday_result = mysql_query( $sql, $conn );
while($row_tuesday = mysql_fetch_array($tuesday_result)) {
	$lesson_id = $row_tuesday['lesson_id'];
	$lesson_name = $row_tuesday['lesson_name'];
	$lesson_objective = $row_tuesday['lesson_objective'];
	$start_time = $row_tuesday['start_time'];
	$end_time = $row_tuesday['end_time'];
	$stories_id = $row_tuesday['stories'];
	$sql_story_details = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id and s.story_id in (".$stories_id.")";
	mysql_select_db('microstory_db');
	$tuesday_story_result = mysql_query( $sql_story_details, $conn );
	$start = explode(":",$start_time);
	$end = explode(":",$end_time);
	$start_am_pm = "AM";
	$end_am_pm = "AM";
	if($start[0] > 12) {
		$start[0] = $start[0] - 12;
		$start_am_pm = "PM";
	} elseif($start[0] == 12) {
		$start_am_pm = "PM";
	}
	if($end[0] > 12) {
		$end[0] = $end[0] - 12;
		$end_am_pm = "PM";
	} elseif($end[0] == 12) {
		$end_am_pm = "PM";
	}
	$from = $start[0].":".$start[1]." ".$start_am_pm;
	$to = $end[0].":".$end[1]." ".$end_am_pm;
	echo "<br/>
		<div class='lessons w3-card-4'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<input class='w3-check lesson_checkbox' type='checkbox' name='lesson_ids[]' value='$lesson_id' onclick='enableSubmit()'>
		<h3>$lesson_name</h3>
		<p>$from - $to</p>
		</div>
		</div>
		<br/>
		<div class='lesson_body w3-row'>
		<div class='w3-container'>
		
		<p>$lesson_objective</p>";
		if(strlen($stories_id)>0) {
		  echo "<img src='book.png' alt='delete' class='book' >";
		}
		echo "</div>
		</div>
		</div>";	

}
echo "
	</div>
	</div>
	<div class='wed'>
	<div class='day_details'>
	<h3><b>WEDNESDAY</b></h3>
	<p>($wednesday_month $wednesday_daynum)</p>
	</div>
	<div class='add_daily'>
	<p onclick=\"document.getElementById('id03').style.display='block'\" style='width:auto;'>&nbsp;&nbsp;+ CREATE NEW LESSON</p>
	</div>
	<div class='div3'>";
$sql = "select distinct lesson_id, lesson_name, lesson_objective, week_number, current_year, start_time, end_time, days, stories from lesson where week_number = $week and current_year = $year and days like '%wednesday%' order by start_time";
mysql_select_db('microstory_db');
$wednesday_result = mysql_query( $sql, $conn );
while($row_wednesday = mysql_fetch_array($wednesday_result)) {
	$lesson_id = $row_wednesday['lesson_id'];
	$lesson_name = $row_wednesday['lesson_name'];
	$lesson_objective = $row_wednesday['lesson_objective'];
	$start_time = $row_wednesday['start_time'];
	$end_time = $row_wednesday['end_time'];
	$stories_id = $row_wednesday['stories'];
	$sql_story_details = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id and s.story_id in (".$stories_id.")";
	mysql_select_db('microstory_db');
	$wednesday_story_result = mysql_query( $sql_story_details, $conn );
	$start = explode(":",$start_time);
	$end = explode(":",$end_time);
	$start_am_pm = "AM";
	$end_am_pm = "AM";
	if($start[0] > 12) {
		$start[0] = $start[0] - 12;
		$start_am_pm = "PM";
	} elseif($start[0] == 12) {
		$start_am_pm = "PM";
	}
	if($end[0] > 12) {
		$end[0] = $end[0] - 12;
		$end_am_pm = "PM";
	} elseif($end[0] == 12) {
		$end_am_pm = "PM";
	}
	$from = $start[0].":".$start[1]." ".$start_am_pm;
	$to = $end[0].":".$end[1]." ".$end_am_pm;
	echo "<br/>
		<div class='lessons w3-card-4'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<input class='w3-check lesson_checkbox' type='checkbox' name='lesson_ids[]' value='$lesson_id' onclick='enableSubmit()'>
		<h3>$lesson_name</h3>
		<p>$from - $to</p>
		</div>
		</div>
		<br/>
		<div class='lesson_body w3-row'>
		<div class='w3-container'>
		
		<p>$lesson_objective</p>";
		if(strlen($stories_id)>0) {
		  echo "<img src='book.png' alt='delete' class='book' >";
		}
		echo "</div>
		</div>
		</div>";
		
	
}
echo "
	</div>
	</div>
	<div class='thu'>
	<div class='day_details'>
	<h3><b>THURSDAY</b></h3>
	<p>($thursday_month $thursday_daynum)</p>
	</div>
	<div class='add_daily'>
	<p onclick=\"document.getElementById('id04').style.display='block'\" style='width:auto;'>&nbsp;&nbsp;+ CREATE NEW LESSON</p>
	</div>
	<div class='div4'>";
$sql = "select distinct lesson_id, lesson_name, lesson_objective, week_number, current_year, start_time, end_time, days, stories from lesson where week_number = $week and current_year = $year and days like '%thursday%' order by start_time";
mysql_select_db('microstory_db');
$thursday_result = mysql_query( $sql, $conn );
while($row_thursday = mysql_fetch_array($thursday_result)) {
	$lesson_id = $row_thursday['lesson_id'];
	$lesson_name = $row_thursday['lesson_name'];
	$lesson_objective = $row_thursday['lesson_objective'];
	$start_time = $row_thursday['start_time'];
	$end_time = $row_thursday['end_time'];
	$stories_id = $row_thursday['stories'];
	$sql_story_details = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id and s.story_id in (".$stories_id.")";
	mysql_select_db('microstory_db');
	$thursday_story_result = mysql_query( $sql_story_details, $conn );
	$start = explode(":",$start_time);
	$end = explode(":",$end_time);
	$start_am_pm = "AM";
	$end_am_pm = "AM";
	if($start[0] > 12) {
		$start[0] = $start[0] - 12;
		$start_am_pm = "PM";
	} elseif($start[0] == 12) {
		$start_am_pm = "PM";
	}
	if($end[0] > 12) {
		$end[0] = $end[0] - 12;
		$end_am_pm = "PM";
	} elseif($end[0] == 12) {
		$end_am_pm = "PM";
	}
	$from = $start[0].":".$start[1]." ".$start_am_pm;
	$to = $end[0].":".$end[1]." ".$end_am_pm;
	echo "<br/>
		<div class='lessons w3-card-4'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<input class='w3-check lesson_checkbox' type='checkbox' name='lesson_ids[]' value='$lesson_id' onclick='enableSubmit()'>
		<h3>$lesson_name</h3>
		<p>$from - $to</p>
		</div>
		</div>
		<br/>
		<div class='lesson_body w3-row'>
		<div class='w3-container'>
		
		<p>$lesson_objective</p>";
		if(strlen($stories_id)>0) {
		  echo "<img src='book.png' alt='delete' class='book' >";
		}
		echo "</div>
		</div>
		</div>";
		
	
}
echo "
	</div>
	</div>
	<div class='fri'>
	<div class='day_details'>
	<h3><b>FRIDAY</b></h3>
	<p>($friday_month $friday_daynum)</p>
	</div>
	<div class='add_daily'>
	<p onclick=\"document.getElementById('id05').style.display='block'\" style='width:auto;'>&nbsp;&nbsp;+ CREATE NEW LESSON</p>
	</div>
	<div class='div5'>";
$sql = "select distinct lesson_id, lesson_name, lesson_objective, week_number, current_year, start_time, end_time, days, stories from lesson where week_number = $week and current_year = $year and days like '%friday%' order by start_time";
mysql_select_db('microstory_db');
$friday_result = mysql_query( $sql, $conn );
while($row_friday = mysql_fetch_array($friday_result)) {
	$lesson_id = $row_friday['lesson_id'];
	$lesson_name = $row_friday['lesson_name'];
	$lesson_objective = $row_friday['lesson_objective'];
	$start_time = $row_friday['start_time'];
	$end_time = $row_friday['end_time'];
	$stories_id = $row_friday['stories'];
	$sql_story_details = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id and s.story_id in (".$stories_id.")";
	mysql_select_db('microstory_db');
	$friday_story_result = mysql_query( $sql_story_details, $conn );
	$start = explode(":",$start_time);
	$end = explode(":",$end_time);
	$start_am_pm = "AM";
	$end_am_pm = "AM";
	if($start[0] > 12) {
		$start[0] = $start[0] - 12;
		$start_am_pm = "PM";
	} elseif($start[0] == 12) {
		$start_am_pm = "PM";
	}
	if($end[0] > 12) {
		$end[0] = $end[0] - 12;
		$end_am_pm = "PM";
	} elseif($end[0] == 12) {
		$end_am_pm = "PM";
	}
	$from = $start[0].":".$start[1]." ".$start_am_pm;
	$to = $end[0].":".$end[1]." ".$end_am_pm;
	echo "<br/>
		<div class='lessons w3-card-4'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<input class='w3-check lesson_checkbox' type='checkbox' name='lesson_ids[]' value='$lesson_id' onclick='enableSubmit()'>
		<h3>$lesson_name</h3>
		<p>$from - $to</p>
		</div>
		</div>
		<br/>
		<div class='lesson_body w3-row'>
		<div class='w3-container'>
		
		<p>$lesson_objective</p>";
		if(strlen($stories_id)>0) {
		  echo "<img src='book.png' alt='delete' class='book' >";
		}
		echo "</div>
		</div>
		</div>";
		
	
	  
}
echo "
	</div>
	</div>";
?>