<!doctype html>
<html>
<?php
session_start();
require '../check/user_session2.php';
require("config.php");
require("../check/check_manage_user_search.php");
if(isset($_POST['set']))
{
	if(isset($_POST['set']) == 1)
	{
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$ans = mysql_query("SELECT * FROM user WHERE username='$username' && password='$password' AND level=5") or die(mysql_error());
		if(mysql_num_rows($ans) == 1)
		{
			$_SESSION['manage_user'] = $username;
			header("location:../manage/search.php");
		}
	}
}
?>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="img/logo.ico"/>
	<script src="process/jquery.js"></script>
<script type="text/javascript">
	
	
	$(document).ready(function()
	{
		var h=$(window).height();
		var w=$(window).width();
		//alert(h+" " + w);
		var wrapper=document.getElementById("wrapper");
		var main=document.getElementById("main");
		var top=document.getElementById("top");
		var header=document.getElementById("header");
		wrapper.style.width=w+"px";
		wrapper.style.height=h+"px";
		main.style.width=w+"px";
		main.style.height=h+"px";
		top.style.width=w+"px";
		var x=top.style.width=w+"px";
		header.style.width=(0.9*x)+"px";
	});
</script>
<link rel="stylesheet" type="text/css"  href="../css/login.css" />
</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="../img/vit_logo.jpg" width="200px" height="120px"/>
		<div id="header"><a href="../index.php"><img id="header"  src="../img/gravitas_logo.png" width="250px" height="100px"/><a/></div>
	</div>
			<div id="inner_main">
			<div id="formdiv">
			<div id="formdiv_inner">
				<form id="form" action="search_login.php" method="POST">
				Username : <br /><input type="text" name="username" autocomplete="off"/><br />
			    Password : <br /><input type="password" name="password" />
				<input type="hidden" value="1" name="set" />
				<br /><input type="submit" value="Register" class="button" onclick="return validate()"/>
				</form>
				<br />
			</div>
			</div>	
     </div>
	</div>
    <footer>�graVITas2014.All rights reserved</footer>
</body>

</html>