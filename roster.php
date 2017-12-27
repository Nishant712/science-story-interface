<!DOCTYPE html>
<html>
<head>
<title>Roster</title>
<script type = "text/javascript" 
     src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
<script type = "text/javascript"  src = "freewall.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style>

/* BASIC */
.header {
	color: #FFFFFF;
	border: 1px solid #ccc;
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
	background-color: #FFFFFF;
	color: #008B8B;
	border-bottom: none;
	width: 45%;
	font-size: 2em;
}

.mainNav li.teach {
	background-color: #FF0000;
	color: #FFFFFF;
	order-bottom: none;
	width: 45%;
	font-size: 1.5em;
}
 

ul.planNav {
	list-style: none;
}

.planNav li {
    float: left;
	margin-right: 30px;
	padding: 10px;
}

.planNav li a {
	text-decoration: none;
	margin: 4px 2px;
	cursor: pointer;
	padding: 10px 15px;
	display: inline-block;
	text-align: center;
	border-radius: 4px;
}

hr {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}

.planNav li.roster a {
	background-color: #FFA500;
}

.planNav li.lesson a {
	background-color: #008B8B;
}

.planNav li.stories a {
	background-color: #008B8B;
}

.iconDetails {
margin-left:2%;
margin-right: 2%;
float:left; 
height:30%;
width:30%;	
border: 2px solid #F5A624;
margin-bottom: 2%;
margin-top: 2%;
background-color: #FFFFFF;
} 

.container2 {
	width:30%;
	height:auto;
	padding:1%;
	border: 2px #008B8B solid;
	background-color: #33A095;
	border-radius: 15px;
	margin: 10px auto;
}

.container2::after {
    content: "";
    clear: both;
    display: table;
}

.container {
		 width: 90%;
		 margin: 20px auto;
		 position: relative;
		 display: block;
}

.container:after {
  content: '';
  display: block;
  clear: both;
}

.search {
	float: right;
	margin: 0 auto;
	position: relative;
	display: block;
}

.search input[type="text"] {
	border-radius: 20px;
}

hr {
	margin-bottom: 0;
}

html, body {
	height: 98%;
}

.header1 {
	width: 100%;
	display: block;
	margin: 0;
}

.container2:hover {
	background-color: #F5A624;
}

.container2:hover .iconDetails {
	border: 2px solid #33A095;
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

<ul class="planNav">
<li class="lesson"><a href="/lesson_plan.php">LESSON PLAN</a></li>
<li class="stories"><a href="/stories.php">STORIES</a></li>
<li class="roster"><a href="/roster.php">ROSTER</a></li>
</ul>
<br/> <br/> <br/>
<hr/>

<div class="search">
	 <form method="post" >
	   <table align="center">
           <tr>
             <td>
               <input type="text" name="search_item" size="25" placeholder="Search">
             </td>
	  	   <td>
	  	     <input type="submit" name="b4" value="search">
	  	   </td>
           </tr>
       </table>
     </form>
   </div>

   
   <div id="result" class="container"> 
	 <?php 
		 
		include("config.php");
        $conn = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
        if(! $conn )
        {
        	die('Could not connect: ' . mysql_error());
        }
	     
		 if (isset($_POST['b4']))
		 {
		 
		 $search_item = $_POST["search_item"];
		 
		 if (strlen($search_item) == 0) {
			 $filter = " where 1=1";
		 }
		 else {
			 if(is_string($search_item)) {
				if(strtoupper($search_item) == 'MALE') {
					$filter = "where upper(sex)='M'";
				}
				elseif(strtoupper($search_item) == 'FEMALE') {
					$filter = "where upper(sex)='F'";
				}
				else {
					$filter = " where upper(name) like upper('%$search_item%')";
				}
			 }
			 else {
				 $filter = " where 1=1";
			 }
		 }
		 }
		 else {
			 $filter = " where 1=1";
		 }
         
         $sql = "select distinct student_id, name, sex from students ".$filter;
         mysql_select_db('microstory_db');
         $result = mysql_query( $sql, $conn );
	     
	     while($row = mysql_fetch_array($result))
         {
			$name = $row['name'];
			$id = $row['student_id'];
			$sex = $row['sex'];
			if($sex == 'M') {
				$sex = 'Male';
			}
			elseif($sex == 'F') {
				$sex = 'Female';
			}
			
			

			echo "<a href='http://memories.tamu.edu/student.php?studentid=$id'>
			    <div class = 'student container2'>
			       <div>
		           	<img src='student.png' class='iconDetails'>
		           </div>	
				   <div style='margin-left:60px;'>
	               <h4>$name</h4>
	               <div style='font-size:.9em'>$sex</div>
	               </div>
				</div>
				</a>";
			 
         }
		 mysql_close($conn);
		?>
</div>	

	 
	 <script>	 
	 
	 $('.container').imagesLoaded( function() {
         $(".container").masonry(
             {
                 itemSelector:'.student',
				 columnWidth: 10,
				 gutter: 10
             }
         );
     });
	 
	 </script>
</body>
</html>