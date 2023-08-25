<?php
include('../connection.php');

if($_POST['idRegisterUser'] === '0' || $_POST['idRegisterUser']){
    $id = $_POST['idRegisterUser'];
}
$query = "SELECT * FROM tb_usuarios WHERE ID_Usuario = '$id'";

$result = mysqli_query($Connection, $query);
if(!$result){
    die('Error en la consulta ' . mysqli_error($Connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'ID_Usuario' => $row['ID_Usuario'],
        'Nombre_User' => $row['Nombre_User'],
        'Correo_Electronico' => $row['Correo_Electronico'],
        'Contraseña' => $row['Contraseña'],
        'Rol_ID' => $row['Rol_ID']
    );
}
$jsonString = json_encode($json);
echo $jsonString;