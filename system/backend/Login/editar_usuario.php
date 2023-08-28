<?php


include('../connection.php');


if($_POST['id_usuario']){

    $idRegisterUser = $_POST['id_usuario'];
    $nombre_user = $_POST['nombre_user'];
    $correo_electronico = $_POST['correo_electronico'];
    $contraseña = $_POST['contraseña'];
    $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $query = "UPDATE tb_usuarios SET Nombre_User = '$nombre_user',
    Correo_Electronico = '$correo_electronico',
    Contraseña = '$hashedPassword',
    Rol_ID = '$rol' WHERE ID_Usuario = '$idRegisterUser'";

    $result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }
}