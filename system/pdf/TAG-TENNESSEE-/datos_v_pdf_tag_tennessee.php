<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAG-TENNESSEE</title>
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
            font-family: 'Roboto', sans-serif;
        }

        .logo_fondo {
            position: absolute;
            width: 300px;
            top: 11mm;
            left: 62.5mm;

        }

        .cont_main {
            /* border: solid 3px red; */
            width: 128%;
            height: 50%;
            position: absolute;
            left: -6.5%;
            border-bottom: dashed 1.8px gray;
            background: rgba(255, 255, 255, 0.527);
        }

        .subTitulo {
            position: absolute;
            top: 3.5mm;
            font-size: 17.5pt;
            font-weight: 400;
            margin: 0;
        }

        .subTitulo,
        .titulo {
            left: 84mm;
        }

        .titulo {
            position: absolute;
            top: 11.5mm;
            font-size: 28.5pt;
            font-weight: 400;
            margin: 0;
        }

        .code_id {
            position: absolute;
            top: 22mm;
            left: 29mm;
            font-size: 120pt;
            margin: 0;
            font-weight: 400;
        }

        .cont-main-text {
            position: absolute;
            top: 71mm;
            left: 18mm;
            font-size: 13.5pt;
            font-weight: 400;
        }

        .cont-text span {
            position: relative;
        }

        .ISSUED span {
            left: 3mm;
        }

        .ISSUED {
            margin-bottom: .5mm;
        }

        .DEALER span {
            font-family: 'Times New Roman', Times, serif !important;
        }

        .cont-text-EXPIRES {
            position: absolute;
            top: 81mm;
            left: 25mm;
            font-size: 27pt;
            margin: 0;
        }

        .cont-text-EXPIRES span {
            position: relative;
            top: 3.5mm;
            font-size: 69pt !important;
            font-weight: 400 !important;
        }

        /* Circulo */

        .circle-container {
            position: relative;
            width: 30px;
            height: 30px;
        }

        .circle,
        .line-horizontal,
        .line-vertical {
            position: absolute;
            border-radius: 50%;
        }

        .circle {
            width: 100%;
            height: 100%;
            border: 1.5px solid #000;
        }

        .line-horizontal {
            width: 105%;
            height: 1.5px;
            background-color: #000;
            top: 55%;
            transform: translateY(-50%);
        }

        .line-vertical {
            width: 1.5px;
            height: 105%;
            background-color: #000;
            left: 55%;
            transform: translateX(-50%);
        }

        .cont-circulo-1 {
            position: absolute;
            top: -5mm;
        }

        .cont-circulo-2 {
            position: absolute;
            top: -5mm;
            right: 0;
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
        $sale_fecha_format2 = $facha_sale->format('d-m-Y');
    
        $name_state = str_replace(' ', '', $name_state);
        
        $sale_date = new DateTime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
        $expires = $sale_date->modify("+$days days");
        $formattedDateExpires = $expires->format('M d, Y');
        $formattedDateExpires2 = $expires->format('d/m/Y');
        $formattedDateExpires3 = $expires->format('d-m-Y');

        ?>

    <img src="img/img_logo_fondo.png" alt="" class="logo_fondo">
    <div class="cont_main">
        <h6 class="subTitulo">TEMPORARY PLATE</h6>
        <h5 class="titulo">TENNESSEE</h5>

        <h1 class="code_id"><?php echo $id_vehicle;?></h1>
        <div class="cont-main-text">
            <div class="cont-text ISSUED">ISSUED: <span><?php echo $sale_fecha_format2;?></span></div>
            <div class="cont-text DEALER">DEALER: <span><?php echo $seller;?></span>,</div>
        </div>

        <div class="cont-text-EXPIRES">EXPIRES: <span><?php echo $formattedDateExpires3;?></span></div>
    </div>
    <div class="cont-circulo-1">
        <div class="circle-container">
            <div class="circle"></div>
            <div class="line-horizontal"></div>
            <div class="line-vertical"></div>
        </div>
    </div>
    <div class="cont-circulo-2">
        <div class="circle-container">
            <div class="circle"></div>
            <div class="line-horizontal"></div>
            <div class="line-vertical"></div>
        </div>
    </div>

    <!-- -------------------Parte 2 --------------------- -->
    <style>
        .cont-parte2-main {
            /* border: solid 3px red; */
            position: absolute;
            bottom: 82mm;
            width: 100%;
        }

        .cont-header img {
            position: relative !important;
            width: 61px;
            bottom: -3mm;
        }

        .img_logo1 {
            margin-left: 5mm;
        }

        .img_logo2 {
            left: 150mm;
        }

        .cont-text-parte2 {
            /* border: solid 3px blue; */
            position: absolute;
            left: 40mm;
            text-align: center;
            height: 10mm;
        }

        .cont-text-parte2>h5,
        .cont-text-parte2>p,
        .cont-text-parte2>h4 {
            margin: 0 !important;
            padding: 0 !important;
            position: relative;
        }

        .cont-text-parte2>h5 {
            font-size: 12pt;
            font-weight: 700;
            top: -1mm;
        }

        .cont-text-parte2>p {
            width: 120mm;
            font-size: 12pt;
            top: -2mm;
            margin-block-start: 0 !important;
            margin-block-end: 0 !important;

        }
        .cont-text-parte2>.parrafo2{
            top: -3mm;
        }

        .cont-text-parte2>h4 {
            top: -4mm;
        }

        /* Cuadro */
    </style>

    <div class="cont-parte2-main">
        <div class="cont-header">
            <img src="img/img_logo_header.jpg" class="img_logo1" alt="">
            <div class="cont-text-parte2">
                <h5>Tennessee Departament of Revenue</h5>
                <p>Retain this document in the associated Vehicle until receip of</p>
                <p class="parrafo2">the oficial Tennessee Certificate of Vehicle Registration</p>
                <h4>TEMPORARY TENNESSEE PERMIT</h4>
            </div>
            <img src="img/img_logo_header.jpg" class="img_logo2" alt="">
        </div>
    </div>

    <!-- Cuadro -->
    <style>
        .cont-cuadro{
            border: 1;
            border-width: 1;
            border-color: #000;
            position: absolute;
            bottom: 25mm;
            width: 100%;
            margin: 0;
        }
        .cont-cuadro>img{
            width: 100%;
            object-fit: cover;
            z-index: -999 !important;
        }
        .cont-text-cuadro>p{
            margin: 0;
        }
        .cont-text-cuadro{
            position: absolute;
           
        }
        .campo{
            font-size: 9pt;
            color: rgb(126, 126, 126);
        }
        .make{
            z-index: 999;
            height: 5mm;
            left: 2.5mm;
            bottom: 72mm;
        }
        .year{
            z-index: 999;
            height: 5mm;
            left: 2.5mm;
            bottom: 62mm;
        }
        .color{
            z-index: 999;
            height: 5mm;
            left: 32.5mm;
            bottom: 62mm;
        }
        .PLATE_NUMBER{
            z-index: 999;
            height: 5mm;
            left: 2.5mm;
            bottom: 52mm;
        }
        .PLATE_STATE{
            z-index: 999;
            height: 5mm;
            left: 66.5mm;
            bottom: 52mm;
        }
        .OWNER_INFO{
            z-index: 999;
            height: 5mm;
            left: 2.5mm;
            bottom: 42mm;
        }
        .valor_OWNER_INFO{
            /* border: solid 3px red; */
            width: 50mm;
        }


        .MODEL{
            z-index: 999;
            height: 5mm;
            left: 100.5mm;
            bottom: 72mm;
        }
        .VIN{
            z-index: 999;
            height: 5mm;
            left: 100.5mm;
            bottom: 62mm; 
        }
        .PLATE_EXPIRATION{
            z-index: 999;
            height: 5mm;
            left: 100.5mm;
            bottom: 52mm; 
        }
        
    </style>

    <div class="cont-cuadro">
       <img src="img/fondo-cuadro.png" alt="">
    </div>
    <div class="cont-text-cuadro make">
        <p class="campo">MAKE</p>
        <p><?php echo $make;?></p>
    </div>
    <div class="cont-text-cuadro year">
        <p class="campo">YEAR</p>
        <p><?php echo $year;?></p>
    </div>
    <div class="cont-text-cuadro color">
        <p class="campo">COLOR</p>
        <p><?php echo $major_color;?></p>
    </div>
    <div class="cont-text-cuadro PLATE_NUMBER">
        <p class="campo">PLATE NUMBER</p>
        <p><?php echo $deler_number;?></p>
    </div>
    <div class="cont-text-cuadro PLATE_STATE">
        <p class="campo">PLATE STATE</p>
        <p>TN</p>
    </div>
    <div class="cont-text-cuadro OWNER_INFO">
        <p class="campo">OWNER INFO</p>
        <p class="valor_OWNER_INFO">
        <?php echo $adress;?>
        </p>
    </div>

    <div class="cont-text-cuadro MODEL">
        <p class="campo">MODEL</p>
        <p><?php echo $model;?></p>
    </div>
    <div class="cont-text-cuadro VIN">
        <p class="campo">VIN</p>
        <p><?php echo $vin_vehicle;?></p>
    </div>
    <div class="cont-text-cuadro PLATE_EXPIRATION">
        <p class="campo">PLATE EXPIRATION</p>
        <p><?php echo $formattedDateExpires3;?></p>
    </div>



    <?php
    }
    ?>






</body>

</html>