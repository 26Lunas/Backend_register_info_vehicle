<?php
require '../connection.php';

session_start();

$usuario = $_POST['user'];
$clave = $_POST['password'];

$query = "SELECT COUNT(*) as contar, Rol_ID From tb_usuarios WHERE Nombre_User = '$usuario' and Contraseña = '$clave'";
$result = mysqli_query($Connection, $query);

$array = mysqli_fetch_array($result);

if ($array['contar'] > 0) {
    // $_SESSION['user'] = $usuario;
    $_SESSION['rol'] = $array['Rol_ID']; // Almacenar el rol en la sesión

    echo $_SESSION['user'];
    echo $_SESSION['rol'];
    
} else {
    echo "Datos incorrectos.";
}
?>
