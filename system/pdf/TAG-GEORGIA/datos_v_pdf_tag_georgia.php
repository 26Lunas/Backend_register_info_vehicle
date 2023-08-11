<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAG-GEORGIA</title>
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
        .text-mayuscula{
        text-transform: uppercase;
        }

        .cont_main {
            position: absolute;
            top: -10.5mm;
            /* border: solid .1px red; */
            width: 100%;
        }

        .cont-header>h6,
        .cont-header>p {
            margin: 0;
            font-size: 6.1pt !important;
            font-weight: 400 !important;
        }

        .cont-header>h6 {
            margin-bottom: 1mm;
        }

        .cont-header {
            position: relative;
            left: -2.4mm;
            text-align: center;
        }

/* Vin and tim */
        .cont-vin-tim>p {
            margin: 0;
            font-size: 6.1pt !important;
            font-weight: 400 !important;
        }

        .cont-vin-tim {
            position: absolute;
            top: 10.5mm;
            left: -2mm;
        }

        .cont-vin-tim>.vin {
            margin-bottom: .8mm;
        }

        .cont-vin-tim>p>span{
            position: relative;
        }
        .vin>span{
            left: 1mm;
        }
        /* name and adress */
        .cont-name-adress{
            position: absolute;
            top: 19.5mm;
            left: -2mm;
        }
        .cont-name-adress>p{
            margin: 0;
            font-size: 6.1pt !important;
            font-weight: 400 !important;
        }
        .cont-name-adress>.subTitle{
            text-decoration: underline;
            margin-bottom: .8mm;
        }
        .cont-name-adress>.name{
            margin-bottom: .3mm;
        }
        .cont-name-adress>.adress{
            /* border: solid .1px red; */
            width: 25mm;
            line-height: 1.6;
        }

        /* year and make */
        .cont-year-make{
            position: absolute;
            top: 10.5mm;
            left: 37.5mm;
        }
        .cont-year-make>p{
            margin: 0;
            font-size: 6.1pt !important;
            font-weight: 400 !important;
        }
        .cont-year-make>.year{
            margin-bottom: .8mm;
        }
        /* coubtry Information */
        .cont-countryInformation{
            position: absolute;
            top: 18mm;
            left: 47.5mm;
        }
        .cont-countryInformation>p{
            margin: 0;
            font-size: 6.1pt !important;
            font-weight: 400 !important;
        }
        .cont-countryInformation>.subTitle{
            text-decoration: underline;
            margin-bottom: .8mm;
        }
        .cont-countryInformation>.seller, .cont-countryInformation>.nose, .cont-countryInformation>.nose2{
            margin-bottom: .8mm;
        }
        /* color and model */
        .cont-color-model{
            position: absolute;
            top: 10mm;
            left: 64mm;
        }
        .cont-color-model>p{
            margin: 0;
            font-size: 6.1pt !important;
            font-weight: 400 !important;
        }
        .cont-color-model>.color{
            margin-bottom: .8mm;
        }
       
    </style>


<?php
    include('../texas/list_register.php');

    $jsonData = json_decode($jsonString);

    foreach ($jsonData as $item) {
        $id_vehicle = $item->id_vehicle;
        $vin_vehicle = $item->vin_vehicle;
        $seller = $item->seller;
        $deler_number = $item->deler_number;
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
        $name_2 = $item->name_2;
        $adress = $item->adress;
        $city = $item->city;
        $estado = $item->estado;
        $phone = $item->phone;
        $zip = $item->zip;
        $id_buyer = $item->id_buyer;
        $name_state = $item->name_state;

        $fecha = $sale_date;
        $facha_sale = new DateTime($fecha);
        $sale_fecha_format = $facha_sale->format('d/m/Y');
    
        $name_state = str_replace(' ', '', $name_state);
        
        $sale_date = new DateTime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
        $expires = $sale_date->modify("+$days days");
        $formattedDateExpires = $expires->format('d-M-Y');
        $formattedDateExpires2 = $expires->format('d/m/Y');

        ?>

    <div class="cont_main">
        <div class="cont-header">
            <h6>Georgia Department of Revenue</h6>
            <p>Georgia Temporary License Number: <span>20799501</span></p>
        </div>
        <div class="cont-vin-tim">
            <p class="vin">Vin: <span><?php echo $vin_vehicle;?></span></p>
            <p class="tim">Trim: <span></span></p>
        </div>
        <div class="cont-name-adress">
            <p class="subTitle">Temporary Registrant Information</p>
            <p class="name text-mayuscula"><?php echo $name_1;?> <?php echo $name_2;?></p>
            <p class="adress text-mayuscula"><?php echo $adress;?> <?php echo $city;?> <?php echo $zip;?></p>
        </div>
        <div class="cont-year-make">
            <p class="year">Year.: <span><?php echo $year;?></span></p>
            <p class="make text-mayuscula">Make: <span><?php echo $make;?></span></p>
        </div>
        <div class="cont-color-model">
            <p class="color">Color: <span><?php echo $major_color;?></span></p>
            <p class="model text-mayuscula">Model: <span><?php echo $model;?></span></p>
        </div>
        <div class="cont-countryInformation">
            <p class="subTitle">Country Information</p>
            <p class="seller text-mayuscula"><?php echo $seller;?>,</p>
            <!-- <p class="nose text-mayuscula">1926 HYANNIS CT</p>
            <p class="nose2 text-mayuscula">COLLEGE PARK, GA 30337</p> -->
        </div>
    </div>
    <?php
    }
    ?>


</body>

</html>