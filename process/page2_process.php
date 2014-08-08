<?php
require("config.php");
session_start();
require '../check/user_session2.php';
require '../check/id_session.php';
$events = $_POST['event_name'];
$event_name = $events[0];

$price;

	$query = "SELECT * FROM page2 WHERE event_name LIKE '$event_name'";
	$ans=mysql_query($query)OR die(mysql_error());
	$res=mysql_fetch_assoc($ans);
	//echo "Cost:".$res['cost'];
	if($res['seats_available']<=0)
	{
		print('<script type="text/javascript">alert("Slots full for '.$event_name.'");</script>');
	}
	else
	{
		$price = $res['cost'];
		if($_POST['seat'] == 0) 
			$seat = $res['teamlimit'];
		else
		{
			$seat = $_POST['seat'];
			$price = $price*$seat;
		}
			
		$seats_available = $res['seats_available'];
		$seats_available = $seats_available-$seat;
		//echo "hello";
		$query = "UPDATE `page2` SET seats_available=$seats_available WHERE event_name LIKE '$event_name'";
		mysql_query($query) or die(mysql_error());
		//echo "hello1";
		echo $event_name;
		echo $price;
		echo $seat;
		echo $_SESSION['id'];
		$receipt_no = $_SESSION[id];
		mysql_query("UPDATE bill SET event_name='$event_name',amount=$price,seats=$seat WHERE receipt_no='$receipt_no' ") or die(mysql_error());		
	}
unset($_SESSION['page2']);
header('Location:../checkout.php');
?>