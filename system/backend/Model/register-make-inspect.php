<?php

include("../connection.php");

if($_POST['make_inspect_vin']){

    $make_inspect_id = $_POST['make_inspect_id'];
    $make_inspect_vin = $_POST['make_inspect_vin'];
    $make_inspect_saleDays = $_POST['make_inspect_saleDays'];
    $make_inspect_year = $_POST['make_inspect_year'];
    $make_inspect_make = $_POST['make_inspect_make'];
    $make_inspect_model = $_POST['make_inspect_model'];
    $make_inspect_vehicleType = $_POST['make_inspect_vehicleType'];
    $make_inspect_engineSize = $_POST['make_inspect_engineSize'];
    $make_inspect_cylinder = $_POST['make_inspect_cylinder'];
    $make_inspect_LGN = $_POST['make_inspect_LGN'];
    $make_inspect_transmission = $_POST['make_inspect_transmission'];
    $make_inspect_GVW = $_POST['make_inspect_GVW'];
    $make_inspect_odometer = $_POST['make_inspect_odometer'];
    $make_inspect_fuelType = $_POST['make_inspect_fuelType'];
    $make_inspect_license = $_POST['make_inspect_license'];

    $query_make_inspect = "INSERT INTO tb_make_inspect
        (id_make_inspect,
        vin,
        sale_date,
        make_inspect_year,
        make,
        model,
        vehicle_type,
        engine_size,
        LGN,
        transmission,
        GVW,
        odometer,
        fuel_type,
        cylinder,
        license) VALUES 
        ('$make_inspect_id',
        '$make_inspect_vin',
        '$make_inspect_saleDays',
        $make_inspect_year,
        '$make_inspect_make',
        '$make_inspect_model',
        '$make_inspect_vehicleType',
        '$make_inspect_engineSize',
        '$make_inspect_LGN',
        '$make_inspect_transmission',
        '$make_inspect_GVW',
        '$make_inspect_odometer',
        '$make_inspect_fuelType',
        '$make_inspect_cylinder',
        '$make_inspect_license'
        )";

    $result_tb_make_inspect = mysqli_query($Connection, $query_make_inspect);
        if(!$result_tb_make_inspect){
        die('Error en la consulta ' . mysqli_error($Connection));
    }else{
        echo "exito";
    }
}