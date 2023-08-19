<?php

$password = "12345";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Guarda $hashedPassword en la base de datos
echo $hashedPassword;