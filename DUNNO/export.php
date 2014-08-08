<?php
require("includes.php");
require("header.php");
require("config.php");
?>
<body>
	<div class="row">
		<div class="four columns">
			<form action="export_process.php" method="POST">
			Select the Event Name :
			<?php
				$result=mysql_query("select * from page2");
				print('<select name="event">');
				while ($row=mysql_fetch_row($result)) {
					printf('
							<option name="%s">%s</option>
						',$row[0],$row[0]);
				}
				print('</select>');
			?>
			<br><br>
			<input type="submit" class="large radius button" value="Export">
		</form>
					<form action="export_process_date.php" method="POST">
			Select the Date :
			<?php
				print('Date: <select name="date">');
				for($i=1;$i<=30;$i++){
					printf('
					<option value="0%s">0%s</option>
					',$i,$i);
				}
				print('</select>Month :');
				print('<select name="month">');
				for($i=1;$i<=12;$i++){
					printf('
					<option value="0%s">0%s</option>
					',$i,$i);
				}
				print('</select>');
			?>
			<br><br>
			<input type="submit" class="large radius button" value="Export">
		</form>
	</div>
</body>