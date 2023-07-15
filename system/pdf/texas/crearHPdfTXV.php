<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba
// $html = file_get_contents("http://localhost/Software_registro_de_información/system/pdf/texas/datosHorizontales.php");
ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datosHorizontalTXV.php"; // Incluir el archivo que contiene el HTML a utilizar
$html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida

// Instanciamos un objeto de la clase DOMPDF.

$tmp = sys_get_temp_dir();

$pdf = new Dompdf([
    'logOutputFile' => '',
    // authorize DomPdf to download fonts and other Internet assets
    'isRemoteEnabled' => true,
    // all directories must exist and not end with /
    'fontDir' => $tmp,
    'fontCache' => $tmp,
    'tempDir' => $tmp,
    'chroot' => $tmp,
]);

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("270", "landscape");


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
