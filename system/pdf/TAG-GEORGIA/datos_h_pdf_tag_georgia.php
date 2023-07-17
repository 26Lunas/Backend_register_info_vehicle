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
        left: 46.5mm;
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
        bottom: 38mm;
        left: 59mm;
        font-size: 9.5pt;
        font-weight: 400;
    }
    .cont-expires>h6{
        position: absolute;
        bottom: 25mm;
        left: 24mm;
        font-size: 39.8pt;
        font-weight: 400;
        margin: 0;
    }
    .QR_georgia{
        width: 54px;
        height: 55px;
        position: absolute;
        bottom: 28mm;
        left: 4mm;
    }
    .cont-make{
        position: absolute;
        bottom: 19mm;
        left: 39mm;
        font-size: 12pt;
        font-weight: 400;
    }

    </style>

    <div class="cont-text-title">
        <h6>GEORGIA TEMPORARY LICENSE</h6>
        <P class="vin">KMHDH4AE8DU950810</P>
    </div>
    <div class="code-id">B6821947</div>
    <div class="cont-expires">
        <p>EXPIRES</p>
        <h6>27-SEP-2022</h6>
    </div>
    <img src="img/QR.jpeg" alt="" class="QR_georgia">
    <div class="cont-make">
        <span class="year">2013</span>
        <span class="make">HYUN</span>
        <span class="ELANTRA">ELANTRA</span>
        <span class="color">BLUE</span>
    </div>



</body>

</html>