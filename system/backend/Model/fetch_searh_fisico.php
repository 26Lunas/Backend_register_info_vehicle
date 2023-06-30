<?php
include('../connection.php');

if($_POST['search']){

    $search = $_POST['search'];

    $query = "SELECT * FROM tb_state WHERE name_state LIKE '%$search%' OR identificador_state LIKE '%$search%'";

    $result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }
    
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'name_state' => $row['name_state'],
            'identificador_state' => $row['identificador_state']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}
