<?php
require('fpdf/fpdf.php');


include('../texas/list_register.php');

require '../generarQR/vendor/autoload.php'; // Carga las clases de la librería

use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;

$id = $_GET['idRegisterVehicle'];

// Texto que se convertirá en el código QR
$textoQR = "https://txdmvgot.com/system/pdf/generarQR/qr.php?idRegisterVehicle=".$id;
// Convertir el texto a UTF-8
$textoQR = utf8_encode($textoQR);

// Configuración de la imagen QR
$renderer = new Png();
$renderer->setWidth(2000); 
$renderer->setHeight(2000);

$writer = new Writer($renderer);

// Generar el código QR

$archivoQR = 'codigo_qr.png';
$writer->writeFile($textoQR, $archivoQR);



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
    $pdf2= $item->pdf;

    $fecha =  $sale_date;
    if($fecha !== ''){
        $fecha_objeto = strtotime($fecha);
        $fecha_transformada = date("M d, Y", $fecha_objeto);
        $fecha_transformada_sale = date("m/d/Y", $fecha_objeto);
    }else{
        $fecha_transformada = '';
    }
    // echo $fecha_transformada;
    $sale_date = $fecha_objeto = strtotime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
    $expires = date("M d, Y", strtotime($fecha . " +$days days"));


$pdf = new FPDF();
$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(289,185)); //$pdf->AddPage('L',array(297,210));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(234,235,233);
$pdf->SetLineWidth(0.5);
$pdf->line(0,8,297,8);
$pdf->Image('estrellamod.jpg',12,8,104.5,149);
$pdf->Image('recbajo.png',116,69,169,88);
$pdf->Image('logo.png',138,115,18,19);
$pdf->Image('codigo_qr.png',226,20,40,38);
$pdf->Image('cirfinal.png',57,18,13.5,7.5);
$pdf->Image('cirfinal.png',57,139,13.5,7.5);
$pdf->Image('cirfinal.png',230,16,13.5,7.5);
$pdf->Image('cirfinal.png',230,139,13.5,7.5);
$pdf->Image('fold.png',113.5,158,79.5,11.7);
$pdf->line(0,157.5,297,157);
$pdf->Image('reclargo.jpg',276,7.5,9,149.3);
$pdf->SetFillColor(95,95,95);
$pdf->AddFont('arialn','','arialbd.php');
$pdf->AddFont('arias','','ARIALN.php');
$pdf->AddFont('arial','','arial.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('timesa','','timesa.php');
$pdf->AddFont('timesb','','timesb.php');
$pdf->AddFont('courier','','courier.php');
$pdf->AddFont('courierb','','courierb.php');
$pdf->AddFont('cambria','','Cambria-01.php');
$pdf->AddFont('cambriab','','cambriab.php');

$pdf->Cell(1);
$pdf->Cell(260,16,"", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialn','',26);
$pdf->Cell(1);
$pdf->Cell(11,12,"", 0, 0, 'L');
$pdf->Cell(103,12,"TEXAS", 0, 0, 'L');
$pdf->SetFont('arialn','',30);
$pdf->Cell(100,9,"EXPIRES", 0, 1, 'L');
$pdf->SetFont('arialn','',26);
$pdf->Cell(1);
$pdf->Cell(11,14,"", 0, 0, 'L');
$pdf->Cell(50,17,"BUYER", 0, 0, 'L');
$pdf->SetFont('arialn','',65);
$pdf->Cell(147,26.5,strtoupper("$expires"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(21,30,"", 0, 0, 'L');
$pdf->SetFont('arialn','',150);
$pdf->Cell(233,55,"$id_vehicle", 0, 1, 'C');
$pdf->SetFont('arialn','',26);
$pdf->Cell(1);
$pdf->Cell(11,12,"", 0, 0, 'L');
$pdf->Cell(148,12,"$year", 0, 0, 'L');
$pdf->SetFont('arialn','',22);
$pdf->Cell(100,10,"$vin_vehicle", 0, 1, 'R');
$pdf->SetFont('arialn','',26);
$pdf->Cell(1);
$pdf->Cell(11,14,"", 0, 0, 'L');
$pdf->Cell(152,14,"$make", 0, 0, 'L');
$pdf->SetFont('arialn','',21);
$pdf->Cell(100,8,"$seller,", 0, 1, 'R');
$pdf->SetFont('arialn','',22.5);
$pdf->SetTextColor(255,255,255);

$longitud_numeros = 8;  // Longitud de la parte numérica
$caracteres_letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  // Letras mayúsculas

// Generar la parte numérica
$numeros_aleatorios = '';
for ($i = 0; $i < $longitud_numeros; $i++) {
    $numeros_aleatorios .= mt_rand(0, 9);
}

// Generar las dos letras aleatorias
$letras_aleatorias = '';
for ($i = 0; $i < 2; $i++) {
    $letras_aleatorias .= $caracteres_letras[mt_rand(0, strlen($caracteres_letras) - 1)];
}

$cadena_generada = $numeros_aleatorios . $letras_aleatorias;
$array_caracteres = str_split($cadena_generada);

$pdf->TextWithDirection(278.2,38,$array_caracteres[0],'R');
$pdf->TextWithDirection(278.2,47.5,$array_caracteres[1],'R');
$pdf->TextWithDirection(278.2,57,$array_caracteres[2],'R');
$pdf->TextWithDirection(278.2,66.5,$array_caracteres[3],'R');
$pdf->TextWithDirection(278.2,76,$array_caracteres[4],'R');
$pdf->TextWithDirection(278.2,85.5,$array_caracteres[5],'R');
$pdf->TextWithDirection(278.2,95,$array_caracteres[6],'R');
$pdf->TextWithDirection(278.2,104.5,$array_caracteres[7],'R');
$pdf->SetFont('arialn','',20.5);
$pdf->TextWithDirection(278.2,114,$array_caracteres[8],'R');
$pdf->TextWithDirection(278.2,123.5,$array_caracteres[9],'R');

//Segunda Hoja
$pdf->AddPage('P',array(210,295));
$pdf->SetMargins(10,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->Image('estrellapeq.png',18.5,5.5,13,11);
$pdf->Image('rectan.png',121,12.5,52,16.5);
$pdf->Image('sellopeq.png',31.5,27,21.5,21.5);
$pdf->SetTextColor(32,32,32);
$pdf->SetFont('times','',9);
$pdf->Cell(1);
$pdf->Cell(190,5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(20.5,4,"", 0, 0, 'L');
$pdf->Cell(60,4,"Texas Department of Motor Vehicles", 0, 1, 'L');
$pdf->SetFont('courierb','',10);
$pdf->Cell(1);
$pdf->Cell(190,2.2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(19.5,4,"", 0, 0, 'L');
$pdf->Cell(6.5,4,"$days-", 0, 0, 'L');
$pdf->SetFont('courierb','',9.5);
$pdf->Cell(57,4.2,"DAY PERMIT RECEIPT", 0, 1, 'L');
$pdf->SetFont('cambria','',7.5);
$pdf->Cell(1);
$pdf->Cell(190,11.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(12,4,"", 0, 0, 'L');
$pdf->Cell(28,4.2,"PROCESSIG COUNTY :", 0, 0, 'L');
$pdf->SetFont('timesa','',7.5);
$pdf->Cell(57,4.2,"$city", 0, 1, 'L');
$pdf->SetFont('cambria','',7.5);
$pdf->Cell(1);
$pdf->Cell(190,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(11.5,4,"", 0, 0, 'L');
$pdf->Cell(21.5,4.2,"PERMIT   NO:", 0, 0, 'L');
$pdf->SetFont('courier','',8.5);
$pdf->Cell(57,4.2,"$id_vehicle", 0, 1, 'L');
$pdf->SetFont('courier','',8.5);
$pdf->Cell(1);
$pdf->Cell(72.5,-9.5,"", 0, 0, 'L');
$pdf->Cell(9,-9.5,"DATE:", 0, 0, 'L');
$pdf->Cell(34,-9.5,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(29.5,-9.5,"EFFECTIVE DATE:", 0, 0, 'L');
$pdf->Cell(20,-9.5,"$expires", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(120,5.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(72.5,5.5,"", 0, 0, 'L');

date_default_timezone_set('America/New_York'); // Establece la zona horaria a Nueva York
$hora_actual = date("h:i:A");

$pdf->Cell(9,5.5,"TIME:", 0, 0, 'L');
$pdf->Cell(36,5.5,"$hora_actual", 0, 0, 'L');
$pdf->Cell(29.5,5.5,"EFFECTIVE TIME:", 0, 0, 'L');
$pdf->Cell(20,5.5,"$hora_actual", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(72,3,"", 0, 0, 'L');
$pdf->Cell(23,3,"EMPLOYEE ID:", 0, 0, 'L');
$pdf->Cell(19,3,"SUNIGAV", 0, 0, 'L');
$pdf->Cell(29.5,3,"TRANSACTION ID:", 0, 0, 'L');
$pdf->Cell(20,3,"$vin_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(72,4,"", 0, 0, 'L');
$pdf->Cell(29,4,"EXPIRATION DATE:", 0, 0, 'L');
$pdf->Cell(24.5,4,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(32.5,4,"EXPIRATION TIME:", 0, 0, 'L');
$pdf->Cell(20,4,"$hora_actual", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,1.5,"", 0, 0, 'L');
$pdf->Cell(29,1.5,"APPLICANT NAME AND ADDRESS", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,6,"", 0, 0, 'L');
$pdf->Cell(90,6,"$name_1", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,2,"", 0, 0, 'L');
$pdf->Cell(90,2,"$name_2", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,6,"", 0, 0, 'L');
$pdf->Cell(90,6,"$adress", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,2,"", 0, 0, 'L');
$pdf->Cell(90,2,"$city, $estado", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,6,"", 0, 0, 'L');
$pdf->Cell(90,6,"$zip", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(120,43.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,1.5,"", 0, 0, 'L');
$pdf->Cell(52,1.5,"VEHICLE IDENTIFICATION N0:", 0, 0, 'L');
$pdf->Cell(31,1.5,"$vin_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,8,"", 0, 0, 'L');
$pdf->Cell(20,8,"YR/MAKE:", 0, 0, 'L');
$pdf->Cell(29,8,"$year/$make", 0, 0, 'L');
$pdf->Cell(33,8,"", 0, 0, 'L');
$pdf->Cell(24,8,"BODY STYLE:", 0, 0, 'L');
$pdf->Cell(10,8,"$body_style", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,1.5,"", 0, 0, 'L');
$pdf->Cell(23,1.5,"MAJOR COLOR:", 0, 0, 'L');
$pdf->Cell(29,1.5,"$major_color", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.5,8,"", 0, 0, 'L');
$pdf->Cell(30,8,"INVENTORY ITEM(S)", 0, 0, 'L');
$pdf->Cell(52,8,"", 0, 0, 'L');
$pdf->Cell(29,8,"FEES ASSESSED", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(92.5,-0.5,"", 0, 0, 'L');
$pdf->Cell(58,-0.5,"$days-DAY PERMIT", 0, 0, 'L');
$pdf->Cell(17,-0.5,"$", 0, 0, 'L');
$pdf->Cell(10,-0.5,"63.00", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(92.5,8,"", 0, 0, 'L');
$pdf->Cell(58,8,"PROCESSING AND HANDLING FEE", 0, 0, 'L');
$ban=1;  // entero de 1 cifra
//$ban=2; // entero de 2 cifras
if ($ban==1)
{
$pdf->Cell(18.7,8,"$", 0, 0, 'L');
}
else
{
$pdf->Cell(17,8,"$", 0, 0, 'L');    
}
$pdf->Cell(10,8,"3.45", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(10.5,8,"", 0, 0, 'L');
$pdf->Cell(118,8,"$days-DAY PERMIT", 0, 0, 'L');
$pdf->Cell(22,8,"TOTAL", 0, 0, 'L');
$pdf->Cell(17,8,"$", 0, 0, 'L');
$pdf->Cell(10,8,"63.45", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(106.5,8,"", 0, 0, 'L');
$pdf->Cell(22,8,"METHOD OF PAUMENT AND PAYMET AMOUNT:", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(140.5,3,"", 0, 0, 'L');
$pdf->Cell(10,3,"CASH", 0, 0, 'L');
$pdf->Cell(17,3,"$", 0, 0, 'L');
$pdf->Cell(10,3,"63.45", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(115.5,10,"", 0, 0, 'L');
$pdf->Cell(35,10,"TOTAL AMOUNT PAID", 0, 0, 'L');
$pdf->Cell(17,10,"$", 0, 0, 'L');
$pdf->Cell(10,10,"63.45", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(120,47,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(11.5,5,"", 0, 0, 'L');
$pdf->Cell(35,5,"RECEIPT FOR PERMIT MUST BE CARRIED IN THE VEHICLE AT ALL TIMES.", 0, 1, 'L');

$numeroAleatorio = mt_rand(10, 99);
$filenamepdf="TAG-TX2-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');
echo "<script>
         window.location.href = $filenamepdf;
     </script>";
     unlink($filenamepdf);
}

// Eliminar el archivo generado
unlink($archivoQR);

?>
