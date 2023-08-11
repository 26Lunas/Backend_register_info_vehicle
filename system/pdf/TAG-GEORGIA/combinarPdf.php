<?php


use \setasign\Fpdi\Fpdi;

require('../fpdf/fpdf.php');
require('../fpdi/src/autoload.php');
 
$pdf = new Fpdi();
$pdf->AddPage('L', array(153, 99));  
$pdf->setSourceFile("reporteHorizontal.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$pdf->AddPage('L', array(118, 37)); 
$pdf->setSourceFile("reporteVertical.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

// Cambiar el nombre del archivo al descargar
$nombreArchivoDescarga = "TAG-GEORGIA.pdf";

// Usar el método Output() con el nombre de archivo personalizado
$pdf->Output($nombreArchivoDescarga, 'I');


// Eliminar el archivo generado
unlink("reporteHorizontal.pdf");
unlink("reporteVertical.pdf");
