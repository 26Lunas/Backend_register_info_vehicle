<?php
require '../connection.php';

session_start();

$usuario = $_POST['user'];
$clave = $_POST['password'];

$query = "SELECT Contraseña, Rol_ID FROM tb_usuarios WHERE Nombre_User = '$usuario'";
$result = mysqli_query($Connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $storedHash = $row['Contraseña'];

    if(password_verify($clave, $storedHash)){
        $_SESSION['user'] = $usuario;
        $_SESSION['rol'] = $row['Rol_ID'];

        $estado_session = isset($_SESSION['user']) ? 'exitosa' : '';

        $json = array(
            'usuario' => $_SESSION['user'],
            'rol' => $_SESSION['rol'],
            'estado_session' => $estado_session
        );

        $jsonString = json_encode($json);
        echo $jsonString;
    } else {
        echo "Datos incorrectos.";
    }
} else {
    echo "Error en la consulta.";
}

