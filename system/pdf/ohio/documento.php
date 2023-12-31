<?php

$id = $_GET['idRegisterVehicle'];
$text= "https://txdmvgot.com/system/pdf/generarQR/qr.php?idRegisterVehicle=".$id;

// URL del servicio en línea que genera códigos de barras PDF417
$url = "https://barcode.tec-it.com/barcode.ashx?data=$text&code=PDF417";

// Utiliza file_get_contents para obtener la imagen del código de barras desde la URL
$imagenCodigoBarras = file_get_contents($url);

// Verifica si se obtuvo la imagen correctamente
if ($imagenCodigoBarras !== false) {
    // Guarda la imagen en tu servidor (opcional)
    file_put_contents('barras.gif', $imagenCodigoBarras);

    // // Envía la imagen como respuesta al navegador para descargarla
    // header('Content-Type: image/png');
    // header('Content-Disposition: attachment; filename="codigo_barras.png"');
    // echo $imagenCodigoBarras;
} else {
    echo 'Error al obtener el código de barras.';
}

sleep(.1);

include('../texas/list_register.php');
require('fpdf/fpdf.php');


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
        $fecha_transformada_sale = date("m-d-Y", $fecha_objeto);
    }else{
        $fecha_transformada = '';
    }
    // echo $fecha_transformada;
    $sale_date = $fecha_objeto = strtotime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
    $expires = date("m-d-Y", strtotime($fecha . " +$days days"));
    


$pdf = new FPDF();
$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(280,216));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('arialbd','','arialbd.php');
$pdf->AddFont('ariblk','','ariblk.php');
$pdf->SetLineWidth(0.6);
$pdf->RoundedRect(7, 15, 268, 156, 3, '1234', 'DF');
$pdf->line(9.5,22,9.5,169);
$pdf->line(272.5,22,272.5,169);
$pdf->line(9.5,169,272.5,169);
$pdf->line(9.5,22,143,48);
$pdf->line(143,48,272.5,22);
$pdf->SetDrawColor(193,193,193);
$pdf->SetDash(1,1);
$pdf->line(0,180,280,180);
$pdf->SetDrawColor(0,0,0);
$pdf->SetDash(0,0);
$pdf->Image('barras.gif',21,42,35,12);
$pdf->Image('imagenf.jpg',110.05,21,13.3,17.2);
$pdf->SetLineWidth(0.3);
$pdf->Rect(228, 35, 38, 23);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',82);
$pdf->Cell(1);
$pdf->Cell(288,20,"", 0, 1, 'C');
$pdf->Cell(265,13,"OHIO", 0, 1, 'C');
$pdf->SetFont('arial','',40);
$pdf->Cell(1);
$pdf->Cell(285,11,"", 0, 1, 'C');
$pdf->Cell(268,15,"TEMPORARY TAG", 0, 1, 'C');
$pdf->SetFont('arialmt','',180);
$pdf->Cell(1);
$pdf->Cell(285,26,"", 0, 1, 'C');
$pdf->Cell(262,15,"$id_vehicle", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(285,45,"", 0, 1, 'C');
$pdf->SetFont('ariblk','',33);
$pdf->Cell(1);
$pdf->Cell(6,15,"", 0, 0, 'L');
$pdf->Cell(65,15,"EXPIRES:", 0, 0, 'L');
$pdf->SetFont('arial','',93);
$pdf->Cell(100,7,"$expires", 0, 1, 'L');
$pdf->SetFont('arialmt','',9);
$pdf->TextWithDirection(241,40,'ISSUED','R');
$pdf->SetFont('arialmt','',12);
$pdf->TextWithDirection(236,44,$fecha_transformada_sale,'R');
$pdf->SetFont('arialmt','',9);
$pdf->TextWithDirection(233,53,'DEALERAGENCY#','R');
$pdf->SetFont('arialmt','',12);
$pdf->TextWithDirection(238,57,'UH020731','R');

//Segunda Hoja
$pdf->AddPage('L',array(280,216));
$pdf->AddFont('timesb','','timesb.php');
$pdf->SetMargins(10,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(0.2);
$pdf->SetTextColor(0,0,0);
$pdf->Image('barras.gif',228,102,35,12);
$pdf->Image('sellopng.png',22,20,30,30);
$pdf->SetFont('arial','',12);
$pdf->Cell(1);
$pdf->Cell(210,14,"", 0, 1, 'C');
$pdf->Cell(248,10,"OHIO DEPARTAMENT OF PUBLIC SAFETY", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(246,0,"BUREAU OF MOTOR VEHICLE", 0, 1, 'C');
$pdf->SetFont('arial','',16);
$pdf->Cell(1);
$pdf->Cell(210,6,"", 0, 1, 'C');
$pdf->Cell(258,10,"TEMPORARY TAG REGISTRATION", 0, 1, 'C');
$pdf->SetFont('arial','',11);
$pdf->Cell(1);
$pdf->Cell(210,0,"", 0, 1, 'C');
$pdf->Cell(258,4,"Keep this document in the registered vehicle until recipet of the official Certificate of Registration", 0, 1, 'C');
$pdf->SetLineWidth(0.5);
$pdf->line(13,55,269,55);
$pdf->line(13,67,269,67);
$pdf->SetLineWidth(0.5);
$pdf->line(13,79,269,79);
$pdf->SetLineWidth(0.2);
$pdf->line(13,91,269,91);
$pdf->line(13,55,13,91);
$pdf->line(269,55,269,91);
$pdf->SetLineWidth(0.5);
$pdf->line(98,55,98,91);
$pdf->SetLineWidth(0.2);
$pdf->line(190,55,190,67);
$pdf->line(151,67,151,91);
$pdf->SetFont('arial','',8);
$pdf->Cell(1);
$pdf->Cell(210,5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(2.5,5.8,"", 0, 0, 'L');
$pdf->Cell(85,5.8,"TEMPORARY TAG NO.", 0, 0, 'L');
$pdf->Cell(91.5,5.8,"PURSHASER/NAME", 0, 0, 'L');
$pdf->Cell(81,5.8,"VEHICLE TYPE", 0, 1, 'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(1);
$pdf->Cell(210,3,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(2.5,5,"", 0, 0, 'L');
$pdf->Cell(85,5,"$id_vehicle", 0, 0, 'L');
$pdf->Cell(91.5,5,strtoupper(utf8_decode("$name_1 $name_2")), 0, 0, 'L');
$pdf->Cell(81,5,strtoupper("$model"), 0, 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->Cell(1);
$pdf->Cell(210,1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(2.5,1,"", 0, 0, 'L');
$pdf->Cell(85,1,"VEHICLE YEAR", 0, 0, 'L');
$pdf->Cell(52.5,1,"VEHICLE MAKE", 0, 0, 'L');
$pdf->Cell(81,1,"VEHICLE SERIAL NO.", 0, 1, 'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(1);
$pdf->Cell(210,5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(2.5,5,"", 0, 0, 'L');
$pdf->Cell(85,5,"$year", 0, 0, 'L');
$pdf->Cell(52.5,5,"$make", 0, 0, 'L');
$pdf->Cell(81,5,"$vin_vehicle", 0, 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->Cell(1);
$pdf->Cell(210,1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(2.5,1,"", 0, 0, 'L');
$pdf->Cell(85,1,"ISSUED DATE", 0, 0, 'L');
$pdf->Cell(52.5,1,"EXPIRATION DATE", 0, 0, 'L');
$pdf->Cell(81,1,"DEALER AGENCY NO.", 0, 1, 'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(1);
$pdf->Cell(210,5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(2.5,5,"", 0, 0, 'L');
$pdf->Cell(85,5,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(52.5,5,"$expires", 0, 0, 'L');
$pdf->Cell(81,5,"UH020731", 0, 1, 'L');
$pdf->SetFont('arial','',11.5);
$pdf->Cell(1);
$pdf->Cell(210,9,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(228,5,"PROOF OF FINANCIAL RESPONSIBILITY", 0, 1, 'C');
$pdf->SetFont('arial','',11);
$pdf->Cell(1);
$pdf->Cell(210,2,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(45,5,"", 0, 0, 'L');
$pdf->Cell(223,5,"I affirm that all owner (or lesees leased vehicle) now have insurance or other", 0, 1, 'L');
$pdf->SetFont('arial','',11.8);
$pdf->Cell(1);
$pdf->Cell(45,5,"", 0, 0, 'L');
$pdf->Cell(223,5,"FR coverage and will not operated or permit the operation of this motor", 0, 1, 'L');
$pdf->SetFont('arial','',11);
$pdf->Cell(1);
$pdf->Cell(45,5,"", 0, 0, 'L');
$pdf->Cell(223,5,"vehicle withou FR coverage", 0, 1, 'L');
$pdf->SetFont('arial','',12);
$pdf->Cell(1);
$pdf->Cell(210,2,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(46,5,"", 0, 0, 'L');
$pdf->Cell(140,5,"YOU WILL LOSE YOUR DRIVER LICENSE IF YOU DRIVE WITHOWT INSURSNCE OR", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(46,5,"", 0, 0, 'L');
$pdf->Cell(140,5,"OTHER ACEPTABLE FINANCIAL RESPONSIBILITY COVERAGE", 0, 1, 'C');
$pdf->SetLineWidth(0.6);
$pdf->SetDrawColor(193,193,193);
$pdf->SetDash(1,1);
$pdf->line(0,152,280,152);


$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-OH-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";

    }
?>
