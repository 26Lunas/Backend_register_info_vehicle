<?php

include('../../backend/connection.php');

if(true){

$id_buyer = $_GET['idRegisterVehicle'];
    
$query = "SELECT v.*, b.*, s.*
FROM tb_vehicle v
JOIN tb_buyer b ON v.id_buyer = b.id_buyer
JOIN tb_state s ON b.estado = s.identificador_state
WHERE b.id_buyer = '$id_buyer'";;


$result = mysqli_query($Connection, $query);
if(!$result){
    die('Error en la consulta ' . mysqli_error($Connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id_vehicle' => $row['id_vehicle'],
        'vin_vehicle' => $row['vin_vehicle'],
        'seller' => $row['seller'],
        'body_style' => $row['body_style'],
        'major_color' => $row['major_color'],
        'minor_color' => $row['minor_color'],
        'sale_date' => $row['sale_date'],
        'deler_number' => $row['deler_number'],
        'year' => $row['year'],
        'days' => $row['days'],
        'make' => $row['make'],
        'model' => $row['model'],
        'miles' => $row['miles'],
        'name_1' => $row['name_1'],
        'name_2' => $row['name_2'],
        'city' => $row['city'],
        'estado' => $row['estado'],
        'phone' => $row['phone'],
        'adress' => $row['adress'],
        'zip' => $row['zip'],
        'id_buyer' => $row['id_buyer'],
        'name_state' => $row['name_state'],
        'pdf' => $row['pdf']

    );
}
$jsonString = json_encode($json);

// header('Location: crearHorizontalPdfTX.php');
// exit;

}
