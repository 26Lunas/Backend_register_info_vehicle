<?php
include('../connection.php');


$query = "SELECT *
FROM tb_pdf
ORDER BY
  CASE 
    WHEN name_state_pdf = 'Texas' THEN 1
    WHEN name_state_pdf = 'California' THEN 2
    ELSE 3
  END,
  name_state_pdf DESC;
";

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