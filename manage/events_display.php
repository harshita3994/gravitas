<?php
session_start();	
require("../check/return_page2_manage.php");
require("../check/user_session.php");
require("../check/manage_user_session.php");
require("../process/config.php");

?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="../img/logo.ico"/>
	<script src="process/autocomplete.js" type="text/javascript"></script>
	<script src="process/jquery.js"></script>
<script type="text/javascript">
	function validate(){
		var cname = document.getElementsByName("receipt")[0].value;
		if(cname==""){
			alert("Please enter the receipt number");
			return false;
		}
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
<link rel="stylesheet" type="text/css"  href="../css/events_display.css" />
</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="../img/vit_logo.jpg" width="200px" height="120px"/>
		<div id="header"><a href="../index.php"><img id="header"  src="../img/gravitas_logo.png" width="250px" height="100px"/></a></div>
		<div id="logout"><a href="../logout.php">Logout</a></div>
	</div>
			<div id="inner_main">
			<div id="formdiv">
			<div id="formdiv_inner">
				<table border="1">
				<tr><th>Type</th>
					<th>Event Name</th>
					<th>Total Seats</th>
					<th>Seats Available</th>
					<th>Cost</th>
					<th>EDIT</th>
				</tr>
			<?php
				$query = "SELECT * FROM page2 ORDER BY type ASC";
				$ans = mysql_query($query) or die(mysql_error());
				while($res = mysql_fetch_assoc($ans))
				{
					$code = $res['type'];
					if($code==0)
					$type = "Formal";
					else if($code == 1)
					$type = "Informal";
					else if ($code == 2)
					$type = "Workshop";
					else if ($code == 3)
					$type = "Premier";
					echo "<tr><td>".$type."</td>";
					echo "<td>".$res['event_name']."</td>";
					echo "<td>".$res['seats_total']."</td>";
					echo "<td>".$res['seats_available']."</td>";
					echo "<td>".$res['cost']."</td>";
					echo "<form action='event_edit.php' method='POST'>";
					echo "<td><input type='submit' value='EDIT'/>
					<input type='hidden' name='srno' value='".$res['srno']."'/></td>";
					echo "</form>";
					echo "</tr>";
				}
			?>
				</table>
			</div>	
			</div>
		<div id="links">
			<a href = "../process/event_add_login.php">Add Event<a/><br />
			<a href="../process/search_login.php">Search by Receipt</a><br />
		</div>
     </div>
	</div>
    <footer>graVITas2014.All rights reserved</footer>
	</div>
</body>
</html>

		<
</div>
</div>
</body>