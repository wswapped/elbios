<?php
require 'assets/plugins/pdfcrowd.php';

try
{   
    // create an API client instance
    $client = new Pdfcrowd("elbios", "7b8f88de268c877485c48a422471217f");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertURI('http://marieadelaideschool.rw/website/academic.php');

    // set HTTP response headers
    header("Content-Type: application/pdf");
    header("Cache-Control: max-age=0");
    header("Accept-Ranges: none");
    header("Content-Disposition: attachment; filename=\"sam.pdf\"");

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>