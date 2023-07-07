<?php


include('../connection.php');


if($_POST['idRegisterVehicle']){

    $id_buyer = $_POST['idRegisterVehicle'];

    $query = "DELETE FROM tb_buyer WHERE id_buyer = '$id_buyer';";

    $result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }
}