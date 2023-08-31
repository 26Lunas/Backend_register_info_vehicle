<?php

require('../tcpdf/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetMargins(10, 5, 5);
$pdf->AddPage();
$pdf->SetFont('times', '', 12);

// Resto de tu código para generar el contenido del PDF

$numeroAleatorio2 = mt_rand(10, 99);
$filenamepdf = "TAG-TX-$numeroAleatorio2.pdf";

// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");

$pdf->Output($filenamepdf, 'I');

// Eliminar el archivo generado
unlink($archivoQR);
