<?php
include("../connection.php");

if($_POST['id_usuario'] === '0' || $_POST['id_usuario']){

// Generar número de 6 dígitos aleatorio
$numeroAleatorio = mt_rand(100000, 999999);

$ID_Registro = $numeroAleatorio;
$ID_USUARIO = $_POST['id_usuario'];

$fechaActual = date('Y-d-m');
$fecha_registro = $fechaActual;
$descripción = $_POST['description'];

$query = "INSERT tb_historial_actividad (ID_Registro, ID_Usuario, Fecha_Registro, Descripcion) VALUES ('$ID_Registro','$ID_USUARIO', '$fecha_registro', '$descripción')";

$result = mysqli_query($Connection, $query);
    if(!$result){
        die('Error en la consulta ' . mysqli_error($Connection));
    }else{
        echo "exito";
    }

}else{
    echo "No recibi datos";
}