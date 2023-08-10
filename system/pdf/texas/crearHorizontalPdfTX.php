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

// $rutaCarpetaQR = "img/";
$archivoQR = 'codigo_qr.png';
$writer->writeFile($textoQR, $archivoQR);

// Introducimos HTML de prueba
// $html = file_get_contents("http://localhost/Software_registro_de_información/system/pdf/texas/datosHorizontales.php");
ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datosHorizontales.php"; // Incluir el archivo que contiene el HTML a utilizar
$html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "landscape");


// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));

// Renderizamos el documento PDF.
$pdf->render();

// Enviamos el fichero PDF al navegador.
$pdf->stream('reportePdf.pdf',  array('Attachment' => 0));

// Guardamos el fichero PDF en el servidor.
// $file = 'pruebaPDF-H.pdf';
// file_put_contents($file, $pdf->output());

function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}
// Establecemos las cabeceras para mostrar el PDF en el navegador.
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="reportePdf.pdf"');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

echo $pdf->output();
// Devuelve el contenido del PDF como respuesta al AJAX
// $pdfOutput = $pdf->output();
// echo base64_encode($pdfOutput);

// Eliminar el archivo generado
unlink($archivoQR);
