<?php
require "../../process/config.php";


// check the parameter
if(isset($_GET['part']) and $_GET['part'] != '')
{
	$search_term=mysql_real_escape_string(htmlentities($_GET["part"]));
    $search=mysql_query("SELECT * FROM page2 WHERE event_name LIKE '%".$search_term."%' ") or die(mysql_error());
	
	$results = array();
	$count=0;
	while($results_row=mysql_fetch_assoc($search))
		{
			$results[$count]=$results_row['event_name'];
			$count++;
		}
	// return the array as json with PHP 5.2
	echo json_encode($results);

	// or return using Zend_Json class
	//require_once('Zend/Json/Encoder.php');
	//echo Zend_Json_Encoder::encode($results);
}
