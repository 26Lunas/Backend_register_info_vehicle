<?php

include("../connection.php");


if($_POST['id']){

// Generar número de 6 dígitos aleatorio
$numeroAleatorio = mt_rand(100000, 999999);

echo "Estamos recibiendo datos " . $_POST['id'];


// echo $numeroAleatorio;
//  "INSERT tb_buyer (id_buyer, name_1, name_2, city, email, state, phone, adress, zip) VALUES ('$numeroAleatorio', )"




}

