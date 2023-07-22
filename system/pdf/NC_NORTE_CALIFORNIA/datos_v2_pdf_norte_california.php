<?php
    include('../../root_main.php');
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NC_PAG_1</title>
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
            top: 0;
            left: -7.5mm;
        }
        .cont_main>.marco{
            width: 105%;
        }

    </style>

    <div class="cont_main">
        <img src="img/img_marco_nc.png" alt="" class="marco">
    </div>

</html>