<?php

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

// $rutaCarpetaQR = "img/";
$archivoQR = 'codigo_qr.png';
$writer->writeFile($textoQR, $archivoQR);

// Introducimos HTML de prueba
ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datosHorizontales.php"; // Incluir el archivo que contiene el HTML a utilizar
$html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "landscape");

// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));

// Renderizamos el documento PDF.
$pdf->render();

// Guardamos el fichero PDF en el servidor.
$file = 'TEXAS-BUYER-H.pdf';
file_put_contents($file, $pdf->output());

// Establecemos las cabeceras para la descarga del PDF.
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="reportePdf.pdf"');
header('Content-Length: ' . filesize($file));

// Enviamos el fichero PDF al navegador para su descarga.
readfile($file);

// Eliminar el archivo generado
unlink($archivoQR);
unlink($file);
