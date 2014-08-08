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
	$data = "<table border='1'><tr><th>Sr</th><th>Receipt No.</th><th>Name</th><th>Reg No</th><th>Event</th><th>Seats</th><th>Cost</th></tr>";
	$srno = 1;
	$tcost=0;
	while($res = mysql_fetch_assoc($ans))
	{	
		$data .= "<tr><td>".$srno."</td>";
		$data .= "<td>".$res['receipt_no']."</td>";
		$data .= "<td>".$res['name']."</td>";
		$data .= "<td>".$res['registration']."</td>";
		$data .= "<td>".$res['event_name']."</td>";
		$data .= "<td>".$res['seats']."</td>";
		$data .= "<td>".$res['amount']."</td></tr>";
		$srno = $srno + 1;
		$tcost = $tcost + $res['amount'];
		//echo $data;
	}
	$data .= "</table>";
	echo $data;
?>