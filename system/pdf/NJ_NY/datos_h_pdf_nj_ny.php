
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NJ 11-2022.pdf</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oxygen&display=swap');

        /* @font-face {
        font-family: 'bookman';
        src: url('<?php echo $ruta_main; ?>
        pdf/fonts/bookman/Bookman Bold.ttf') format(' truetype');
 font-weight: 700;
        }

        */ * {
            /* font-family: 'Roboto', sans-serif; */
            font-family: Arial, Helvetica, sans-serif;
        }

        .cont_main {
            /* border: solid 1px red; */
            width: 100%;
            height: 100%;
        }
        .cont_main>.cont-text-top{
            position: relative;
            top: -10mm;
        }

        .cont_main>.cont-text-top>h1 {
            position: relative;
            top: -13mm;
            left: 5mm;
            font-size: 86pt;
            font-family: 'Times New Roman', Times, serif !important;
            font-weight: 900;
            text-align: center;
            margin: 0;
        }

        .cont_main>.cont-text-top>h2 {
            position: relative;
            top: -22mm;
            left: 78mm;
            color: rgb(92, 91, 91);
        }

        .cont_main>.cont-text-top>img {
            width: 68px;
            position: relative;
            top: 20mm;
            left: 43mm;
        }

        .cont-text-top {
            position: relative;
            top: -18mm;
        }

        .code-id {
            width: 100%;
            /* border: solid 2px red; */
            font-size: 180pt;
            font-weight: 400;
            margin: 0;
            position: relative;
            top: -50mm;
            /* right: 5mm; */
            text-align: center;
        }

        .cont-text-valor-issued {
            position: relative;
            top: -55mm;
        }

        .cont-text-valor-issued>p {
            font-size: 11pt;
            margin: 0;
            line-height: 1.6;
        }

        .cont-text-valor-issued>p:nth-last-child(3) {
            font-size: 9.5pt;
        }

        .vin {
            font-weight: 700;
            font-size: 11.9pt;
        }

        .cont-text-expires {
            position: relative;
            top: -64mm;
            left: -5mm;
        }

        .cont-text-expires>h4,
        .cont-text-expires>p {
            margin: 0;
            text-align: center;
           
        }

        .cont-text-expires>h4 {
            font-size: 28pt;
            text-transform: uppercase !important;
        }

        .cont-text-expires>p {
            position: relative;
            top: 1.1mm;
            
        }

        .qr{
            position: absolute;
            bottom: 70mm;
            right: 38mm;
            width: 137px;
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
        $pdf = $item->pdf;

        $fecha = $sale_date;
        $facha_sale = new DateTime($fecha);
        $sale_fecha_format = $facha_sale->format('m/d/Y');
    
        $name_state = str_replace(' ', '', $name_state);
        
        $sale_date = new DateTime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
        $expires = $sale_date->modify("+$days days");
        $formattedDateExpires = $expires->format('M d, Y');
        $formattedDateExpires2 = $expires->format('m/d/Y');

        $title_pdf = "NewYork";
        if ($pdf === "NJ") {
            $title_pdf = "NewJersey";
        }


        ?>

        <div class="cont_main">
            <div class="cont-text-top">
                <img src="img/img_nj/logo_nj.jpg" alt="">
                <h1><?php echo $title_pdf;?></h1>
                <h2><?php echo $days;?> Day Resident Temporary Plate</h2>
            </div>
            <h2 class="code-id"><?php echo $id_vehicle;?></h2>
            <div class="cont-text-valor-issued">
                <p>07614U Issued: <span><?php echo $sale_fecha_format?></span></p>
                <p>VIN: <span class="vin"><?php echo $vin_vehicle;?></span></p>
                <p class="text-mayuscula"><span class="year"><?php echo $year;?></span>
                    ,<span class="make"><?php echo $make;?></span>
                    ,<span class="model"><?php echo $model;?></span>
                    ,<span class="bodyStyle"><?php echo $body_style;?></span>
                    ,<span class="color"><?php echo $major_color;?></span></p>
            </div>
            <div class="cont-text-expires">
                <h4>EXP <?php echo $formattedDateExpires?></h4>
                <p>Attach this section to the rear of the vehicle</p>
            </div>
            <img src="img/codigo_qr.png" class="qr">

            <style>
                .cont-marco {
                    /* border: solid 1px red; */
                    position: absolute;
                    bottom: 4mm;
                    width: 100%;
                    height: 191px;
                    padding-bottom: 1mm;
                    
                }

                .cont-marco>h4 {
                    margin: 0;
                    font-size: 15.5pt;
                    border-bottom: 2.3px solid black;
                    position: relative;
                    top: 1mm;
                }

                .cont-marco>h4>span {
                    position: relative;
                    left: 55mm;
                }

                .cont-row-1 {
                    border-bottom: solid 1.5px rgb(109, 109, 109);
                    position: relative;
                    top: 8mm;
                    padding-bottom: .5mm;
                }

                .cont-row p {
                    margin: 0;
                    font-size: 6.9pt;
                    
                }

                .cont-row .text-campo p:first-child {
                    font-size: 6pt;
                    margin-bottom: 1mm;
                }
                .cont-row .text-campo p:nth-child(2){
                    text-transform: uppercase !important;
                }

                .cont-row-1 .columna-2 {
                    position: absolute;
                    bottom: 44mm;
                    left: 29mm;
                }

                .cont-row-1 .columna-3 {
                    position: absolute;
                    bottom: 44mm;
                    left: 52.5mm;
                }

                .cont-row-1 .columna-4 {
                    position: absolute;
                    bottom: 44mm;
                    left: 78.5mm;
                }

                .cont-row-1 .columna-4>p:first-child {
                    position: relative;
                    left: 3.5mm;
                }

                .cont-row-1 .columna-5 {
                    position: absolute;
                    bottom: 44mm;
                    left: 160mm;
                }

                .cont-row-1 .columna-5>p:first-child {
                    position: relative;
                    left: 2mm;
                }

                .cont-row-1 .columna-6 {
                    position: absolute;
                    bottom: 44mm;
                    left: 191mm;
                }

                .cont-row-1 .columna-6>p:first-child {
                    position: relative;
                    left: 4.5mm;
                }


                .cont-row-2 {
                    border-bottom: solid 1.5px rgb(109, 109, 109);
                    position: relative;
                    top: 9.5mm;
                    padding-bottom: .5mm;
                }

                .cont-row-2 .columna-2 {
                    position: absolute;
                    bottom: 44mm;
                    left: 29mm;
                }

                .cont-row-2 .columna-3 {
                    position: absolute;
                    bottom: 44mm;
                    left: 52.5mm;
                }

                .cont-row-2 .columna-4 {
                    position: absolute;
                    bottom: 44mm;
                    left: 78.5mm;
                }

                .cont-row-2 .columna-4>p:nth-child(2) {
                    position: relative;
                    left: 4mm;
                }

                .cont-row-2 .columna-5 {
                    position: absolute;
                    bottom: 44mm;
                    left: 110mm;
                }

                .cont-row-2 .columna-6 {
                    position: absolute;
                    bottom: 44mm;
                    left: 160mm;
                }

                .cont-row-2 .columna-7 {
                    position: absolute;
                    bottom: 44mm;
                    left: 196mm;
                }

                .cont-row-2 .columna-7>p:nth-child(2) {
                    position: relative;
                    left: 2mm;
                }

                .cont-row-3 {
                    border-bottom: solid 1px rgb(128, 127, 127);
                    position: relative;
                    top: 10mm;
                    padding-bottom: 3mm;
                    padding-top: 1mm;
                }

                .cont-row-3 .columna-1 {
                    position: absolute;
                    top: .9mm;
                }

                .cont-row-3 .columna-1>p {
                    font-size: 7pt;
                    margin: 0;
                }

                .cont-row-3 .columna-1>p:first-child {
                    position: relative;
                    left: 2mm;
                    font-size: 10pt;
                    font-weight: 400;
                }
                .cont-row-3 .columna-1>p:nth-child(2) {
                    /* border: solid 2px red; */
                    width: 120px;
                }

                .cont-row-3 .columna-2 {
                    position: relative;
                    left: 35mm;
                }

                .cont-row-3 .columna-3 {
                    position: absolute;
                    bottom: 42.8mm;
                    left: 78.5mm;
                }

                .cont-row-3 .columna-3>p:first-child {
                    position: relative;
                    left: 3mm;
                }

                .cont-row-3 .columna-4 {
                    position: absolute;
                    bottom: 42.8mm;
                    left: 113mm;
                }

                .cont-row-3 .columna-4>p:nth-child(2) {
                    position: relative;
                    left: 1mm;
                }

                .cont-row-3 .columna-5 {
                    position: absolute;
                    bottom: 42.8mm;
                    left: 131mm;
                }

                .cont-row-3 .columna-5>p:first-child {
                    position: relative;
                    left: 2mm;
                }

                .cont-row-3 .columna-6 {
                    position: absolute;
                    bottom: 42.8mm;
                    left: 160mm;
                }

                .cont-row-3 .columna-7 {
                    position: absolute;
                    bottom: 42.8mm;
                    left: 196mm;
                }

                .cont-row-4 {
                    border-bottom: solid 1px rgb(109, 109, 109);
                    position: relative;
                    top: 10.5mm;
                    padding-top: 1mm;
                    padding-bottom: .5mm;
                }

                .cont-row-4 .columna-2 {
                    position: absolute;
                    bottom: 45.6mm;
                    left: 29mm;
                }

                .cont-row-4 .columna-3 {
                    position: absolute;
                    bottom: 45.6mm;
                    left: 78.5mm;
                }

                .cont-row-4 .columna-4 {
                    position: absolute;
                    bottom: 45.6mm;
                    left: 112mm;
                }

                .cont-row-5 {
                    /* border-bottom: solid 1px rgb(109, 109, 109); */
                    position: relative;
                    top: 14mm;
                    padding-top: 1mm;
                    padding-bottom: .5mm;
                }

                .cont-row-5 .columna-2 {
                    position: absolute;
                    bottom: 46.5mm;
                    left: 29mm;
                }

                .cont-row-5 .columna-3 {
                    position: absolute;
                    bottom: 46.9mm;
                    left: 78.5mm;
                }

                .cont-row-5 .columna-4 {
                    position: absolute;
                    bottom: 46.7mm;
                    left: 112mm;
                }
                .text-mayuscula{
                    text-transform: uppercase;
                }
            </style>
            <div class="cont-marco">
                <h4>TEMPORARY VEHICLE REGISTRATION <span>DEALER COPY</span></h4>
                <div class="cont-row-1 cont-row">
                    <div class="columna-1 text-campo">
                        <p>Plate</p>
                        <p><?php echo $id_vehicle;?></p>
                    </div>
                    <div class="columna-2 text-campo">
                        <p>Issue Date</p>
                        <p><?php echo $sale_fecha_format; ?></p>
                    </div>
                    <div class="columna-3 text-campo">
                        <p>Expiration Date</p>
                        <p><?php echo $formattedDateExpires2; ?></p>
                    </div>
                    <div class="columna-4 text-campo">
                        <p>VIN</p>
                        <p><?php echo $vin_vehicle;?></p>
                    </div>

                    <div class="columna-5 text-campo">
                        <p>Plate</p>
                        <p><?php echo $id_vehicle;?></p>
                    </div>
                    <div class="columna-6 text-campo">
                        <p>VIN</p>
                        <p><?php echo $vin_vehicle;?></p>
                    </div>
                </div>
                <div class="cont-row-2 cont-row">
                    <div class="columna-1 text-campo">
                        <p>Year</p>
                        <p><?php echo $year;?></p>
                    </div>
                    <div class="columna-2 text-campo">
                        <p>Make</p>
                        <p><?php echo $make;?></p>
                    </div>
                    <div class="columna-3 text-campo">
                        <p>Model</p>
                        <p><?php echo $model;?></p>
                    </div>
                    <div class="columna-4 text-campo">
                        <p>BodyStyle</p>
                        <p><?php echo $body_style;?></p>
                    </div>
                    <div class="columna-5 text-campo">
                        <p>Color</p>
                        <p><?php echo $major_color;?></p>
                    </div>
                    <div class="columna-6 text-campo">
                        <p>Issue Date</p>
                        <p><?php echo $sale_fecha_format; ?></p>
                    </div>
                    <div class="columna-7 text-campo">
                        <p>Expiration Date</p>
                        <p><?php echo $formattedDateExpires2; ?></p>
                    </div>
                </div>
                <div class="cont-row-3 cont-row">
                    <div class="columna-1 text-campo">
                        <p>Name</p>
                        <p><strong> <?php echo $name_1." ".$name_2;?></strong></p>
                    </div>
                    <!-- <div class="columna-1 text-campo">
                        <p>Name</p>
                        <p><?php // echo $name_1;?></p>
                    </div> -->
                    <div class="columna-2 text-campo">
                        <p>Mailing Address</p>
                        <p><?php echo $adress;?></p>
                    </div>
                    <div class="columna-3 text-campo">
                        <p>City</p>
                        <p><?php echo $city;?></p>
                    </div>
                    <div class="columna-4 text-campo">
                        <p>State</p>
                        <p><?php echo $estado;?></p>
                    </div>
                    <div class="columna-5 text-campo">
                        <p>Zip</p>
                        <p><?php echo $zip;?></p>
                    </div>
                    <div class="columna-6 text-campo">
                        <p>Make</p>
                        <p><?php echo $make;?></p>
                    </div>
                    <div class="columna-7 text-campo">
                        <p>Model</p>
                        <p><?php echo $model;?></p>
                    </div>
                </div>
                <div class="cont-row-4 cont-row">
                    <div class="columna-1 text-campo">
                        <p>Dealer License</p>
                    </div>
                    <div class="columna-2 text-campo">
                        <p>Dealership</p>
                    </div>
                    <div class="columna-3 text-campo">
                        <p>Insurance Company</p>
                    </div>
                    <div class="columna-4 text-campo">
                        <p>Policy / Binder Number</p<>
                    </div>
                </div>
                <div class="cont-row-5 cont-row">
                    <div class="columna-1 text-campo">
                        <p>07614U</p>
                    </div>
                    <div class="columna-2 text-campo">
                        <p>GUERRERO AUTO GROUP LLC</p>
                    </div>
                    <div class="columna-3 text-campo">
                        <p>ALLSTATE</p>
                    </div>
                    <div class="columna-4 text-campo">
                        <p>128861333</p>
                    </div>
                </div>
            </div>

        </div>

        <?php
    }
    ?>

</body>

</html>