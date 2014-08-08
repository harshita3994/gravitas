<?php

//$file = file_get_contents("events_display_pdf.php");
//file_put_contents("categories.html", $file);

/*$myFile = "categories.html";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "<?php include ('events_display_pdf.php'); ?>";
fwrite($fh, $stringData);
*/
ob_start();
require_once("events_display_pdf.php");
$html = ob_get_contents();
file_put_contents("events_display_pdf.html", $html);

?>