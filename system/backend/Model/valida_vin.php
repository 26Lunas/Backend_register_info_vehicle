<?php
include('../connection.php');


$valueCampoVin = $_POST['valueCampoVin'];

$query = "SELECT v.*, b.*
FROM tb_vehicle AS v
JOIN tb_buyer AS b ON v.id_buyer = b.id_buyer
WHERE v.vin_vehicle = '$valueCampoVin';
";

$result = mysqli_query($Connection, $query);
if (!$result) {
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
        'email' => $row['email'],
        'id_buyer' => $row['id_buyer'],
        'pdf' => $row['pdf']
    );
}
$jsonString = json_encode($json);
echo $jsonString;
