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
$pdf->AddPage('L',array(297,210));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(234,235,233);
$pdf->SetLineWidth(1);
$pdf->line(0,28,297,28);
$pdf->Image('estrellamod.png',12,28,104.5,149);
$pdf->Image('recbajo.png',116,89,169,88);
$pdf->Image('logo.png',138,135,18,19);
$pdf->Image('reclargo.jpg',276,28,9,148.5);
$pdf->Image('codigo_qr.png',225.5,42,40,38);
$pdf->line(0,177.5,297,177.5);
$pdf->SetFillColor(95,95,95);
$pdf->Circle(61,41,3.3,'F');
$pdf->Circle(67.5,41,3.3,'F');
$pdf->Circle(61,163,3.3,'F');
$pdf->Circle(67.5,163,3.3,'F');
$pdf->Circle(233,41,3.3,'F');
$pdf->Circle(239.5,41,3.3,'F');
$pdf->Circle(233,163,3.3,'F');
$pdf->Circle(239.5,163,3.3,'F');
$pdf->AddFont('arialn','','arialbd.php');
$pdf->AddFont('arias','','ARIALN.php');
$pdf->AddFont('arial','','arial.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('timesa','','timesa.php');
$pdf->Cell(1);
$pdf->Cell(260,40,"", 0, 1, 'C');
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
$pdf->Cell(11,14,"", 0, 0, 'L');
$pdf->Cell(148,14,"$year", 0, 0, 'L');
$pdf->SetFont('arialn','',22);
$pdf->Cell(100,20,"$vin_vehicle", 0, 1, 'R');
$pdf->SetFont('arialn','',26);
$pdf->Cell(1);
$pdf->Cell(11,-1,"", 0, 0, 'L');
$pdf->Cell(152,-1,strtoupper("$make"), 0, 0, 'L');
$pdf->SetFont('arialn','',21);
$pdf->Cell(100,0,"$seller,", 0, 1, 'R');


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

$pdf->SetFont('arialn','',22.5);
$pdf->SetTextColor(255,255,255);

$pdf->TextWithDirection(278.2,58, $array_caracteres[0],'R');
$pdf->TextWithDirection(278.2,67.5,$array_caracteres[1],'R');
$pdf->TextWithDirection(278.2,77,$array_caracteres[2],'R');
$pdf->TextWithDirection(278.2,86.5,$array_caracteres[3],'R');
$pdf->TextWithDirection(278.2,96,$array_caracteres[4],'R');
$pdf->TextWithDirection(278.2,105.5,$array_caracteres[5],'R');
$pdf->TextWithDirection(278.2,115,$array_caracteres[6],'R');
$pdf->TextWithDirection(278.2,124.5,$array_caracteres[7],'R');
$pdf->SetFont('arialn','',20.5);
$pdf->TextWithDirection(278.2,134,$array_caracteres[8],'R');
$pdf->TextWithDirection(278.2,143.5,$array_caracteres[9],'R');

//Segunda Hoja
$pdf->AddPage('P',array(297,210));
$pdf->AddFont('timesb','','timesb.php');
$pdf->SetMargins(10,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(0.2);
$pdf->line(13,23.5,199,23.5);
$pdf->Image('sello.jpg',15,32,186,182);
$pdf->SetTextColor(32,32,32);
$pdf->SetFont('timesb','',18);
$pdf->Cell(1);
$pdf->Cell(190,10,"", 0, 1, 'C');
$pdf->Cell(190,10,"BUYER'S TAG RECEIPT - DEALER'S COPY", 0, 1, 'C');
$pdf->SetFont('times','',11);
$pdf->Cell(1);
$pdf->Cell(190,2,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->Cell(45,5,"Tag Number:", 0, 0, 'L');
$pdf->SetFont('arialmt','',11);
$pdf->Cell(48,5,"$id_vehicle", 0, 0, 'L');
$pdf->SetFont('times','',11);
$pdf->Cell(35,5,"Expiration Date:", 0, 0, 'L');
$pdf->SetFont('arialmt','',11);
$pdf->Cell(35,5,strtoupper("$expires"), 0, 1, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(1);
$pdf->Cell(190,4,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->Cell(45,5,"Give buyer's receipt to buyer. PLACE TRIS DEALER'S COPY IN SALES FILE.", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->Cell(45,5,"It is part of the sales records required to be kept and subject to inspection by TxDMV. Verify this", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->Cell(45,5,"information before distributing copies:", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,4.5,"", 0, 1, 'C');
$pdf->Cell(7,4.5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(42,4.5,"Issue Date:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(48,4.5,strtoupper("$fecha_transformada"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(42,5,"VIN:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(48,5,"$vin_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(42,5,"Year:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(48,5,"$year", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(37,5,"Body Style:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(35,5,strtoupper("$body_style"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(42,5,"Make:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(48,5,"$make", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(37,5,"Model:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(35,5,strtoupper("$model"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(7,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(42,5,"Major Color:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(48,5,"$major_color", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(37,5,"Minor Color:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(48,5,"$minor_color", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,10.5,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(78,5,"Issuing Dealer:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(35,5,strtoupper("$seller,"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(78,5,"Dealer Number:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(35,5,"$deler_number", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,5,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(78,5,"Purchaser", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(78,5,"Name 1:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(35,5,strtoupper("$name_1"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->SetFont('timesa','',12);
$pdf->Cell(78,5,"Address:", 0, 0, 'L');
$pdf->SetFont('arialmt','',10);
$pdf->Cell(35,4,strtoupper("$adress"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0.1,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->Cell(78,5,"", 0, 0, 'L');
$pdf->Cell(35,5,strtoupper("$city, $estado"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,-0.5,"", 0, 1, 'C');
$pdf->Cell(19,5,"", 0, 0, 'L');
$pdf->Cell(78,5,"", 0, 0, 'L');
$pdf->Cell(35,5,strtoupper("$zip"), 0, 1, 'L');
$pdf->SetFont('times','',15);
$pdf->Cell(1);
$pdf->Cell(190,17,"", 0, 1, 'C');
$pdf->Cell(196,5,"DEALER'S COPY", 0, 1, 'C');

// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="TAG-.pdf"');

// $pdf->Output();
$filenamepdf="TAG-.pdf";
$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = 'TAG-.pdf';
     </script>";
}

// Eliminar el archivo generado
unlink($archivoQR);
?>
