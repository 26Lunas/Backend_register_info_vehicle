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
$pdf->SetMargins(10,5,5);
$pdf->AddPage('P',array(216,280));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);
$pdf->AddFont('arialmtb','','Arial-MT-Bold.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('ariblk','','ariblk.php');
$pdf->AddFont('arialbd','','arialbd.php');
$pdf->Image('sellofinal.png',9.5,26,43,43);
$pdf->Image('sellofinal25.png',89,122,37,37);
$pdf->SetLineWidth(0.3);
$pdf->Rect(8.5, 23, 189, 88);
$pdf->Line(106, 12, 106, 22);
$pdf->Rect(44, 65, 106, 19,"FD");
$pdf->Line(0, 118.5, 216, 118.5);
$pdf->rect(8.5, 126, 189, 10);
$pdf->rect(8.5, 136, 189, 28);
$pdf->Line(8.5, 158.5, 121, 158.5);
$pdf->Line(121, 136, 121, 164);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialmt','',29);
$pdf->Cell(1);
$pdf->Cell(277,9,"", 0, 1, 'C');
$pdf->Cell(2,7,"", 0, 0, 'C');
$pdf->Cell(100,7,"NEW MEXICO USA", 0, 1, 'L');
$pdf->SetFont('arialmt','',6);
$pdf->TextWithDirection(108,14,"NMSA 1978, §§ 66-3-18 B Firmly affix to the inside left rear window of the vehicle, unless",'R');
$pdf->TextWithDirection(108,16.5,"the display presents a safety hazard or the permit isn’t visible or readable from that",'R');
$pdf->TextWithDirection(108,18.5,"position, in which case, the permit shall be delayed in such a manner that is clearly visible",'R');
$pdf->TextWithDirection(108,21,"from the rear or left side of the vehicle. NMSA 1978, §§ 66-3-18 B",'R');
$pdf->SetFont('arialmt','',14);
$pdf->Cell(1);
$pdf->Cell(277,2,"", 0, 1, 'C');
$pdf->Cell(2,7,"", 0, 0, 'C');
$pdf->Cell(95,7,"TEMPORARY REGISTRATION PERMIT", 0, 0, 'L');
$pdf->Cell(35,7," YEAR: $year", 0, 0, 'L');
$pdf->Cell(35,7,"MAKE: ".strtoupper($make), 0, 1, 'L');
$pdf->SetFont('arialmt','',73);
$pdf->Cell(1);
$pdf->Cell(277,16.5,"", 0, 1, 'C');
$pdf->Cell(40,7,"", 0, 0, 'C');
$pdf->Cell(95,7,"$id_vehicle", 0, 1, 'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('arialmt','',38);
$pdf->Cell(1);
$pdf->Cell(277,16.5,"", 0, 1, 'C');
$pdf->Cell(36,7,"", 0, 0, 'C');
$pdf->Cell(95,7,"EXP:$expires", 0, 1, 'L');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialmt','',14);
$pdf->Cell(1);
$pdf->Cell(277,9,"", 0, 1, 'C');
$pdf->Cell(175,7,"ISSUE	DATE:	 $fecha_transformada_sale", 0, 1, 'C');
$pdf->SetFont('arialmt','',8);
$pdf->Cell(175,3,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(130,3.5,"Insurance Company: AAAA", 0, 0, 'L');
$pdf->Cell(52,3.5,"Color: $major_color", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(130,3.5,"Policy Number: JL28469", 0, 0, 'L');
$pdf->Cell(52,3.5,"VIN: $vin_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(130,3.5,"Dealer: ".strtoupper($seller), 0, 0, 'L');
$pdf->Cell(52,3.5,strtoupper("Model: $model"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(130,3.5,"Dealer Number: ".strtoupper($deler_number), 0, 0, 'L');
$pdf->Cell(52,3.5,"", 0, 1, 'L');
$pdf->SetFont('arialmt','',14);
$pdf->Cell(1);
$pdf->Cell(17,10,"", 0, 1, 'L');
$pdf->Cell(171,7,"TEMPORARY REGISTRATION PERMIT", 0, 1, 'C');
$pdf->SetFont('arialmt','',8);
$pdf->Cell(1);
$pdf->Cell(-2,3,"", 0, 0, 'L');
$pdf->Cell(18,3,"Plate#", 0, 0, 'L');
$pdf->Cell(25,3,"Issue Date", 0, 0, 'L');
$pdf->Cell(29,3,"Expiration Date", 0, 0, 'L');
$pdf->Cell(41,3,"VIN", 0, 0, 'L');
$pdf->Cell(21,3,"Vehicle Year", 0, 0, 'L');
$pdf->Cell(18,3,"Make", 0, 0, 'L');
$pdf->Cell(31,3,"Body Style", 0, 1, 'L');
$pdf->SetFont('arialmt','',8);
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(19,3.5,"$id_vehicle", 0, 0, 'L');
$pdf->Cell(23.5,3.5,"$fecha_transformada_sale", 0, 0, 'L');
$pdf->Cell(29.5,3.5,"$expires", 0, 0, 'L');
$pdf->Cell(41,3.5,"$vin_vehicle", 0, 0, 'L');
$pdf->Cell(22.5,3.5,"$year", 0, 0, 'L');
$pdf->Cell(18,3.5,strtoupper("$make"), 0, 0, 'L');
$pdf->Cell(31,3.5,"$body_style", 0, 1, 'L');
$pdf->SetFont('arialmt','',8);
$pdf->Cell(1);
$pdf->Cell(200,4,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(32,3.5,"Owner Name", 0, 0, 'L');
$pdf->Cell(35,3.5,"Mailing Address", 0, 0, 'L');
$pdf->Cell(17.5,3.5,"City", 0, 0, 'L');
$pdf->Cell(13,3.5,"State", 0, 0, 'L');
$pdf->Cell(12,3.5,"Zip", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(31,3.5,strtoupper("$name_1"), 0, 0, 'L');
$pdf->Cell(36,3.5,strtoupper("$adress"), 0, 0, 'L');
$pdf->Cell(17.5,3.5,strtoupper("$city"), 0, 0, 'L');
$pdf->Cell(13,3.5,strtoupper("$estado"), 0, 0, 'L');
$pdf->Cell(12,3.5,strtoupper("$zip"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(26,3.5,strtoupper("$name_2"), 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(200,3,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3.5,"", 0, 0, 'L');
$pdf->Cell(58,3.5,"Selling Dealer", 0, 0, 'L');
$pdf->Cell(36,3.5,"Dealer Number:", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,3,"", 0, 0, 'L');
$pdf->Cell(58,3,strtoupper("$seller"), 0, 0, 'L');
$pdf->Cell(36,3,"$deler_number", 0, 1, 'L');
$pdf->SetFont('arialmt','',11);
$pdf->Cell(1);
$pdf->Cell(200,2,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(-2,3,"", 0, 0, 'L');
$pdf->Cell(58,4,"VEHICLE SALE", 0, 1, 'L');
$pdf->SetFont('arialmt','',8);
$pdf->TextWithDirection(123,140,"Insurance: AAAA",'R');
$pdf->TextWithDirection(123,147,"Policy: JL28469",'R');
$pdf->TextWithDirection(123,153.5,"Efective Date From:",'R');
$pdf->TextWithDirection(149,153.5,"11/09/2022",'R');
$pdf->TextWithDirection(170,153.5,"To:",'R');
$pdf->TextWithDirection(175,153.5,"01/08/2023",'R');

$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-NM-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";

}
?>


