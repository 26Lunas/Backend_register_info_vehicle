<?php

$password = "12345";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$mensaje = password_verify($password, $hashedPassword);

// Guarda $hashedPassword en la base de datos
echo $hashedPassword;
echo $mensaje;