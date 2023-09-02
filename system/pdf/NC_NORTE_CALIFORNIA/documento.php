<?php
include('crear_h_pdf_norte_california.php');
include('crear_v2_pdf_norte_california.php');

use \setasign\Fpdi\Fpdi;

require('../fpdf/fpdf.php');
require('../fpdi/src/autoload.php');
 
$pdf = new Fpdi();
$pdf->AddPage('L', array(327, 172)); 
$pdf->setSourceFile("NC_PAG-1.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);

$pdf->AddPage();
$pdf->setSourceFile("NC_PAG-2.pdf");
$template = $pdf->importPage(1);
$pdf->useImportedPage($template, 0, 0);
$numeroAleatorio = mt_rand(1000, 9999);

$numeroAleatorio = mt_rand(1, 99);
$numeroFormateado = sprintf("%07d", $numeroAleatorio);
// $pdf->Output();
$filenamepdf="TAG-NC-$numeroFormateado.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

// // Eliminar el archivo generado
// unlink("reporteHorizontal.pdf");
// unlink("reporteVertical.pdf");
