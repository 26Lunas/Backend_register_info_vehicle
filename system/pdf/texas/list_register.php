<?php
include('../../backend/connection.php');

// Verificar si se ha proporcionado un ID válido antes de ejecutar la consulta
if (isset($_GET['idRegisterVehicle']) && is_numeric($_GET['idRegisterVehicle'])) {
    $id_buyer = $_GET['idRegisterVehicle'];

    $query = "SELECT v.*, b.*, s.*
              FROM tb_vehicle v
              JOIN tb_buyer b ON v.id_buyer = b.id_buyer
              JOIN tb_state s ON b.estado = s.identificador_state
              WHERE b.id_buyer = '$id_buyer';";

    $result = mysqli_query($Connection, $query);

    if (!$result) {
        die('Error en la consulta: ' . mysqli_error($Connection));
    }

    $json = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id_vehicle' => $row['id_vehicle'],
                'vin_vehicle' => $row['vin_vehicle'],
                'seller' => $row['seller'],
                'body_style' => $row['body_style'],
                'major_color' => $row['major_color'],
                'minor_color' => $row['minor_color'],
                'sale_date' => $row['sale_date'],
                'deler_number' => $row['deler_number'],
                'year' => $row['year'],
                'days' => $row['days'],
                'make' => $row['make'],
                'model' => $row['model'],
                'miles' => $row['miles'],
                'name_1' => $row['name_1'],
                'name_2' => $row['name_2'],
                'city' => $row['city'],
                'estado' => $row['estado'],
                'phone' => $row['phone'],
                'adress' => $row['adress'],
                'zip' => $row['zip'],
                'id_buyer' => $row['id_buyer'],
                'name_state' => $row['name_state'],
                'pdf' => $row['pdf']
            );
        }
    } else {
        // $json[] = array(
        //     'message' => 'No se encontraron datos para el ID proporcionado.'
        // );
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error de conexión</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                }
        
                .container {
                    text-align: center;
                    margin: 100px auto;
                    max-width: 400px;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                }
        
                .error-icon {
                    color: #FF6347; /* Color rojo para el icono */
                    font-size: 48px;
                }
        
                .error-message {
                    font-size: 18px;
                    margin-top: 10px;
                }
        
                .retry-button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #007BFF; /* Color azul para el botón */
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                    margin-top: 20px;
                    cursor: pointer;
                }
        
                .retry-button:hover {
                    background-color: #0056b3; /* Color azul más oscuro al pasar el cursor sobre el botón */
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i> <!-- Puedes usar una librería de iconos como Font Awesome -->
                </div>
                <div class="error-message">
                    Hubo un error de conexión o conexión inestable al generar el PDF. Por favor, inténtelo nuevamente.
                </div>
                <a href="#" class="retry-button" onclick="openCurrentURLInNewTab();">Volver a intentar</a>
            </div>

            <script>
            function openCurrentURLInNewTab() {
                window.location.href = window.location.href;
            }
            </script>
        </body>
        </html>
        
        ';
    }

    $jsonString = json_encode($json);

} else {
    // En caso de que no se proporcione un ID válido
    echo 'ID no válido proporcionado.';
}
?>
