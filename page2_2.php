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
	var selected;
	var checked=0;
	var events_list = new Array();
	events_list[0]='';events_list[1]='';events_list[2]='';
	var count = 0;
	var alertt = 0;
	function fivee(id,teamlimit)
	{
		var a;
		if(document.getElementById(id).checked == true)
		{
			alertt++;
			for(a=0;a<3;a++)
			{
				if(events_list[a] == '')
				{
					events_list[a] = document.getElementById(id).value;
					checked++;
					document.getElementById("seat"+a).value = teamlimit;
					//alert("Congo!Value of checked is "+checked);
					break;
					//exit
				}
				if(checked > 3)
				{
					document.getElementById(id).checked = false;
					checked--;
					alert("You Chaman!You have exceeded max limit of 3 events");
				}
			}
			if(alertt>3)
			{
				document.getElementById(id).checked = false;
				alertt--;
				alert("You Chaman!You have exceeded max limit of 3 events");
			}
			
			//alert(checked);
			
			
		}
		else if(document.getElementById(id).checked == false)
		{
			alertt--;
			
			for(a=0;a<checked;a++)
			{
				var name = document.getElementById(id).value;
				if(events_list[a] == name)
				{
					events_list[a] = '';
					document.getElementById("seat"+a).value = -1;
					checked --;
					break;
				}
				//alert("VAlue of checked is " + checked);
			}
			
		}
		//alert(events_list[0] +" " + events_list[1] +" " + events_list[2]);
	}
	function totally()
	{
		if(checked != 3)
		{
			alert("We need to select at least 3 events you dope-head!");
			return false;
		}
	}
	
	function varclicky(teamlimit)
	{
		document.getElementById("seat").value = teamlimit;
	}
	function changy(counts,count)
	{
		
		var tbl = document.getElementById("events_table");
		var numrows = tbl.rows.length;
		var cells = tbl.rows[count].getElementsByTagName('td');
		//alert(cells[1].innerHTML);
		var event_name = cells[1].innerHTML;
		var e = document.getElementById(counts);
		var dropdown_seat = e.options[e.selectedIndex].value;
		for(a=0;a<3;a++)
		{
				if(events_list[a] == event_name)
				{
					document.getElementById("seat"+a).value = dropdown_seat;
					alert("You have selected "+dropdown_seat+" seat/s for the event "+event_name);
				}
		}
		/*var tselected = new Array();
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
		alert(document.getElementById("seat").value);	
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
				<form  action="process/page2_2_process.php" method="POST">
				<div id="form">
					<table id="events_table" border="1">
						<tr><th>Select</th>
							<th>Event Name</th>
							<th>Available Seats</th>
							<th>Max members</th>
							<th>No. of members</th>
						</tr>
						<?php
						$type = $_GET['type'];
						$ans = mysql_query("SELECT * FROM page2 WHERE subtype='$type' ") OR die(mysql_error());
						$i=0;
						$count = 1;
						$counts = 1;
						while($res=mysql_fetch_assoc($ans))
						{
							
							if($res['seats_available']>0)
							{
								$variable = $res['variable'];
								if($variable == 1)
								echo "<tr><td><input type='checkbox' id=".$count." name='event_name[]' value='".$res['event_name']."' onchange='fivee(".$count.",".$res['teamlimit'].")' /></td>";
								else if($variable ==0)
								echo "<tr><td><input type='checkbox' id=".$count." name='event_name[]' value='".$res['event_name']."' onchange='fivee(".$count.",".$res['teamlimit'].")' /></td>";
								echo "<td>".$res['event_name']."</td>";
								echo "<td>".$res['seats_available']."</td>";
								echo "<td>".$res['teamlimit']."</td>";
								$counts = $count * 10;
								echo "<td>";
								if($variable == 1)
								{
									$limit = $res['teamlimit'];
									$min = $res['min'];
									$max = $res['max'];
									echo "<select id=".$counts." onchange=changy(".$counts.",".$count.")>";
									for($i=$min;$i<=$max;$i++)
									{
										echo "<option value=".$i.">".$i."</option>";
									}
									echo "</select>";
								}
								else if($variable == 0)
								{
									echo "";
								}
								echo "</td>";
								$count++;
								echo "</tr>";
							}
						}
						?>
					</table>
				</div>
				<input type='hidden' name='type' value='<?php echo $type; ?>' />
				<input type='hidden' name='seat0' id='seat0' />
				<input type='hidden' name='seat1' id='seat1' />
				<input type='hidden' name='seat2' id='seat2' />
				<div id="formbutton">
				<input type="submit" value="Process ->" onclick=" return totally()"/>
				</div>
				</form>
			</div>
			</div>	
     </div>
	</div>
    <footer>�graVITas2014.All rights reserved</footer>
</body>
</html>