<?php
	session_start();
	require '../check/user_session2.php';
	require("../process/config.php");
	$day = $_GET['day'];
	$month = $_GET['month'];
	$date = date("Y")."-".$month."-".$day;
	$day2 = $_GET['day2'];
	$month2 = $_GET['month2'];
	$date2 = date("Y")."-".$month2."-".$day2;
	//echo $date;
	$ans = mysql_query("SELECT * FROM bill WHERE date BETWEEN '$date' AND '$date2'") or die(mysql_error());
	$tcost=0;
	while($res = mysql_fetch_assoc($ans))
	{	
		$tcost = $tcost + $res['amount'];
		//echo $data;
	}
	$data = "Total Cost : ".$tcost;
	echo $data;
?>