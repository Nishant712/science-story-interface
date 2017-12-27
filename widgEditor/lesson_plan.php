<!DOCTYPE html>
<html>
<head>
    <title>Lesson Plan</title>
	<!-- demo stylesheet -->

	<!-- helper libraries -->
	<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/moment.js"></script> 
	<script src="js/combodate.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/ckeditor/ckeditor.js"></script>
	<script src="/ckeditor/config.js"></script>
	<link rel="stylesheet" href="/css/w3.css">
	
	<!-- daypilot libraries -->		

<style>

/* BASIC */
.header {
	color: #FFFFFF;
	border: 1px solid #ccc;
    background-color: #2F4F4F;
	padding-bottom: 1.54%;
}

.science_stories {
	display: block;
	background-color: #2F4F4F;
}

.main_tabs {
	display: block;
	float: right;
	background-color: #2F4F4F;
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
}

.mainNav li a{
	text-decoration: none;
}

.mainNav li.plan{
	background-color: #FFFFFF;
	color: #008B8B;
	border-bottom: none;
	font-size: 1.5em;
}

.mainNav li.teach {
	background-color: #FF0000;
	color: #FFFFFF;
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

.planNav li.lesson a {
	background-color: #FFA500;
}

.planNav li.stories a {
	background-color: #008B8B;
}

.planNav li.roster a {
	background-color: #008B8B;
}

.header1 {
	width: 100%;
	display: block;
	margin: 0;
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

/* The Close Button (x) 
.close {
    color: #000;
    font-size: 35px;
    font-weight: bold;
}*/

.close {
	margin: 0;
}
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
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
	margin-left: 80px;
}

.weekly_details p {
	margin-left: 80px;
}

.day_details {
	display: block;
	text-align: center;
}

.mon .add_daily {
	background-color: #A3CDC3;
}

.tue .add_daily {
	background-color: #D3E2DE;
}

.wed .add_daily {
	background-color: #A3CDC3;
}

.thu .add_daily {
	background-color: #D3E2DE;
}

.fri .add_daily {
	background-color: #A3CDC3;
}

.add_daily {
	padding: 5px;
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

.objective {
	background-color: #2D8C77;
	padding: 5px;
}

.objective_body {
	background-color: #D3E2DE;
	padding: 10px;
}

input[type=submit] {
	background-color: #2D8C77;
	color: white;
	padding: 7px 10px;
	border: none;
	cursor: pointer;
	width: 20%;
	border-radius: 10px;
	float: right;
	margin-top: 1%;
}

.objective_form input[type=submit]:hover {
	background-color: #FFA500;
}

.add_stories {
	background-color: #2D8C77;
	color: white;
	padding: 7px 10px;
	border: none;
	cursor: pointer;
	width: 20%;
	border-radius: 10px;
	margin-top: 15px;
	float: left;
}

.add_stories:hover {
	background-color: #FFA500;
	color: white;
	padding: 7px 10px;
	border: none;
	cursor: pointer;
	width: 20%;
	border-radius: 10px;
	margin-top: 15px;
	float: left;
}

.objective_lesson, .objective_time {
	color: white;
}

.objective_date {
	color: black;
}

.objective .close_button {
	width: 25px;
	height: 25px;
	cursor: pointer;
	float: right;
	/*margin-bottom: 10px;*/
}

.add_stories:hover {
	background-color: #FFA500;
}

.objective_form input[type=submit]:hover {
	background-color: #FFA500;
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
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 4px solid #2FAA8F;
    width: 75%; /* Could be more or less, depending on screen size */
	height: 80%;
}

.story_header {
	background-color: #2FAA8F;
	padding: 5px;
	height: 20%;
}

.story_body {
	padding: 0.5%;
	background-color: #D3E2DE;
	overflow-y:scroll;
	height: 80%;
	float: right;
	width: 70%
}

.story_filter {
	width: 30%;
	background-color: #236574;
	height: 80%;
}

.story_close {
	float: right;
	cursor: pointer;
	width: 3%;
	height: 3%;
}

.story_lesson {
	color: #F3F1BE;
}

.story_time {
	color: #F3F1BE;
}

.story_lesson_date {
	margin-left: 25%;
}

.add_selected {
	background-color: #2D8C77;
	color: white;
	padding: 7px 10px;
	border: none;
	cursor: pointer;
	width: 80%;
	border-radius: 10px;
	float: left;
	margin-left: 10%;
	top: 30%;
	position: relative;
}

.add_selected:hover {
	background-color: #FFA500;
}

.inner {
	width: 24%;
	background-color: #A3CDC3;
	float: left;
	margin: 0.5%;
	border: 1px black solid;
}

.story_attach {
	margin-top: 2%;
	display: block;
	margin-bottom: 2%;
	background-color: #FFFFFF;
}

.book {
	display: block;
	float: right;
	width: 20%;
	height: 20%;
}

.check_all {
	display: block;
	margin-bottom: 2%;
	margin-left: 4%;
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

.view_full {
	cursor: pointer;
	margin: 0;
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
        url: "weekly_calendar.php?date1="+a,
        complete: function (response) {
            $('.page_body').html(response.responseText);
        },
        error: function () {
            $('.page_body').html('There was an error!');
        },
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

var a = moment().format('YYYY-MM-DD');
var checkboxes_selected;

var w = getQueryVariable("current_date");
if(w == false) {
	console.log("No Variable");
}
else {
	a = moment(w,"YYYY-MM-DD").format('YYYY-MM-DD');
	console.log(a);
}

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
	document.getElementById("current_date").value = a;
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

function loadcheck(ele,weekday,lesson_id) {
var div_id = ele.getAttribute('value');
var checkbox_name = div_id.replace("att", "story") + "[]";
var checkboxes = document.getElementsByName(checkbox_name);
var check_len = checkboxes.length;
var count_check = 0;
console.log(weekday+","+lesson_id);
for (var j=0, l=checkboxes.length;j<l;j++) 
{
	if (checkboxes[j].checked) 
	{
		count_check += 1;
	}
}
if(count_check>0) {
	var vals = "";
	for (var i=0, n=checkboxes.length;i<n;i++) 
	{
		if (checkboxes[i].checked) 
		{
			vals += ";"+checkboxes[i].value;
		}
	}
	if (vals) vals = vals.substring(1);
	loadStories(vals,div_id,weekday,lesson_id);
} else {
	alert("No story selected!!");
}
}

function viewFull(id) {
	document.getElementById(id).style.display="block";
}

function loadStories(vals,div_id,weekday,lesson_id){
var output = document.getElementById(div_id);
var val_array = vals.split(';');
var str_window = div_id.replace("att", "sd");
var form_ele = div_id.replace("att", "form");
var formstory_ele = div_id.replace("att", "formstory");
var form_story = "";
var str_att_id = div_id.replace("att", "stratt")+"_";
for(var i = 0; i < val_array.length; i++)
{
	var id_arr = val_array[i].split(',');
	form_story = form_story + "," + id_arr[0];
	if(!document.getElementById(str_att_id+id_arr[0]))
	{
		var ele = document.createElement("div");
		ele.setAttribute("id",str_att_id+id_arr[0]);
		ele.setAttribute("class","inner");
		//console.log("<p>hi "+val_array[i]+" <span class=\"close\" value=\"timedrpact"+val_array[i]+"\">&times;</span></p> ");
		ele.innerHTML="<p>"+id_arr[1]+" -> "+id_arr[0]+" -> <span class=\"view_full\" onclick=\"viewFull('"+weekday+lesson_id+id_arr[0]+"')\"><strong>Full Story</strong></span> <span class=\"close\" onclick=\"deleteStory(this)\" value=\""+str_att_id+id_arr[0]+"\" style='float: right;'>&times;</span></p> ";
		output.appendChild(ele);

	}
	
}
form_story = form_story.slice(1);
var story = document.getElementById(form_ele);
if(!document.getElementById(formstory_ele))
{
	var ele1 = document.createElement("input");
	ele1.setAttribute("id",formstory_ele);
	ele1.setAttribute("value",form_story);
	ele1.setAttribute("name","story_ids");
	ele1.setAttribute("type","hidden");
	story.appendChild(ele1);
}
else {
	$('#' + formstory_ele).remove();
	var ele1 = document.createElement("input");
	ele1.setAttribute("id",formstory_ele);
	ele1.setAttribute("value",form_story);
	ele1.setAttribute("name","story_ids");
	ele1.setAttribute("type","hidden");
	story.appendChild(ele1);
}
document.getElementById(str_window).style.display="none";
}

function deleteStory(ele) {
	console.log(ele.getAttribute('value'));
	var div_id = ele.getAttribute('value');
	var inputs = div_id.split('_');
	console.log(inputs[0].replace("stratt", "formstory"));
	console.log(inputs[1]);
	updateinput(inputs[0].replace("stratt", "formstory"), inputs[1])
	$('#' + div_id).remove();
}

function updateinput(input_id, story_id) {
	var input_ele = document.getElementById(input_id);
	var id_value = input_ele.getAttribute('value');
	console.log(id_value);
	var ids = id_value.split(',');
	var updated_id = "";
	for(var i = 0; i < ids.length; i++) {
		if(ids[i] != story_id) {
			updated_id = updated_id + "," + ids[i];
		}
	}
	console.log(updated_id.slice(1));
	input_ele.setAttribute("value",updated_id.slice(1));
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
		var input = ele.getAttribute('value');
		console.log(input);
		var parsed_input = input.split(',');
		var story_filter = parsed_input[0];
		var stories_class = parsed_input[1];
		console.log(story_filter);
		console.log(stories_class);
		var stories = document.getElementsByClassName(stories_class);
		for (i = 0; i < stories.length; i++) {
			stories[i].style.display = "none";
		}
		var filtered_stories = document.getElementsByClassName(story_filter);
		for (j = 0; j < filtered_stories.length; j++) {
			filtered_stories[j].style.display = "block";
		}
		checkboxes_selected = filtered_stories;
	}
}

function filterStudent(ele) {
	var input = ele.getAttribute('id');
	var text_id = input.replace("submit_", "text_");
	var stories_class = input.replace("submit_", "st");
	var text = document.getElementById(text_id).value;
	var stories = document.getElementsByClassName(stories_class);
	for (i = 0; i < stories.length; i++) {
		stories[i].style.display = "none";
	}
	var filtered_stories = document.getElementsByClassName(text);
	for (j = 0; j < filtered_stories.length; j++) {
		filtered_stories[j].style.display = "block";
	}
	checkboxes_selected = filtered_stories;
}

function story_modal(modal_id, check_id) {
	checkboxes_selected = document.getElementsByClassName(check_id);
	document.getElementById(modal_id).style.display="block";
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
<ul class="planNav">
<li class="lesson"><a href="/lesson_plan.php">LESSON PLAN</a></li>
<li class="stories"><a href="/stories.php">STORIES</a></li>
<li class="roster"><a href="/roster.php">ROSTER</a></li>
</ul>
<br/> <br/> </br>
<hr/>
</div>

<div class='page_body' onclick="changeDate()">

</div>

<div id="id01" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_lesson.php" id="add_all">
	<input type="hidden" id="current_date" name="current_date">
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
	<form method="post" action="insert_monday_lesson.php" id="add_monday">
	<input type="hidden" id="current_date1" name="current_date">
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
		<select class="contentselect" id="contentselect" name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<input type="submit" name="add_monday" value="SAVE">
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
	<form method="post" action="insert_tuesday_lesson.php" id="add_monday">
	<input type="hidden" id="current_date2" name="current_date">
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
		<select class="contentselect" id="contentselect" name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<input type="submit" name="add_tuesday" value="SAVE">
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
	<form method="post" action="insert_wednesday_lesson.php" id="add_monday">
	<input type="hidden" id="current_date3" name="current_date">
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
		<select class="contentselect" id="contentselect" name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<input type="submit" name="add_wednesday" value="SAVE">
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
	<form method="post" action="insert_thursday_lesson.php" id="add_monday">
	<input type="hidden" id="current_date4" name="current_date">
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
		<select class="contentselect" id="contentselect" name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<input type="submit" name="add_thursday" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>

<div id="id06" class="modal">                 
    <div class = "modal-content animate w3-card-4">
	<div class="w3-row add_multi">
	<div class="w3-container">
		<h1>Insert a Lesson <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal"> <img src="X.png" alt="close" class="close_button"> </span></h1>
	</div>
	</div>
	<form method="post" action="insert_friday_lesson.php" id="add_monday">
	<input type="hidden" id="current_date5" name="current_date">
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
		<select class="contentselect" id="contentselect" name="end_am_pm">
			<option value="AM">AM</option>
			<option value="PM">PM</option>
		</select>
	  </span>
	 </div>
    </div>
	<div class="days_checkboxes">
		<input type="submit" name="add_friday" value="SAVE">
	</div>
	</div>
	</form>
	</div>
</div>


      
</body>
</html>

