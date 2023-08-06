<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAG-LOUISIANA-PAG-2</title>
</head>

<body>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .cont_main {
            /* border: solid 1px red; */
            position: absolute;
            top: 20.5mm;
            width: 100%;
        }

        .cont-img-date>img {
            width: 38.7px;
            position: relative;
            left: -2.5mm;
        }

        .cont-img-date>div {
            position: relative;
            top: -1mm;
            left: -2mm;
            display: inline-block;
            margin: 0;
            background: black;
            color: white;
            font-weight: 700;
            font-size: 10pt;
            text-align: center;
            padding: 5px 27px;
            /* border: solid 2px red; */
        }

        .cont-text-title {
            /* border: solid .1px red; */
            position: relative;
            top: -17mm;
            left: 67mm;
            display: inline-block;
            text-align: center;
        }

        .cont-text-title>h1 {
            font-size: 9.5pt;
            font-weight: 400;
            margin-bottom: 20px;
        }

        .cont-text-title>.cont-parrafo>p {
            font-size: 6.5pt;
            margin: 0;
        }

        .cont-text-title>.cont-parrafo>.p-strong {
            margin-bottom: 9px;
        }

        .cont-text-title>.cont-parrafo>.valid {
            position: relative;
            font-size: 5.9pt;
            left: 2mm;
        }


        .cont-marco {
            /* border: solid 1px red; */
            position: relative;
            top: -21mm;
            left: -6.5mm;
        }

        .cont-marco>img {
            width: 109.1%;
        }
    </style>
    
<?php
include('../texas/list_register.php');

$jsonData = json_decode($jsonString);

foreach ($jsonData as $item) {
    $id_vehicle = $item->id_vehicle;
    $vin_vehicle = $item->vin_vehicle;
    $seller = $item->seller;
    $deler_number=$item->deler_number;
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

    <div class="cont_main">
        <div class="cont-img-date">
            <img src="img/img_logo_1.jpg" alt="">
            <div>Exp: 06/24/2022</div>
        </div>
        <div class="cont-text-title">
            <h1>SOLD BY: ADRIANA VILLANUEVA</h1>
            <div class="cont-parrafo">
                <p>Cuthere - Keep this section with vehicle until registered and plated</p>
                <p class="p-strong"><strong>Louisiana Temporary Registration Certificate VR-007)</strong></p>
                <p class="valid"><span>Valid for <?php echo $days;?> days</span></p>
            </div>
        </div>

        <style>
            .cont-row-1 {
                /* border: solid  1px red; */
                position: relative;
                top: -46.95mm;
                left: 1mm;
            }

            .cont-row-1>h2 {
                margin: 0;
                font-size: 6pt;
                position: relative;
                left: 14mm;
            }

            .columna-1>p,
            .columna-2>p,
            .columna-3>P,
            .columna-4>p,
            .columna-5>p,
            .columna-6>p {
                position: relative;
                margin: 0;
                margin-bottom: .8mm;
                font-size: 6.2pt;
            }

            .columna-1>p {
                top: .6mm;
                left: 1mm;
            }

            .columna-2>p {
                top: -16.7mm;
                left: 46mm;
            }

            .columna-3>P {
                top: -23.5mm;
                left: 68.5mm;
            }

            .columna-3>.state {
                margin-left: 5mm;
            }

            .columna-4>p {
                top: -23.5mm;
                left: 58.5mm;
            }

            .columna-5>P {
                top: -37.2mm;
                left: 102.5mm;
            }

            .columna-6>p {
                top: -34.5mm;
                left: 102.5mm;
            }

            /* row 2 */

            .cont-row-2 {
                /* border: solid 1px red; */
                position: relative;
                top: -78mm;
                left: 1mm;
            }

            .cont-row-2>h2 {
                margin: 0;
                font-size: 6pt;
                position: relative;
                left: 1mm;
            }
            .cont-row-2>p{
                position: relative;
                margin: 0;
                margin-bottom: .8mm;
                font-size: 6.2pt;
            }

            .columna-1>.parrafo{
                font-size: 6.5;
                /* border: solid 1px red; */
                width: 105%;
            }
           .cont-row-2>.columna-2>p{
                top: -12mm;
                left: 65mm;
            }

            /* Row 3 */
            .cont-row-3 {
                /* border: solid 1px red; */
                position: relative;
                top: -80.5mm;
                left: 1mm;
            }
            .cont-row-3>h2 {
                margin: 0;
                font-size: 6pt;
                position: relative;
                left: 90mm;
            }
            .cont-row-3>p{
                position: relative;
                margin: 0;
                margin-bottom: .8mm;
                font-size: 6.2pt;
            }
            .cont-row-3>.columna-2>p{
                top: -6.4mm;
                left: 65mm;
            }
            
        </style>



        <div class="cont-marco">
            <img src="img/marco.png" alt="">
            <div class="cont-row-1">
                <h2>Vehicle and OwnerInformation</h2>
                <div class="columna-1">
                    <p class="year">Year: <span><?php echo $year;?></span></p>
                    <p class="vin">Vin: <span><?php echo $vin_vehicle;?></span></p>
                    <p class="owner">Owner: <span><?php echo $name_1;?></span></p>
                    <p class="vehicle">Vehicle and OwnerInformation</p>
                    <p class="adress">Address: <span><?php echo $adress;?></span></p>
                </div>
                <div class="columna-2">
                    <p class="make">Make: <span><?php echo $make;?></span></p>
                    <p class="odmeter">Odometer: <span></span></p>
                </div>
                <div class="columna-3">
                    <p class="model">Model: <span><?php echo $model;?></span></p>
                    <p class="state">State to be titled : <span><?php echo $city;?></span></p>
                </div>
                <div class="columna-4">
                    <p class="drive">Driver ID: <span></span></p>
                    <p class="drive1">Driver ID: <span></span></p>
                </div>
                <div class="columna-5">
                    <p class="color">Color: <span><?php echo $major_color;?></span></p>
                </div>
                <div class="columna-6">
                    <p class="state_licesed">State Licensed: <span></span></p>
                    <p class="state_licesed-2">State Licensed: <span></span></p>
                </div>

            </div>
            <div class="cont-row-2">
                <h2>Dealer and Insurance Information</h2>
                <div class="columna-1">
                    <p class="name">Daeler Name: <span><?php echo $seller;?>,</span></p>
                    <p class="parrafo">I certify under penalty of law that the vehicle noted on the face hereof is
                        covered by at least the minimun amounts of insurance required by Louisiana Motor Vehicle Laws
                        and that I have no outstanding violations with the Motor Vehicle Administration. I furthe
                        certify under penalty of perjury, that the statemens made herein are true and correct to the
                        best of my knowledge, information and belief.</p>
                </div>
                <div class="columna-2">
                    <p class="daeler_id">Daeler ID: <span><?php echo $deler_number;?></span></p>
                </div>
            </div>
            <div class="cont-row-3">
                <h2>Signatures and Date</h2>
                <div class="columna-1">
                    <p class="owner_row_3">Owner:</p>
                    <p class="co_owner_row_3">Co-Owner:</p>
                </div>
                <div class="columna-2">
                    <p class="owner_row_3">Dealership: <span>Date of</span></p>
                    <p class="co_owner_row_3">Delivery: </p>
                </div>
            </div>
            
        </div>
    </div>


    <?php
}
?>

</body>

</html>