<?php

require 'barcode/src/BarcodeGenerator.php';
require 'barcode/src/BarcodeGeneratorPNG.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

$barcode = new BarcodeGeneratorPNG();

// Genera el código de barras
$barcodeData = $barcode->getBarcode("013-OP-091", $barcode::TYPE_CODE_128,2,50);

// Guarda el código de barras en un archivo (opcional)
$file = 'codigo_barras.png';
file_put_contents($file, $barcodeData);

// Configura las cabeceras para la descarga del archivo
// header('Content-Type: image/png');
// header('Content-Disposition: attachment; filename="codigo_barras.png"');

// Envía el contenido del archivo al navegador para descargarlo
// readfile($file);


