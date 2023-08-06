<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAG-NEVADA</title>
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lugrasimo&display=swap');
        @font-face {
        font-family: 'bookman';
        src: url('fonts/bookman/Bookman-Bold.ttf') format('truetype');
        font-weight: 700;
        }
        @font-face {
        font-family: 'Dancing_Script';
        src: url('fonts/Dancing_Script/DancingScript-VariableFont_wght.ttf') format('truetype');
        font-weight: 700;
        }
        @font-face {
        font-family: 'lugrasimo';
        src: url('fonts/Lugrasimo/Lugrasimo-Regular.ttf') format('truetype');
        font-weight: 400;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 400;
        }
        .titulo{
            font-size: 36pt;
            position: absolute;
            top: -21mm;
            left: 96.5mm;
        }
        .contenedor-1{
            border: solid 1.8px rgb(146, 146, 146);
            width: 89.5%;
            position: absolute;
            top: 3.5mm;
            left: 4%;
            padding: 2mm;
        }
        .contenedor-1>h5{
            position: relative;
            top: -1.5mm;
            left: 70mm;
            font-size: 20.1pt;
            margin: 0;
        }

        .cont-vin-year-make-model{
            position: relative;
            top: -1mm;
        }
        .cont-vin-year-make-model>span>strong{
            font-weight: 700;
            position: relative;
        }
        .cont-vin-year-make-model>span{
            font-size: 16pt;
        }
        .cont-vin-year-make-model>.vin>strong{
            left: 3mm;
        }
        .cont-vin-year-make-model>.year{
            position: relative;
            left: 12.5mm;
        }
        .cont-vin-year-make-model>.make{
            position: relative;
            left: 14.5mm;
        }
        .cont-vin-year-make-model>.model{
            position: relative;
            left: 19.5mm;
        }

        .code-id{
            position: relative;
            top: -2.5mm;
            left: -.5mm;
            margin: 0;
            font-weight: 700;
            font-size: 120pt;
        }

        .cont-section-espires{
            position: relative;
            top: -5mm;
        }
        
        .cont-section-espires>p{
            margin: 0;
            font-size: 16.2pt;
            margin-bottom: -.3mm;
        }
        .cont-section-espires>p>span{
            position: relative;
            font-weight: 700;
        }
        .cont-section-espires>.Expiration{
            font-size: 27.5pt !important;
            margin-bottom: -1mm;
        }
        .cont-section-espires>.Expiration>span{
            left: 14mm;
            font-size: 38.5pt;
        }
        .cont-section-espires>.issueDate>span{
            left: 32mm;
        }
        .cont-section-espires>.dealer_name>span{
            left: 25mm;
        }
        .cont-section-espires>.dealer_number>span{
            left: 16.5mm;
        }
        .cont-section-espires>.dealer_number{
            margin-bottom: -2mm;
        }
        .img_placa{
            position: absolute;
            top: 59mm;
            right: 3mm;
            width: 185px;
            height: 160px;
            border: solid 1.8px rgb(146, 146, 146);
            padding: 0 3mm;
            padding-top: 1.5mm;
            object-fit: cover;
            overflow: hidden;
        }
        .cont-placa-img{
            position: absolute;
            top: 59mm;
            right: 3mm;
            width: 188px;
            height: 160px;
        }
        .cont-placa-img>p{
            position: relative;

        }
        .cont-placa-img>.expiration{
            font-weight: 700;
            font-size: 22pt;
            top: 5%;
            left: 12%;
        }
        .cont-placa-img>.code-id-1{
            font-size: 12.5pt;
            font-weight: 700;
            top: 15%;
            left: 33%;
        }
        .cont-placa-img>.code-id-2{
            font-size: 17.5pt;
            top: 6%;
            left: 9%;
        }
        .parrafo_subtitulo{
            position: absolute;
            top: 107.5mm;
            left: 87.5mm;
            font-size: 10pt;
        }
        .contenedor-2{
            border: solid 1.8px rgb(146, 146, 146);
            width: 89.5%;
            height: 118.5px !important;
            position: absolute;
            top: 117mm;
            left: 4%;
            padding: 2mm;
        }


        .cont-columna-1>div>p, .cont-columna-1>div>strong,
        .cont-columna-2>div>p, .cont-columna-2>div>strong,
        .cont-columna-3>div>p, .cont-columna-3>div>strong,
        .cont-columna-4>div>p, .cont-columna-4>div>strong,
        .cont-columna-5>div>p, .cont-columna-5>div>strong,
        .cont-columna-6>div>p, .cont-columna-6>div>strong,
        .cont-columna-7>div>p, .cont-columna-7>div>strong,
        .cont-columna-8>div>p, .cont-columna-8>div>strong,
        .cont-columna-9>div>p, .cont-columna-9>div>strong{
            margin: 0;
            margin-bottom: -1mm;
        }
        .cont-columna-1>div>strong,
        .cont-columna-2>div>strong,
        .cont-columna-3>div>strong,
        .cont-columna-4>div>strong,
        .cont-columna-5>div>strong,
        .cont-columna-6>div>strong,
        .cont-columna-7>div>strong,
        .cont-columna-8>div>strong,
        .cont-columna-9>div>strong{
            font-weight: 700;
        }
        .cont-columna-1>div>,
        .cont-columna-2>div>,
        .cont-columna-3>div>,
        .cont-columna-4>div>,
        .cont-columna-5>div>,
        .cont-columna-6>div>,
        .cont-columna-7>div>,
        .cont-columna-8>div>,
        .cont-columna-9>div>{
            font-size: 9.3pt;
        }
        .cont-columna-1>.cont-text,
        .cont-columna-2>.cont-text,
        .cont-columna-3>.cont-text,
        .cont-columna-4>.cont-text,
        .cont-columna-5>.cont-text,
        .cont-columna-6>.cont-text,
        .cont-columna-7>.cont-text,
        .cont-columna-8>.cont-text,
        .cont-columna-9>.cont-text{
            margin-bottom: -.8mm;
        }
        .cont-columna-1>.name>strong{
            font-size: 8pt
        }

        .cont-columna-2,
        .cont-columna-3,
        .cont-columna-5,
        .cont-columna-6,
        .cont-columna-7,
        .cont-columna-8,
        .cont-columna-9{
            position: relative;
        }
        .cont-columna-2{
            top: -21.8mm;
            left: 49.8mm;
        }
        .cont-columna-3{
            top: -15.5mm;
            left: 75.5mm;
        }
        .cont-columna-4{
            position: absolute;
            top: 1.5mm;
            left: 102.5mm;
        }
        .cont-columna-5{
            top: -22.5mm;
            left: 136.5mm;
        }
        .cont-columna-6{
            top: -45mm;
            left: 156mm;
        }
        .cont-columna-7{
            top: -45mm;
            left: 156mm;
        }
        .cont-columna-7>div>strong{
            position: relative;
            left: -5mm;
        }
        .cont-columna-8{
            top: -60mm;
            left: 182.5mm;
        }
        .cont-columna-9{
            top: -75mm;
            left: 205mm;
        }
        .subTitulo{
            position: absolute;
            top: 23.5mm;
            left: 72mm;
            font-size: 22pt;
            margin: 0;
        }
        .text_code_bar{
            position: absolute;
            bottom: 47mm;
            right: 36.5mm;
            font-size: 10pt;
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
        // if ($fecha !== '') {
        //     $fecha_objeto = strtotime($fecha);
        //     $fecha_transformada = date("M d, Y", $fecha_objeto);
        // } else {
        //     $fecha_transformada = '';
        // }
        // echo $fecha_transformada;
    
        $name_state = str_replace(' ', '', $name_state);
        
        $sale_date = new DateTime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
        $expires = $sale_date->modify("+$days days");
        $formattedDateExpires = $expires->format('M d, Y');
        $formattedDateExpires2 = $expires->format('d/m/Y');

        ?>

      <div class="cont-main">
        <h1 class="titulo">NEVADA</h1>
        <div class="contenedor-1">
            <h5>TEMPORARY PLACARD</h5>
            <div class="cont-vin-year-make-model">
                <span class="vin">VIN: <strong><?php echo $vin_vehicle;?></strong></span>
                <span class="year">YEAR: <strong><?php echo $year;?></strong></span>
                <span class="make">MAKE: <strong><?php echo $make;?></strong></span>
                <span class="model">MODEL: <strong><?php echo $model;?></strong></span>
            </div>
            <div class="code-id">NV-182-235</div>
            <div class="cont-section-espires">
                <p class="Expiration">Expiration Date: <span><?php echo $formattedDateExpires2;?></span></p>
                <p class="issueDate">ISSUE DATE: <span><?php echo $sale_fecha_format;?></span></p>
                <p class="dealer_name">DEALER NAME: <span>NEVADA AUTO DEALER</span></p>
                <p class="dealer_number">DEALER NUMBER: <span><?php echo $deler_number;?></span></p>
            </div>
            <img src="img/img-placa.jpg" alt="" class="img_placa">
            <div class="cont-placa-img">
                <p class="code-id-1">NV-182-235</p>
                <p class="expiration"><?php echo $formattedDateExpires2;?></p>
                <p class="code-id-2">NV-182-235</p>
            </div>
            
        </div>
        <p class="parrafo_subtitulo"><em>(Remove below section and keep in the vehicle)</em></p>
        <div class="contenedor-2">
            <div class="cont-columna-1">
                <div class="cont-text issuDate">
                    <p>Issue Date</p>
                    <strong><?php echo $sale_fecha_format;?></strong>
                </div>
                <div class="cont-text name">
                    <p>Owner Name</p>
                    <strong><?php echo $name_1 ." ". $name_2;?></strong>
                </div>
                <div class="cont-text dealer_number">
                    <p>Dealer Number</p>
                    <strong>NEVADA AUTO DEALER</strong>
                </div>
            </div>
            <div class="cont-columna-2">
                <div class="cont-text expiration_date">
                    <p>Expiration Date</p>
                    <strong><?php echo $formattedDateExpires2;?></strong>
                </div>
            </div>
            <div class="cont-columna-3">
                <div class="cont-text dealer_number">
                    <p>Dealer Number</p>
                    <strong><?php echo $deler_number;?></strong>
                </div>
            </div>
            <div class="cont-columna-4">
                <div class="cont-text vin">
                    <p>VIN</p>
                    <strong><?php echo $vin_vehicle;?></strong>
                </div>
                <div class="cont-text adress">
                    <p>Mailing Address</p>
                    <strong><?php echo $adress;?></strong>
                </div>
            </div>
            <div class="cont-columna-5">
                <div class="cont-text placard_number">
                    <p>Placard Number</p>
                    <strong>NV-182-235</strong>
                </div>
            </div>
            <div class="cont-columna-6">
                <div class="cont-text year">
                    <p>Year</p>
                    <strong><?php echo $year;?></strong>
                </div>
            </div>
            <div class="cont-columna-7">
                <div class="cont-text city">
                    <p>City</p>
                    <strong><?php echo $city;?></strong>
                </div>
            </div>
            <div class="cont-columna-8">
                <div class="cont-text make">
                    <p>Make</p>
                    <strong><?php echo $make;?></strong>
                </div>
                <div class="cont-text state">
                    <p>State</p>
                    <strong>TEXAS</strong>
                </div>
            </div>
            <div class="cont-columna-9">
                <div class="cont-text model">
                    <p>Model</p>
                    <strong><?php echo $model;?></strong>
                </div>
                <div class="cont-text zip">
                    <p>Zip</p>
                    <strong><?php echo $zip;?></strong>
                </div>
            </div>

            <h5 class="subTitulo">TEMPORARY PLACARD</h5>
        </div>
        <p class="text_code_bar"><em>Bar Code</em></p>
      </div>

      <?php
    }
    ?>

    
</body>
</html>