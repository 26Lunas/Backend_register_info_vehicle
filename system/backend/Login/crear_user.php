<?php

include("../connection.php");

if($_POST['nombre_user']){
    $numeroAleatorio = mt_rand(100000, 999999);

    $id_user = $numeroAleatorio;
    $nombre_user = $_POST['nombre_user'];
    $correo_electronico = $_POST['correo_electronico'];
    $contraseña = $_POST['contraseña'];
    $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $jquery = "INSERT tb_usuarios (ID_Usuario,
                                    Nombre_User,
                                    Correo_Electronico,
                                    Contraseña,
                                    Rol_ID) VALUES
                                    ('$id_user',
                                    '$nombre_user',
                                    '$correo_electronico',
                                    '$hashedPassword',
                                    '$rol')";


    $jquery = mysqli_query($Connection, $jquery);
        if(!$jquery){
            die('Error en la consulta ' . mysqli_error($Connection));
        }else{
            // echo "Datos registrados con exito! tb_buyer";
        }

}