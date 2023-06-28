<?php

include("../connection.php");


if($_POST['campoVehicleVin']){

    // Generar número de 6 dígitos aleatorio
    $numeroAleatorio = mt_rand(100000, 999999);

    $id_buyer = $numeroAleatorio;
    $name_1 = $_POST['campoBuyerName1'];
    $name_2 = $_POST['campoBuyerName2'];
    $buyer_city = $_POST['campoBuyerCity'];
    $buyer_email = $_POST['campoBuyerEmail'];
    $buyer_state = $_POST['campoBuyerState'];
    $buyer_phone = $_POST['campoBuyerPhone'];
    $buyer_adress = $_POST['campoBuyerAdress'];
    $buyer_zip = $_POST['campoBuyerZip'];

    // Query table tb_buyer
    $query_tb_buyer = "INSERT tb_buyer (id_buyer,
                        name_1,
                        name_2,
                        city,
                        email,
                        estado,
                        phone,
                        adress,
                        zip) VALUES ('$id_buyer',
                        '$name_1',
                        '$name_2',
                        '$buyer_city',
                        '$buyer_email',
                        '$buyer_state',
                        '$buyer_phone',
                        '$buyer_adress',
                        '$buyer_zip' )";

    $result_tb_buyer = mysqli_query($Connection, $query_tb_buyer);
    if(!$result_tb_buyer){
        die('Error en la consulta ' . mysqli_error($Connection));
    }else{
        // echo "Datos registrados con exito! tb_buyer";
    }

    // Query table tb_vehicle

   $tb_vehicle_vin = $_POST['campoVehicleVin'];
   $tb_vehicle_seller = $_POST['campoVehicleSeller'];
   $tb_vehicle_body_style = $_POST['campoVehicleBodyStyle'];
   $tb_vehicle_major_color = $_POST['campoVehicleMajorColor'];
   $tb_vehicle_minor_color = $_POST['campoVehicleMinorColor'];
   $tb_vehicle_sale_date = $_POST['campoVehicleSaleDate'];
   $tb_vehicle_deler_number = $_POST['campoVehicleDelerNamber'];
   $tb_vehicle_year = $_POST['campoVehicleYear'];
   $tb_vehicle_days = $_POST['campoVehicleDays'];
   $tb_vehicle_make = $_POST['campoVehicleMake'];
   $tb_vehicle_model = $_POST['campoVehicleModel'];
   $tb_vehicle_miles = $_POST['campoVehicleMiles'];



   $query_tb_vehicle = "INSERT tb_vehicle (vin_vehicle,
                                            seller,
                                            body_style,
                                            major_color,
                                            minor_color,
                                            sale_date,
                                            deler_number,
                                            year,
                                            days,
                                            make,
                                            model,
                                            miles,
                                            id_buyer) VALUES 
                                            ('$tb_vehicle_vin',
                                            '$tb_vehicle_seller',
                                            '$tb_vehicle_body_style',
                                            '$tb_vehicle_major_color',
                                            '$tb_vehicle_minor_color',
                                            '$tb_vehicle_sale_date',
                                            '$tb_vehicle_deler_number',
                                            '$tb_vehicle_year',
                                            '$tb_vehicle_days',
                                            '$tb_vehicle_make',
                                            '$tb_vehicle_model',
                                            '$tb_vehicle_miles',
                                            '$id_buyer')";

$result_tb_vehicle = mysqli_query($Connection, $query_tb_vehicle);
    if(!$result_tb_buyer){
        die('Error en la consulta ' . mysqli_error($Connection));
    }else{
        // echo " Datos registrados con exito tb_vehicle!";
    }



}

