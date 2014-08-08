<!doctype html>
<html>
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
<link rel="stylesheet" type="text/css"  href="css/Login.css"/>
</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="img/vit_logo.jpg" width="200px" height="120px" alt="login"/>
		<div id="header"><img id="header"  src="img/main.jpg" width="250px" height="100px" alt="abc"/></div>
		</div>
    
	<div class="new"><form id="form" action="process/login.php" method="POST" align="center">
				Username : <br /><input type="text" name="username" autocomplete="off"/><br />
			    Password : <br /><input type="password" name="password" />
				<br /><input type="submit" value="Register" class="button" onClick="return validate()"/>
				</form></div>
				<br />
	</div>
			<div id="inner_main">
			<div id="formdiv">
			<div id="formdiv_inner">
				
			</div>
			</div>	
     </div>
	</div>
    <footer>�graVITas2014.All rights reserved</footer>
</body>
</html>