<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF - Vehicle</title>
</head>

<body>

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Makasar&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Lora:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lora:wght@700&family=PT+Serif&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Bacasime+Antique&display=swap'); */

        /* @font-face {
    font-family: 'arialsys';
    src: url('fonts/arial_bold.ttf') format('truetype');
    } */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
            color: rgba(0, 0, 0, 0.884);
            font-weight: lighter !important;
        }
        

        .title-v {
            z-index: 1;
            border-bottom: solid 1px black;
            width: 100%;
            text-align: center;
            font-size: 24px;
            font-weight: bold !important;
            font-family: 'Times New Roman', Times, serif !important;
        }

        .fondo-marca {
            z-index: -1;
            position: absolute;
            top: 20mm;
            left: 2mm;
            width: 100%;

        }

        .cont-text {
            position: absolute;
            top: 15mm;
            font-size: 11pt;
        }


        .cont-number {
            left: 5mm;
            margin-right: 5mm;
        }

        .cont-number span {
            margin-left: 23mm !important;
        }

        .cont-expiration {
            right: 27mm;
        }

        .cont-expiration span {
            margin-left: 10mm !important;
        }

        .parrafo {
            /* border: solid 3px red; */
            position: absolute;
            top: 20mm;
            left: 5mm;
            width: 165mm;
            font-family: 'Times New Roman', Times, serif !important;
        }

        .cont-datos {
            position: absolute;
            top: 42.5mm;
            left: 5mm;
            
        }

        .cont-datos .cont-text-info {
            margin-bottom: .5mm;
        }

        .cont-datos .cont-text-info span {
            position: relative;
            /* font-size: 10pt; */
        }

        .cont-datos .issuDate span {
            left: 22.5mm;
        }

        .cont-datos .vin span {
            left: 35.5mm;
        }

        .cont-datos .year span {
            left: 34mm;
        }

        .cont-datos .make span {
            left: 32.5mm;
        }

        .cont-datos .majorColor span {
            left: 21mm;
        }

        /* Estilos de los datos desde el body style */
        .cont-datos-2 {
            /* border: solid 3px red; */
            position: absolute;
            top: 52.5mm;
            left: 98mm;
        }

        .cont-datos-2 .cont-text-info-2 {
            margin-bottom: .5mm;
        }

        .cont-datos-2 .cont-text-info-2 span {
            position: relative !important;
            font-size: 11pt;
        }

        .cont-datos-2 .bodyStyle span {
            left: 17mm;
        }

        .cont-datos-2 .model span {
            left: 25mm;
        }

        .cont-datos-2 .minorColor span {
            left: 15mm;
        }

        /* Estilos de los datos desde el Issuing Dealer */
        .cont-datos-3 {
            position: absolute;
            top: 80mm;
            left: 17mm;
        }

        .cont-datos-3 .cont-text-info-3 {
            margin-bottom: .5mm;
        }

        .cont-datos-3 .cont-text-info-3 span {
            position: relative !important;
            font-size: 11pt;
        }

        .cont-datos-3 .issuingDealer span {
            left: 51mm;
        }

        .cont-datos-3 .dealerNumber span {
            left: 50.5mm;
        }


        /* Estilos de los datos desde el Issuing Dealer */
        .cont-datos-4 {
            position: absolute;
            top: 95mm;
            left: 17.5mm;
        }

        .cont-datos-4 .cont-text-info-4 {
            margin-bottom: .5mm;
        }

        .cont-datos-4 .cont-text-info-4 span {
            position: relative !important;
            font-size: 11pt;
        }

        .cont-datos-4 .model span {
            left: 63mm;
        }

        .cont-datos-4 .minorColor span {
            left: 62mm;
        }

        .title-fin-pdf {
            position: absolute;
            bottom: 125mm;
            left: 75mm;
            /* font-weight: 400; */
            font-size: 15pt;
            font-family: 'Times New Roman', Times, serif !important;
        }
        
    </style>

    <h1 class="title-v">BUYER'S TAG RECEIPT - DEALER'S COPY</h1>
    <div class="cont-text cont-number">Tag Number: <span>5137NS6</span></div>
    <div class="cont-text cont-expiration">Expiration Date: <span>AUG 28, 2023</span></div>

    <p class="parrafo">Give buyer's receipt to buyer. PLACE THIS DEALER'S COPY IN SALES FILE.<br>
        It is part of the sales records required to be kept and subject to inspection by TxDMV. Verify this
        information before distributing copies:</p>

    <div class="cont-datos">
        <div class="cont-text-info issuDate">Issue Date: <span>Jun 29, 2023</span></div>
        <div class="cont-text-info vin">VIN: <span>1C3CDZAB8CN214929</span></div>
        <div class="cont-text-info year">Year: <span>2012</span></div>
        <div class="cont-text-info make">Make: <span>DODG</span></div>
        <div class="cont-text-info majorColor">Major Color: <span>ORANG</span></div>
    </div>
    <div class="cont-datos-2">
        <div class="cont-text-info-2 bodyStyle">Body Style: <span>LL</span></div>
        <div class="cont-text-info-2 model">Model: <span>AVE</span></div>
        <div class="cont-text-info-2 minorColor">Minor Color: <span></span></div>
    </div>
    <div class="cont-datos-3">
        <div class="cont-text-info-3 issuingDealer">Issuing Dealer: <span>HOUSTON AUTO MOTION</span></div>
        <div class="cont-text-info-3 dealerNumber">Dealer Number:<span>P162053</span></div>
    </div>
    <div class="cont-datos-4">
        <div class="cont-text-info-4 purchaser">Purchaser </div>
        <div class="cont-text-info-4 model">Name 1:<span>REIKITO DIAZ</span></div>
        <div class="cont-text-info-4 minorColor">Address:<span>4550 WILLOW MEMPHIS, TN 38115</span></div>
    </div>
    <div class="title-fin-pdf">DEALER'S TAG-</div>

    <img class="fondo-marca" src="../img/texas/texas-nueva/imgFondoP2.jpg" alt="">

</body>

</html>