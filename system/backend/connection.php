<?php
$host = 'localhost';
$usuario = 'root';
$password = '';
$database = 'sys_ record';

    $Connection = mysqli_connect($host, $usuario, $password, $database);

//   if($Connection){
//        echo "Conexion exitosa";
//    }else{
//        die ("Error en la conexion ");
//    }