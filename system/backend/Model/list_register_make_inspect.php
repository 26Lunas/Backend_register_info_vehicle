<?php


include('../connection.php');


$query = "SELECT * FROM tb_make_inspect";

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
        'license' => $row['license'],

    );
}
$jsonString = json_encode($json);
echo $jsonString;

