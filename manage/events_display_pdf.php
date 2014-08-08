<html>
<?php
require ("../process/config.php");
//wget -r localhost/gravitas/pdf/racecar.pdf
?>
<body>
		<table border="1" cellspacing="0">
			<tr><th>Event Name</th>
				<th>Total Seats</th>
				<th>Seats Available</th>
				<th>Cost</th>
			</tr>
			<?php
				$query = "SELECT * FROM page2";
				$ans = mysql_query($query) or die(mysql_error());
				while($res = mysql_fetch_assoc($ans))
				{
					echo "<form action='event_edit.php' method='POST'>";
					echo "<tr><td>".$res['event_name']."</td>
					<td>".$res['seats_total']."</td>
					<td>".$res['seats_available']."</td>
					<td>".$res['cost']."</td></tr>";
				}
			?>
		</table>
</body>
</html>