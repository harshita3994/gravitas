<?php
require 'config.php';
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$ans = mysql_query("SELECT * FROM user WHERE username='$username' && password='$password'") or die(mysql_error());
$date = date("Y-m-d");
$temp_time = time() + 12600; // The timestamp...
$curr_time = date("H:i:s",$temp_time);
if(mysql_num_rows($ans))
{
	session_start();
	$res=mysql_fetch_assoc($ans);
	$_SESSION['user']=$res['username'];
	mysql_query("INSERT INTO user_details(username,date,login_time) VALUES('$_SESSION[user]','$date','$curr_time')") OR die(mysql_error());
	//echo $username.$password.$_SESSION['user']; 
	header('Location:../index.php');
}
else{
	header('Location:../login.php');
}
?>