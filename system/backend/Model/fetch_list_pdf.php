<?php
include('../connection.php');


$query = "SELECT * FROM tb_pdf";

$result = mysqli_query($Connection, $query);
if(!$result){ 
    die('Error en la consulta ' . mysqli_error($Connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id_pdf' => $row['id_pdf'],
        'name_state_pdf' => $row['name_state_pdf'],
        'identificador_pdf' => $row['identificador_pdf']
    );
}
$jsonString = json_encode($json);
echo $jsonString;