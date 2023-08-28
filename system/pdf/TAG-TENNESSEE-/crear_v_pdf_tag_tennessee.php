<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba
// $html = file_get_contents_curl("http://localhost/Software_registro_de_información/system/pdf/texas/datosVerticales.html");



ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datos_v_pdf_tag_tennessee.php"; // Incluir el archivo que contiene el HTML a utilizar
$html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida


// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

$pdf->set_option('isHtml5ParserEnabled', true);

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("216", "portrait");


// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));

// Renderizamos el documento PDF.
$pdf->render();

$numeroAleatorio = mt_rand(1, 99);
$numeroFormateado = sprintf("%07d", $numeroAleatorio);
// $pdf->Output();
$filenamepdf="TAG-TN-$numeroFormateado.pdf";


// Enviamos el fichero PDF al navegador.
$pdf->stream($filenamepdf,  array('Attachment' => 0));

// Guardamos el fichero PDF en el servidor.
// $file = 'pruebaPDF-2.pdf';
// file_put_contents($file, $pdf->output());
