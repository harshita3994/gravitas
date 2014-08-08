<?php
session_start();
require 'process/config.php';
if(isset($_SESSION['page2']))
unset($_SESSION['page2']);
if(isset($_SESSION['user']))
{
	$ans = mysql_query("SELECT * FROM user_details WHERE username='$_SESSION[user]' ORDER BY srno DESC LIMIT 1") or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$srno = $res['srno'];
	$temp_time = time() + 12600; // The timestamp...
	$curr_time = date("H:i:s",$temp_time);
	mysql_query("UPDATE user_details SET logout_time='$curr_time' WHERE srno=$srno") or die(mysql_error());
}
if(isset($_SESSION['user']) && isset($_SESSION['manage_user']))
{
	unset($_SESSION['user']);
	unset($_SESSION['manage_user']);
	header('Location:login.php');
}
if(isset($_SESSION['user'])){
	unset($_SESSION['user']);
	header('Location:login.php');
}
header('location:login.php');
?>