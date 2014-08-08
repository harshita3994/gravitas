<?php
session_start();
require '../check/id_session.php';
require '../check/user_session2.php';
require 'config.php';
$id=$_GET['id'];	
$query = "SELECT * FROM bill_combo WHERE receipt_no='$id'";
$ans = mysql_query($query) or die(mysql_error());
$res = mysql_fetch_assoc($ans);
$events[0] = $res['event1'];$events[1] = $res['event2'];$events[2] = $res['event3'];
$seats[0] = $res['seat1'];$seats[1] = $res['seat2'];$seats[2] = $res['seat3'];
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
		$seats_available = $res['seats_available'];
		$seats_available = $seats_available + $seats[$i];
		echo "Event name = ".$events[$i];
		echo "Seats Available = ".$seats_available;
		//echo "hello";
		$query = "UPDATE `page2` SET seats_available=$seats_available WHERE event_name = '$events[$i]'";
		mysql_query($query) or die(mysql_error());
	}	
}

mysql_query("DELETE FROM bill_combo WHERE receipt_no='$id'") OR die(mysql_error());
session_start();
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
	header('Location:../index.php?flag=false');unset($_SESSION['id']);
	$query = "SELECT srno FROM bill LIMIT 1";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$srno = $res['srno'];
	if($srno % 1 == 0 && $srno!=0)
		//header("location:../pdf/events_display_pdf_code.php");
		header('Location:../index.php?flag=false');
	else
		header('Location:../index.php?flag=false');
}
?>