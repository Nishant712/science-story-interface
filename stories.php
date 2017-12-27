<!DOCTYPE html>
<html>
	<head>
	<title>Stories</title>
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
    	background-color: #FFFFFF;
    	color: #008B8B;
    	border-bottom: none;
		width: 45%;
		font-size: 2em;
    }
    
    .mainNav li.teach {
    	background-color: #FF0000;
    	color: #FFFFFF;
		width: 45%;
    }
     
    
    ul.planNav {
    	list-style: none;
		padding: 0;
    }
    
    .planNav li {
        float: left;
    	margin-left: 1%;
    	padding: 0;
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
        height: 5px;
        border: 0;
		padding 0;
        box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
    }
    
    .planNav li.stories a {
    	background-color: #FFA500;
    }
    
    .planNav li.lesson a {
    	background-color: #008B8B;
    }
    
    .planNav li.roster a {
    	background-color: #008B8B;
    }
	
	.planNav1 {
		display: block;
		height: 50%;
	}
    
	.mainNav1 {
		display: block;
		background-color: #2F4F4F;
	}

	.story_section {
		height: 100%;
		position: fixed;
		width: 100%;
	}
	
	.story_part {
		float: right;
		width: 75%;
		padding: 0.5%;
		background-color: #D3E2DE;
		overflow-y:scroll;
		height: 100%;
	}
	
	.story_filter {
		float: right;
		width: 25%;
		background-color: #236574;
		height: 100%;
		overflow-y:scroll;
	}
	
	.add_selected {
		background-color: #2D8C77;
		color: white;
		padding: 7px 10px;
		border: none;
		cursor: pointer;
		width: 60%;
		border-radius: 10px;
		float: left;
		margin-left: 20%;
		top: 10%;
		position: relative;
	}
	
	.story_date {
		float: right;
		width: 13%;
		margin-left: 2%;
	}
	.story_row {
		float: right;
		word-wrap: break-word;
		width: 35%;
	}
	
	.story_div {
		width: auto;
		font-size: 1.2em;
	}
	
	.story_div:nth-child(odd) {
		background-color: #4EB69E;
	}
	
	.story_div:nth-child(even) {
		background-color: #79CAB7;
	}
	
	.student_pic{
		float: right;
		width: 16%;
		/*margin-right: 15%;*/
	}
	
	.student_pic > img {
		width: 80%;
		height: 80%;
		margin: 2%;
	}
	
	.check {
		float: right;
		width: 1%;
		margin-right: 9%;
		/*margin-right: 0;*/
	}
	
	.student_details {
		float: right;
		width: 15%;
		margin-right: 5%;
	}
	
	/* Set a style for all buttons */
	button {
		background-color: #2D8C77;
		color: white;
		padding: 7px 10px;
		margin-right: 10px;
		border: none;
		cursor: pointer;
		width: 100%;
		float: right;
		border-radius: 20px;
	}
	
	button:focus {
		background-color: #FFA500;
		color: white;
		padding: 7px 10px;
		margin-right: 10px;
		border: none;
		cursor: pointer;
		width: 100%;
		float: right;
		border-radius: 20px;
	}
	
	button:hover {
		opacity: 0.8;
		background-color: #FFA500;
	}
	
	/* Extra styles for the cancel button */
	.cancelbtn {
		width: auto;
		padding: 10px 18px;
		background-color: #f44336;
	}
	
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0); /* Black w/ opacity */
		padding-top: 150px;
	}
	
	.close {
		float: right;
	}
	
	/* Add Zoom Animation */
	.animate {
		-webkit-animation: animatezoom 0.6s;
		animation: animatezoom 0.6s
	}
	
	@-webkit-keyframes animatezoom {
		from {-webkit-transform: scale(0)} 
		to {-webkit-transform: scale(1)}
	}
		
	@keyframes animatezoom {
		from {transform: scale(0)} 
		to {transform: scale(1)}
	}
	
	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
		display: block;
		float: none;
		}
		.cancelbtn {
		width: 100%;
		}
	}
	
	.modal-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 4px solid #2D8C77;
		border-radius: 10px;
		width: 45%; /* Could be more or less, depending on screen size */
	}
	
	.modal p {
		padding: 10px;
	}
	
	.page_body {
		display: block;
		margin: 0;
		padding: 0;
	}
	
	.mon {
		float:left;
		width: 20%;
		min-height: 1000px;
	}
	
	.tue {
		float:left;
		width: 20%;
		min-height: 1000px;
	}
	
	.wed {
		float:left;
		width: 20%;
		min-height: 1000px;
	}
	
	.thu {
		float:left;
		width: 20%;
		min-height: 1000px;
	}
	
	.fri {
		float:left;
		width: 20%;
		min-height: 1000px;
	}
	
	.div1 {
		background-color: #D3E2DE;
		min-height: 1000px;
	}
	
	.div2 {
		background-color: #FFFFFF;
		min-height: 1000px;
	}
	
	.div3 {
		background-color: #D3E2DE;
		min-height: 1000px;
	}
	
	.div4 {
		background-color: #FFFFFF;
		min-height: 1000px;
	}
	
	.div5 {
		background-color: #D3E2DE;
		min-height: 1000px;
	}
	
	.weekly_details {
		display: block;
		text-align: center;
	}
	
	.weekly_details h3 {
		margin-left: 18.5%;
	}
	
	/*.weekly_details p {
		margin-left: 80px;
	}*/
	
	.day_details {
		background-color: #FFFFFF;
		display: block;
		text-align: center;
	}
	
	.day_details p {
		background-color: #FFFFFF;
		margin: 0;
		padding: 0;
	}
	
	.add_daily {
		padding: 5px;
		background-color: #236574;
		color: white;
		border: 4px solid #2AA79F;
		font-size: 1.5em;
		margin-bottom: 2%;
	}
	
	.add_daily > p{
		cursor: pointer;
	}
	
	.add_daily > p:hover {
		background-color: #FFA500;
	}
	
	.lessons {
		background-color: #38A98F;
		width: 95%;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 10px;
		padding-right: 0;
		margin: 5px;
		display: block;
		border-radius: 20px;
		cursor: pointer;
	}
	
	.lessons:hover {
		background-color: #FFA500;
	}
	
	.lesson_header {
		color: white;
	}
	
	.add_multi {
		display: block;
		padding: 0;
		margin: 0;
	}
	
	.add_multi div {
		background-color: #2D8C77;
		padding: 5px;
	}
	
	.add_multi h1 {
		/*padding-top: 10px;
		padding-bottom: 0;*/
		color: white;
	}
	
	.close_button {
		width: 25px;
		height: 25px;
		float: right;
		/*margin-bottom: 10px;*/
	}
	
	.date_pre {
		width: 15px;
		height: 15px;
		margin-right: 30px;
		cursor: pointer;
	}
	
	.date_next {
		width: 15px;
		height: 15px;
		margin-left: 30px;
		cursor: pointer;
	}
	
	.weekly_menu {
		background-color: #D3E2DE;
		padding-top: 15px;
		display: flex;
	}
	
	.weekly_menu > div {
		flex: 1;
	}
	
	.weekly_menu p {
		padding: 0;
		margin: 0;
	}
	
	.weekly_menu input[type=text] {
		border: 2px solid #38A98F;
	}
	
	.lesson_name {
		/*display: block;*/
	}
	
	.start_time select {
		border-top: 1px solid #38a98f; 
		color: white; 
		border-bottom: 1px solid #38a98f;
		border-right: 1px solid #38a98f;
		background-color: #38a98f;
		border-left:none;
		position: relative;
		right: 6px;
	}
	
	.end_time select {
		border-top: 1px solid #38a98f; 
		color: white; 
		border-bottom: 1px solid #38a98f;
		border-right: 1px solid #38a98f;
		background-color: #38a98f;
		border-left:none;
		position: relative;
		right: 6px;
	}
	
	.start_time input[type=text] {
		border-top: 1px solid #38a98f; 
		border-left: 1px solid #38a98f; 
		color: #000000; 
		border-bottom: 1px solid #38a98f;
		position:relative;
	}
	
	.end_time input[type=text] {
		border-top: 1px solid #38a98f; 
		border-left: 1px solid #38a98f; 
		color: #000000; 
		border-bottom: 1px solid #38a98f;
		position:relative;
	}
	
	.start_time {
		margin-left: 20px;
	}
	
	.end_time {
		margin: 0;
	}
	
	.days_checkboxes {
		margin-top: 20px;
		background-color: #D3E2DE;
	}
	
	.days_checkboxes p{
		margin-bottom: 0;
		margin-left: 15px;
		padding: 0;
	}
	
	.checkboxes {
		margin-top: 0;
		padding-bottom: 20px;
		color: #38a98f;
	}
	
	input[type=checkbox] {
		margin-left: 15px;
	}
	
	.menu_body {
		background-color: #D3E2DE;
		padding-bottom: 20px;
	}
	
	.menu_body p {
		color: #38a98f;
	}
	
	.days_checkboxes input[type=submit] {
		background-color: #2D8C77;
		color: white;
		padding: 7px 10px;
		border: none;
		cursor: pointer;
		width: 20%;
		border-radius: 10px;
		float: left;
		margin-left: 15px;
	}
	
	.delete_lesson {
		float: right;
		width: 10%;
		height: 10%;
		margin-left: 10px;
		cursor: pointer;
	}
	
	.modal1 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0); /* Black w/ opacity */
	}
	
	.modal1-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 4px solid #2D8C77;
		width: 75%; /* Could be more or less, depending on screen size */
	}
	
	.modal2 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0); /* Black w/ opacity */
	}
	
	.modal2-content {
		background-color: #fefefe;
		position: fixed;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 4px solid #2D8C77;
		width: 75%; /* Could be more or less, depending on screen size */
		overflow-y:scroll;
		height: 80%;
	}
	
	.calendar_header {
		background-color: #2D8C77;
	}
	
	.calendar_header h3 {
		margin-left: 40%;
	}
	
	.lesson_checkbox {
		float: right;
	}
	
	.save_button1 {
		display: block;
		margin-top: 1%;
		padding-bottom: 0.5%;
		background-color: #A3CDC3;
	}
	
	.save_button1 input[type="submit"] {
		background-color: #2D8C77;
		color: white;
		float: right;
		width: 25%;
	}
	
	.filter_dropdown {
		display: block;
		margin-left: 10%;
		padding-top: 5%;
		color: white;
	}
	
	.dropdown_filter {
		width: 80%;
		background-color: #2AA79F;
		color: white;
		border-radius: 5px;
		margin-top: 1%;
	}
	
	.dropdown_content {
		display: none;
		background-color: #2AA79F;
		width: 85%;
		margin-left: 10%;
		margin-top: 5%;
		color: white;
		padding-top: 5%;
		padding-bottom: 5%;
		border-radius: 5px;
	}
	
	.dropdown_content li {
		margin: 0.5%;
	}
	
	.check_all {
		display: block;
		margin-bottom: 2%;
		margin-left: 4%;
	}
	
	.book {
		display: block;
		float: right;
		width: 20%;
		height: 20%;
	}
	
	.s_header {
		background-color: #2FAA8F;
		color: white;
	}
	
	.s_footer {
		background-color: #2FAA8F;
		color: white;
	}
	
	.modal3 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 20%;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0); /* Black w/ opacity */
	}
	
	.modal3-content {
		background-color: #fefefe;
		margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
		border: 4px solid #2FAA8F;
		border-radius: 5px;
		width: 50%; /* Could be more or less, depending on screen size */
	}
	
	.story_details {
		cursor: pointer;
	}
	
	.search_student {
		color: white;
		cursor: pointer;
	}
	
	.lesson_submit1 {
		float: right;
		margin-right: 2%;
		color: white;
		background-color: #2AA79F;
		border-radius: 4px;
		font-size: 1.2em;
	}
	
	.row_title {
		display: block;
		margin-bottom: 5%;
	}
	.row_title p {
		float: right;
		font-size: 1.5em;
	}
	
	.date_title {
		margin-right: 10%;
	}
	
	.story_title {
		margin-right: 34%;
	}
	
	.author_title {
		margin-right: 30%;
	}
    </style>
	<script>
    function getQueryVariable(variable)
	{
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i=0;i<vars.length;i++) {
				var pair = vars[i].split("=");
				if(pair[0] == variable){return pair[1];}
		}
		return(false);
	}
	
	function getCalendar(a) {
		$.ajax({
			url: "story_weekly_calendar.php?date1="+a,
			complete: function (response) {
				$('.page_body').html(response.responseText);
			}
		});
	}
	
	function deleteLesson(input_data) {
		$.ajax({
			data: 'input_data=' + input_data,
			url: 'delete_lesson.php',
			method: 'POST', // or GET
			complete: function (response) {
				$('head').append(response.responseText);
			}
		});
	}
	
	var checkboxes_selected = document.getElementsByClassName("story_div");
	
	var a = moment().format('YYYY-MM-DD');
	
	var w = getQueryVariable("current_date");
	if(w == false) {
		console.log("No Variable");
	}
	else {
		a = moment(w,"YYYY-MM-DD").format('YYYY-MM-DD');
		console.log(a);
	}
	console.log(a);
	getCalendar(a);
	var click_count = 0;
	
	function increaseDate() {
		click_count = click_count + 1;
		a = moment(a,"YYYY-MM-DD").add(7,'days').format('YYYY-MM-DD');
		getCalendar(a);
	}
	
	function decreaseDate() {
		click_count = click_count - 1;
		a = moment(a,"YYYY-MM-DD").subtract(7,'days').format('YYYY-MM-DD');
		getCalendar(a);
	}
	
	function changeDate() {
		console.log(a);
		document.getElementById("current_date1").value = a;
		document.getElementById("current_date2").value = a;
		document.getElementById("current_date3").value = a;
		document.getElementById("current_date4").value = a;
		document.getElementById("current_date5").value = a;
	}
	
	function getval(ele) {
		console.log(ele.getAttribute('value'));
		var input_data = ele.getAttribute('value');
		deleteLesson(input_data);
	}
	
	function getstoryid() {
		getCalendar(a);
		var checkboxes = document.getElementsByName('story[]');
		var count_check = 0;
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				count_check += 1;
			}
		}
		if(count_check>0) {
			document.getElementById("c01").style.display="block";
			loadcheck();
		} else {
			alert("No story selected!!")
		}
	}
	
	function loadcheck() {
		var checkboxes = document.getElementsByName('story[]');
		var vals = "";
		for (var i=0, n=checkboxes.length;i<n;i++) 
		{
			if (checkboxes[i].checked) 
			{
				vals += ","+checkboxes[i].value;
			}
		}
		if (vals) vals = vals.substring(1);
		console.log(vals);
		document.getElementById("selected_stories").value = vals;
		document.getElementById("storyid1").value = vals;
		document.getElementById("storyid2").value = vals;
		document.getElementById("storyid3").value = vals;
		document.getElementById("storyid4").value = vals;
		document.getElementById("storyid5").value = vals;
		var input_data = document.getElementById("selected_stories").getAttribute('value');
		console.log(input_data);
		console.log("storyid1"+document.getElementById("storyid1").getAttribute('value'));
		console.log("storyid2"+document.getElementById("storyid2").getAttribute('value'));
		console.log("storyid3"+document.getElementById("storyid3").getAttribute('value'));
		console.log("storyid4"+document.getElementById("storyid4").getAttribute('value'));
		console.log("storyid5"+document.getElementById("storyid5").getAttribute('value'));
	}
	
	function getlessonid() {
		var count = 0;
		
		var checkboxes_lesson = document.getElementsByName('lesson_ids[]');
		var vals_lesson = "";
		for (var i=0, n=checkboxes_lesson.length;i<n;i++) 
		{
			if (checkboxes_lesson[i].checked) 
			{
				count += 1;
				vals_lesson += "&lesson_ids[]="+checkboxes_lesson[i].value;
			}
		}
		if (vals_lesson) vals_lesson = vals_lesson.substring(1);
		
		console.log(vals_lesson);
		console.log(count);
		//updatelesson(vals_lesson,vals_story);
	}
	
	function updatelesson(vals_lesson,vals_story) {

		$.ajax({
			url: "insert_multiple_lesson.php?"+vals_lesson+"&"+vals_story,
			complete: function (response) {
				$('head').html(response.responseText);
			}
		});
	}
	
	function check_uncheck(ele) {
		if(ele.checked) {
			for (var i=0;i<checkboxes_selected.length;i++) 
			{
				checkboxes_selected[i].getElementsByClassName("container")[0].getElementsByClassName("check")[0].getElementsByClassName("story_check")[0].checked = true;
			}
		} else {
			for (var i=0;i<checkboxes_selected.length;i++) 
			{
				checkboxes_selected[i].getElementsByClassName("container")[0].getElementsByClassName("check")[0].getElementsByClassName("story_check")[0].checked = false;
			}
		}
	}
	
	function showFilter(ele) {
		var filter_id = ele.options[ele.selectedIndex].value;
		console.log(filter_id);
		dropdowncontent = document.getElementsByClassName("dropdown_content");
		for (i = 0; i < dropdowncontent.length; i++) {
			dropdowncontent[i].style.display = "none";
		}
		document.getElementById(filter_id).style.display = "block";
	}
	
	function filterStories(ele) {
		if(ele.checked) {
			var story_filter = ele.getAttribute('value');
			console.log(story_filter);
			var stories = document.getElementsByClassName("story_div");
			for (i = 0; i < stories.length; i++) {
				stories[i].style.display = "none";
			}
			var filtered_stories = document.getElementsByClassName(story_filter);
			for (j = 0; j < filtered_stories.length; j++) {
				filtered_stories[j].style.display = "block";
			}
		}
		checkboxes_selected = filtered_stories;
	}
	
	function filterStudent() {
		var text = document.getElementById("text_name").value;
		var stories = document.getElementsByClassName("story_div");
		for (i = 0; i < stories.length; i++) {
			stories[i].style.display = "none";
		}
		var filtered_stories = document.getElementsByClassName(text);
		for (j = 0; j < filtered_stories.length; j++) {
			filtered_stories[j].style.display = "block";
		}
		checkboxes_selected = filtered_stories;
	}
    </script>
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
<div class="planNav1">
<ul class="planNav">
<li class="lesson"><a href="/lesson_plan.php">LESSON PLAN</a></li>
<li class="stories"><a href="/stories.php">STORIES</a></li>
<li class="roster"><a href="/roster.php">ROSTER</a></li>
</ul>
<br/> <br/> 
<hr/>
</div>
</div>

<div class="story_section">

<div class="story_part">
<div class='check_all'>
<input class="w3-check" type="checkbox" name="all_check" value="story[]" onclick="check_uncheck(this)"> <b>Check/Uncheck</b> 
<div class="row_title">
<p class="date_title"><strong>DATE</strong></p>
<p class="story_title"><strong>STORY</strong></p>
<p class="author_title"><strong>AUTHOR</strong></p>
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

function getStories() {
	$conn1 = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);
	if(! $conn1 )
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$sql_story = "select distinct st.sex, s.story_id as id, st.name as name, s.story_type as type, s.recording_context as context, s.story_topic as topic, s.story_category as category, s.relation_science as relation, s.transcript_edited as story from stories s, students st, student_story p where s.story_id = p.story_id and st.student_id = p.student_id";
	
	mysql_select_db('microstory_db');
	
	$result_story = mysql_query( $sql_story, $conn1 );
	
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
		$full_story = $row_story['story'];
		$len = 0.3 * strlen($row_story['story']);
		$story = removeCommonWords($row_story['story']);
		$len = 0.3 * strlen($story);
		$story1 = substr($story, 0, $len);
		//$story = str_replace(" ",";",$story);
		$story_html_loop = "<div class='w3-row story_div $name c$type c$context c$topic c$category c$relation' id='s$story_id'>
			<div class='container'>
			  <div class='story_date'>
				Jun 19<br/>
				2017
			  </div>
			  <div class='story_row'>
				<p>$story1 ..</p><p class='story_details' onclick=\"document.getElementById('f".$story_id."').style.display='block'\" style='width:auto;'><strong><u>View Full Story</u></strong></p>
				<audio controls>
					<source src='Story1.mp3' type='audio/mpeg'>
					Your browser does not support the audio element.
				</audio>
			  </div>
			  <div class='student_details'>
				<b>$name</b><br/>
				9 years old<br/>
				Bryan, TX
			  </div>
			  <div class='student_pic'>
				<img src='male_student.png' alt='avatar'>
			  </div>
			  <div class='check' value='check1'>
				<input class='w3-check story_check' type='checkbox' name='story[]' value='$story_id'> 
			  </div>
			</div>
		</div>";
		$full_loop = "<div id='f".$story_id."' class='modal3'>
                  
                    <div class = 'modal3-content animate w3-card-4'>
                	<header class='w3-container s_header'>
                		<h3><strong>$name</strong> <span onclick=\"document.getElementById('f".$story_id."').style.display='none'\" class='close' title='Close Modal'> <img src='X.png' alt='close' class='story_close'> </span></h3></h1>
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
	
	$final_html = $story_html.$full_story_html;

	return $final_html;
}

$story_html = getStories();
echo $story_html;

?>

<div id="c01" class="weekly_calendar modal1" onclick="changeDate()">
<div class = "modal1-content animate w3-card-4 ">
	<div class="w3-row calendar_header">
	<div class="w3-container">
		<h3>WEEKLY CALENDAR <span onclick="document.getElementById('c01').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h3>
	</div>
	</div>
	<form method="post" action="insert_multiple_lesson.php">
	<input type="hidden" id="selected_stories" name="checked_stories">
	<div class="page_body w3-row">
	</div>
	</form>
</div>
</div>

<div id="id01" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_story.php" id="add_all">
	<input type="hidden" id="current_date1" name="current_date">
	<input type="hidden" id="storyid1" name="storyid">
	<div class="w3-row menu_body">
	<div class="w3-container weekly_menu">
	 <div class="lesson_name">
      <p><b>Name</b><p>
	  <input type="text" name="lesson_name" size="25">
	 </div>
	 <div class="start_time">
	  <p><b>Start(hh:mm)</b></p>
	  <span>
		<input type="text" name="start_time" size="3">
		<select class="contentselect" id="contentselect" name="start_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
	 <div class="end_time">
	  <p><b>End(hh:mm)</b></p>
	  <span>
		<input type="text" name="end_time" size="3">
		<select class="contentselect" id="contentselect"  name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<p>Days to include this Lesson (this week)</p>
		<div class="checkboxes">
			<input type="checkbox" class="w3-check" name="checkbox[]" value="monday" checked><b>MON</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="tuesday"><b>TUE</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="wednesday"><b>WED</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="thursday"><b>THU</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="friday"><b>FRI</b>
		</div>
		<input type="submit" name="add" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>

<div id="id02" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_story.php" id="add_all">
	<input type="hidden" id="current_date2" name="current_date">
	<input type="hidden" id="storyid2" name="storyid">
	<div class="w3-row menu_body">
	<div class="w3-container weekly_menu">
	 <div class="lesson_name">
      <p><b>Name</b><p>
	  <input type="text" name="lesson_name" size="25">
	 </div>
	 <div class="start_time">
	  <p><b>Start(hh:mm)</b></p>
	  <span>
		<input type="text" name="start_time" size="3">
		<select class="contentselect" id="contentselect" name="start_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
	 <div class="end_time">
	  <p><b>End(hh:mm)</b></p>
	  <span>
		<input type="text" name="end_time" size="3">
		<select class="contentselect" id="contentselect"  name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<p>Days to include this Lesson (this week)</p>
		<div class="checkboxes">
			<input type="checkbox" class="w3-check" name="checkbox[]" value="monday"><b>MON</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="tuesday" checked><b>TUE</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="wednesday"><b>WED</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="thursday"><b>THU</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="friday"><b>FRI</b>
		</div>
		<input type="submit" name="add" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>

<div id="id03" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_story.php" id="add_all">
	<input type="hidden" id="current_date3" name="current_date">
	<input type="hidden" id="storyid3" name="storyid">
	<div class="w3-row menu_body">
	<div class="w3-container weekly_menu">
	 <div class="lesson_name">
      <p><b>Name</b><p>
	  <input type="text" name="lesson_name" size="25">
	 </div>
	 <div class="start_time">
	  <p><b>Start(hh:mm)</b></p>
	  <span>
		<input type="text" name="start_time" size="3">
		<select class="contentselect" id="contentselect" name="start_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
	 <div class="end_time">
	  <p><b>End(hh:mm)</b></p>
	  <span>
		<input type="text" name="end_time" size="3">
		<select class="contentselect" id="contentselect"  name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<p>Days to include this Lesson (this week)</p>
		<div class="checkboxes">
			<input type="checkbox" class="w3-check" name="checkbox[]" value="monday"><b>MON</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="tuesday"><b>TUE</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="wednesday" checked><b>WED</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="thursday"><b>THU</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="friday"><b>FRI</b>
		</div>
		<input type="submit" name="add" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>

<div id="id04" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_story.php" id="add_all">
	<input type="hidden" id="current_date4" name="current_date">
	<input type="hidden" id="storyid4" name="storyid">
	<div class="w3-row menu_body">
	<div class="w3-container weekly_menu">
	 <div class="lesson_name">
      <p><b>Name</b><p>
	  <input type="text" name="lesson_name" size="25">
	 </div>
	 <div class="start_time">
	  <p><b>Start(hh:mm)</b></p>
	  <span>
		<input type="text" name="start_time" size="3">
		<select class="contentselect" id="contentselect" name="start_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
	 <div class="end_time">
	  <p><b>End(hh:mm)</b></p>
	  <span>
		<input type="text" name="end_time" size="3">
		<select class="contentselect" id="contentselect"  name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<p>Days to include this Lesson (this week)</p>
		<div class="checkboxes">
			<input type="checkbox" class="w3-check" name="checkbox[]" value="monday"><b>MON</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="tuesday"><b>TUE</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="wednesday"><b>WED</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="thursday" checked><b>THU</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="friday"><b>FRI</b>
		</div>
		<input type="submit" name="add" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>

<div id="id05" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_story.php" id="add_all">
	<input type="hidden" id="current_date5" name="current_date">
	<input type="hidden" id="storyid5" name="storyid">
	<div class="w3-row menu_body">
	<div class="w3-container weekly_menu">
	 <div class="lesson_name">
      <p><b>Name</b><p>
	  <input type="text" name="lesson_name" size="25">
	 </div>
	 <div class="start_time">
	  <p><b>Start(hh:mm)</b></p>
	  <span>
		<input type="text" name="start_time" size="3">
		<select class="contentselect" id="contentselect" name="start_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
	 <div class="end_time">
	  <p><b>End(hh:mm)</b></p>
	  <span>
		<input type="text" name="end_time" size="3">
		<select class="contentselect" id="contentselect"  name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<p>Days to include this Lesson (this week)</p>
		<div class="checkboxes">
			<input type="checkbox" class="w3-check" name="checkbox[]" value="monday"><b>MON</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="tuesday"><b>TUE</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="wednesday"><b>WED</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="thursday"><b>THU</b>
			<input type="checkbox" class="w3-check" name="checkbox[]" value="friday" checked><b>FRI</b>
		</div>
		<input type="submit" name="add" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>


</div>

<div class="story_filter">
<div class="filter_dropdown">
	<p>Filter By:</p>
	<select class="dropdown_filter" onchange="showFilter(this)">
		<option disabled selected value> -- select an option -- </option>
		<option value="story_type">Story Type</option>
		<option value="recording_context">Recording Context</option>
		<option value="story_category">Story Category</option>
		<option value="relation_science">Relation to Science Concept</option>
		<option value="child">Filter by Student</option>
	</select> 
	</div>
	<div class="dropdown_content" id="story_type">
	<ul style="list-style-type:none;">
		<li><input type="radio" name="story_type" value="c1" onclick="filterStories(this)">Friction Stories</li>
		<li><input type="radio" name="story_type" value="c2" onclick="filterStories(this)">Gravity Stories</li>
	</ul> 
	</div>
	<div class="dropdown_content" id="recording_context">
	<ul style="list-style-type:none;">
		<li><input type="radio" name="recording_context" value="c4" onclick="filterStories(this)">Home</li>
		<li><input type="radio" name="recording_context" value="c5" onclick="filterStories(this)">Car</li>
		<li><input type="radio" name="recording_context" value="c6" onclick="filterStories(this)">Living Room</li>
		<li><input type="radio" name="recording_context" value="c7" onclick="filterStories(this)">School</li>
		<li><input type="radio" name="recording_context" value="c8" onclick="filterStories(this)">Outside</li>
	</ul>
	</div>
	<div class="dropdown_content" id="story_category">
	<ul style="list-style-type:none;">
		<li><input type="radio" name="story_category" value="c78" onclick="filterStories(this)">Personal Experience</li>
		<li><input type="radio" name="story_category" value="c79" onclick="filterStories(this)">Observation</li>
		<li><input type="radio" name="story_category" value="c80" onclick="filterStories(this)">Narration</li>
		<li><input type="radio" name="story_category" value="c81" onclick="filterStories(this)">Thought Experiment/Questioning</li>
	</ul>
	</div>
	<div class="dropdown_content" id="relation_science">
	<ul style="list-style-type:none;">
		<li><input type="radio" name="relation_science" value="c82" onclick="filterStories(this)">Characteristic/Form</li>
		<li><input type="radio" name="relation_science" value="c83" onclick="filterStories(this)">Process</li>
		<li><input type="radio" name="relation_science" value="c84" onclick="filterStories(this)">Cause/Effect</li>
	</ul>
	</div>
	<div class="dropdown_content" id="child">
	<ul style="list-style-type:none;">
		<li><p>Name</p></li>
		<li><input type="text" size="20" id="text_name" name="child"> <span onclick="filterStudent()" class="search_student">Search</span></li>

	</ul>
	</div>
<button class="add_selected" onclick="getstoryid()">ADD TO LESSON</button>
</div>	 
</div>
    
</body>
</html>