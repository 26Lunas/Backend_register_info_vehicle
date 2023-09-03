<?php
$id = $_GET['idRegisterVehicle'];
$text= "https://txdmvgot.com/system/pdf/generarQR/qr.php?idRegisterVehicle=".$id;

// URL del servicio en línea que genera códigos de barras PDF417
$url = "https://barcode.tec-it.com/barcode.ashx?data=$text&code=PDF417";

// Utiliza file_get_contents para obtener la imagen del código de barras desde la URL
$imagenCodigoBarras = file_get_contents($url);

// Verifica si se obtuvo la imagen correctamente
if ($imagenCodigoBarras !== false) {
    // Guarda la imagen en tu servidor (opcional)
    file_put_contents('codigo_barras.png', $imagenCodigoBarras);

    // // Envía la imagen como respuesta al navegador para descargarla
    // header('Content-Type: image/png');
    // header('Content-Disposition: attachment; filename="codigo_barras.png"');
    // echo $imagenCodigoBarras;
} else {
    echo 'Error al obtener el código de barras.';
}


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
