<?php


    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/../events_display_pdf.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', 3);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('events_status.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
