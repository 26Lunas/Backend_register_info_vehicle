
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>PDF - Texas Buyer</title>
</head>

<body>

    <style>
     @import url('https://fonts.googleapis.com/css2?family=Arimo:wght@500&display=swap');
     


    * {
        font-family: 'Arimo', sans-serif;
    }
    .cont-borders{
        position: absolute;
        left: -12mm;
        border-bottom: solid 2px #d9dbd8;
        border-top: solid 2px #d9dbd8;
        width: 110%;
        height: 80%;
    }

    .fondoh{
        /* border: solid 3px red; */
        z-index: -1;
        position: absolute;
        top: 16mm;
        width: 100%;
        height: 80%;
        object-fit: contain;
    }

    .cont-contenido {
        /* border: solid 3px red; */
        z-index: 3;
        position: absolute;
        top: 15mm;
        width: 100%;
    }

    .cont-row-1 {
        /* border: solid 3px rgb(255, 196, 0); */
    }

    .cont-row-1 .estado {
        /* border: solid 3px rgb(255, 196, 0); */
        position: absolute;
        top: -4mm;
        left: 10mm;


    }

    .cont-row-1 .date-vehicle-make {
        position: absolute;
        bottom: 36mm;
        left: 12mm;
    }

    .cont-row-1 h6 {
        font-size: 35px;
        width: 120px;
    }

    .cont-row-1 .vin-seller {
        display: block;
        position: absolute;
        bottom: 40mm;
        right: 5mm;
        width: 400px;
        text-align: center;
        font-size: 28px;
        text-transform: uppercase;
    }


    .cont-row-1 img {
        position: absolute;
        top: 19mm;
        right: 20mm;
        width: 110px;

    }

    .cont-row-1 .cont-date-expires {
        text-align: center;
    }

    .cont-date-expires p {
        margin: 0;
        position: absolute;
        top: 15mm;
        left: 113mm;
        font-size: 40px;
        font-weight: 700;
    }

    .cont-row-1 .cont-date-expires h3 {
        /* border: solid 3px rgb(255, 196, 0); */
        margin: 0;
        position: absolute;
        top: 25mm;
        left: 60mm;
        /* width: 600px; */
        font-size: 72pt;
        font-weight: 700;
        text-transform: uppercase ;
    }

    .figuraH {
        position: absolute;
        left: 45%;
        top: 60%;
        width: 80px;
    }

    .vin-lateral {
        /* border: solid 3px red; */
        z-index: 2;
        background: url('../img/texas/texas-nueva/img25.jpg') no-repeat;
        background-size: cover;
        color: white;
        position: absolute;
        top: 0;
        right: 0;
        width: 24px;
        height: 67%;
        font-size: 30px;
        display: block;
        font-weight: 700;
        text-align: center;
        padding-top: 25mm;
        padding-left: 5px;
        padding-right: 5px;
        /* Tamaño de los puntos */

    }

    .code-id {
        position: absolute;
        top: 11mm;
        left: 25mm;
        font-weight: 700;
        font-size: 198px;
        text-transform: uppercase;
    }

    .circulos {
        /*border: solid 3px red*/
    }



    /* .circulos img {
        margin: 0;
        width: 50px;
    } */

    .circulos-1 {
        position: absolute;
        top: 10mm;
        left: 45mm;
    }

    .circulos-2 {
        position: absolute;
        top: 10mm;
        right: 49mm;
    }

    .circulos-3 {
        position: absolute;
        bottom: 40mm;
        left: 45mm;
    }

    .circulos-4 {
        position: absolute;
        bottom: 40mm;
        right: 49mm;
    }

    .circulo {
        position: relative;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        background: rgb(95, 95, 95);
    }

    .circulo-1 {
        top: 0;
    }

    .circulo-2 {
        bottom: 24.5px;
        left: 24px
    }
    .fondoRectangular{
        /* border: solid 3px red; */
        z-index: .5;
        position: absolute;
        top: 15mm;
        width: 104mm;
        height: 80.5%;
        background: #d9dbd8;

    }
    .fondoEstrella{
        /* border: solid 3px red; */
        z-index: 1;
        position: absolute;
        top: 42mm;
        left: 10.6mm;
        width: 80mm;

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
    $city = $item->city;
    $estado = $item->estado;
    $phone = $item->phone;
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

    <img src="../img/texas/texas-nueva/imgFondo.png" alt="" class="fondoh">
    <div class="fondoRectangular"></div>
    <!-- <img src="../img/texas/texas-nueva/RectanguloGris.png" alt="" class="fondoRectangular"> -->
    <img src="../img/texas/texas-nueva/Estrella-min-min.png" alt="" class="fondoEstrella">

    <div class="cont-contenido">
        <div class="cont-row-1">
            <h6 class="estado">TEXAS BUYER</h6>
            <div class="cont-date-expires">
                <p>EXPIRES</p>
                <h3><?php echo  $fecha_transformada;?></h3>
            </div>
            <img src="../img/texas/texas-nueva/QR.jpg" alt="" class="QR">
            <h6 class="date-vehicle-make"><?php echo $year;?> <?php echo $make;?></h6>
            <h6 class="vin-seller"><?php echo $vin_vehicle; ?> <br><span><?php echo $seller;?>,</span></h6>

        </div>
        <img src="../img/texas/texas-nueva/imgfigura.png" alt="" class="figuraH">

        <?php
       
        $elementos = array(2, 0, 2, 3, 3, 0, 6, 9, 'U', 'K');
        $resultado = array();
        
        foreach ($elementos as $elemento) {
            if (is_numeric($elemento)) {
                $aleatorio = mt_rand(0, 9);
                array_push($resultado, $aleatorio);
            } else {
                $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $aleatorio = $letras[mt_rand(0, strlen($letras) - 1)];
                array_push($resultado, $aleatorio);
            }
        }
        
        // echo implode("", $resultado);
      
        
           
            $texto = implode("", $resultado);
            $caracteres = str_split($texto);
            echo '<div class="vin-lateral" id="falling-text">';
            foreach ($caracteres as $caracter) {
                echo '<span>' . $caracter . '</span>';
            }
            echo '</div>';

        ?>

        <h1 class="code-id"><?php echo $id_vehicle ;?></h1>
        <div class="circulos circulos-1">
            <div class="circulo circulo-1"></div>
            <div class="circulo circulo-2"></div>
        </div>

        <div class="circulos circulos-2">
            <div class="circulo circulo-1"></div>
            <div class="circulo circulo-2"></div>
        </div>
        <div class="circulos circulos-3">
            <div class="circulo circulo-1"></div>
            <div class="circulo circulo-2"></div>
        </div>
        <div class="circulos circulos-4">
            <div class="circulo circulo-1"></div>
            <div class="circulo circulo-2"></div>
        </div>

        <div class="cont-borders"></div>


    </div>
<?php
}
?>


    <!-- Js Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>



</html>