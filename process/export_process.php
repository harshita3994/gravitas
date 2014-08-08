<?php
require("config.php");
require("includes.php");
$event=$_POST['event'];
?>
<body>
<div class="row">
	<div class="six columns">
<?php
echo "<b>" . $event . "</b>";
$result=mysql_query("select * from registration_details where event_name LIKE '$event'");
print('<table border="1">
	<tr><td><b>Receipt_no</b></td><td><b>Name</b></td><td><b>Contact no</b></td>');
while ($row=mysql_fetch_row($result)) {
	$res=mysql_query("select * from page1 where receipt_no LIKE '$row[0]'");
	while ($row1=mysql_fetch_row($res)) {
		printf('<tr><td>%s</td><td>%s</td><td>%s</td></tr>',$row1[0],$row1[1],$row1[2]);
	}
}
?>
</div>
</div>
<input type="button" class="button large radius" value="Print" onClick="window.print()" />
</body>