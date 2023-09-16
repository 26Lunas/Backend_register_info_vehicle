<?php

include('../connection.php');

if (isset($_POST['usuarioSelect'])) {

    $usuarioSelect = $_POST['usuarioSelect'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $id = (int)$usuarioSelect;

    // Función para reformatear una fecha de 'yyyy-mm-dd' a 'yyyy-dd-mm'
    function formatDate($date)
    {
        return date('Y-d-m', strtotime($date));
    }

    // Reformatear las fechas si no están vacías
    if ($fecha_inicio !== "vacio") {
        $fecha_inicio = formatDate($fecha_inicio);
    }
    if ($fecha_fin !== "vacio") {
        $fecha_fin = formatDate($fecha_fin);
    }

    $query = "SELECT COUNT(*) AS TotalRegistros FROM tb_historial_actividad 
WHERE ID_Usuario = '$id'";

    if ($fecha_inicio !== "vacio" && !$fecha_fin !== "vacio") {
        // Si ambas fechas están presentes, agrega la condición de rango
        $query .= " AND (Fecha_Registro BETWEEN '$fecha_inicio' AND '$fecha_fin')";
    }

    $result = mysqli_query($Connection, $query);
    if (!$result) {
        die('Error en la consulta ' . mysqli_error($Connection));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'TotalRegistros' => $row['TotalRegistros']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
} else {
    echo "No estamos recibiendo nad";
}
