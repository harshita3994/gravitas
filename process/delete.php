<?php
session_start();
require '../check/id_session.php';
require '../check/user_session2.php';
require 'config.php';
$id=$_GET['id'];	
$query = "SELECT * FROM bill WHERE receipt_no='$id'";
$ans = mysql_query($query) or die(mysql_error());
$res = mysql_fetch_assoc($ans);
$seats = $res['seats'];
echo $seats;
$event_name = $res['event_name'];
$ans = mysql_query("SELECT * FROM page2 WHERE event_name='$event_name'") or die(mysql_error());
$res = mysql_fetch_assoc($ans);
$seats_available = $res['seats_available'];
echo $seats_available;
$seats_available = $seats_available + $seats;
echo $seats;
mysql_query("UPDATE page2 SET seats_available=$seats_available WHERE event_name='$event_name'") or die(mysql_error());
mysql_query("DELETE FROM bill WHERE receipt_no='$id'") OR die(mysql_error());
session_start();
if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);
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