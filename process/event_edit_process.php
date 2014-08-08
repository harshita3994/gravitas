<?php
session_start();
require '../check/user_session2.php';
require 'config.php';

$type = $_POST['type'];
if($type == "Formal")
$code = 0;
else if($type == "Informal")
$code = 1;
else if($type == "Workshop")
$code = 2;
else if($type == "Premier")
$code = 3;

$subtype = $_POST['subtype'];
$variable = $_POST['variable'];
if(isset($_POST['min']))
$min = $_POST['min'];
if(isset($_POST['max']))
$max = $_POST['max'];
echo $min.",".$max;
$prev_name = $_POST['prev_name'];//previous event name
$name = $_POST['ename'];//event name
$teamlimit = $_POST['teamlimit'];
$seats = $_POST['eseats'];
$cost = $_POST['ecost'];
$srno = $_POST['srno'];
$ini_seats = $_POST['ini_seats'];
$seats_available = $_POST['seats_available'];
echo "Ini-".$ini_seats;
echo "Avail = ".$seats_available;
echo "New - ".$seats;
$diff = $ini_seats - $seats_available;
echo "Diff-".$diff;
$seats_available = $seats - $diff;
echo "finally-".$seats_available;

if($name !== $prev_name)
{
	$query = "UPDATE `bill` SET event_name='$name' WHERE event_name='$prev_name'";
	mysql_query($query) or die(mysql_error());
	//$query = "UPDATE `dup_bill` SET event_name='$name' WHERE event_name='$prev_name'";
	//mysql_query($query) or die(mysql_error());
}

if(isset($_POST['min']) && isset($_POST['max']))
{
	$query = "UPDATE `page2` SET type=$code,event_name='$name',seats_total=$seats,
			cost=$cost,seats_available=$seats_available,subtype='$subtype',variable=$variable,
			min=$min,max=$max,teamlimit=$teamlimit WHERE srno=$srno";
	mysql_query($query) or die(mysql_error());
	header("location:../manage/events_display.php");
}
else
{
	$query = "UPDATE `page2` SET type=$code,event_name='$name',seats_total=$seats,
			cost=$cost,seats_available=$seats_available,subtype='$subtype',variable=$variable,
			min=0,max=0,teamlimit=$teamlimit WHERE srno=$srno";
	mysql_query($query) or die(mysql_error());
	header("location:../manage/events_display.php");
}

?>