<?php
    include('../../root_main.php');
?>

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
    <div class="cont_main">
        <div class="cont-header">
            <h6>Georgia Department of Revenue</h6>
            <p>Georgia Temporary License Number: <span>20799501</span></p>
        </div>
        <div class="cont-vin-tim">
            <p class="vin">Vin: <span>KMHDH4AE8DU950810</span></p>
            <p class="tim">Trim: <span></span></p>
        </div>
        <div class="cont-name-adress">
            <p class="subTitle">Temporary Registrant Information</p>
            <p class="name">DIANA JUDITH RODRIGUEZ GUZMAN</p>
            <p class="adress">10201 FALCÓN # 302 MOSS LANE 32832</p>
        </div>
        <div class="cont-year-make">
            <p class="year">Year.: <span>2013</span></p>
            <p class="make">Make: <span>HYUN</span></p>
        </div>
        <div class="cont-color-model">
            <p class="color">Color: <span>BLUE</span></p>
            <p class="model">Model: <span>ELANTRA</span></p>
        </div>
        <div class="cont-countryInformation">
            <p class="subTitle">Country Information</p>
            <p class="seller">PRIME AUTO FINANCE,</p>
            <p class="nose">1926 HYANNIS CT</p>
            <p class="nose2">COLLEGE PARK, GA 30337</p>
        </div>
    </div>


</body>

</html>