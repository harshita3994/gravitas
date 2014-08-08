<?php
require("config.php");
//require("../check/user_session2.php");
//require("../check/manage_user_session.php");
$name = $_POST['ename'];
$teamlimit = $_POST['teamlimit'];
$seats = $_POST['eseats'];
if(isset($_POST['variable']))
$variable = $_POST['variable'];
if(isset($_POST['min']))
$min = $_POST['min'];
if(isset($_POST['max']))
$max = $_POST['max'];

$cost = $_POST['ecost'];
$type = $_POST['type'];
$code;
if($type == "Formal")
$code = 0;
else if($type == "Informal")
$code = 1;
else if($type == "Workshop")
$code = 2;
else if($type == "Premium")
$code = 3;

$subtype = $_POST['subtype'];

echo $name;
echo $teamlimit;
echo $seats;
//echo $variable;
echo $cost;
echo $type;
echo $subtype;
echo $code;

if(isset($_POST['min']) && isset($_POST['max']) && isset($_POST['variable']))
{
	$query = "INSERT INTO page2(type,subtype,event_name,teamlimit,variable,min,max,seats_total,seats_available,cost)
					VALUES($code,'$subtype','$name',$teamlimit,$variable,$min,$max,$seats,$seats,$cost)";
	mysql_query($query) or die(mysql_error());
}
else
{
	$query = "INSERT INTO page2(type,subtype,event_name,teamlimit,variable,seats_total,seats_available,cost)
					VALUES($code,'$subtype','$name',$teamlimit,0,$seats,$seats,$cost)";
	mysql_query($query) or die(mysql_error());
}


header("location:../manage/event_add.php");
?>