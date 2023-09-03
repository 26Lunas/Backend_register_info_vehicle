<?php
// URL del servicio en línea que genera códigos de barras PDF417
$url = 'https://barcode.tec-it.com/barcode.ashx?data=TusDatosAquí&code=PDF417';

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


?>


