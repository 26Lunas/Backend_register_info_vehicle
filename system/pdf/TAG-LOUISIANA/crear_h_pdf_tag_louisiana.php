<?php

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Introducimos HTML de prueba
// $html = file_get_contents_curl("http://localhost/Software_registro_de_información/system/pdf/texas/datosVerticales.html");

ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datos_h_pdf_tag_louisiana.php"; // Incluir el archivo que contiene el HTML a utilizar
$html = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida


// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

$pdf->set_option('isHtml5ParserEnabled', true);

// Definimos el tamaño y orientación del papel que queremos.
// $pdf->set_paper("A6", "landscape");
$pdf->setPaper(array(0, 0, 400, 755), 'landscape');


// Cargamos el contenido HTML.s
// $pdf->load_html(utf8_decode($html));
$pdf->load_html($html);

// Renderizamos el documento PDF.
$pdf->render();

// Guarda el PDF en el servidor
file_put_contents('TAG-LOUISIANA-PAG-1.pdf', $pdf->output());


// Guardamos el fichero PDF en el servidor.
// $file = 'pruebaPDF-2.pdf';
// file_put_contents($file, $pdf->output());