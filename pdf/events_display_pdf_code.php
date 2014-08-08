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

include(dirname(__FILE__).'/events_display_pdf.html');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('Events_display_pdf.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
 header("location:../index.php")
?>