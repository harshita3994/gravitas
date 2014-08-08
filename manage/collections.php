<?php
session_start();
require("../process/config.php");
require("../check/user_session.php");
?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="img/logo.ico"/>
	<link rel="stylesheet" type="text/css"  href="../css/collections.css" />
	<script src="../process/collections_autocomplete.js" type="text/javascript"></script>
	<script src="../process/jquery.js"></script>
<script type="text/javascript">
	function clicky(){
			var html = "<img src='../img/loading.gif' />";
			document.getElementById("formdiv_inner").innerHTML = html;
			var day = document.getElementsByName("day")[0].value;	
			var month = document.getElementsByName("month")[0].value;	
			var day2 = document.getElementsByName("day2")[0].value;	
			var month2 = document.getElementsByName("month2")[0].value;	
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState ==4 && xmlhttp.status == 200)
				{
					document.getElementById("formdiv_inner").innerHTML = '';
					document.getElementById("formdiv_inner").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../process/collections_ajax.php?day="+day+"&month="+month+"&month2="+month2+"&day2="+day2,true);
			xmlhttp.send();
	}
	function totally()
	{
		var html = "<img src='../img/loading.gif' />";
			document.getElementById("totall").innerHTML = html;
			var day = document.getElementsByName("day")[0].value;	
			var month = document.getElementsByName("month")[0].value;	
			var day2 = document.getElementsByName("day2")[0].value;	
			var month2 = document.getElementsByName("month2")[0].value;	
			var xmlhttp;
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState ==4 && xmlhttp.status == 200)
				{
					document.getElementById("totall").innerHTML = '';
					document.getElementById("totall").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","../process/collections_total_ajax.php?day="+day+"&month="+month+"&month2="+month2+"&day2="+day2,true);
			xmlhttp.send();
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
		
	});
</script>

</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="logout"><a href="../logout.php">Logout</a></div>
	<div id="inner_main">
		<div id="formdiv">
			<div id="form">
			<input type="text" style="width:40px;" name="day" placeholder="DD" maxlength="2"/>
			<input type="text" name="month" style="width:40px" placeholder="MM" maxlength="2" /> -- 
			
			<input type="text" style="width:40px;" name="day2" placeholder="DD" maxlength="2" />
			<input type="text" name="month2" style="width:40px" placeholder="MM" maxlength="2" />
			<input type="button" value='Find Collection' onclick="clicky(),totally()"/>
			</div>
			<div id="totall"></div>
			<div id="formdiv_inner">
				
			</div>

		</div>	
     </div>
	</div>
    <footer>graVITas2014.All rights reserved</footer>
	</div>
</body>
</html>
<body>