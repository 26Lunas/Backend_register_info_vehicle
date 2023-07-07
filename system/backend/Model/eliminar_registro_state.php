<?php


include('../connection.php');


if($_POST['idState']){

    $idState = $_POST['idState'];

    $query = "DELETE FROM tb_state WHERE id_state = '$idState';";

    $result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }
}