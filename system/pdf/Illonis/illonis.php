<?php
require('fpdf/fpdf.php');
include('../texas/list_register.php');

 

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
//$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(280,216));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetFillColor(255,211,25);
$pdf->rect(-1,-1,285,220,"FD");
$pdf->SetDrawColor(147,148,152);
$pdf->AddFont('arialn','','ArialNova-Bold.php');
$pdf->AddFont('hass','','NeueHaasDisplayBold.php');
$pdf->SetFont('arialn','',42);
$pdf->Cell(1);
$pdf->Cell(260,10,"", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->Cell(260,12,"ILLIONOIS TEMPORARY PERMIT", 0, 1, 'C');
$pdf->SetFont('arial','',14);
$pdf->Cell(1);
$pdf->Cell(100,15,"$vin_vehicle", 0, 0, 'C');
$pdf->Cell(16,15,"$year", 0, 0, 'C');
$pdf->Cell(36,15,"$make", 0, 0, 'C');
$pdf->Cell(96,15,"PATHFINDER 2537", 0, 1, 'C');
$pdf->SetFont('arialn','',128);
$pdf->Cell(1);
$pdf->Cell(260,40,"$id_vehicle", 0, 1, 'C');
$pdf->SetFillColor(0,0,0);
$pdf->SetFont('arialn','',70);
$pdf->Cell(1);
$pdf->Cell(100,7,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(3,25,"", 0, 0, 'C');
$pdf->Cell(52,20,"Exp:", 0, 0, 'L');
$pdf->SetFont('arialn','',60);
$pdf->Cell(2,25,"", 0, 0, 'L');
$pdf->Cell(100,25,"$expires", 0, 1, 'L');
$pdf->SetFont('arial','',14);
$pdf->Cell(1);
$pdf->Cell(1,3,"", 0, 0, 'L');
$pdf->Cell(260,3,"DEALER ".strtoupper($seller).",   DLR   #   8142   $fecha_transformada_sale", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(260,5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(260,5,"", 0, 'L');
$pdf->SetTextColor(0,0,128);
$pdf->SetFont('arial','',10);
$pdf->Cell(1);
$pdf->Cell(200,7,"$id_vehicle", 0, 1, 'R');
$pdf->Cell(1);
$pdf->Cell(260,10,"", 0, 1, 'L');
$pdf->SetFont('hass','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->Cell(22,11,"", 0, 0, 'L');
$pdf->Cell(120,11,"Owner Copy- Remove and Keep In Vehicle", 0, 0, 'L');
$pdf->Cell(120,11,"Agent Copy - Remove and Retain", 0, 1, 'L');
$pdf->SetFont('arial','',7.5);
$pdf->Cell(1);
$pdf->Cell(27,-2,"", 0, 0, 'L');
$pdf->Cell(65,-2,"$vin_vehicle", 0, 0, 'L');
$pdf->Cell(41,-2,"$year", 0, 0, 'L');
$pdf->Cell(62,-2,"$vin_vehicle", 0, 0, 'L');
$pdf->Cell(32,-2,"$year", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(27,12,"", 0, 0, 'L');
$pdf->Cell(35,12,"$make", 0, 0, 'L');
$pdf->Cell(22,12,"PATHFINDER", 0, 0, 'L');
$pdf->Cell(22,12,"2537", 0, 0, 'L');
$pdf->Cell(27,12,"", 0, 0, 'L');
$pdf->Cell(31,12,"make", 0, 0, 'L');
$pdf->Cell(25,12,"PATHFINDER", 0, 0, 'L');
$pdf->Cell(22,12,"2537", 0, 0, 'L');
$pdf->Cell(16,12,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(27,-2,"", 0, 0, 'L');
$pdf->Cell(39,-2,"DEALER ".strtoupper($seller).", ", 0, 0, 'L');
$pdf->Cell(26,-2,"          DLR # 8142", 0, 0, 'L');
$pdf->Cell(41,-2,$fecha_transformada_sale, 0, 0, 'L');
$pdf->Cell(39,-2,"DEALER ".strtoupper($seller).", ", 0, 0, 'L');
$pdf->Cell(25,-2,"          DLR # 8142", 0, 0, 'L');
$pdf->Cell(30,-2,$fecha_transformada_sale, 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(27,12,"", 0, 0, 'L');

$adress_complet = strtoupper("$adress $city, $estado $zip");
$pdf->Cell(79,12,"DEALER ADDRESS $adress_complet", 0, 0, 'L');
$pdf->Cell(27,12,"", 0, 0, 'L');
$pdf->Cell(78,12,"DEALER ADDRESS $adress_complet", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(27,-2,"", 0, 0, 'L');
$pdf->Cell(65,-2,strtoupper("$name_1 $name_2"), 0, 0, 'L');
$pdf->Cell(41,-2,"$expires", 0, 0, 'L');
$pdf->Cell(65,-2,strtoupper("$name_1 $name_2"), 0, 0, 'L');
$pdf->Cell(41,-2,"$expires", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(27,12,"", 0, 0, 'L');
$pdf->Cell(106,12,"OWNER 2", 0, 0, 'L');
$pdf->Cell(106,12,"OWNER 2", 0, 1, 'L');
$pdf->SetFont('arial','B',14);
$pdf->Cell(1);
$pdf->Cell(18,11,"", 0, 0, 'L');
$pdf->Cell(119,11,"ILLINOIS TEMPORARY PERMIT", 0, 0, 'L');
$pdf->Cell(106,11,"ILLINOIS TEMPORARY PERMIT", 0, 1, 'L');
$pdf->SetFillColor(147,148,152);
$pdf->SetLineWidth(0.1);
$pdf->SetDash(1,1);
$pdf->line(0,142,285,142);
$pdf->Image('codigobarrasfuente.png',178,118,45,15);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->SetTextColor(0,0,128);
$pdf->SetFont('arial','',9.5);
$pdf->TextWithDirection(31,177,$id_vehicle,'U');
$pdf->TextWithDirection(261,177,$id_vehicle,'U');
$pdf->line(0,196,285,196);
$pdf->line(140,150,140,204);
$pdf->Image('codigobarrasfuentevert.png',12,149,15,40);
$pdf->Image('codigobarrasfuentevert.png',242,149,15,40);

$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-IN-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";


unlink($filenamepdf);

}

?>