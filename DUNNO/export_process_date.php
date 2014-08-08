<?php
print('Report generated on ' . date('d/m/y'));
$date=$_POST['date'];
$month=$_POST['month'];
$tobe = $date.$month;
require("config.php");
require("includes.php");
print('<div class="row">
	<div class="twelve columns offset-by-two">
	');
print("<table><tr><td><b>S.No</b></td><td><b>Event Name</b></td><td><b>Receipt Number</b></td><td><b>Registration Number</b></td><td><b>Name</b></td><td><b>Amount</b></td></tr>");
$result=mysql_query("select * from page1 where date LIKE '$tobe'") OR die(mysql_error());
$l=1;
	$total=0;
	$f=0;
while($row=mysql_fetch_row($result))
{
$res=mysql_query("select * from page1 p ,registration_details r where p.receipt_no LIKE '$row[0]' && r.receipt_no LIKE '$row[0]'")OR die(mysql_error());
while($row1=mysql_fetch_row($res)){
	$total=$total+$row1[8];
	printf('
		
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		<td>%s</td>
		</tr>
		',$l,$row1[7],$row1[0],$row1[1],$row1[2],$row1[8]);
	$l++;
}
$f=$f+$total;
}
print('</table>');
//echo "Total amount : " .$f;
print('<b>Total Amount : </b>' . $total);
?><bR><br>
<div class="large button radius smooth" onclick="window.print()">Print
	</div>
</div>
	</div>