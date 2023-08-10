<?php

include('../../backend/connection.php');

if(true){

$id_inspect = $_GET['idRegisterInspect'];
    
$query = "SELECT * FROM tb_make_inspect WHERE id_make_inspect = $id_inspect";


$result = mysqli_query($Connection, $query);
if(!$result){
    die('Error en la consulta ' . mysqli_error($Connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id_make_inspect' => $row['id_make_inspect'],
        'vin' => $row['vin'],
        'sale_date' => $row['sale_date'],
        'make_inspect_year' => $row['make_inspect_year'],
        'make' => $row['make'],
        'model' => $row['model'],
        'vehicle_type' => $row['vehicle_type'],
        'engine_size' => $row['engine_size'],
        'LGN' => $row['LGN'],
        'transmission' => $row['transmission'],
        'GVW' => $row['GVW'],
        'odometer' => $row['odometer'],
        'fuel_type' => $row['fuel_type'],
        'cylinder' => $row['cylinder'],
        'license' => $row['license']
    );
}
$jsonString = json_encode($json);

// header('Location: crearHorizontalPdfTX.php');
// exit;

}
