<?php


use \setasign\Fpdi\Fpdi;

require('../fpdf/fpdf.php');
require('../fpdi/src/autoload.php');
 
$pdf = new Fpdi();
$pdf->AddPage('L');
$pdf->setSourceFile("reporteHorizontal.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$pdf->AddPage();
$pdf->setSourceFile("reporteVertical.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

// Cambiar el nombre del archivo al descargar
$nombreArchivoDescarga = "TEXAS-BUYER.pdf";

header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="TEXAS-BUYER.pdf"');
// Usar el método Output() con el nombre de archivo personalizado
$pdf->Output($nombreArchivoDescarga, 'I');


// Eliminar el archivo generado
unlink("reporteHorizontal.pdf");
unlink("reporteVertical.pdf");
