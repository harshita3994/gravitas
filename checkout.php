<!doctype html>
<?php
session_start();
require 'check/id_session.php';
require 'check/user_session.php';
require 'process/config.php';
?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas-Select Event</title>
	<link rel="shortcut icon" href="logo.ico"/>
	<link rel="stylesheet" type="text/css"  href="css/checkout.css" />
	<script src="process/autocomplete.js" type="text/javascript"></script>
	<script src="jquery.js"></script>
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
		
		$(function(){
	    	setAutoComplete("searchField", "results", "autocomplete.php?part=");
		});
	});
</script>

</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="img/vit_logo.jpg" width="200px" height="120px"/>
		<div id="header"><img id="header"  src="img/gravitas_logo.png" width="250px" height="100px"/></div>
	</div>
			<div id="inner_main">
			<div id="formdiv">
			<div id="formdiv_inner">
					<table border="1">
						<tr><th>Receipt Number</th>
							<th>Name</th>
							<th>Registration</th>
							<th>Contact Number</th>
							<th>Event Name</th>
							<th>Price</th>
						</tr>
						<?php
						$query="SELECT * FROM bill WHERE receipt_no LIKE '$_SESSION[id]'";
							$ans = mysql_query($query) OR die("Session of ID issue");
							while($res=mysql_fetch_assoc($ans))
							{
								printf('
									<tr>
									<td >%s</td>
									<td >%s</td>
									<td >%s</td>
									<td >%s</td>
									<td >%s</td>
									<td >%s</td>
									',$res['receipt_no'],$res['name'],$res['registration'],$res['contact_no'],$res['event_name'],$res['amount']);
									$event_name = $res['event_name'];
							}
							$temp_time = time() + 12600; // The timestamp...
							$curr_time = date("H:i:s",$temp_time);
							$query = "UPDATE bill SET username='$_SESSION[user]',time='$curr_time' WHERE receipt_no='$_SESSION[id]'";
							mysql_query($query) or die(mysql_error());
						?>
					</table>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a id="green" href="process/checkout_process.php?id=<?php echo $_SESSION['id']; ?>">CONFIRM</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a id="red" href="process/delete.php?id=<?php echo $_SESSION['id']; ?>">DELETE</a>
			</div>
			</div>	
     </div>
	</div>
    <footer>�graVITas2014.All rights reserved</footer>
</body>
</html>