
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
    .cont-text-title{
        /* border: solid 3px red; */
        width: 100%;
        position: absolute;
        top: -1.6mm;
    }
    .cont-text-title>h6{
        font-weight: 400;
        font-size: 17.1pt;
        position: absolute;
        top: -6mm;
        left: 17mm;
        margin: 0;
    }
    .cont-text-title>.vin{
        position: absolute;
        left: 42mm;
        top: -1.5mm;
        font-size: 9.5pt;
        font-weight: 400;

    }
    .code-id{
        position: absolute;
        top: 5mm;
        left: 17mm;
        font-size: 59pt;
        font-weight: 700;
    }
    .cont-expires>p{
        position: absolute;
        bottom: 41mm;
        left: 52mm;
        font-size: 9.5pt;
        font-weight: 400;
    }
    .cont-expires>h6{
        position: absolute;
        bottom: 30mm;
        left: 23mm;
        font-size: 39pt;
        font-weight: 400;
        margin: 0;
    }
    .QR_georgia{
        width: 72px;
        height: 75px;
        position: absolute;
        bottom: 28mm;
        left: 1mm;
    }
    .cont-make{
        position: absolute;
        bottom: 28.5mm;
        left: 42mm;
        font-size: 9pt;
        font-weight: 400;
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

<style>
    .marca_agua{
        z-index: -999;
        position: absolute !important;
        top: .5%;
        left: 26%;
        width: 195px;
        height: 200px;

    }
    .cont-logo-id{
        position: absolute;
        text-align: center;
        right: 3.5mm;
        bottom: 28.5mm;
        font-size: 9pt;
    }
    .cont-logo-id img{
        width: 45px;
    }
</style>
    <img src="img/marca_agua.jpg" alt="" class="marca_agua">
    <div class="cont-text-title">
        <h6>GEORGIA TEMPORARY LICENSE</h6>
        <P class="vin"><?php echo $vin_vehicle;?></P>
    </div>
    <div class="code-id"><?php echo $id_vehicle;?></div>
    <div class="cont-expires">
        <p>EXPIRES</p>
        <h6 style="text-transform: uppercase;"><?php echo $formattedDateExpires; ?></h6>
    </div>
    <img src="img/codigo_qr.png" alt="" class="QR_georgia">
    <div class="cont-make">
        <span class="year"><?php echo $year;?></span>
        <span class="make"><?php echo $make;?></span>
        <span class="ELANTRA" style="text-transform: uppercase;"><?php echo $model;?></span>
        <span class="color"><?php echo $major_color;?></span>
    </div>
    <div class="cont-logo-id">
    <img src="img/logo-lateral-righ.jpg" alt="" class="logo-lateral-righ">
    <div class="code-id-lateral"><?php echo $id_vehicle;?></div>
    </div>
   
    <?php
    }
    ?>


</body>

</html>