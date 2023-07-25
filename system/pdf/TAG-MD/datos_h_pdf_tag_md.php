<?php
    include('../../root_main.php');
?>

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
            height: 95%;
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
    </style>

    <img src="img/img_fondo.jpg" alt="" class="fondo">
    <div class="cont_main">

        <div class="cont-vin-year-make-color">
            <em>
                <span class="vin">VIN <span class="vin-valor">3A4FY58B66T323805</span></span>
                <div class="cont-desde-make">
                    <span class="make">CHRY</span>
                    <span class="color">SILVER</span>
                    <span class="year">2006</span>
                </div>
                
            </em>

        </div>
        <h1>M A R Y L A N D</h1>
        <h2><span>Exp: </span>08/02/23</h2>
        <div class="code_id">C67626D1</div>
    </div>

    <style>
        .cont-footer{
            /* border: solid 1px red; */
            position: absolute;
            bottom: 4.7mm;
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
            bottom: 57mm;
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
        <p>C67626D1</p>
        <p>Exp 08/02/23</p>
    </div>
    <div class="cont-code-expires">
        <p>C67626D1</p>
        <p>Exp 08/02/23</p>
    </div>
    <div class="cont-footer">
        <h3>SOLD BY: ENTERPRISE RAC COMPANY OF MARYLAND LLC</h3>
        <div class="cont-subtitle">
            <p>Cut here -- Keep this seccion with vehicle until registered and plated</p>
            <p><strong>Maryland Temporary Registration Certificate (VR-007)</strong></p>
            <p class="valid">Valid for <span>60</span> days</p>
        </div>
    </div>

    <style>
        .cont-marco{
            /* border: solid 1px red; */
            position: absolute;
            bottom: 36mm;
            left: 6mm;
        }
        .cont-marco p, .cont-marco h4{
            margin: 0;
            font-size: 8pt;
        }
    </style>
    <div class="cont-marco">
        <div class="cont-row-1">
            <h4>Vehicle and Owner Información</h4>
            <div class="columna-1">
                <p>Year: <span>2006</span></p>
                <p>VIN: <span>3A4FY58B66T323805</span></p>
                <p>Owner: <span>CARLOS OSSIRIS TORRES RODRIGUEZ</span></p>
                <p>Co-Owner:</p>
                <p>Address of Purchaser(s) 546 DORIE ST , TX 78220</p>
            </div>
        </div>
    </div>

</body>

</html>