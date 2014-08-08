<?php
session_start();
require("../check/user_session.php");
require("../check/manage_user_session.php");
require("../process/config.php");
?>

<?php
$srno = $_POST['srno'];
$query = "SELECT * FROM page2 WHERE srno = $srno";
$ans = mysql_query($query) or die(mysql_error());
$event_name;
$seats_total;
$cost;
while($res = mysql_fetch_assoc($ans))
{
	$code = $res['type'];
	$event_name = $res['event_name'];
	$teamlimit = $res['teamlimit'];
	$seats_total = $res['seats_total'];
	$cost = $res['cost'];
	$seats_available = $res['seats_available'];
	$subtype = $res['subtype'];
	$variable = $res['variable'];
	$min = $res['min'];
	$max = $res['max'];
}
$type;
if($code==0)
$type = "Formal";
else if($code == 1)
$type = "Informal";
else if ($code == 2)
$type = "Workshop";
else if ($code == 3)
$type = "Premier";
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
	
</script>

</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="../img/vit_logo.jpg" width="200px" height="120px"/>
		<div id="header"><img id="header"  src="../img/gravitas_logo.png" width="250px" height="100px"/></div>
	</div>
			<div id="inner_main">
			<div id="formdiv">
			<div id="formdiv_inner">
				<form id="form" action="../process/event_edit_process.php" method="POST">
				Type : <select name="type">
						<option selected><?php echo $type ?></option>
						<option>Formal</option>
						<option>Informal</option>
						<option>Workshop</option>
						<option>Premier</option>
						</select>
				Subtype : <select name="subtype">
						<option selected><?php echo $subtype ?></option>
							<option>Robotics</option>
							<option>Biosync</option>
							<option>Builtrix</option>
							<option>Electrical</option>
							<option>Applied Engineering</option>
							<option>Computers</option>
							<option>Quizzes</option>
							<option>Management</option>
						</select> <br />
				Event Name : <input type="text" name="ename" value="<?php echo $event_name;?>"/><br />
				 No of participants/team : <input type="text" name="teamlimit" value="<?php echo $teamlimit; ?>"/><br />
				 <?php
					if($variable == 1)
					{
						echo "<input type='radio' name='variable' value=1 checked onclick='disably()' /> Variable Seats";
						echo "<input type='radio' name='variable' value=0 onclick='enably()' />Fixed Seats<br />";
						echo "Min : <input type='text' name='min' value=".$min." id='min'  style='width:40px;'/>"; 
						echo "Max : <input type='text' name='max' value=".$max." id='max'  style='width:40px;'/><br />";
					}
					else if($variable == 0)
					{
						echo "<input type='radio' name='variable' value=1 onclick='disably()' /> Variable Seats";
						echo "<input type='radio' name='variable' value=0 checked onclick='enably()' />Fixed Seats<br />";
						echo "Min : <input type='text' name='min' id='min'  disabled style='width:40px;'/>"; 
						echo "Max : <input type='text' name='max' id='max'  disabled style='width:40px;'/><br />";
					}
				 ?>
				
				Total Seats : <input type="text" maxlength="3" name="eseats" value="<?php echo $seats_total;?>"/><br />
				Cost : <input type="text" maxlength="4" name="ecost" value="<?php echo $cost;?>"><br />
				<input type="hidden" name="srno" value='<?php echo $srno;?>' >
				<input type="hidden" name="prev_name" value='<?php echo $event_name; ?>' > 
				<input type='hidden' name='ini_seats' value=<?php echo $seats_total; ?> />
				<input type='hidden' name='seats_available' value=<?php echo $seats_available; ?> />
					<br /><input type="submit" value="Register" class="button" />
				</form>
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