<!doctype html>
<?php
session_start();
require("check/user_session.php");
require("check/id_session.php");
require("process/config.php");
$_SESSION['page2'] = "page2.php";

?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas-Select Event</title>
	<link rel="shortcut icon" href="img/logo.ico"/>	
	<link rel="stylesheet" type="text/css"  href="css/page2.css" />
	<script src="process/jquery.js"></script>
<script type="text/javascript">
	function varclicky(count,id)
	{
		var tbl = document.getElementById("events_table");
		var cells = tbl.rows[count].getElementsByTagName('td');
		alert("You selected : " + cells[1].innerHTML + ".Kindly select number of seats as well");
		//var numrows = tbl.rows.length;
		//selected = id;
		/*var cells = tbl.rows[selected].getElementsByTagName('td');
		alert(cells[4]);
		document.getElementById("sample").innerHTML = cells[4];*/
		//var tselected = new Array();
		//var dropselected = new Array();
		//var i;
		//storing all values of dropdown menus
		/*for(i=1;i<numrows;i++)
		{
			tselected[i] = i*10;
			var e = document.getElementById(tselected[i]);
			dropselected[i] = e.options[e.selectedIndex].value;
		}*/
		var tbl = document.getElementById("events_table");
		var e = document.getElementById(count*10);
		var seat = e.options[e.selectedIndex].value;
		alert(seat);
		document.getElementById("seat").value = seat;
	}
	function clicky(count)
	{
		//document.getElementById("seat").value = teamlimit;
		var tbl = document.getElementById("events_table");
		var cells = tbl.rows[count].getElementsByTagName('td');
		alert("You selected : " + cells[1].innerHTML);
		document.getElementById("seat").value = 0;
	}
	function changy(count,counts)
	{
		//alert("Hello World");
		var tbl = document.getElementById("events_table");
		var e = document.getElementById(counts);
		var seat = e.options[e.selectedIndex].value;
		var selected;
		for(var a=1;a<=count;a++)
		{
			if(document.getElementById(a).checked == true)
			{
				selected = a;
				//alert("Selected ID is "+ selected);
			}
		}
		if((counts/10) == selected)
		{
			//alert("This is the seat number : "+seat);
			document.getElementById("seat").value = seat;
		}
		
		/*var numrows = tbl.rows.length;
		var tselected = new Array();
		var dropselected = new Array();
		var i;
		for(i=1;i<numrows;i++)
		{
			tselected[i] = i*10;
			var e = document.getElementById(tselected[i]);
			dropselected[i] = e.options[e.selectedIndex].value;
		}
		document.getElementById("seat").value = dropselected[selected];*/
	}
	function showy()
	{
		alert("No of seats = " + document.getElementById("seat").value);	
	}
	
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
			<div id="sample"></div>
			<div id="formdiv_inner">
				<form  action="process/page2_process.php" method="POST">
				<div id="form">
					<table id="events_table" border="1">
						<tr><th>Select</th>
							<th>Event Name</th>
							<th>Available Seats</th>
							<th>Max members</th>
							<th>No. of members</th>
							<th>Cost/Team</th>
						</tr>
						<?php
						$type = $_GET['type'];
						$codee=-1;
						if($type == "Formal")$codee=0;
						if($type == "Informal")$codee=1;
						if($type == "Workshop")$codee=2;
						if($type == "Premium")$codee=3;
						$ans = mysql_query("SELECT * FROM page2 WHERE type=$codee") OR die(mysql_error());
						$i=0;
						$count = 1;
						$counts = 1;
						while($res=mysql_fetch_assoc($ans))
						{
							
							if($res['seats_available']>0)
							{
$variable = $res['variable'];
if($variable == 1)
echo "<tr><td><input type='radio' id=".$count." name='event_name[]' value='".$res['event_name']."'  onclick=varclicky(".$count.",".$res['teamlimit'].") /></td>";
else if($variable ==0)
echo "<tr><td><input type='radio' id=".$count." name='event_name[]' value='".$res['event_name']."'  onclick=clicky(".$count.") /></td>";
								echo "<td>".$res['event_name']."</td>";
								echo "<td>".$res['seats_available']."</td>";
								echo "<td>".$res['teamlimit']."</td>";
								$counts = $count * 10;
								
								if($variable == 1)
								{
									$limit = $res['teamlimit'];
									$min = $res['min'];
									$max = $res['max'];
									echo "<td>";
									echo "<select id=".$counts." onchange=changy(".$count.",".$counts."),showy() >";
									for($i=$min;$i<=$max;$i++)
									{
										echo "<option value=".$i.">".$i."</option>";
									}
									echo "</select>";
									echo "</td>";
								}
								else if($variable == 0)
								{
									echo "<td id=".$counts." ></td>";
								}
								
								$count++;
								echo "<td>".$res['cost']."</td>";
								echo "</tr>";
							}
						}
						echo "<input type='hidden' name='total' value=".$count." />";
						?>
						<input type='hidden' name='seat' id='seat' value=0 />
					</table>
				</div>
				
				<div id="formbutton">
				<input type="submit" value="Process ->" />
				</div>
				</form>
			</div>
			</div>	
     </div>
	</div>
    <footer>�graVITas2014.All rights reserved</footer>
</body>
</html>