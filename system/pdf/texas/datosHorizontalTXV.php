<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet" />
    <title>PDF - Texas Vieja</title>

</head>

<body>

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Arimo:wght@500&display=swap'); */

        /* 
                @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
                @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap'); */
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap'); */




        * {
            font-family: 'Roboto', sans-serif;
        }

        .cont-lineas {
            border-top: solid 1.5px rgb(204, 203, 203);
            border-bottom: solid 1.5px rgb(204, 203, 203);
            z-index: 1;
            position: absolute;
            top: 0;
            left: -12mm;
            width: 110%;
            height: 100%;
        }

        .cont-contenido {
            /* border-top: solid 1.5px rgb(204, 203, 203);
        border-bottom: solid 1.5px rgb(204, 203, 203); */
            z-index: 1;
            position: absolute;
            top: 10mm;
            width: 100%;
            height: 80%;

        }

        .figuraOlas {
            z-index: 1;
            position: absolute;
            width: 100%;
            height: 100%;
        }


        .fondoh {
            z-index: -1;
            /* position: absolute; */
            top: 0;
            width: 100%;
            height: 90%;
            object-fit: contain;
        }

        .cont-row-1 {
            /* border: solid 3px rgb(255, 196, 0); */
        }


        .cont-row-1 h6 {
            /* border: solid 3px red; */
            font-size: 30pt;
            margin: 0;
            font-weight: 400;
        }

        .cont-row-1 .estado {
            /* border: solid 3px rgb(255, 196, 0); */
            position: absolute;
            top: 8mm;
            left: 90mm;
            /* text-shadow: 0 1px 20px rgba(0, 0, 0, 0.3) !important; */
            font-weight: bolder;
            font-family: 'Roboto', sans-serif;
        }

        .text-parrafoMain {
            position: absolute;
            top: 18mm;
            left: 45mm;
            font-size: 14pt;
            font-weight: 700;
            font-family: 'PT Serif', serif;
        }

        .code-id {
            position: absolute;
            top: 20mm;
            left: 18mm;
            font-weight: 700;
            font-size: 199px;
            margin: 0;
        }

        .cont-row-1 .date-vehicle-make {
            position: absolute;
            bottom: 63mm;
            left: 99mm;
            font-size: 39pt;

        }

        .date-vehicle-make span {
            font-weight: 700 !important;
        }

        .date-vehicle-make span,
        .vin-seller>span {
            text-transform: uppercase;

        }

        .span-seller {
            text-transform: capitalize !important;

        }

        .cont-span-seller {
            position: relative !important;
            top: 3.5mm;
        }

        .cont-row-1 .cont-date-expires {
            text-align: center;
        }

        .cont-row-1 .cont-date-expires h5 {
            /* border: solid 3px rgb(255, 196, 0); */
            margin: 0;
            position: absolute;
            bottom: 28mm;
            left: 63mm;
            font-size: 95pt;
            font-weight: 700;
        }

        .cont-date-expires p {
            margin: 0;
            position: absolute;
            bottom: 35mm;
            left: 16mm;
            font-size: 30pt;
            text-transform: capitalize !important;

        }

        .cont-row-1 .vin-seller {
            /* border: solid 3px red; */
            display: block;
            position: absolute;
            bottom: 10mm;
            left: 14mm;
            font-size: 25px;
            font-weight: 600;
            font-family: 'Montserrat';
        }


        .cont-row-1 img {
            position: absolute;
            top: 19mm;
            right: 20mm;
            width: 130px;

        }

        .figuraH {
            position: absolute;
            right: 10mm;
            top: 10mm;
            width: 70px;
        }

        .codeBarra {
            /* border: solid 3px red; */
            position: absolute;
            bottom: 15mm;
            right: 10mm;
            width: 60mm;
            height: 32px;
        }

        .fondoSello {
            z-index: -999;
            position: absolute;
            width: 75mm;
            bottom: 9mm;
            left: 12mm;
        }

        .figuraOla {
            /* border: solid 3px red; */
            position: absolute;
            top: 5mm;
            left: -14mm;
            width: 120%;
            height: 90%;
            margin-top: 20px;
        }
    </style>

    <?php

include('list_register.php');

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
    $name_2 = $item->name_2;
    $adress = $item->adress;
    $city = $item->city;
    $estado = $item->estado;
    $phone = $item->phone;
    $zip = $item->zip;
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



    <div class="cont-contenido">
        <div class="cont-row-1">
            <h6 class="estado">TEXAS BUYER</h6>
            <p class="text-parrafoMain">THE VEHICLE TEMPORARILY REGISTERED WITH TxDMV UNDER TAG #</p>



            <h1 class="code-id">
                <?php echo $id_vehicle ;?>
            </h1>

            <h6 class="date-vehicle-make">
                <?php echo $year;?> <span>
                    <?php echo $make;?>
                </span>
            </h6>
            <div class="cont-date-expires">
                <p>Expires</p>
                <h5>
                    <?php echo  $fecha_transformada;?>
                </h5>
            </div>


            <h6 class="vin-seller">VIN:
                <?php echo $vin_vehicle; ?><br><span class="cont-span-seller"><span class="span-seller">Seller: </span>
                    <?php echo $seller;?>
                </span>
            </h6>



        </div>

        <img src="../img/texas/texas-nueva/Curvas.svg" alt="" class="figuraOla">
        <div class="cont-lineas">

        </div>


        <img src="../img/texas/texas-nueva/imgfigura.png" alt="" class="figuraH">
        <img src="../img/texas/texas-nueva/codeBarra.jpg" alt="" class="codeBarra">
        <img src="../img/texas/texas-nueva/imgFondoP2.jpg" alt="" class="fondoSello">







    </div>
    <?php
}
?>


    <!-- Js Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>



</html>