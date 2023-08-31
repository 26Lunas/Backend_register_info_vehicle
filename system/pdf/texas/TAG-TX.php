<?php

use setasign\Fpdi\Fpdi;

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
$numeroAleatorio = mt_rand(10, 99);

$filenamepdf = "TAG-TX-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");

$pdf->Output($filenamepdf, 'I');


// Eliminar el archivo generado
unlink("reporteHorizontal.pdf");
unlink("reporteVertical.pdf"); 
?>
