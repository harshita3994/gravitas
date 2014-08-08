<?php
session_start();
require '../check/id_session.php';
require '../check/user_session2.php';
require 'config.php';
$id=$_GET['id'];	
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
		header('Location:../index.php?flag=true');

	else
		header('Location:../index.php?flag=true');
}
?>