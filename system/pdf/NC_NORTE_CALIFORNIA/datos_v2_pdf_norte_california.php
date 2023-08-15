<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NC_PAG_2</title>
</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@1,700&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap');

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
            bottom: 100mm;
            left: -8.8mm;
        }

        .cont_main>.marco {
            width: 109.5%;
        }

        .cont-items-text {
            /* border: solid 1px red; */
            position: absolute;
            top: 1mm;
            left: 1mm;
            width: 761px;
            height: 188px;
        }

        .cont-items-text h2,
        .cont-items-text p {
            font-size: 8.9pt;
            margin: 0;
        }

        .cont-items-text>.cont-row-1>h2 {
            position: relative;
            left: 110mm;
            top: .5mm;

        }

        .cont-items-text p {
            position: relative;
            left: 1mm;
            top: 1.4mm;
            margin-bottom: .8mm;
        }
        .cont-items-text>.cont-row-1>.columna-2{
            position: relative;
            top: -14mm;
            left: 44.5mm;
        }
        .cont-items-text>.cont-row-1>.columna-3{
            position: relative;
            top: -23.2mm;
            left: 70mm;
        }
        .cont-items-text>.cont-row-1>.columna-3>:first-child{
            position: relative;
            left: 3mm;
        }
        .cont-items-text>.cont-row-1>.columna-4{
            position: relative;
            top: -32.5mm;
            left: 107.5mm;
        }
        .cont-items-text>.cont-row-1>.columna-5{
            position: relative;
            top: -41.5mm;
            left: 147.5mm;
        }



        .cont-items-text>.cont-row-2{
            position: relative;
            top: -31.5mm;

        }
        .cont-items-text>.cont-row-2>h2{
            position: relative;
            top: .4mm;
            left: 1mm;
        }
        .cont-items-text>.cont-row-2>.columna-2{
            position: relative;
            top: -17mm;
            left: 70mm;
        }

        .cont-items-text>.cont-row-3{
            position: relative;
            top: -34.4mm;

        }
        .cont-items-text>.cont-row-3>h2{
            position: relative;
            top: .4mm;
            left: 86mm;
        }
        .cont-items-text>.cont-row-3>.columna-2{
            position: relative;
            top: -4.5mm;
            left: 70mm;
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
        $formattedDateExpires2 = $expires->format('d/m/Y');
        $formattedDateExpiresMes = $expires->format('m');
        $formattedDateExpiresDia = $expires->format('d');
        $formattedDateExpiresAño = $expires->format('y');

        
        $id = implode(' ', str_split($id_vehicle));


        ?>

    <div class="cont_main">
        <img src="img/img_marco_nc.png" alt="" class="marco">

        <div class="cont-items-text">
            <div class="cont-row-1">
                <h2>Vehicle and Owner Information</h2>
                <div class="columna-1">
                    <p>Year: <span><?php echo $year;?></span></p>
                    <p>Vin: <span><?php echo $vin_vehicle;?></span></p>
                    <p>Address: <span style="text-transform: uppercase;"><?php echo $adress;?> <?php echo $city;?>, <?php echo $estado;?> <?php echo $zip;?></span></p>
                </div>
                <div class="columna-2">
                    <p>Make: <span><?php echo $make;?></span></p>
                    <p>Odometer:</p>
                </div>
                <div class="columna-3">
                    <p>Model: <span style="text-transform: uppercase;"><?php echo $model;?></span></p>
                    <p>State to be titled:</p>
                </div>
                <div class="columna-4">
                    <p>Color: <span><?php echo $major_color;?></span></p>
                    <p>Owner: <span style="text-transform: uppercase;"><?php echo $name_1;?> <?php echo $name_2;?></span></p>
                </div>
                <div class="columna-5">
                    <p>State Licensed: <span></span></p>
                </div>
            </div>
            <div class="cont-row-2">
                <h2>Dealer and Insurance Information</h2>
                <div class="columna-1">
                    <p>Daeler Name: <span>POWERPLAY MOTORS LLC</span></p>
                    <p>I certify under penalty of law that the vehicle noted on the face hereof is covered by at least
                        the minimun amounts of insurance required by Pennsylvania Motor Vehicle Laws and that I have no
                        outstanding violations with the Motor Vehicle Administration. I furthe certify under penalty of
                        perjury, that the statemens made herein are true and correct to the best of my knowledge,
                        information and belief.</p>
                </div>
                <div class="columna-2">
                    <p>Daeler ID: <span>P162604</span></p>
                </div>
            </div>
            <div class="cont-row-3">
                <h2>Signatures and Date</h2>
                <div class="columna-1">
                    <p>Owner:<span></span></p>
                </div>
                <div class="columna-2">
                    <p>Dealer ship:<span><?php echo $sale_fecha_format;?></span></p>
                </div>
            </div>

        </div>
    </div>
    <?php
    }
    ?>

</body>

</html>