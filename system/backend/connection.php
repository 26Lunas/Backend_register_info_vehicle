<?php


$host = 'localhost';
$usuario = 'root';
$password = '';
$database = 'sys_record';

    $Connection = mysqli_connect($host, $usuario, $password, $database);
    mysqli_set_charset($Connection, 'utf8');

//   if($Connection){
//        echo "Conexion exitosa";
//    }else{
//        die ("Error en la conexion ");
//    }
