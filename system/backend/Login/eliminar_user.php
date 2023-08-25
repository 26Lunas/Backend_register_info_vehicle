<?php


include('../connection.php');


if($_POST['idRegisterUser']){

    $idRegisterUser = $_POST['idRegisterUser'];

    $query = "DELETE FROM tb_usuarios WHERE ID_Usuario = '$idRegisterUser';";

    $result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }
}