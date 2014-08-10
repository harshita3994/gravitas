<!doctype html>
<?php
session_start();
require 'check/return_page2.php';
require("check/user_session.php");
require("check/manage_unset.php");
require("process/config.php");
require 'check/return_page2.php';
if(isset($_GET['error']))
	{
		$error = $_GET['error'];
	}
?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="img/logo.ico"/>
	<script src="process/autocomplete.js" type="text/javascript"></script>
	<script src="process/jquery.js"></script>
<script type="text/javascript">
	function validate(){
		var receipt = document.getElementsByName("receipt")[0].value;
		var receipt_length = document.getElementsByName("receipt")[0].value.length;
    	var contact = document.getElementsByName("contact")[0].value;
		var contact_length = document.getElementsByName("contact")[0].value.length;
		var name = document.getElementsByName("names")[0].value;
		var reg = document.getElementsByName("reg")[0].value;
        var reg_length = document.getElementsByName("reg")[0].value.length;
        if(receipt==""){
			alert("Please enter the receipt number");
			return false;
		}
		else if(receipt_length != 5)
		{
			alert("The receipt is a 5 digit number")
			return false;
		}
		else if(name == "")
		{
			alert("Please enter a name");
			return false;
		}
		else if(/\d/.test(name))
		{
			alert("Name should not contain numeric values");
			return false;
		}
		else if(contact==""){
			alert("Please enter the Contact Number");
			return false;
		}
		else if(isNaN(contact))
		{
			alert("Contact Number should contain digits only");
			return false;
		}
		else if(contact_length != 10)
		{
			alert("Contact number should be of 10 digits");
			return false;
		}
		else if(reg=="")
		{
			alert("Please enter the Registration Number");
			return false;
		}
		else if(reg_length!=9){
			alert("Registration Number should be of 9 digits");
			return false;
		}
		else
		{  return true;
		}
		/*
		if(/\1\d{1}\w{1,3}\d{4}/.test(reg))
		{
			alert("Incorrect Format for Registration Number");
			return false;
		}
		*/
	}
	
	$(document).ready(function()
	{
		var h=$(window).height();
		var w=$(window).width();
		//alert(h+" " + w);
		var wrapper=document.getElementById("wrapper");
		var main=document.getElementById("main");
		var top=document.getElementById("top");
		wrapper.style.width=w+"px";
		wrapper.style.height=h+"px";
		main.style.width=w+"px";
		top.style.width=w+"px";
		
		$(function(){
	    	setAutoComplete("searchField", "results", "process/autocomplete.php?part=");
		});
	});
</script>
<link rel="stylesheet" type="text/css"  href="css/index.css" />
</head>
<body>
	<div id="wrapper">
    <div id="main">
	<div id="top">
		<img id="logo"  src="img/vit_logo.jpg" width="200px" height="120px" alt="Hello"/>
		<div id="header"><img id="header"  src="img/main.jpg" width="250px" height="100px" alt ="Hello"/></div>
		<div id="logout"><a href="logout.php">Logout<?php echo "(".$_SESSION['user'].")"; ?></a></div>
	</div>
	
			<div id="inner_main">
<div id="links">
				<a href="process/event_add_login.php" target='_blank'>Add Event</a><br />
				<a href="process/search_login.php" target='_blank'>Search by Receipt</a><br />
				<a href = "process/event_display_login.php" target='_blank'>Edit Event</a><br />
				<a href = "manage/events/events_participants.php" target='_blank'>Display Event Manifest</a><br />
				<a href = "manage/collections.php" target='_blank'>Collections</a><br />
				<a href	= "pdf/events_display_pdf.php" target='_blank'>Event List</a>
			</div>
			
			<div id="formdiv">
			<div id="formdiv_inner">
				<form id="form" action="process/page1_process.php" method="POST">
				<div id="crossdiv"><abbr title="Reset"><input type="reset" id="cross"/></abbr><br /></div>
			    Token No : <br /><input type="text" name="receipt" maxlength="5"/>
			    Name : <br /><input type="text" name="names">
			    Contact No : <br /><input type="text" maxlength="10" name="contact">
				Registration No : <br /><input type="text" name="reg" maxlength="9"/><br>
				E-Mail ID:<br/> <input type="text" name="email" maxlength="50"/>
				Mode of Payment:<br>
				<input type="radio" name="payment" value="Mess">Mess Refund</input>
				<input type="radio" name="payment" value="Cash">   Cash</input>
				<input type="radio" name="payment" value="Card">   Card<br />
				<table>
                				<th>Premier</th>
                				<th>Robomania</th>
                				<th>Workshops</th>
                				<th>Bits and Bytes</th>
                				<th>Bullitrix</th>
                				<th>Applied engineering</th>
                				<th>Circuitrix</th>
                				<th>Bioxyn</th>
                				<th>Management</th>
                				<th>Informals</th>
                				<th>Quiz</th>
                				<th>Online</th>
                				<tr>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                    $sql = mysql_query("SELECT * FROM page2 WHERE Type='Premier'");
                                    while ($row = mysql_fetch_array($sql)){
                                                                          echo "<option value=\"owner1\">" . $row. "</option>";
                                                                          }
                                    ?>
                					</select>
                				    </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                    $sql = mysql_query("SELECT * FROM page2 WHERE Type='Robomaina'");
                                     while ($row = mysql_fetch_array($sql)){
                                     echo "<option value=\"owner1\">" . $row. "</option>";
                                     }
                                     ?>
                					</select>
                				     </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                    $sql = mysql_query("SELECT * FROM page2 WHERE Type='Workshops'");
                                    while ($row = mysql_fetch_array($sql)){
                                    echo "<option value=\"owner1\">" . $row. "</option>";
                                    }
                                    ?>
                					</select>
                				     </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Bits and bytes'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				     </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Bullitrix'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				     </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Applied Engineering'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                			                      </td>
                				     <td>
                					<select name="list" class="drop">
                				    <?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Circuitrix'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                						</select>
                				     </td>
                			                       <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Bioxyn'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				     </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Management'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				    </td>
                				    <td>
                   					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Informals'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				     </td>
                				     <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Quiz'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				     </td>
                				      <td>
                					<select name="list" class="drop">
                					<?php
                                                                        $sql = mysql_query("SELECT * FROM page2 WHERE Type='Online'");
                                                                        while ($row = mysql_fetch_array($sql)){
                                                                        echo "<option value=\"owner1\">" . $row. "</option>";
                                                                        }
                                                                        ?>
                					</select>
                				     </td>
                				</tr>
                				</table>
               		<?php
					if(isset($_GET['error']))
					{
						$error = $_GET['error'];
						if($error == "numeric")
							echo "<span id='red'>Contact Number issue</span>";
						if($error == "name")
							echo "<span id='red'>Name issue</span>";
						if($error == "receipt")
							echo "<span id='red'>Duplicate Receipt</span>";
						if($error == "empty")
							echo "<span id='red'>Missing Entry</span>";
						if($error == "reg")
							echo "<span id='red'>Registration Issue</span>";
					}
					if(isset($_GET['flag']))
					{
						$status = $_GET['flag'];
						if($status == "true")
							echo "<span id='green'>Entry Succesful</span>";
						if($status == "false")
							echo "<span id='red'>Entry Deleted!</span>";
					}
				?>
				<br /><input type="submit" value="Register" class="button" onClick="return validate()"/>
				</form>
				<br />

			</div>

			</div>	
			<div id="autocomplete">
				<H4>SEARCH EVENT</H4> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="searchField" maxlength="25" name="searchField" type="text" />
				<div id="results"></div>
			</div>
			
     </div>
	</div>
    <footer class="foot">&copy;graVITas2014.All rights reserved</footer>
	</div>
</body>
</html>