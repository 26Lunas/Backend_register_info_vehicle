<?php
// Incluir la biblioteca Dompdf
require_once '../dompdf/autoload.inc.php';

// Crear una nueva instancia de Dompdf
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// Ruta de los archivos HTML de las páginas
// $ruta_pagina_horizontal = 'ruta/pagina_horizontal.html';

$ruta_pagina_horizontal = "datosHorizontales.php"; // Incluir el archivo que contiene el HTML a utilizar
ob_start(); // Iniciar el almacenamiento en búfer de salida
include "datosVerticales.php"; // Incluir el archivo que contiene el HTML a utilizar
$ruta_pagina_vertical = ob_get_clean(); // Obtener el contenido almacenado en el búfer de salida

// Cargar el contenido de la página horizontal
$html_horizontal = file_get_contents($ruta_pagina_horizontal);

// Cargar el contenido de la página vertical
$html_vertical = file_get_contents($ruta_pagina_vertical);

// Agregar la página horizontal al PDF
$dompdf->loadHtml($html_horizontal);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

// Agregar una página en blanco para separar las dos páginas
$dompdf->addPage();

// Agregar la página vertical al PDF
$dompdf->loadHtml($html_vertical);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Mostrar el PDF en el navegador
$dompdf->stream('archivo.pdf', array('Attachment' => false));
?>
