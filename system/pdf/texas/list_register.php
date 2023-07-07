<?php

include('../../backend/connection.php');

if($_GET['idRegisterVehicle']){

$id_buyer = $_GET['idRegisterVehicle'];
    
$query = "SELECT * FROM tb_vehicle  JOIN tb_buyer ON tb_vehicle.id_buyer = tb_buyer.id_buyer WHERE tb_buyer.id_buyer = '$id_buyer'";


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
        'year' => $row['year'],
        'days' => $row['days'],
        'make' => $row['make'],
        'model' => $row['model'],
        'miles' => $row['miles'],
        'name_1' => $row['name_1'],
        'city' => $row['city'],
        'estado' => $row['estado'],
        'phone' => $row['phone'],
        'id_buyer' => $row['id_buyer']

    );
}
$jsonString = json_encode($json);

// header('Location: crearHorizontalPdfTX.php');
// exit;

}
