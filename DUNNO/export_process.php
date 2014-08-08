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
	<tr><td><b>S.No</b></td><td><b>Receipt_no</b></td><td><b>Registration Number</b></td><td><b>Name</b></td><td><b>Amount</b></td></tr>');
$i=1;
while ($row=mysql_fetch_row($result)) {
	$res=mysql_query("select * from page1 where receipt_no LIKE '$row[0]'");
	while ($row1=mysql_fetch_row($res)) {
		printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',$i,$row1[0],$row1[1],$row1[2],$row[2]);
		$i++;
	}
}
?>
</table>
<input type="button" class="button large radius" value="Print" onClick="window.print()" />

</div>
</div>
</body>
