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
$pdf->AddPage('L',array(432,280));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(95,95,95);
$pdf->AddFont('arialn','','arialbd.php');
$pdf->AddFont("ariblk",'','ariblk.php');
$pdf->AddFont('arial','','arial.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('timesa','','timesa.php');
$pdf->AddFont('times','','times.php');
$pdf->AddFont('courier','','courier.php');
$pdf->AddFont('courbd','','courbd.php');
$pdf->Cell(1);
$pdf->Cell(260,27,"", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialn','',60);
$pdf->Cell(1);
$pdf->Cell(38,13,"", 0, 0, 'L');
$pdf->Cell(94,12,"FLORIDA", 0, 0, 'L');
$pdf->SetTextColor(192,0,0);
$pdf->SetFont('courier','',14.5);
$pdf->Cell(10,22,"302107", 0, 1, 'L');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->Cell(260,-3,"", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialn','',11);
$pdf->Cell(1);
$pdf->Cell(40,2,"", 0, 0, 'L');
$pdf->Cell(210,2,"$days- DAY TEMPORARY REGISTRATION PLATE", 0, 0, 'L');
$pdf->SetFont('arialn','',44);
$pdf->Cell(50,23,"$year $make $model", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(260,62,"", 0, 1, 'C');
$pdf->SetFont('arialn','',220);
$pdf->Cell(1);
$pdf->Cell(36,2,"", 0, 0, 'L');
$pdf->Cell(210,2,"$id_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(260,58,"", 0, 1, 'C');
$pdf->SetFont('arialn','',55);
$pdf->Cell(1);
$pdf->Cell(149,2,"", 0, 0, 'L');
$pdf->Cell(45,2,"EXP", 0, 0, 'L');
$pdf->Cell(40,2,"$expires", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(260,17,"", 0, 1, 'C');
$pdf->SetFont('arialn','',10);
$pdf->Cell(1);
$pdf->Cell(35,2,"", 0, 0, 'L');
$pdf->Cell(20,4,"ISSUED BY:", 0, 0, 'L');
$pdf->SetFont('arialn','',18);
$pdf->Cell(122,2.5,"$seller", 0, 0, 'L');
$pdf->Cell(45,2.5,"ISSUEDDATE:", 0, 0, 'L');
$pdf->Cell(55,2.5,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(12,2.5,"VIN:", 0, 0, 'L');
$pdf->Cell(70,2.5,"$vin_vehicle", 0, 1, 'L');
$pdf->SetFont('arialmt','',11);
$pdf->Cell(260,4,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(36,2,"", 0, 0, 'L');
$pdf->Cell(50,2,"STATE FARM INSURANCE:", 0, 0, 'L');
$pdf->Cell(20,2,"2294374A0346B", 0, 1, 'L');

//Segunda Hoja
$pdf->AddPage('P',array(216,280));
$pdf->SetMargins(10,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetFillColor(255,255,255);
$pdf->SetLineWidth(0.8);
$pdf->line(74.3,56.4,157.3,56.4);
$pdf->Image('codigo_qr.png',175,14,18.5,18.5);
$pdf->Image('logofinal.jpg',72,9,85,39);
$pdf->Image('selloflorida.jpg',66,87.5,92.5,92.5);
$pdf->SetFont('courbd','',11);
$pdf->Cell(1);
$pdf->Cell(190,44.5,"", 0, 1, 'C');
$pdf->Cell(211.5,10,"DEALER ISSUED IN-TRANSIT CERTIFICATE", 0, 1, 'C');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(1);
$pdf->Cell(190,2.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(202,10,"ISSUED BY: $seller", 0, 1, 'C');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(1);
$pdf->Cell(190,0,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(89.5,4,"", 0, 0, 'C');
$pdf->Cell(66,4,"LICENSEAUTODEALER", 0, 0, 'L');
$pdf->SetFont('courier','',8);
$pdf->Cell(10,4,"ACCT:", 0, 0, 'L');
$pdf->Cell(15,4,"02667", 0, 1, 'L');
$pdf->SetFont('courbd','',9.5);
$pdf->Cell(1);
$pdf->Cell(190,1.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(92,4,"", 0, 0, 'C');
$pdf->Cell(66,4,"FLORIDA", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,2,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(53,4,"", 0, 0, 'C');
$pdf->Cell(22.5,4,"PERMIT NO.", 0, 0, 'L');
$pdf->Cell(66,4,"$id_vehicle", 0, 1, 'L');
$pdf->SetFont('courbd','',9);
$pdf->Cell(1);
$pdf->Cell(190,8,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(22,4,"", 0, 0, 'C');
$pdf->Cell(17,4,"PLATE NO.", 0, 0, 'L');
$pdf->Cell(42,4,"$id_vehicle", 0, 0, 'L');
$pdf->Cell(21,4,"CLASS/CAT:", 0, 0, 'L');
$pdf->Cell(31.5,4,"A", 0, 0, 'L');
$pdf->Cell(17,4,"TYPE:", 0, 0, 'L');
$pdf->Cell(30,4,"IN-TRANSITTAG", 0, 1, 'L');
$pdf->SetFont('courier','',9.4);
$pdf->Cell(1);
$pdf->Cell(190,6,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(19.5,4,"", 0, 0, 'C');
$pdf->Cell(25.5,4,"VEHICLEYEAR:", 0, 0, 'L');
$pdf->Cell(35,3,"$year", 0, 0, 'L');
$pdf->Cell(17,3,"TITLENO", 0, 0, 'L');
$pdf->Cell(35.5,3,"/A", 0, 0, 'L');
$pdf->Cell(9.5,3,"VIN:", 0, 0, 'L');
$pdf->Cell(30,3,"$vin_vehicle", 0, 1, 'L');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(1);
$pdf->Cell(190,4,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(20.5,4,"", 0, 0, 'C');
$pdf->Cell(22.5,4,"MAKE/MOD:", 0, 0, 'L');
$pdf->Cell(30,4,"$make $model", 0, 0, 'L');
$pdf->Cell(13,3.5,"VALID", 0, 0, 'L');
$pdf->Cell(48,3.5,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(23.5,5,"EXPIRATION:", 0, 0, 'L');
$pdf->Cell(37,5,"$expires", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(20.5,4,"", 0, 0, 'C');
$pdf->Cell(16,4,"COLOR:", 0, 0, 'L');
$pdf->Cell(30,4,"$major_color", 0, 1, 'L');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(20.5,6,"", 0, 0, 'C');
$pdf->SetFont('courier','',9.6);
$pdf->Cell(111.5,6,"TEMPORARILY INSURED", 0, 0, 'L');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(75,2.2,"I                           have", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(20.5,6.5,"", 0, 0, 'C');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(4,8.5,"BY", 0, 0, 'L');
$pdf->SetFont('courbd','',9.6);
$pdf->Cell(107.5,8.3,"STATE FARM INSURANCE", 0, 0, 'L');
$pdf->SetFont('courier','',9);
$pdf->Cell(75,4,"received an in-transit certificate", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(20.5,6.5,"", 0, 0, 'C');
$pdf->SetFont('courbd','',9.5);
$pdf->Cell(111.5,8.5,"POLICY NO.:", 0, 0, 'L');
$pdf->SetFont('courier','',9);
$pdf->Cell(75,2.5,"for the abovevehicle.", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,2.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(20.5,6.5,"", 0, 0, 'C');
$pdf->SetFont('courbd','',9.5);
$pdf->Cell(111.5,8.5,"COMPANY CODE/NAIC: N/A", 0, 0, 'L');
$pdf->Cell(75,12,"CERTIFICATE ISSUEDBY", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(18.5,1.5,"", 0, 0, 'C');
$pdf->Cell(113.5,1.5,"OWNER(S)OFTHE ABOVEVEHICLE", 0, 0, 'L');
$pdf->SetFont('courier','',9.5);
$pdf->Cell(74.5,3,"$seller", 0, 1, 'L');
$pdf->SetFont('courbd','',9.5);
$pdf->Cell(1);
$pdf->Cell(190,3.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(18.5,3,"", 0, 0, 'C');
$pdf->Cell(12,3,"NAME:", 0, 0, 'L');
$pdf->Cell(101.5,3,"$name_1 $name_2", 0, 0, 'L');
$pdf->SetFont('courier','',9.7);
$pdf->Cell(74.5,-2,"LICENSE  AUTO  DEALER", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(190,1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(132,8.5,"", 0, 0, 'L');
$pdf->Cell(29,8.5,"PERMIT	 NO.", 0, 0, 'L');
$pdf->Cell(74.5,8.5,"$id_vehicle", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(190,0,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(132,0,"", 0, 0, 'L');
$pdf->Cell(14,0,"PHONE:", 0, 0, 'L');
$pdf->Cell(74.5,0,"304-449-4114", 0, 1, 'L');

$pdf->SetFont('times','',10.7);
$pdf->SetTextColor(64,64,64);
$pdf->Cell(1);
$pdf->Cell(190,-0.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(18.5,4.5,"", 0, 0, 'L');
$pdf->Cell(69,4.5,"$adress, $city, $estado $zip", 0, 1, 'L',true);


$pdf->SetLineWidth(0.2);
$pdf->line(32.5,128,71,128);
$pdf->SetLineWidth(0.3);
$pdf->line(146,125.7,200,125.7);
$pdf->line(144,143,184,143);
$pdf->line(32.5,132,36.5,132);
$pdf->line(30.7,150.2,83,150.2);

$numeroAleatorioFL = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-FL-$numeroAleatorioFL.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

// Eliminar el archivo generado
unlink($archivoQR);

}
?>

