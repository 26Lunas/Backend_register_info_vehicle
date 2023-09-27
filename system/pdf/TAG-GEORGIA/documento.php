<?php

require('crear_h_pdf_tag_georgia.php');
require('crear_v_pdf_tag_georgia.php');

use \setasign\Fpdi\Fpdi;

require('../fpdf/fpdf.php');
require('../fpdi/src/autoload.php');
 
$pdf = new Fpdi();
$pdf->AddPage('L', array(153, 99));  
$pdf->setSourceFile("TAG-GEORGIA-h1.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$pdf->AddPage('L', array(118, 37)); 
$pdf->setSourceFile("TAG-GEORGIA-h2.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-GA-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";


// Eliminar el archivo generado
unlink("reporteHorizontal.pdf");
unlink("reporteVertical.pdf");
