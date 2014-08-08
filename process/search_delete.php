<?php
session_start();
require '../check/user_session2.php';
require 'config.php';
$receipt_no = $_POST['receipt_no'];
if($_POST['variable'] == 0)
{
	$query = "SELECT * FROM bill WHERE receipt_no = '$receipt_no'";
	$ans = mysql_query($query) or die("Unable to select from bill");

	$res = mysql_fetch_assoc($ans);
	$name = $res['name'];
	$registration = $res['registration'];
	$contact_no = $res['contact_no'];
	$event_name = $res['event_name'];
	$seats = $res['seats'];
	$amount = $res['amount'];
	$username = $res['username'];
	$date = $res['date'];
	$time = $res['time'];
	$deleted_username = $_SESSION['user'];
	$deleted_date = date("Y-m-d");
	$temp_time = time() + 12600; // The timestamp...
	$curr_time = date("H:i:s",$temp_time);


	mysql_query("INSERT INTO deleted_bill(receipt_no,name,registration,contact_no,event_name,
				seats,amount,username,date,deleted_username,deleted_date,time,deleted_time) VALUES(
				'$receipt_no','$name','$registration',$contact_no,'$event_name',$seats,$amount,
				'$username','$date','$deleted_username','$deleted_date','$time','$curr_time')") or die("Deleted bill not done");

	mysql_query("DELETE FROM bill WHERE receipt_no='$receipt_no'") or die("Bill not deleted");

	$query = "SELECT * FROM page2 WHERE event_name='$event_name'";

	$ans = mysql_query($query) or die("Page 2 data not selected");
	$res = mysql_fetch_assoc($ans);
	$seats_available = $res['seats_available'];
	echo $seats_available;
	$seats_available = $res['seats_available'] + $seats;
	echo $seats.$seats_available;

	if($seats_available != 0)
	{
		mysql_query("UPDATE page2 SET seats_available=$seats_available WHERE event_name='$event_name'") or die("Did not increase seats"); 
	}
	header("location:../manage/search.php");
}


if($_POST['variable'] == 1)
{
	$query = "SELECT * FROM bill_combo WHERE receipt_no = '$receipt_no'";
	$ans = mysql_query($query) or die("Unable to select from bill");

	$res = mysql_fetch_assoc($ans);
	$name = $res['name'];
	$registration = $res['registration'];
	$contact_no = $res['contact_no'];
	$event1 = $res['event1'];
	$event2 = $res['event2'];
	$event3 = $res['event3'];
	$amount = $res['amount'];
	$username = $res['username'];
	$date = $res['date'];
	$time = $res['time'];
	$deleted_username = $_SESSION['user'];
	$deleted_date = date("Y-m-d");
	$temp_time = time() + 12600; // The timestamp...
	$curr_time = date("H:i:s",$temp_time);


	/*mysql_query("INSERT INTO deleted_bill(receipt_no,name,registration,contact_no,event_name,
				seats,amount,username,date,deleted_username,deleted_date,time,deleted_time) VALUES(
				'$receipt_no','$name','$registration',$contact_no,'$event_name',$seats,$amount,
				'$username','$date','$deleted_username','$deleted_date','$time','$curr_time')") or die("Deleted bill not done");*/

	mysql_query("DELETE FROM bill_combo WHERE receipt_no='$receipt_no'") or die("Bill not deleted");

	$query = "SELECT * FROM page2 WHERE event_name='$event_name'";

	$ans = mysql_query($query) or die("Page 2 data not selected");
	$res = mysql_fetch_assoc($ans);
	$seats_available = $res['seats_available'];
	echo $seats_available;
	$seats_available = $res['seats_available'] + $seats;
	echo $seats.$seats_available;

	if($seats_available != 0)
	{
		mysql_query("UPDATE page2 SET seats_available=$seats_available WHERE event_name='$event_name'") or die("Did not increase seats"); 
	}
	header("location:../manage/search.php");
}
?>