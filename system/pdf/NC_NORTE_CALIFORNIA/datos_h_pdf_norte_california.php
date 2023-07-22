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
        }
        .cont_main>.img_marco{
            position: absolute;
            top: 6mm;
        }
        .code_id{
            position: absolute;
            top: 62mm;
            left: 37mm;
            font-size: 106.2pt;
            font-family: 1100;
            font-family: 'Lato', sans-serif;
        }
        .text-norte_calif{
            position: absolute;
            bottom: 0;
        }
        .img_text_NC{
            position: absolute;
            bottom: -3mm;
            left: 59mm;
        }


        .cont-day{
            /* border: solid 1px red; */
            position: absolute;
            top: 10mm;
            left: 2.5mm;
            width: 100px;
            height: 285px;
            text-align: center;
        }
        .cont-day>p{
            color: white;
            font-weight: 700;
            font-size: 19.1pt;
            margin: 0;
            /* border: solid 1px blue; */
        }
        .cont-day>.p-bottom{
            position: relative;
            bottom: -25mm;
        }
        .cont-day>h3{
            /* border: solid 1px blue; */
            font-size: 18.1pt;
            font-weight: 400;
            position: relative;
            top: 10mm;
            left: -.5mm;
        }

        .expire-day1>h3{
            font-size: 18pt;
        }
        
        .expire-day1>.p-top{
            font-size: 20pt !important;
        }
        .expire-day1>.p-bottom{
            font-size: 19pt;
        }


        .cont-day2{
             position: absolute;
            top: 10mm;
            right: 4.4mm;
            width: 100px;
            height: 285px;
            text-align: center;
        }
        .cont-day2>p{
            color: white;
            font-weight: 700;
            font-size: 19.1pt;
            margin: 0;
            /* border: solid 1px blue; */
        }
        .cont-day2>.p-bottom{
            position: relative;
            bottom: -25mm;
        }

        .cont-day2>h3{
            /* border: solid 1px blue; */
            font-size: 18.1pt;
            font-weight: 400;
            position: relative;
            top: 10mm;
            left: -.5mm;
        }
        .expire-day2>h3{
            font-size: 18pt;
        }
        
        .expire-day2>.p-top{
            font-size: 20pt !important;
        }
        .expire-day2>.p-bottom{
            font-size: 19pt;
        }

        .QR{
            z-index: 999;
            position: absolute;
            top: -7.5mm;
            right: 3mm;
            /* border: solid 1px red; */
            width: 230px;
        }

    </style>

    <div class="cont_main">
        <img src="img/QR.png" alt="" class="QR">
        <img  class="img_marco" src="img/img_marco-1_nc.png" alt="">
        <h1 class="code_id">4 9 8 4 1 3 7 3</h1>
        <h1 class="code_id" style="font-size: 106.4pt;">4 9 8 4 1 3 7 3</h1>
        <img class="img_text_NC" src="img/img_text_NC.png" alt="">

        <div class="cont-day">
            <p>60-DAY</p>
            <h3>EXPIRE DATE</h3>
            <p class="p-bottom">60-DAY</p>
        </div>
        <div class="cont-day expire-day1">
            <p class="p-top">60-DAY</p>
            <h3>EXPIRE DATE</h3>
            <p class="p-bottom">60-DAY</p>
        </div>

        <div class="cont-day2">
            <p>60-DAY</p>
            <h3>EXPIRE DATE</h3>
            <p class="p-bottom">60-DAY</p>
        </div>
        <div class="cont-day2 expire-day2">
            <p class="p-top">60-DAY</p>
            <h3>EXPIRE DATE</h3>
            <p class="p-bottom">60-DAY</p>
        </div>

        <style>
            .cont-date-center{
                position: absolute;
                top: 15mm;
                left: 40mm;
            }
            .cont-date-center>strong{
                font-size: 135.2pt;
                position: relative;
            }
            .cont-date-center>strong:nth-child(2){
               left: 25mm;
            }
            .cont-date-center>strong:nth-child(3){
               left: 50mm;
            }
            .cont-date-center2>strong{
                font-size: 135.4pt;
            }
        </style>

        <div class="cont-date-center">
            <strong>04</strong>
            <strong>21</strong>
            <strong>23</strong>
        </div>
        <div class="cont-date-center cont-date-center2">
            <strong>04</strong>
            <strong>21</strong>
            <strong>23</strong>
        </div>



        <style>
            .cont-datos{
                position: absolute;
                /* border: solid 2px red; */
                left: 30mm;
                top: 8.7mm;
                width: 909px;
                height: 280px;
                padding-left: .5mm;
            }
            .cont-datos>div>p, .cont-datos>div>strong{
                margin: 0;
            }
            .cont-datos>div>p{
                font-size: 9pt;
            }
            .cont-datos>div>strong{
                font-size: 15.5pt;
            }
            .comluna-1{
                position: absolute;
            }
            .comluna-1>strong{
                position: relative;
                left: 4mm;
            }
            .cont-datos>.estilos-2-1>strong{
                font-size: 15.6pt;
            }
            .comluna-2{
                position: absolute;
                left: 136.5mm;
            }
            .comluna-2>strong{
                position: relative;
                left: 2mm;
                bottom: -1mm;
                font-size: 10pt !important;
            }
            .comluna-3{
                position: absolute;
                top: 62.5mm;
            }
            .comluna-3>strong{
                position: relative;
                left: 2mm;
                top: -1mm;
            }
            .comluna-4{
                position: absolute;
                left: 58.5mm;
                top: 62.5mm;
            }
            .comluna-4>strong{
                position: relative;
                left: 1mm;
                top: -1mm;
            }
            .comluna-5{
                position: absolute;
                top: 62.5mm;
                left: 82mm;
            }
            .comluna-5>strong{
                position: relative;
                left: 8mm;
                top: -1mm;
            }
            .comluna-6{
                position: absolute;
                top: 62.5mm;
                left: 183mm;
            }
            .comluna-6>strong{
                position: relative;
                top: -1mm;
                left: 1mm;
            }

        </style>
        <div class="cont-datos">
            <div class="comluna-1">
                <p>DEALER NAME</p>
                <strong>POWERPLAY MOTORS LLC</strong>
            </div>
            <div class="comluna-1 estilos-2-1">
                <p>DEALER NAME</p>
                <strong>POWERPLAY MOTORS LLC</strong>
            </div>
            <div class="comluna-2">
                <p>ADDRESS</p>
                <strong>4831 CASTLE HAYBE RD CASTLE HAYNE, NC 28429</strong>
            </div>
            <div class="comluna-2 estilos-2-2">
                <p>ADDRESS</p>
                <strong>4831 CASTLE HAYBE RD CASTLE HAYNE, NC 28429</strong>
            </div>
            <div class="comluna-3">
                <p>MAKE</p>
                <strong>NISS</strong>
            </div>
            <div class="comluna-3 estilos-2-3">
                <p>MAKE</p>
                <strong>NISS</strong>
            </div>

            <div class="comluna-4">
                <p>YEAR</p>
                <strong>2007</strong>
            </div>
            <div class="comluna-4 estilos-2-4">
                <p>YEAR</p>
                <strong>2007</strong>
            </div>

            <div class="comluna-5">
                <p>VIN #</p>
                <strong>1N6BA06A77N215777</strong>
            </div>
            <div class="comluna-5">
                <p>VIN #</p>
                <strong>1N6BA06A77N215777</strong>
            </div>

            <div class="comluna-6">
                <p>ISSUED MOUTH DAY YEAR</p>
                <strong>02-20-2023</strong>
            </div>
            <div class="comluna-6">
                <p>ISSUED MOUTH DAY YEAR</p>
                <strong>02-20-2023</strong>
            </div>
            <style>
                .comluna-7{
                    position: absolute;
                    top: 56mm;
                    left: 33mm;
                }
                .comluna-7>.day{
                    position: relative;
                    left: 85mm;
                    top: -3.9mm;
                }
                .comluna-7>.year{
                    position: relative;
                    left: 165mm;
                    top: -7.5mm;
                }
            </style>

            <div class="comluna-7">
                <p>MOUTH</p>
               <p class="day">DAY</p>
               <p class="year">YEAR</p>
            </div>
            <div class="comluna-7">
                <p>MOUTH</p>
               <p class="day">DAY</p>
               <p class="year">YEAR</p>
            </div>

        </div>

    </div>

</body>

</html>