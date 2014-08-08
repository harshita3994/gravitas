<?php
require("../check/user_session2.php");
$receipt=$_POST['receipt'];
require("config.php");
session_start();
require '../check/user_session.php';
$_SESSION['id']=$receipt;
$date=date('Y-m-d');
$type = $_POST['type'];

$ans = mysql_query("SELECT * FROM bill WHERE receipt_no = '$receipt' ") or die(mysql_error());
$num = 0;
$num = mysql_num_rows($ans);
if($num >= 1)
{
	header("location:../index.php?error=receipt");
}

if(!is_string($_POST['names']))
{
	header("location:../index.php?error=name");
}

if (!is_numeric($_POST['contact']) | strlen((string)$_POST['contact']) < 10)
{
    header("location:../index.php?error=numeric");
}

if($type == "Formal" || $type == "Informal" || $type == "Workshop" || $type == "Premium")
{
	mysql_query("INSERT INTO bill(receipt_no,registration,name,contact_no,date) 
					VALUES('$receipt','$_POST[reg]','$_POST[names]','$_POST[contact]','$date')") OR die(mysql_error());
	header("Location:../page2.php?type=".$type);
}
else if($type == "Robotics")
{
	mysql_query("INSERT INTO bill_combo(receipt_no,registration,name,contact_no,date) 
					VALUES('$receipt','$_POST[reg]','$_POST[names]','$_POST[contact]','$date')") OR die(mysql_error());
	header("location:../page2_2.php?type=".$type);
}

?>