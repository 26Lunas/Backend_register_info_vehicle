<?php


require('crear_h_pdf_tag_louisiana.php');
require('crear_h2_pdf_tag_louisiana.php');

use \setasign\Fpdi\Fpdi;

require('../fpdf/fpdf.php');
require('../fpdi/src/autoload.php');
 
$pdf = new Fpdi();
$pdf->AddPage('L', array(266, 141));  
$pdf->setSourceFile("TAG-LOUISIANA-PAG-1.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$pdf->AddPage();
$pdf->setSourceFile("TAG-LOUISIANA-PAG-2.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-LA-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";


// Eliminar el archivo generado
// unlink("reporteHorizontal.pdf");
// unlink("reporteVertical.pdf");
