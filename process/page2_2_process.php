<?php
require("config.php");
session_start();
require '../check/user_session2.php';
require '../check/id_session.php';
$type = $_POST['type'];
$events = $_POST['event_name'];
$event1 = $events[0];
$event2 = $events[1];
$event3 = $events[2];
$seat0 = $_POST['seat0'];
$seat1 = $_POST['seat1'];
$seat2 = $_POST['seat2'];
$price;
if($type == "Biosync")
mysql_query("UPDATE bill_combo SET type='$type',amount=200 WHERE receipt_no='$_SESSION[id]'") or die(mysql_error());

if($type == "Robotics")
mysql_query("UPDATE bill_combo SET type='$type',amount=500 WHERE receipt_no='$_SESSION[id]'") or die(mysql_error());

for($i=0;$i<3;$i++)
{
	$query = "SELECT * FROM page2 WHERE event_name='$events[$i]'";
	$ans=mysql_query($query)OR die(mysql_error());
	$res=mysql_fetch_assoc($ans);
	//echo "Cost:".$res['cost'];
	if($res['seats_available']<=0)
	{
		print('<script type="text/javascript">alert("Slots full for '.$events[$i].'");</script>');
	}
	else
	{
		$seat = $res['teamlimit'];
		$seats_available = $res['seats_available'];
		$seats_available = $seats_available-$seat;
		//echo "hello";
		$query = "UPDATE `page2` SET seats_available=$seats_available WHERE event_name LIKE '$events[$i]'";
		mysql_query($query) or die(mysql_error());
	}	
}
mysql_query("UPDATE bill_combo SET event1='$events[0]',event2='$events[1]',event3='$events[2]',seat1=$seat0,seat2=$seat1,seat3=$seat2 WHERE receipt_no = '$_SESSION[id]'") or die(mysql_error());
unset($_SESSION['page2']);
header('Location:../checkout_2.php');
?>