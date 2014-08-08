<page>
<?php
require ("../process/config.php");
//wget -r localhost/gravitas/pdf/racecar.pdf
?>		
		<?php 
		$date = date("Y-m-d");
		echo "Date : ".$date;
		$temp_time = time() + 12600; // The timestamp...
		$curr_time = date("H:i:s",$temp_time);
		echo " (".$curr_time.")"; ?>
		<h3>GRAVITAS 2014 - Event Status</h3>
		<table border="1" cellspacing="0">
			<tr><th>Sr.No</th>
			<th>Type</th>
			<th>Event Name</th>
			<th>Total Seats</th>
			<th>Seats Available</th>
			<th>Cost</th>
			</tr>
			<?php
				$count = 1;
				$query = "SELECT * FROM page2 ORDER BY type ASC";
				$ans = mysql_query($query) or die(mysql_error());
				while($res = mysql_fetch_assoc($ans))
				{
					$code = $res['type'];
					$type='';
					if($code == 0)
					  $type = "Formal";
					if($code == 1)
					  $type = "Informal";
					if($code == 2)
					  $type = "Workshop";
					if($code == 3)
					  $type = "Premium";
					echo "<tr><td>".$count++."</td>";
					echo "<td>".$type."</td>
					<td>".$res['event_name']."</td>
					<td>".$res['seats_total']."</td>
					<td>".$res['seats_available']."</td>
					<td>".$res['cost']."</td></tr>";
				}
			?>
		</table>
</page>