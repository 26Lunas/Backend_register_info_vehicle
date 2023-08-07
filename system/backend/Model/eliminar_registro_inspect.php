<?php


include('../connection.php');


if($_POST['idRegisterInspect']){

    $id_inspect = $_POST['idRegisterInspect'];

    $query = "DELETE FROM tb_make_inspect WHERE id_make_inspect = $id_inspect";

    $result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }
}