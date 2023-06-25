<?php


include('../connection.php');


$query = "SELECT * FROM tb_vehicle";

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
        'sale_date' => $row['deler_number'],
        'date' => $row['date'],
        'days' => $row['days'],
        'make' => $row['make'],
        'model' => $row['model'],
        'miles' => $row['miles']

    );
}
$jsonString = json_encode($json);
echo $jsonString;