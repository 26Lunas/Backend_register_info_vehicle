<?php

include("../connection.php");


if($_POST['campoVehicleVin']){

    // Generar número de 6 dígitos aleatorio
    $numeroAleatorio = mt_rand(100000, 999999);

    $id_buyer = $_POST['id_buyerVehicle'];
    $name_1 = $_POST['campoBuyerName1'];
    $name_2 = $_POST['campoBuyerName2'];
    $buyer_city = $_POST['campoBuyerCity'];
    $buyer_email = $_POST['campoBuyerEmail'];
    $buyer_state = $_POST['campoBuyerState'];
    $buyer_phone = $_POST['campoBuyerPhone'];
    $buyer_adress = $_POST['campoBuyerAdress'];
    $buyer_zip = $_POST['campoBuyerZip'];
    $buyer_pdf = $_POST['campoBuyerpdf'];

    // Query table tb_buyer
    $query_tb_buyer = "INSERT tb_buyer (id_buyer,
                        name_1,
                        name_2,
                        city,
                        email,
                        estado,
                        phone,
                        adress,
                        zip,
                        pdf) VALUES ('$id_buyer',
                        '$name_1',
                        '$name_2',
                        '$buyer_city',
                        '$buyer_email',
                        '$buyer_state',
                        '$buyer_phone',
                        '$buyer_adress',
                        '$buyer_zip', 
                        '$buyer_pdf')";

    $result_tb_buyer = mysqli_query($Connection, $query_tb_buyer);
    if(!$result_tb_buyer){
        die('Error en la consulta ' . mysqli_error($Connection));
    }else{
        // echo "Datos registrados con exito! tb_buyer";
    }

    function generarCodigoAleatorio($logitudN) {
        $letras = 'ABCDEFGHIJKLMNOPQRSTUVXY';
        $numeros = '0123456789';
        $codigo = '';
    
        // Generar dos letras aleatorias en posiciones aleatorias
        for ($i = 0; $i < 2; $i++) {
            $posicionLetra = rand(0, strlen($letras) - 1);
            $codigo .= $letras[$posicionLetra];
        }
    
        // Generar seis números aleatorios
        for ($i = 0; $i < $logitudN; $i++) {
            $posicionNumero = rand(0, strlen($numeros) - 1);
            $codigo .= $numeros[$posicionNumero];
        }
    
        // Mezclar el código para obtener posiciones aleatorias
        $codigo = str_shuffle($codigo);
    
        return $codigo;
    }

    // Uso del código generador
    $codigoAleatorio = generarCodigoAleatorio(5);
    
    if($buyer_pdf === "MD"){
        $codigoAleatorio = generarCodigoAleatorio(6);
    }else if($buyer_pdf ==="NV"){
        
        // Generar números aleatorios
        $numero1 = rand(100, 999);
        $numero2 = rand(100, 999);

        // Crear el código
        $codigo = "NV-" . $numero1 . "-" . $numero2;

        // Mostrar el código generado
        $codigoAleatorio = $codigo;

    }else if($buyer_pdf ==="NJ" || $buyer_pdf ==="NY"){
        
        function generarCodigo() {
            $letraInicial = chr(rand(65, 90)); // Generar una letra mayúscula ASCII entre 65 y 90
            $digitos = rand(100000, 999999); // Generar un número de 6 dígitos
        
            $codigo = $letraInicial . $digitos;
            return $codigo;
        }

        // Mostrar el código generado
        $codigoAleatorio = generarCodigo();

    }else if($buyer_pdf ==="IL"){
        function generarCodigoAleatorioIllonis() {
            $codigo = '';
            $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            
            // Generar 3 números al principio
            for ($i = 0; $i < 3; $i++) {
                $codigo .= $caracteres[rand(0, 9)]; // Solo dígitos numéricos
            }
            
            $codigo .= '-';
        
            // Generar 2 letras en medio
            for ($i = 0; $i < 2; $i++) {
                $codigo .= $caracteres[rand(10, strlen($caracteres) - 1)]; // Solo letras
            }
            
            $codigo .= '-';
            
            // Generar 3 números al final
            for ($i = 0; $i < 3; $i++) {
                $codigo .= $caracteres[rand(0, 9)]; // Solo dígitos numéricos
            }
            
            return $codigo;
        }
        $codigoAleatorio = generarCodigoAleatorioIllonis();
    }else if($buyer_pdf ==="GA"){
        function generarCodigoGeorgia() {
            $letraInicial = chr(rand(65, 90)); // Generar una letra mayúscula ASCII entre 65 y 90
            $digitos = rand(1000000, 9999999); // Generar un número de 6 dígitos
        
            $codigo = $letraInicial . $digitos;
            return $codigo;
        }
        $codigoAleatorio = generarCodigoGeorgia();
    }
    
    // Query table tb_vehicle

    $tb_vehicle_id = $codigoAleatorio;
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



   $query_tb_vehicle = "INSERT tb_vehicle (id_vehicle,
                                            vin_vehicle,
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
                                            ('$tb_vehicle_id',
                                            '$tb_vehicle_vin',
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
        echo "Exito";
    }



}

