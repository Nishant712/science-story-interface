<!DOCTYPE html>
<html>
<head>
<title>Planning</title>
<script type = "text/javascript" 
     src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
<script type = "text/javascript"  src = "freewall.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style>
/* reset browser styles */
html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	vertical-align: baseline;
}
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1.2;
}
ol { 
	padding-left: 1.4em;
	list-style: decimal;
}
ul {
	padding-left: 1.4em;
	list-style: square;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
} 
/* end reset browser styles */

/* BASIC */
.header {
	color: #FFFFFF;
	border: 1px solid #ccc;
    background-color: #2F4F4F;
	padding: 20px 20px;
}

.mainNav {
  margin: 0;
  padding: 0;
  list-style: none;
}

h1 {
	font-size: 1.2em;
}

.mainNav li{
	float: right;
	margin-right: 50px;
	display: inline-block;
	vertical-align: bottom;
	padding: 0px 10px 0px 10px;
	border-top-right-radius: 4px;
	border-top-left-radius: 4px;
}

.mainNav li a{
	font-size: 1em;
	text-decoration: none;
	padding: 10px;
	padding-top: 10px;
}

.mainNav li.plan{
	background-color: #FFFFFF;
	color: #008B8B;
	border-bottom: none;
}

.mainNav li.teach {
	background-color: #FF0000;
	color: #FFFFFF;
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
	background-color: #008B8B;
}

hr {
    height: 12px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
}

</style>
</head>

<body>

<div class="header">
<h1>SCIENCESTORIES</h1>
<ul class="mainNav">
<li class="teach"><a href="/planning.php">TEACH</a></li>
<li class="plan"><a href="/planning.php">PLAN</a></li>
</ul>
</div>

<ul class="planNav">
<li class="lesson"><a href="/lesson_plan.php">LESSON PLAN</a></li>
<li class="stories"><a href="/stories.php">STORIES</a></li>
<li class="roster"><a href="/roster.php">ROSTER</a></li>
</ul>
<br/> <br/> </br>
<hr/>
</body>
</html>