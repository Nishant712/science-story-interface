<!DOCTYPE html>
<html>
	<head>
	<title>Stories Slideshow</title>
	<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
	<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
	<script src="js/moment.js"></script> 
	<script src="js/combodate.js"></script>
	<script src="/ckeditor/ckeditor.js"></script>
	<script src="/ckeditor/config.js"></script>
	<link rel="stylesheet" href="/css/w3.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
    .header {
    	color: #FFFFFF;
    	border: 1px solid #ccc;
		height: 50%;
		background-color: #2F4F4F;
		padding-bottom: 1.6%;
    }
	
	.science_stories {
		display: block;
		background-color: #2F4F4F;
		margin-left: 2.5%;
	}
	
	.main_tabs {
		display: block;
		float: right;
		background-color: #2F4F4F;
		margin-right: 5%;
		width: 20%;
	}
	
	.header1 {
		height: 25%;
		display: block;
	}
    
    .mainNav {
      margin: 0;
      padding: 0;
      list-style: none;
	  background-color: #2F4F4F;
    }
    
    .mainNav li{
		display: inline-block;
		vertical-align: bottom;
		border-top-right-radius: 4px;
		border-top-left-radius: 4px;
		float: right;
		display: block;
		width:auto;
		margin-right: 5%;
		
		text-align: center;
	}
    
    .mainNav li a{
    	text-decoration: none;
    }
    
    .mainNav li.plan{
    	background-color: #FF0000;
    	color: #FFFFFF;
		width: 45%;
		font-size: 1.5em;
    }
    
    .mainNav li.teach {
		background-color: #FFFFFF;
    	color: #008B8B;
    	border-bottom: none;
		width: 45%;
		font-size: 2em;
    }
    
	.mainNav1 {
		display: block;
		background-color: #2F4F4F;
	}

	* {box-sizing:border-box}
	
	.mySlides {display:none}

	/* Slideshow container */
	.slideshow-container {
		max-width: 1000px;
		position: relative;
		margin: auto;
	}
	
	/* Next & previous buttons */
	.prev, .next {
		cursor: pointer;
		top: 90%;
		width: auto;
		padding-top: 5%;
		padding-bottom: 5%;
		padding-right: 2%;
		padding-left: 2%;
		margin-top: 5%;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		float: right;
	}
	
	/* Position the "next button" to the right */
	.next {
		right: 0;
		border-radius: 3px 0 0 3px;
	}
	
	/* On hover, add a black background color with a little bit see-through */
	.prev:hover, .next:hover {
		background-color: rgba(0,0,0,0.8);
	}
	
	/* Caption text */
	.text {
		color: #f2f2f2;
		font-size: 15px;
		padding: 8px 12px;
		position: absolute;
		bottom: 8px;
		width: 100%;
		text-align: center;
	}
	
	
	/* The dots/bullets/indicators */
	.dot {
		cursor:pointer;
		height: 13px;
		width: 13px;
		margin: 0 2px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.6s ease;
	}
	
	.active, .dot:hover {
		background-color: #717171;
	}
	
	/* Fading animation */
	.fade {
		-webkit-animation-name: fade;
		-webkit-animation-duration: 1.5s;
		animation-name: fade;
		animation-duration: 1.5s;
	}
	
	@-webkit-keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
	}
	
	@keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
	}
	
	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {
		.prev, .next,.text {font-size: 11px}
	}
	
	.story {
		width: 70%;
		display: block;
		border-radius: 5px;
		float: right;
	}

	.name {
		float: right;
		display: block;
		margin-right: 50%;
		text-align: center;
	}
	
	.numbertext {
		display: block;
	}
	.slides {
		display:none;
	}
	
	.slideshow {
		float: right;
		display: block;
		width: 80%;
	}
	
	.lesson {
		background-color: #236574;
		height: 1000px;
		display: block;
		float: left;
		width: 20%
	}
	
	.container {
		position: relative;
		margin-top: 1%;
	}
	
	.lesson_header {
		text-align: center;
		color: white;
		margin-left: 5%;
		margin-right: 5%;
		background-color: #2AA79F;
		padding: 1%;
		border-radius: 5px;
		margin-top: 5%;
	}
	
	.lesson_objective {
		color: white;
		background-color: #2AA79F;
	}
	
	
    </style>
	
	</head>
	<body>
<div class="header1">
<div class="header">
<div class="science_stories">
<h1>SCIENCESTORIES</h1>
</div>
<div class="main_tabs">
<ul class="mainNav">
<li class="teach"><a href="/teaching.php">TEACH</a></li>
<li class="plan"><a href="/lesson_plan.php">PLAN</a></li>
</ul>
</div>
</div>
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
			 $sql = "select filter_name from filters where filter_id = $id";
			 mysql_select_db('microstory_db');
			 $result = mysql_query( $sql, $conn );
			 $row = mysql_fetch_array($result);
			 $filter_name = $row['filter_name'];
			 return $filter_name;
}
$lesson_id = $_GET['lesson_id'];
$sql_id = "select lesson_name, lesson_objective, start_time, end_time, stories from lesson where lesson_id=".$lesson_id;
mysql_select_db('microstory_db');
$result_id = mysql_query( $sql_id, $conn );
$row_id = mysql_fetch_array($result_id);
$lesson_name = $row_id['lesson_name'];
$lesson_objective = $row_id['lesson_objective'];
$start_time = $row_id['start_time'];
$end_time = $row_id['end_time'];
$stories = $row_id['stories'];
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
$id_arr = explode(",",$stories);
$arr_length = sizeof($id_arr);
   
   $full_html_start = "<div class='container'";
   $full_html_end = "</div>";
   $lesson_html = "<div class='lesson'>
					<div class='lesson_header'>
					 <h3>$lesson_name</h3>
					 <h4>$from - $to</h4>
					</div>
					<div class='lesson_objective'>
					 <p>$lesson_objective</p>
					</div>
				   </div>";

   $sql_story = "select distinct s.story_id as story_id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as transcript 
                     from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id
					 and s.story_id in (".$stories.")";
   mysql_select_db('microstory_db');
   $result_story = mysql_query( $sql_story, $conn );
   $count = 0;
   $html_header = "<div class='slideshow'>
					<div class='next_slide'>
				    <a class='next' onclick='plusSlides(1)'>&#10095;</a>
					</div>
					<div class='container'>";
   $html_footer = "</div>
				   <div class='previous_slide'>
				   <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
				   </div>
				   </div>";
   $html_content = "";
   while($row_story = mysql_fetch_array($result_story)) {
	    $count += 1;
	    $story_id = $row_story['story_id'];
		$name = $row_story['name'];
		$type1 = getFilter($row_story['type'],$conn);
		$type = $row_story['type'];
		$context1 = getFilter($row_story['context'],$conn);
		$context = $row_story['context'];
		$topic1 = getFilter($row_story['topic'],$conn);
		$topic = $row_story['topic'];
		$category1 = getFilter($row_story['category'],$conn);
		$category = $row_story['category'];
		$relation1 = getFilter($row_story['relation'],$conn);
		$relation = $row_story['relation'];
		$transcript = $row_story['transcript'];
		$len = 0.3 * strlen($row_story['story']);
		//$story1 = substr($row['story'], 0, $len);
		$full_story = $row_story['story'];
		$story = removeCommonWords($row_story['story']);
		$len = 0.3 * strlen($story1);
		$story1 = substr($story, 0, $len);
	    $html_content =  $html_content."<div class = 'w3-card-8 story slides'>
		        <div class='w3-row'>
                 <div class='w3-light-green w3-container'>
				  <div class='name'>
                   <p><b>Name</b></p> 
				   <p>".$name."</p>
				  </div>
				  <div class='numbertext'>
				   $count/$arr_length
				  </div>
                 </div>
                 
				   <div class = 'w3-row'>
				      <div class = 'w3-container w3-amber'>
					  <p><b>Story</b></p>
					  <p>".$transcript."</p>
					  </div>
				   </div>
				   <div class = 'w3-row'>
				      <div class = 'w3-container w3-brown w3-third'>
					  <p><b>Recording Context</b></p>
					  <p>".$context1."</p>
					  </div>
					  <div class = 'w3-container w3-teal w3-third'>
					  <p><b>Story Type</b></p>
					  <p>".$type1."</p>
					  </div>
					  <div class = 'w3-container w3-blue-grey w3-third'>
					  <p><b>Story Topic</b></p>
					  <p>".$topic1."</p>
					  </div>
				   </div>
				   <div class = 'w3-row'>
				      <div class = 'w3-container w3-black w3-half'>
					  <p><b>Relation to Science Concept</b></p>
					  <p>".$relation1."</p>
					  </div>
					  <div class = 'w3-container w3-deep-purple w3-half'>
					  <p><b>Story Category</b></p>
					  <p>".$category1."</p>
				   </div>
                 </div>
			</div>
			</div>
			 ";
	     }
   $slideshow = $html_header.$html_content.$html_footer;
   echo $full_html_start.$slideshow.$lesson_html.$full_html_end;
?>
    <script>
	var slideIndex = 1;
	showSlides(slideIndex);
	
	function plusSlides(n) {
	showSlides(slideIndex += n);
	}
	
	function currentSlide(n) {
	showSlides(slideIndex = n);
	}
	
	function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("slides");

	if (n > slides.length) {slideIndex = 1}    
	if (n < 1) {slideIndex = slides.length}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}

	slides[slideIndex-1].style.display = "block";  

	}
    </script>
</body>
</html>