<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAG-MD</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oxygen&display=swap');

        /* @font-face {
        font-family: 'bookman';
        src: url('<?php echo $ruta_main;?>pdf/fonts/bookman/Bookman Bold.ttf') format('truetype');
        font-weight: 700;
    } */
        * {
            /* font-family: 'Roboto', sans-serif; */
            font-family: Arial, Helvetica, sans-serif !important;
        }

        .fondo {
            position: absolute;
            top: 3%;
            left: 2.5%;
            width: 95%;
            height: 96.9%;
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
            top: 5mm; 
        }

        .cont-vin-year-make-color>em>span {
            font-weight: 400;
            position: relative;

        }

        .cont-vin-year-make-color span {
            font-size: 14.5pt;
        }
        .cont-vin-year-make-color>em>span>.vin-valor{
            position: relative;
            left: 3mm;
        }
        .cont-desde-make{
            position: relative;
            top: -3.5mm;
            left: 90mm;
        }
        .cont-vin-year-make-color>em>.cont-desde-make>.color {
            position: relative;
            left: 18mm;
        }

        .cont-vin-year-make-color>em>.cont-desde-make>.year {
            position: relative;
            left: 62mm;
        }

        .cont_main>h1 {
            position: absolute;
            top: -3mm;
            left: 48mm;
            font-weight: 700;
            font-size: 60pt;
            /* font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif !important; */
        }

        .cont_main>h2 {
            /* border: solid 1px red; */
            position: absolute;
            top: 36mm;
            right: 85mm;
            color: white;
            padding: 8px 45px;
            font-size: 40pt;
            margin: 0;
            font-weight: 700;
        }

        .cont_main>h2>span {
            font-size: 37pt;
        }

        .code_id {
            position: absolute;
            top: 53.5mm;
            right: 16mm;
            font-weight: 700;
            font-size: 140pt;
            font-family: 'Oxygen', sans-serif !important;
        }

        .cont_main>img {
            position: absolute;
            top: 16.5mm;
            left: -7mm;
            width: 155px;
            height: 170px;
        }
        .text-mayuscula{
            text-transform: uppercase;
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
        $sale_fecha_format = $facha_sale->format('m/d/Y');
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
        $formattedDateExpires2 = $expires->format('m/d/y');

        ?>

    <img src="img/img_fondo.jpg" alt="" class="fondo">
    <div class="cont_main">

        <div class="cont-vin-year-make-color">
            <em>
                <span class="vin">VIN <span class="vin-valor"><?php echo $vin_vehicle;?></span></span>
                <div class="cont-desde-make">
                    <span class="make"><?php echo $make;?></span>
                    <span class="color"><?php echo $major_color;?></span>
                    <span class="year"><?php echo $year;?></span>
                </div>
                
            </em>

        </div>
        <h1>M A R Y L A N D</h1>
        <h2><span>Exp: </span><?php echo $formattedDateExpires2;?></h2>
        <div class="code_id"><?php echo $id_vehicle;?></div>
    </div>

    <style>
        .cont-footer{
            /* border: solid 1px red; */
            position: absolute;
            bottom: 3.5mm;
            left: 6mm;
            height: 310px;
            width: 100%;
        }
        .cont-footer>h3{
            font-weight: 400;
            position: relative;
            left: 42mm;
            top: .5mm;
            font-size: 15.5pt;
        }
        .cont-footer>.cont-subtitle{
            position: relative;
            top: -2.5mm;
            left: -4mm;
            text-align: center;
        }
        .cont-footer>.cont-subtitle>p>strong{
            position: relative;
            left: -6mm;
        }
        .cont-footer>.cont-subtitle>.valid{
            font-size: 10.1pt;
            margin: 0;
            left: -1mm;
        }
        .cont-footer>.cont-subtitle>p{
            font-size: 10pt;
            margin: 0;
        }

        .cont-code-expires{
            /* border: 1px solid red; */
            position: absolute;
            bottom: 55mm;
            left: 30mm;
           
        }
        .cont-code-expires>p{
            margin: 0;
            color: white;
            font-weight: 400;
        }
        .cont-code-expires>p:first-child{
            position: relative;
            left: 4mm;
            top: -1mm;
        }
        .cont-code-expires>p:nth-last-child(2){
            position: relative;
            left: -6mm;
            bottom: -.6mm;
        }
    </style>

    <div class="cont-code-expires">
        <p><?php echo $id_vehicle;?></p>
        <p>Exp <?php echo $formattedDateExpires2;?></p>
    </div>
    <div class="cont-code-expires">
        <p><?php echo $id_vehicle;?></p>
        <p>Exp <?php echo $formattedDateExpires2;?></p>
    </div>
    <div class="cont-footer">
        <h3>SOLD BY: ENTERPRISE RAC COMPANY OF MARYLAND LLC</h3>
        <div class="cont-subtitle">
            <p>Cut here -- Keep this seccion with vehicle until registered and plated</p>
            <p><strong>Maryland Temporary Registration Certificate (VR-007)</strong></p>
            <p class="valid">Valid for <span><?php echo $days;?></span> days</p>
        </div>
    </div>

    <style>
        .cont-marco{
            /* border: solid 1px red; */
            position: absolute;
            bottom: 0;
            left: 6mm;
            padding-left: .5mm;
            height: 206px;
            width: 95%;
        }
        .cont-marco p, .cont-marco h4{
            margin: 0;
            font-size: 8.71pt;
            font-weight: 400;
        }
        .cont-marco>.cont-row-1>h4{
            position: relative;
            left: 5mm;
            bottom: -.5mm;
        }
        .cont-marco p{
            margin-bottom: .3.5mm;
        }
        .cont-marco>.cont-row-1>.columna-1>.address{
            position: relative;
            left: 2.5mm;
        }
        .cont-marco>.cont-row-1>.columna-1>p>span{
            position: relative;
        }
        .cont-marco>.cont-row-1>.columna-1>p>.year{
           left: 6mm;
        }
        .cont-marco>.cont-row-1>.columna-1>p>.vin{
            left: 7mm;
        }
        .cont-marco>.cont-row-1>.columna-1>p>.owner{
            left: 3mm;
        }

        .columna-2{
            position: relative;
            left: 64mm;
            top: -20mm;
        }
        .columna-3{
            position: relative;
            left: 121mm;
            top: -27.9mm;
        }
        .columna-4{
            position: relative;
            left: 89mm;
            top: -28.5mm;
        }
        .columna-5{
            position: relative;
            left: 181.7mm;
            top: -44mm;
        }
        .columna-6{
            position: relative;
            left: 176.5mm;
            top: -44.5mm;
        }

        .cont-marco>.cont-row-2{
            position: relative;
            top: -41mm;
        }
        .cont-marco>.cont-row-2>h4{
            font-weight: 700;
        }
        .cont-marco>.cont-row-2>.columna-1>p:first-child>span{
            position: relative;
            left: 20mm;
        }
        .cont-marco>.cont-row-2>.columna-2{
            position: relative;
            top: -15.6mm;
            left: 121.1mm;
        }
        .cont-marco>.cont-row-2>.columna-2>p>span{
            position: relative;
            left: 24.5mm;
        }

        .cont-marco>.cont-row-3{
            position: relative;
            top: -45mm;
        }
        .cont-marco>.cont-row-3>h4{
            font-weight: 700;
            position: relative;
            left: 105mm;
        }
        .cont-marco>.cont-row-3>.columna-2{
            position: relative;
            top: -8mm;
            left: 121.1mm;
        }
        .cont-marco>.cont-row-3>.columna-2>p:nth-last-child(2)>span{
            position: relative;
            left: 15.5mm;
        }
    </style>



    <div class="cont-marco">
        <div class="cont-row-1">
            <h4>Vehicle and Owner Información</h4>
            <div class="columna-1">
                <p>Year: <span class="year"><?php echo $year;?></span></p>
                <p>VIN: <span class="vin"><?php echo $vin_vehicle;?></span></p>
                <p>Owner: <span class="owner text-mayuscula"><?php echo $name_1 ." ". $name_2;?></span></p>
                <p>Co-Owner:</p>
                <p class="address text-mayuscula"><?php echo "$adress $city $estado $zip";?></p>
            </div>
            <div class="columna-2">
                <p>Make: <span><?php echo $make;?></span></p>
                <p>Odometer: <span>000000</span></p>
            </div>
            <div class="columna-3">
                <p>Model: <span class="text-mayuscula"><?php echo $model;?></span></p>
                <p>State to be titled: <span class="text-mayuscula"><?php echo $body_style;?></span></p>
            </div>
            <div class="columna-4">
                <p>Driver ID:</p>
                <p>Driver ID:</p>
            </div>
            <div class="columna-5">
                <p>Color 1: <span><?php echo $major_color;?></span></p>
                <p>Color: <span><?php echo $minor_color;?></span></p>
            </div>
            <div class="columna-6">
                <p>State Licensed:</p>
                <p>State Licensed:</p>
            </div>
        </div>
        <div class="cont-row-2">
            <h4>Dealer and Insurance Information</h4>
            <div class="columna-1">
                <p>Dealer Name: <span>ENTERPRISE RAC COMPANY OF MARYLAND LLC</span></p>
                <p>I certify under penalty of law that the vehicle noted on the face hereof is covered by at least the minimum amounts of insurance required by the Maryland Motor Vehicle Laws and that I have no
                    outstanding violations with the Motor Vehicle Administration. I further certify under penalty of perjury, that the statements made herein are true and correct to the best of my knowledge,
                    information and belief.</p>
            </div>
            <div class="columna-2">
                <p>Dealer ID: <span><?php echo $deler_number;?></span></p>
            </div>
        </div>
        <div class="cont-row-3">
            <h4>Signatures and Date</h4>
            <div class="columna-1">
                <p>Owner: <span class="text-mayuscula"></span></p>
                <p>Co-Owner: <span class="text-mayuscula"></span></p>
            </div>
            <div class="columna-2">
                <p>Dealership:</p>
                <p>Date of Delivery: <span><?php echo $sale_fecha_format;?></span></p>
            </div>
        </div>
    </div>

    <?php
    }
    ?>

</body>

</html>