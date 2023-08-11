<?php
if ($_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
    $filename = $_FILES['pdf']['name'];
    $tempPath = $_FILES['pdf']['tmp_name'];

    $destination = $filename;
    
    if (move_uploaded_file($tempPath, $destination)) {
        echo 'PDF guardado en el servidor: ' . $destination;
    } else {
        echo 'Error al guardar PDF en el servidor';
    }
} else {
    echo 'Error al subir el archivo PDF';
}
