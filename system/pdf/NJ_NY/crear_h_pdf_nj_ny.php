<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

require '../generarQR/vendor/autoload.php'; // Carga las clases de la librería

use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;

$id = $_GET['idRegisterVehicle'];

// Texto que se convertirá en el código QR
$textoQR = "https://txdmvgot.com/system/pdf/generarQR/qr.php?idRegisterVehicle=".$id;
// Convertir el texto a UTF-8
$textoQR = utf8_encode($textoQR);

// Configuración de la imagen QR
$renderer = new Png();
$renderer->setWidth(1000); 
$renderer->setHeight(1000);

$writer = new Writer($renderer);

// Generar el código QR

$rutaCarpetaQR = "img/";
$archivoQR = $rutaCarpetaQR .'codigo_qr.png';
$writer->writeFile($textoQR, $archivoQR);

// Introducimos HTML de prueba
// $html = file_get_contents_curl("http://localhost/Software_registro_de_información/system/pdf/texas/datosVerticales.html");


ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datos_h_pdf_nj_ny.php"; // Incluir el archivo que contiene el HTML a utilizar
$html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida


// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

$pdf->set_option('isHtml5ParserEnabled', true);

// Definimos el tamaño y orientación del papel que queremos.
// $pdf->set_paper("A5", "landscape");
$pdf->setPaper(array(0, 0, 612, 790), 'landscape');


// Cargamos el contenido HTML.s
// $pdf->load_html(utf8_decode($html));
$pdf->load_html($html);

// Renderizamos el documento PDF.
$pdf->render();

$numeroAleatorio = mt_rand(10, 99);

// $pdf->Output();
$filenamepdf="TAG-NJ/NY-$numeroAleatorio.pdf";


// Enviamos el fichero PDF al navegador.
$pdf->stream($filenamepdf,  array('Attachment' => 0));

// Eliminar el archivo generado
unlink($archivoQR);
