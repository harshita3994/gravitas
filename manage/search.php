<!doctype html>
<?php
session_start();
require("../check/user_session.php");
require("../check/manage_user_session.php");
require("../process/config.php");
?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="img/logo.ico"/>
	<link rel="stylesheet" type="text/css"  href="../css/search.css"/>
	<script src="../process/search_autocomplete.js" type="text/javascript"></script>
	<script src="../process/jquery.js"></script>
<script type="text/javascript">
	function alertt()
	{
		return confirm("Are you sure this is crap??");
	}
	$(document).ready(function()
	{
		var h=$(window).height();
		var w=$(window).width();
		//alert(h+" " + w);
		var wrapper=document.getElementById("wrapper");
		var main=document.getElementById("main");
		var top=document.getElementById("top");
		wrapper.style.width=w+"px";
		wrapper.style.height=h+"px";
		main.style.width=w+"px";
		top.style.width=w+"px";
		
		$(function(){
	    	setAutoComplete("searchField", "results", "../process/search_autocomplete.php?part=");
		});
	});
</script>

</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="../img/vit_logo.jpg" width="200px" height="120px"/>
		<div id="header"><a href='../index.php'><img id="header"  src="../img/gravitas_logo.png" width="250px" height="100px"/></a></div>
		<div id="logout"><a href="../logout.php">Logout</a></div>
	</div>
		<div id="inner_main">
			<div id="autocomplete">
				<H4>SEARCH RECEIPT</H4> 
				<input id="searchField" maxlength="15" name="searchField" type="text" />
				<div id="results"></div>
			</div>
			<div id="links">
				<a href="../process/event_add_login.php">Add Event</a><br />
				<a href = "../process/event_display_login.php">Edit Event<a/>
			</div>
		</div>
     </div>
	</div>
    <footer>graVITas2014.All rights reserved</footer>
	</div>
</body>
</html>