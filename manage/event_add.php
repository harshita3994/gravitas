<?php
session_start();
require("../check/return_page2_manage.php");
require("../check/user_session2.php");
require("../check/manage_user_session.php");
require("../process/config.php");
?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="../img/logo.ico"/>
	<link rel="stylesheet" type="text/css"  href="../css/index.css" />
<script type="text/javascript">
	function validate(){
		var cname = document.getElementsByName("receipt")[0].value;
		if(cname==""){
			alert("Please enter the receipt number");
			return false;
		}
	}
	function checkit(){
		var e_name = document.getElementById("e_name").value;
		if(e_name==""){
			alert("Please enter the event name.");
			return false;
		}
		var e_nop = document.getElementById("e_nop").value;
		if(e_nop==""){
			alert("Please enter the no. of participants/team.");
			return false;
		}
		var e_name = document.getElementById("e_name").value;
		if(e_name==""){
			alert("Please enter the event name");
			return false;
		}
		var e_tseats = document.getElementById("e_tseats").value;
		if(e_tseats==""){
			alert("Please enter the total no. fo seats.");
			return false;
		}
		var e_min = document.getElementById("e_min").value;
		if(e_min==""){
			alert("Please enter the min no. of seats.");
			return false;
		}
		var e_max = document.getElementById("e_max").value;
		if(e_max==""){
			alert("Please enter the max no. of seats");
			return false;
		}
		var e_cost = document.getElementById("e_cost").value;
		if(e_cost==""){
			alert("Please enter the event cost");
			return false;
		}
		var e_type = document.getElementById("e_type").value;
		if(e_type==""){
			alert("Please enter the event type");
			return false;
		}
		var e_subtype = document.getElementById("e_subtype").value;
		if(e_subtype==""){
			alert("Please enter the event subtype");
			return false;
		}
	}
	function disably()
	{
		document.getElementById("min").disabled = false;
		document.getElementById("max").disabled = false;
	}

	function enably()
	{
		document.getElementById("min").value = 0;
		document.getElementById("max").value = 0;
		document.getElementById("min").disabled = true;
		document.getElementById("max").disabled = true;
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
	    	setAutoComplete("searchField", "results", "process/autocomplete.php?part=");
		});
	});
</script>

</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="../img/vit_logo.jpg" width="200px" height="120px"/>
		<div id="header"><a href="../index.php"><img id="header"  src="../img/gravitas_logo.png" width="250px" height="100px"/></a></div>
	</div>
			<div id="inner_main">
			<div id="formdiv">
			<div id="formdiv_inner">
				<form id="form" action="../process/event_process.php" method="POST">
				<div id="crossdiv"><input type="reset" id="cross"/><br /></div>
				Event Name : <input type="text" name="ename" id="e_name" /><br />
			    No of participants/team : <input type="text" name="teamlimit" id="e_nop" /><br />
			    Total Seats : <input type="text" maxlength="3" name="eseats" id="e_tseats" /><br />
				<input type="radio" name="variable" value=1 onclick="disably()" id="e_radio" />Variable Seats
				<input type="radio" name="variable" value=0 onclick="enably()" id="e_radio"/>Fixed Seats<br />
				Min : <input type="text" name="min" id="min" disabled style="width:40px;" id="e_min"/> 
				Max : <input type="text" name="max" id="max" disabled style="width:40px;" id="e_max"/><br />
			    Cost : <input type="text" maxlength="4" name="ecost" id="e_cost"><br />
				Type : <select name="type" id="e_type">
							<option>Formal</option>
							<option>Informal</option>
							<option>Workshop</option>
							<option>Premium</option>
						</select>
				Sub type : <select name="subtype" id="e_subtype">
							<option>Robotics</option>
							<option>Biosync</option>
							<option>Builtrix</option>
							<option>Electrical</option>
							<option>Applied Engineering</option>
							<option>Computers</option>
							<option>Quizzes</option>
							<option>Management</option>
						</select>
				<br /><input type="submit" value="Register" class="button" onclick="return checkit()" />
				</form>
				<br />
			</div>
			</div>	
			<div id="links">
				<a href="../process/search_login.php">Search by Receipt</a><br />
				<a href = "../process/event_display_login.php">Edit Event<a/>
			</div>
     </div>
	</div>
    <footer>graVITas2014.All rights reserved</footer>
	</div>
</body>
</html>
<body>