<?php
session_start();
require '../check/user_session2.php';
require 'config.php';
if(isset($_GET['part']) and $_GET['part'] != '')
{
	$results = array();
	$count=0;
    $query = "SELECT * FROM bill WHERE receipt_no LIKE '%".$_GET['part']."%'";
	$ans = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($ans))
	{
		while($res = mysql_fetch_assoc($ans))
		{
		$results[$count] = array('receipt_no'=>$res['receipt_no'],
								'name' =>$res['name'],
								'contact_no' => $res['contact_no'],
								'registration' => $res['registration'],
								'event_name'=>$res['event_name'],
								'amount'=>$res['amount'],
								'combo' => '0');
				$count +=1;
		
		}
	}
	$query = "SELECT * FROM bill_combo WHERE receipt_no LIKE '%".$_GET['part']."%'";
	$ans = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($ans))
	{
		while($res = mysql_fetch_assoc($ans))
		{
		$results[$count] = array('receipt_no'=>$res['receipt_no'],
								'name' =>$res['name'],
								'contact_no' => $res['contact_no'],
								'registration' => $res['registration'],
								'event1'=>$res['event1'],
								'event2'=>$res['event2'],
								'event3'=>$res['event3'],
								'amount'=>$res['cost'],
								'combo' => '1');
				$count +=1;
		
		}
	}
	// return the array as json with PHP 5.2
	echo json_encode($results);
}



