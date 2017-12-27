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

function removeCommonWords($input){

	$commonWords = array('hey','Okay','okay','\'','my','My','So','so','okay','I','i','is','a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
 
	return preg_replace('/\b('.implode('|',$commonWords).')\b/','',$input);
}

function getFilter($id,$conn) {
	$conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	$sql = "select filter_name from filters where filter_id = $id";
	mysql_select_db('microstory_db');
	$result = mysql_query($sql, $conn);
	while($row = mysql_fetch_array($result))	{
		$filter_name = $row['filter_name'];
	}
	return $filter_name;
}

function getStories($lesson_id, $lesson_name, $from, $to, $weekday, $month, $daynum, $stories_id) {
	$conn1 = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
	if(! $conn1 )
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql_story = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id";
	
	mysql_select_db('microstory_db');
	
	$result_story = mysql_query( $sql_story, $conn1 );
	
	$story_html_start = "<div id='sd".$weekday.$lesson_id."' class='modal2'>
	 <div class = 'modal2-content animate w3-card-4'>
	 <div class='w3-row story_header'>
	 <div class='w3-container'>
	 <h3 class='story_lesson'><strong> $lesson_name </strong><span onclick=\"document.getElementById('sd".$weekday.$lesson_id."').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='story_close'> </span></h3>	
	 <h4 class='story_time'>$from - $to <span class='story_lesson_date'>$weekday - $month $daynum</span></h4>
	 </div>
	 </div>
	 <div class='story_body w3-row'>
	 <div class='check_all'>
	 <input class='w3-check' type='checkbox' name='all_check' value='story".$weekday.$lesson_id."[]' onclick='check_uncheck(this)'> <b>Check/Uncheck</b> 
	 <div class='row_title'>
	 <p class='date_title'><strong>DATE</strong></p>
	 <p class='story_title'><strong>STORY</strong></p>
	 <p class='author_title'><strong>AUTHOR</strong></p>
	 </div>
	 </div>";
	$story_html_end = "</div>
	<div class='story_filter'>
	<div class='filter_dropdown'>
	<p>Filter By:</p>
	<select class='dropdown_filter' onchange='showFilter(this)'>
		<option disabled selected value> -- select an option -- </option>
		<option value='story_type'>Story Type</option>
		<option value='recording_context'>Recording Context</option>
		<option value='story_category'>Story Category</option>
		<option value='relation_science'>Relation to Science Concept</option>
		<option value='child'>Student</option>
	</select> 
	</div>
	<div class='dropdown_content' id='story_type'>
	<ul style='list-style-type:none;'>
		<li><input type='radio' name='story_type' value='c1,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Friction Stories</li>
		<li><input type='radio' name='story_type' value='c2,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Gravity Stories</li>
	</ul> 
	</div>
	<div class='dropdown_content' id='recording_context'>
	<ul style='list-style-type:none;'>
		<li><input type='radio' name='recording_context' value='c4,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Home</li>
		<li><input type='radio' name='recording_context' value='c5,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Car</li>
		<li><input type='radio' name='recording_context' value='c6,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Living Room</li>
		<li><input type='radio' name='recording_context' value='c7,st".$weekday.$lesson_id."' onclick='filterStories(this)'>School</li>
		<li><input type='radio' name='recording_context' value='c8,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Outside</li>
	</ul>
	</div>
	<div class='dropdown_content' id='story_category'>
	<ul style='list-style-type:none;'>
		<li><input type='radio' name='story_category' value='c78,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Personal Experience</li>
		<li><input type='radio' name='story_category' value='c79,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Observation</li>
		<li><input type='radio' name='story_category' value='c80,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Narration</li>
		<li><input type='radio' name='story_category' value='c81,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Thought Experiment/Questioning</li>
	</ul>
	</div>
	<div class='dropdown_content' id='relation_science'>
	<ul style='list-style-type:none;'>
		<li><input type='radio' name='relation_science' value='c82,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Characteristic/Form</li>
		<li><input type='radio' name='relation_science' value='c83,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Process</li>
		<li><input type='radio' name='relation_science' value='c84,st".$weekday.$lesson_id."' onclick='filterStories(this)'>Cause/Effect</li>
	</ul>
	</div>
	<div class='dropdown_content' id='child'>
	<ul style='list-style-type:none;'>
		<li><p>Name</p></li>
		<li><input type='text' size='20' id='text_".$weekday.$lesson_id."' name='child'> <span id='submit_".$weekday.$lesson_id."' onclick='filterStudent(this)' class='search_student'>Search</span></li>

	</ul>
	</div>
	<button class='add_selected' onclick=\"loadcheck(this,'$weekday','$lesson_id')\" value='att".$weekday.$lesson_id."'>ADD SELECTED</button>
	</div>
	</div>
	</div>";
	
	$id_array = explode(",",$stories_id);
	
	$story_html = "";
	$full_story_html = "";
	
	while($row_story = mysql_fetch_array($result_story))	{
		$story_id = $row_story['id'];
		$name = $row_story['name'];
		$type1 = getFilter($row_story['type'],$conn1);
		$type = $row_story['type'];
		$context1 = getFilter($row_story['context'],$conn1);
		$context = $row_story['context'];
		$topic1 = getFilter($row_story['topic'],$conn);
		$topic = $row_story['topic'];
		$category1 = getFilter($row_story['category'],$conn1);
		$category = $row_story['category'];
		$relation1 = getFilter($row_story['relation'],$conn1);
		$relation = $row_story['relation'];
		$len = 0.3 * strlen($row_story['story']);
		//$story1 = substr($row['story'], 0, $len);
		$full_story = $row_story['story'];
		$story = removeCommonWords($row_story['story']);
		$len = 0.3 * strlen($story1);
		$story1 = substr($story, 0, $len);
		if (in_array($story_id, $id_array)) {
			$story_checkbox = "<input class='w3-check story_check' type='checkbox' name='story".$weekday.$lesson_id."[]' value='$story_id,".$name."' checked> ";
		}
		else {
			$story_checkbox = "<input class='w3-check story_check' type='checkbox' name='story".$weekday.$lesson_id."[]' value='$story_id,".$name."'> ";
		}
		$story_html_loop = "<div class='w3-row story_div st".$weekday.$lesson_id." $name c$type c$context c$topic c$category c$relation' id='s$story_id'>
			<div class='container'>
			  <div class='story_date'>
				Jun 19<br/>
				2017
			  </div>
			  <div class='story_row'>
				<p>$story .</p><p class='story_details' onclick=\"document.getElementById('".$weekday.$lesson_id.$story_id."').style.display='block'\" style='width:auto;'><strong><u>View Full Story</u></strong></p>
			  </div>
			  <div class='student_details'>
				<b>$name</b><br/>
				9 years old<br/>
				Bryan, TX
			  </div>
			  <div class='student_pic'>
				<img src='male_student.png' alt='avatar'>
			  </div>
			  <div class='check'>
				$story_checkbox
			  </div>
			</div>
		</div>";
		$full_loop = "<div id='".$weekday.$lesson_id.$story_id."' class='modal3'>
                  
                    <div class = 'modal3-content animate w3-card-4'>
                	<header class='w3-container s_header'>
                		<h3><strong>$name</strong> <span onclick=\"document.getElementById('".$weekday.$lesson_id.$story_id."').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='story_close'> </span></h3></h1>
                	</header>
                	<div class='w3-container short'>
                      <p>$full_story</p>
                    </div>
                	<footer class='w3-container s_footer'>
                      <h4><strong>$type1</strong></h4>
                    </footer>
                	</div>
                </div>
			 ";
		$story_html = $story_html.$story_html_loop;
		$full_story_html = $full_story_html.$full_loop;
	}
	mysql_close(conn1);
	$story_modal = $story_html_start.$story_html.$story_html_end;
	$final_html = $story_modal.$full_story_html;
	return $final_html;
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
		<div class='lessons w3-card-4' onclick=\"document.getElementById('lMON$lesson_id').style.display='block'\" style='width:auto;'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<img src='X.png' alt='delete' class='delete_lesson' value='".$lesson_id.":monday' onclick='getval(this)'>
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
		
	echo "<div id='lMON$lesson_id' class='modal1'>
	 <div class = 'modal1-content animate w3-card-4'>
	 <div class='w3-row objective'>
	 <div class='w3-container'>
	 <h3 class='objective_lesson'><strong>$lesson_name</strong><span onclick=\"document.getElementById('lMON$lesson_id').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='close_button'> </span></h3>	
	 <h4 class='objective_time'>$from - $to&nbsp;&nbsp;&nbsp;&nbsp;<span class='objective_date'>MON - $monday_month $monday_daynum</span></h4>
	 </div>
	 <div class='w3-row objective_body'>
	   <div class='w3-container'>
		<form method='POST' class='objective_form' action='update_objective.php' id='formMON".$lesson_id."'>
			<input type='hidden' id='id' name='lesson_id' value='$lesson_id'>
			<p>Lesson Description</p>
            <textarea name='editor1' id='monday_editor$lesson_id' rows='10' cols='80'>
                $lesson_objective
            </textarea>
			<script>
			CKEDITOR.replace( 'monday_editor$lesson_id' );
    </script>
	  <input type='submit' name='add' value='SAVE'>";
	  if(strlen($stories_id)>0) {
		  echo "<input type='hidden' name='story_ids' value='".$stories_id."' id='formstoryMON".$lesson_id."'>";
	  }
	  echo "</form>
	  <button class='add_stories' onclick=\"story_modal('sdMON$lesson_id','st"."MON".$lesson_id."')\">ATTACH STORY TO LESSON</button>
	  <br/> <br/>
	  <div class='story_attach' id='attMON".$lesson_id."'>";
	if(strlen($stories_id)>0) {
		while($row_monday_story = mysql_fetch_array($monday_story_result)) {
			$st_id = $row_monday_story['id'];
			$student_name = $row_monday_story['name'];
			echo "<div id='strattMON".$lesson_id."_".$st_id."' class='inner'>
			<p> $student_name -> $st_id -> <span class=\"view_full\" onclick=\"viewFull('"."MON".$lesson_id.$st_id."')\"><strong>Full Story</strong></span> <span class='close' onclick=\"deleteStory(this)\" value='strattMON".$lesson_id."_".$st_id."' style='float: right;'><img src='X.png' alt='close' class='close_button'></span></p>
			</div>";
		}
	}
	  echo "
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>";
	 
	 $story = getStories($lesson_id, $lesson_name, $from, $to, "MON", $monday_month, $monday_daynum, $stories_id );
	 echo $story;
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
		<div class='lessons w3-card-4' onclick=\"document.getElementById('lTUE$lesson_id').style.display='block'\" style='width:auto;'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<img src='X.png' alt='delete' class='delete_lesson' value='".$lesson_id.":tuesday' onclick='getval(this)'>
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
		echo "
		</div>
		</div>
		</div>";	
	echo "<div id='lTUE$lesson_id' class='modal1'>
	 <div class = 'modal1-content animate w3-card-4'>
	 <div class='w3-row objective'>
	 <div class='w3-container'>
	 <h3 class='objective_lesson'><strong>$lesson_name</strong><span onclick=\"document.getElementById('lTUE$lesson_id').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='close_button'> </span></h3>	
	 <h4 class='objective_time'>$from - $to&nbsp;&nbsp;&nbsp;&nbsp;<span class='objective_date'>TUE - $tuesday_month $tuesday_daynum</span></h4>
	 </div>
	 <div class='w3-row objective_body'>
	   <div class='w3-container'>
		<form method='POST' class='objective_form' action='update_objective.php' id='formTUE".$lesson_id."'>
			<input type='hidden' id='id' name='lesson_id' value='$lesson_id'>
			<p>Lesson Description</p>
            <textarea name='editor1' id='tuesday_editor$lesson_id' rows='10' cols='80'>
                $lesson_objective
            </textarea>
			<script>
			CKEDITOR.replace( 'tuesday_editor$lesson_id' );
    </script>
	  <input type='submit' name='add' value='SAVE'>";
	  if(strlen($stories_id)>0) {
		  echo "<input type='hidden' name='story_ids' value='".$stories_id."' id='formstoryTUE".$lesson_id."'>";
	  }
	  echo "</form>
	  <button class='add_stories' onclick=\"story_modal('sdTUE$lesson_id','st"."TUE".$lesson_id."')\">ATTACH STORY TO LESSON</button>
	  <br/> <br/>
	  <div class='story_attach' id='attTUE".$lesson_id."'>";
	if(strlen($stories_id)>0) {
		while($row_tuesday_story = mysql_fetch_array($tuesday_story_result)) {
			$st_id = $row_tuesday_story['id'];
			$student_name = $row_tuesday_story['name'];
			echo "<div id='strattTUE".$lesson_id."_".$st_id."' class='inner'>
			<p> $student_name -> $st_id -> <span class=\"view_full\" onclick=\"viewFull('"."TUE".$lesson_id.$st_id."')\"><strong>Full Story</strong></span><span class='close' onclick='deleteStory(this)' value='strattTUE".$lesson_id."_".$st_id."' style='float: right;'><img src='X.png' alt='close' class='close_button'></span></p>
			</div>";
		}
	}
	  echo "</div>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>";
	  
	 $story = getStories($lesson_id, $lesson_name, $from, $to, "TUE", $tuesday_month, $tuesday_daynum, $stories_id );
	 echo $story;
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
		<div class='lessons w3-card-4' onclick=\"document.getElementById('lWED$lesson_id').style.display='block'\" style='width:auto;'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<img src='X.png' alt='delete' class='delete_lesson' value='".$lesson_id.":wednesday' onclick='getval(this)'>
		<h3>$lesson_name</h3>
		<p>$from - $to</p>
		</div>
		</div>
		<br/>
		<div class='lesson_body w3-row'>
		<div class='w3-container'>
		
		<p>$lesson_objective</p>
		";
		if(strlen($stories_id)>0) {
		  echo "<img src='book.png' alt='delete' class='book' >";
		}
		echo "
		</div>
		</div>
		</div>";
		
	echo "<div id='lWED$lesson_id' class='modal1'>
	 <div class = 'modal1-content animate w3-card-4'>
	 <div class='w3-row objective'>
	 <div class='w3-container'>
	 <h3 class='objective_lesson'><strong>$lesson_name</strong><span onclick=\"document.getElementById('lWED$lesson_id').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='close_button'> </span></h3>	
	 <h4 class='objective_time'>$from - $to&nbsp;&nbsp;&nbsp;&nbsp;<span class='objective_date'>WED - $wednesday_month $wednesday_daynum</span></h4>
	 </div>
	 <div class='w3-row objective_body'>
	   <div class='w3-container'>
		<form method='POST' class='objective_form' action='update_objective.php' id='formWED".$lesson_id."'>
			<input type='hidden' id='id' name='lesson_id' value='$lesson_id'>
			<p>Lesson Description</p>
            <textarea name='editor1' id='wednesday_editor$lesson_id' rows='10' cols='80'>
                $lesson_objective
            </textarea>
			<script>
			CKEDITOR.replace( 'wednesday_editor$lesson_id' );
    </script>
	  <input type='submit' name='add' value='SAVE'>";
	  if(strlen($stories_id)>0) {
		  echo "<input type='hidden' name='story_ids' value='".$stories_id."' id='formstoryWED".$lesson_id."'>";
	  }
	  echo "
	  </form>
	  <button class='add_stories' onclick=\"story_modal('sdWED$lesson_id','st"."WED".$lesson_id."')\">ATTACH STORY TO LESSON</button>
	  <br/> <br/>
	  <div class='story_attach' id='attWED".$lesson_id."'>";
	if(strlen($stories_id)>0) {
		while($row_wednesday_story = mysql_fetch_array($wednesday_story_result)) {
			$st_id = $row_wednesday_story['id'];
			$student_name = $row_wednesday_story['name'];
			echo "<div id='strattWED".$lesson_id."_".$st_id."' class='inner'>
			<p> $student_name -> $st_id -> <span class=\"view_full\" onclick=\"viewFull('"."WED".$lesson_id.$st_id."')\"><strong>Full Story</strong></span> <span class='close' onclick='deleteStory(this)' value='strattWED".$lesson_id."_".$st_id."' style='float: right;'><img src='X.png' alt='close' class='close_button'></span></p>
			</div>";
		}
	}
	  echo "</div>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>";
	  
	 $story = getStories($lesson_id, $lesson_name, $from, $to, "WED", $wednesday_month, $wednesday_daynum, $stories_id );
	 echo $story;
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
		<div class='lessons w3-card-4' onclick=\"document.getElementById('lTHU$lesson_id').style.display='block'\" style='width:auto;'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<img src='X.png' alt='delete' class='delete_lesson' value='".$lesson_id.":thursday' onclick='getval(this)'>
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
		echo "
		</div>
		</div>
		</div>";
		
	echo "<div id='lTHU$lesson_id' class='modal1'>
	 <div class = 'modal1-content animate w3-card-4'>
	 <div class='w3-row objective'>
	 <div class='w3-container'>
	 <h3 class='objective_lesson'><strong>$lesson_name</strong><span onclick=\"document.getElementById('lTHU$lesson_id').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='close_button'> </span></h3>	
	 <h4 class='objective_time'>$from - $to&nbsp;&nbsp;&nbsp;&nbsp;<span class='objective_date'>THU - $thursday_month $thursday_daynum</span></h4>
	 </div>
	 <div class='w3-row objective_body'>
	   <div class='w3-container'>
		<form method='POST' class='objective_form' action='update_objective.php' id='formTHU".$lesson_id."'>
			<input type='hidden' id='id' name='lesson_id' value='$lesson_id'>
			<p>Lesson Description</p>
            <textarea name='editor1' id='thursday_editor$lesson_id' rows='10' cols='80'>
                $lesson_objective
            </textarea>
			<script>
			CKEDITOR.replace( 'thursday_editor$lesson_id' );
    </script>
	  <input type='submit' name='add' value='SAVE'>";
	  if(strlen($stories_id)>0) {
		  echo "<input type='hidden' name='story_ids' value='".$stories_id."' id='formstoryTHU".$lesson_id."'>";
	  }
	  echo "
	  </form>
	  <button class='add_stories' onclick=\"story_modal('sdTHU$lesson_id','st"."THU".$lesson_id."')\">ATTACH STORY TO LESSON</button>
	  <br/> <br/>
	  <div class='story_attach' id='attTHU".$lesson_id."'>";
	if(strlen($stories_id)>0) {
		while($row_thursday_story = mysql_fetch_array($thursday_story_result)) {
			$st_id = $row_thursday_story['id'];
			$student_name = $row_thursday_story['name'];
			echo "<div id='strattTHU".$lesson_id."_".$st_id."' class='inner'>
			<p> $student_name -> $st_id -> <span class=\"view_full\" onclick=\"viewFull('"."THU".$lesson_id.$st_id."')\"><strong>Full Story</strong></span> <span class='close' onclick='deleteStory(this)' value='strattTHU".$lesson_id."_".$st_id."' style='float: right;'><img src='X.png' alt='close' class='close_button'></span></p>
			</div>";
		}
	}
	  echo "
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>";
	  
	 $story = getStories($lesson_id, $lesson_name, $from, $to, "THU", $thursday_month, $thursday_daynum, $stories_id );
	 echo $story;
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
		<div class='lessons w3-card-4' onclick=\"document.getElementById('lFRI$lesson_id').style.display='block'\" style='width:auto;'>
		<div class='lesson_header w3-row'>
		<div class='w3-container'>
		<img src='X.png' alt='delete' class='delete_lesson' value='".$lesson_id.":friday' onclick='getval(this)'>
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
		echo "
		</div>
		</div>
		</div>";
		
	echo "<div id='lFRI$lesson_id' class='modal1'>
	 <div class = 'modal1-content animate w3-card-4'>
	 <div class='w3-row objective'>
	 <div class='w3-container'>
	 <h3 class='objective_lesson'><strong>$lesson_name</strong><span onclick=\"document.getElementById('lFRI$lesson_id').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='close_button'> </span></h3>	
	 <h4 class='objective_time'>$from - $to&nbsp;&nbsp;&nbsp;&nbsp;<span class='objective_date'>FRI - $friday_month $friday_daynum</span></h4>
	 </div>
	 <div class='w3-row objective_body'>
	   <div class='w3-container'>
		<form method='POST' class='objective_form' action='update_objective.php' id='formFRI".$lesson_id."'>
			<input type='hidden' id='id' name='lesson_id' value='$lesson_id'>
			<p>Lesson Description</p>
            <textarea name='editor1' id='friday_editor$lesson_id' rows='10' cols='80'>
                $lesson_objective
            </textarea>
			<script>
			CKEDITOR.replace( 'friday_editor$lesson_id' );
    </script>
	  <input type='submit' name='add' value='SAVE'>";
	  if(strlen($stories_id)>0) {
		  echo "<input type='hidden' name='story_ids' value='".$stories_id."' id='formstoryFRI".$lesson_id."'>";
	  }
	  echo "
	  </form>
	  <button class='add_stories' onclick=\"story_modal('sdFRI$lesson_id','st"."FRI".$lesson_id."')\">ATTACH STORY TO LESSON</button>
	  <br/> <br/>
	  <div class='story_attach' id='attFRI".$lesson_id."'>";
	if(strlen($stories_id)>0) {
		while($row_friday_story = mysql_fetch_array($friday_story_result)) {
			$st_id = $row_friday_story['id'];
			$student_name = $row_friday_story['name'];
			echo "<div id='strattTHU".$lesson_id."_".$st_id."' class='inner'>
			<p> $student_name -> $st_id -> <span class=\"view_full\" onclick=\"viewFull('"."FRI".$lesson_id.$st_id."')\"><strong>Full Story</strong></span> <span class='close' onclick='deleteStory(this)' value='strattFRI".$lesson_id."_".$st_id."' style='float: right;'><img src='X.png' alt='close' class='close_button'></span></p>
			</div>";
		}
	}
	  echo "
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>";
	  
	 $story = getStories($lesson_id, $lesson_name, $from, $to, "FRI", $friday_month, $friday_daynum, $stories_id );
	 echo $story;
}
echo "
	</div>
	</div>";
?>