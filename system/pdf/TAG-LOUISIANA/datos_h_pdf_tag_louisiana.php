
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAG-LOUISIANA</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap');

        /* @font-face {
        font-family: 'bookman';
        src: url('<?php echo $ruta_main;?>pdf/fonts/bookman/Bookman Bold.ttf') format('truetype');
        font-weight: 700;
    } */
        * {
            /* font-family: 'Roboto', sans-serif; */
            font-family: Arial, Helvetica, sans-serif !important;
        }

        .cont_main {
            /* border: solid 3px red; */
            width: 100%;
            position: absolute;
            top: -7.5mm;
            right: -6mm;
        }


        .cont-vin-year-make-color {
            position: relative;
            /* top: -1mm; */
            left: 22mm;
        }
        .vin>strong{
            font-size: 17.5pt !important;
        }

        .cont-vin-year-make-color>span>strong {
            font-weight: 700;
            position: relative;
            
        }

        .cont-vin-year-make-color>span {
            font-size: 15.5pt;
        } 
        .cont-vin-year-make-color>.make{
            position: relative;
            left: 9mm;
        }
        .cont-vin-year-make-color>.color{
            position: relative;
            left: 12.5mm;
        } 
        .cont-vin-year-make-color>.year{
            position: relative;
            left: 16.5mm;
        }
        .cont_main>h1{
            position: absolute;
            left: 41mm;
            font-weight: 700;
            font-size: 50.1pt;
            /* font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif !important; */
        }
        .cont_main>h2{
            position: absolute;
            background: black;
            top: 37mm;
            right: 14mm;
            color: white;
            padding: 8px 45px;
            font-size: 30pt;
        }
        .code_id{
            position: absolute;
            bottom: -5mm;
            right: 16mm;
            font-weight: 700;
            font-size: 137pt;
        }
        .cont_main>img{
            position: absolute;
            top: 16.5mm;
            left: -7mm;
            width: 155px;
            height: 170px;
        }
    </style>


<?php

include('../texas/list_register.php');

$jsonData = json_decode($jsonString);

foreach ($jsonData as $item) {
    $id_vehicle = $item->id_vehicle;
    $vin_vehicle = $item->vin_vehicle;
    $seller = $item->seller;
    $body_style = $item->body_style;
    $major_color = $item->major_color;
    $minor_color = $item->minor_color;
    $sale_date = $item->sale_date;
    $year = $item->year;
    $days = $item->days;
    $make = $item->make;
    $model = $item->model;
    $miles = $item->miles;
    $name_1 = $item->name_1;
    $city = $item->city;
    $estado = $item->estado;
    $phone = $item->phone;
    $id_buyer = $item->id_buyer;

    $fecha =  $sale_date;
    if($fecha !== ''){
        $fecha_objeto = strtotime($fecha);
        $fecha_transformada = date("M d, Y", $fecha_objeto);
    }else{
        $fecha_transformada = '';
    }
    

    // echo $fecha_transformada;



?>
    <div class="cont_main">
        <img src="img/img_logo_1.jpg" alt="">
        <div class="cont-vin-year-make-color">
            <span class="vin">VIN: <strong><?php echo $vin_vehicle;?></strong></span>
            <span class="make">MAKE: <strong><?php echo $make;?></strong></span>
            <span class="color">COLOR: <strong><?php echo $major_color;?></strong></span>
            <span class="year">YEAR: <strong><?php echo $year;?></strong></span>
        </div>
        <h1>LOUISIANA</h1>
        <!-- <h1 style="font-size: 50.4pt;">LOUISIANA</h1>
        <h1 style="font-size: 50.5pt;">LOUISIANA</h1> -->

        <h2>Exp: 06/24/2022</h2>
        <div class="code_id"><?php echo $id_vehicle;?></div>
    </div>
    <?php
}
?>

</body>

</html>