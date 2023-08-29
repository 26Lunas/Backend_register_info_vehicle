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
$renderer->setWidth(1000); 
$renderer->setHeight(1000);

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
    $expires = date("m/d/Y", strtotime($fecha . " +$days days"));

$pdf = new FPDF();
$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(635,445));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->AddFont('arialmtb','','Arial-MT-Bold.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('ariblk','','ariblk.php');
$pdf->AddFont('calibrib','','calibrib.php');
$pdf->AddFont('calibrin','','calibrin.php');
$pdf->AddFont('calibriz','','calibriz.php');

$pdf->Image('sellopng.png',173,120,302,280);
$pdf->SetLineWidth(0.6);
$pdf->SetDrawColor(46,83,146);
$pdf->Rect(32, 269, 156, 70);
$pdf->Rect(203, 262, 377, 77);
$pdf->SetTextColor(46,83,146);
$pdf->SetFont('arialmtb','',150);
$pdf->Cell(1);
$pdf->Cell(616,69,"", 0, 1, 'C');
$pdf->Cell(616,13,"INDIANA", 0, 1, 'C');
$pdf->SetFont('arialmt','',63.5);
$pdf->Cell(1);
$pdf->Cell(618,19,"", 0, 1, 'C');
$pdf->Cell(618,13,"TEMPORARY REGISTRATION", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->SetFont('arialmt','',384);
$pdf->Cell(618,70,"", 0, 1, 'C');
$pdf->Cell(618,13,"$id_vehicle", 0, 1, 'C');
$pdf->Cell(1);
$pdf->SetFont('arialmt','',37.5);
$pdf->Cell(618,40,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(33,15,"", 0, 0, 'C');
$pdf->Cell(351,15,"VIN: $vin_vehicle", 0, 0, 'L');
$pdf->Cell(150,15,"$year $make", 0, 1, 'L');
$pdf->SetTextColor(46,83,146);
$pdf->SetFont('arialmtb','',30);
$pdf->Cell(618,-1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(73,15,"", 0, 0, 'C');
$pdf->Cell(150,15,"Dealer No.", 0, 0, 'L');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->SetFont('calibrib','',39.5);
$pdf->Cell(618,100,"", 0, 1, 'C');
$pdf->Cell(203,13,"", 0, 0, 'L');
$pdf->Cell(105,13,"Secretary of State", 0, 0, 'L');
$pdf->SetFont('calibrib','',29);
$pdf->Cell(12,13,chr(151), 0, 0, 'L');
$pdf->SetFont('calibrin','',40.5);
$pdf->Cell(49,13,"www.in.gov/sos", 0, 1, 'L');
$pdf->SetFont('arialmt','',100);

$numeroAleatorio = mt_rand(1, 9999999);
$numeroFormateado = sprintf("%07d", $numeroAleatorio);


$pdf->TextWithDirection(40,315,$numeroFormateado,'R');
$pdf->SetFont('arialmt','',159.5);
$pdf->TextWithDirection(250,317,$expires,'R');
$pdf->SetTextColor(46,83,146);
$pdf->SetFont('arialmtb','',24.5);
$pdf->TextWithDirection(195,270,'E','R');
$pdf->TextWithDirection(195,281,'X','R');
$pdf->TextWithDirection(195,292.5,'P','R');
$pdf->TextWithDirection(196.5,304,'I','R');
$pdf->TextWithDirection(195,315.5,'R','R');
$pdf->TextWithDirection(195,327,'E','R');
$pdf->TextWithDirection(195,337,'S','R');
$pdf->TextWithDirection(582.5,270,'E','R');
$pdf->TextWithDirection(582.5,281,'X','R');
$pdf->TextWithDirection(582.5,292.5,'P','R');
$pdf->TextWithDirection(584,304,'I','R');
$pdf->TextWithDirection(582.5,315.5,'R','R');
$pdf->TextWithDirection(582.5,327,'E','R');
$pdf->TextWithDirection(582.5,337,'S','R');

//Segunda Hoja
$pdf->AddPage('L',array(577,289));
$pdf->AddFont('timesb','','timesb.php');
$pdf->SetMargins(10,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->Image('bmv.png',45,49,72,70);
$pdf->Image('codigo_qr.png',472,53,57,53);
$pdf->SetFillColor(218,226,246);
$pdf->SetLineWidth(0.2);
$pdf->Rect(19, 127, 542, 17,"FD");
$pdf->SetFillColor(255,255,255);
$pdf->SetLineWidth(0.7);
$pdf->Rect(19, 144, 542, 24,"FD");
$pdf->SetFillColor(218,226,246);
$pdf->SetLineWidth(0.2);
$pdf->Rect(19, 168, 542, 17,"FD");
$pdf->SetFillColor(255,255,255);
$pdf->SetLineWidth(0.7);
$pdf->Rect(19, 185, 542, 53,"FD");

$pdf->SetTextColor(46,83,146);
$pdf->SetFont('arialmtb','',60);
$pdf->Cell(1);
$pdf->Cell(570,51,"", 0, 1, 'C');
$pdf->Cell(565,13,"INDIANA", 0, 1, 'C');
$pdf->SetFont('arialmtb','',46);
$pdf->Cell(1);
$pdf->Cell(618,11,"", 0, 1, 'C');
$pdf->Cell(563,13,"Temporary Registration Permit", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);

$pdf->SetFont('arialmtb','',27);
$pdf->Cell(1);
$pdf->Cell(570,35,"", 0, 1, 'C');
$pdf->Cell(556,13,"VEHICLE DESCRIPTION", 0, 1, 'C');

$pdf->SetFont('calibrin','',24.5);
$pdf->Cell(1);
$pdf->Cell(570,6,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(10,7,"", 0, 0, 'C');
$pdf->Cell(95,7,"PLATE NUMBER", 0, 0, 'L');
$pdf->Cell(72,7,"YEAR", 0, 0, 'L');
$pdf->Cell(86,7,"COLOR", 0, 0, 'L');
$pdf->Cell(83,7,"MAKE", 0, 0, 'L');
$pdf->Cell(67,7,"MODEL", 0, 0, 'L');
$pdf->Cell(86,7,"VEHICLE IDENTICATION NUMBER", 0, 1, 'L');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialmt','',22);
$pdf->Cell(1);
$pdf->Cell(570,3,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(10,7,"", 0, 0, 'C');
$pdf->Cell(95,7,"$id_vehicle", 0, 0, 'L');
$pdf->Cell(72,7,"$year", 0, 0, 'L');
$pdf->Cell(86,7,"$major_color", 0, 0, 'L');
$pdf->Cell(83,7,strtoupper("$make"), 0, 0, 'L');
$pdf->Cell(67,7,strtoupper("$model"), 0, 0, 'L');
$pdf->Cell(86,7,"$vin_vehicle", 0, 1, 'L');

$pdf->SetFont('arialmtb','',27);
$pdf->Cell(1);
$pdf->Cell(570,5,"", 0, 1, 'C');
$pdf->Cell(556,13,"OWNER  INFORMATION", 0, 1, 'C');

$pdf->SetFont('calibrin','',24.5);
$pdf->Cell(1);
$pdf->Cell(570,5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(10,7,"", 0, 0, 'C');
$pdf->Cell(150,7,"NAME", 0, 0, 'L');
$pdf->Cell(150,7,"ADDRESS", 0, 0, 'L');
$pdf->Cell(135,7,"CITY", 0, 0, 'L');
$pdf->Cell(70,7,"STATE", 0, 0, 'L');
$pdf->Cell(67,7,"ZIP", 0, 1, 'L');

$pdf->SetFont('arialmt','',22);
$pdf->Cell(1);
$pdf->Cell(570,4,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(10,7,"", 0, 0, 'C');
$pdf->Cell(150,7,strtoupper("$name_1 $name_2"), 0, 0, 'L');
$pdf->Cell(150,7,strtoupper("$adress"), 0, 0, 'L');
$pdf->Cell(135,7,strtoupper("$city"), 0, 0, 'L');
$pdf->Cell(70,7,strtoupper("$estado"), 0, 0, 'L');
$pdf->Cell(67,7,strtoupper("$zip"), 0, 1, 'L');

$pdf->SetFont('calibrin','',24.5);
$pdf->Cell(1);
$pdf->Cell(570,10,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(10,7,"", 0, 0, 'C');
$pdf->Cell(75,7,"ISSUE DATE", 0, 0, 'L');
$pdf->Cell(114,7,"EXPIRES DATE", 0, 0, 'L');
$pdf->Cell(258,7,"BUSSINESS OFFICE", 0, 0, 'L');
$pdf->Cell(70,7,"DEALERS NUMBER", 0, 1, 'L');

$pdf->SetFont('arialmt','',21);
$pdf->Cell(1);
$pdf->Cell(570,4,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(10,7,"", 0, 0, 'C');
$pdf->Cell(78,7,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(103,7,"$expires", 0, 0, 'L');
$pdf->SetFont('arialmt','',20);
$pdf->Cell(282,7,"BMV BUSSINESS CENTER", 0, 0, 'L');
$pdf->SetFont('arialmt','',21);
$pdf->Cell(70,7,"0100041", 0, 1, 'L');


$numeroAleatorio2 = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-IN-$numeroAleatorio2.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";
}

// Eliminar el archivo generado
unlink($archivoQR);
?>

