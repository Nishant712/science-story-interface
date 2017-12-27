<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<script type = "text/javascript"  src = "/jquery/jquery-3.1.1.min.js"></script>
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
h1 {
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
.mainNav li {
  float: left;
  margin-right: 50px;
}
.mainNav li:last-of-type a {
  border-right: 1px dashed #999;
}
.mainNav a {
  color: #000;
  font-size: 11px;
  text-transform: uppercase;
  text-decoration: none;
  border: 1px dashed #999;
  border-right: none;
  padding: 7px 5px 7px 30px;
  display: block;
  background-color: #E7E7E7;
  background-image: url(images/nav.png);
  background-repeat: no-repeat;
  background-position: 0 2px;
}
.mainNav a:hover {
  font-weight: bold;
  background-color: #B2F511;
  background-position: 3px 50%;
}

.container {
	margin: auto;
	width: 90%;
	padding: 20px;
}

</style>
</head>
<body>
<h1>SCIENCESTORIES</h1>
 <div class="container">
  <ul class="mainNav">
    <li>
	<div>
	<img src="planning.png" alt="Avatar" class="avatar">
	<a href="/lesson_plan.php">PLANNING</a>
	</div>
	</li>
    <li>
	<div>
	<img src="teaching.png" alt="Avatar" class="avatar">
	<a href="/teaching.php">TEACHING</a>
	</div>
	</li>
  </ul>
 </div>
</body>
</html>