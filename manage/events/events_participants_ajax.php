<?php
 require "../../process/config.php";
 $event_name = $_GET['event'];
 $ans = mysql_query("SELECT * FROM bill WHERE event_name = '$event_name'") or die(mysql_error());
 $data;
 $srno = 1;
 $data = "<h3>".$event_name."</h3>";
 $data .= "<table border='1'/>";
 $data .= "<tr><td>Sr.NO</td>
					  <td>Receipt</td>
					  <td>Name</td><td>Reg Num</td><td>Phone</td><td>Date</td></tr>";
 if(mysql_num_rows($ans))
 {
	while($res = mysql_fetch_assoc($ans))
	{
		
		$data .= "<tr><td>".$srno."</td>";
		$data .="<td>".$res['receipt_no']."</td>";
		$data .="<td>".$res['name']."</td>";
		$data .="<td>".$res['registration']."</td>";
		$data .="<td>".$res['contact_no']."</td>";
		$data .="<td>".$res['date']."</td>";
		$data .="</tr>";
		$srno = $srno + 1;
	}
 }
 $data .= "</table>";
 echo $data;
?>