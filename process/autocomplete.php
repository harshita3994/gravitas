<?php
session_start();
require 'config.php';
require("../check/user_session2.php");
if(isset($_GET['part']) and $_GET['part'] != '')
{
	$results = array();

	$query = "SELECT * FROM page2 WHERE event_name LIKE '%".mysql_real_escape_string($_REQUEST['part'])."%' ORDER BY srno";
	$ans = mysql_query($query) or die(mysql_error());
	$count = 0;
	$type;
	if(mysql_num_rows($ans))
	{
		while($res = mysql_fetch_assoc($ans))
		{
			$name = $res['event_name'];
			$seats = $res['seats_available'];
			$teamlimit = $res['teamlimit'];
			$variable = $res['variable'];
			$max = $res['max'];
			$min = $res['min'];
			$code = $res['type'];
			$cost = $res['cost'];
			if($code == 0)
			  $type = "For";
			if($code == 1)
			  $type = "Inf";
			if($code == 2)
			  $type = "Work";
			if($code == 3)
			  $type = "Pre";
			  
			$results[$count] = array('name' =>$name,'seats' => $seats,'type'=> $type,
							'teamlimit'=>$teamlimit,'variable' => $variable,'min' => $min,'max' =>$max,
							'cost'=>$cost);
			$count +=1;
			//$results[$count] = $res['id'];
			//$count +=1;
		}
	}
	// return the array as json with PHP 5.2
	echo json_encode($results);

	
}



