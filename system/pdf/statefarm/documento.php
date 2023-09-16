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
        $fecha_transformada_sale = date("M-d-Y", $fecha_objeto);
    }else{
        $fecha_transformada = '';
    }
    // echo $fecha_transformada;
    $sale_date = $fecha_objeto = strtotime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
    $expires = date("M-d-Y", strtotime($fecha . " +$days days"));

$pdf = new FPDF();
$pdf->SetMargins(5,10,10);
$pdf->AddPage('P',array(216,280));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);
$pdf->AddFont('arialn','','arialbd.php');
$pdf->AddFont('arialbd','','arialbd.php');
$pdf->AddFont('arial','','arial.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('arialmtb','','Arial-MT-Bold.php');
$pdf->AddFont('arials','','ARIALN.php');
$pdf->AddFont('ariblk','','ariblk.php');

$pdf->SetFillColor(255, 0,0);
$pdf->Rect(114,135.8,89.2,5.8,true);
$pdf->SetFillColor(0,0,0);
$pdf->Image("statefarm.jpg",92,99.7,9,6.3);
$pdf->SetLineWidth(0.2);
$pdf->Rect(14,98.5,89.2,89.2);
$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(254, 45, 45);
$pdf->Line(14,107.7,103.2,107.7);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->Rect(114.2,96.7,89,89.4);
$pdf->SetDrawColor(255, 0, 0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('ariblk','',25);
$pdf->Cell(1);
$pdf->Cell(200,23.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(58,8,"", 0, 0, 'L');
$pdf->CellFitScaleForce(89,8,"TEMPORARY AUTO",0,1,'',0);
$pdf->Cell(1);
$pdf->Cell(50,14,"", 0, 0, 'L');
$pdf->CellFitScaleForce(104,14,"IDENTIFICATION CARD",0,1,'',0);
$pdf->SetFont('ariblk','',18);
$pdf->Cell(1);
$pdf->Cell(200,4.3,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(79,14,"", 0, 0, 'L');
$pdf->CellFitScaleForce(44,14,"STATE FARM",0,0,'',0);
$pdf->SetFont('ariblk','',12);
$pdf->Cell(-2,8,"",0,0,'L');
$pdf->CellFitScaleForce(5,9,utf8_decode("®"),0,1,'',0);

$pdf->SetFont('arialmt','',14);
$pdf->Cell(1);
$pdf->Cell(79,12.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(29,5,"", 0, 0, 'L');
$pdf->Cell(79,5,"This card must be carried in the insured motor vehicle at all times.", 0, 1, 'L');

$pdf->SetFont('ariblk','',9.2);
$pdf->Cell(1);
$pdf->Cell(79,13,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(8.2,5,"", 0, 0, 'L');
$pdf->Cell(120,5,"VEHICLE INSURANCE CARD", 0, 0, 'L');
$pdf->SetTextColor(255, 4, 4);
$pdf->Cell(83,1,"IF YOU HAVE AN ACCIDENT-", 0, 1, 'L');

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(1);
$pdf->Cell(190,2.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(126,13.2,"", 0, 0, 'L');
$pdf->SetTextColor(255, 4, 4);
$pdf->Cell(79,2,"NOTIFY POLICE IMMEDIATELY", 0, 1, 'L');
$pdf->SetFont('arialmt','',7);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(1);
$pdf->Cell(8.2,3.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.2,4.5,"", 0, 0, 'L');
$pdf->Cell(24,4.5,"POLICY NUMBER", 0, 0, 'L');
$pdf->Cell(75,4.5,"398523999-1", 0, 0, 'L');
$pdf->Cell(3,-0.5,"1.", 0, 0, 'L');
$pdf->Cell(35,-0.5,"Get  names,  addresses,  and  phone  numbers  of  persons  involved  and", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,3.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(10.2,4.5,"", 0, 0, 'L');
$pdf->SetFont('arialmt','',5);
$pdf->Cell(11,4.5,"INSURED:", 0, 0, 'L');
$pdf->SetFont('arialmt','',7);
$pdf->Cell(88,5.5,"$name_1 $name_2", 0, 0, 'L');
$pdf->Cell(3,-0.5,"", 0, 0, 'L');
$pdf->Cell(35,-0.5,"witnesses. Also get driver license numbers of persons involved and license", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,3,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(109.2,4.5,"", 0, 0, 'L');
$pdf->Cell(3,0.7,"", 0, 0, 'L');
$pdf->Cell(35,0.7,"plate numbers/states of vehicles.", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,3.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(109.2,4.5,"", 0, 0, 'L');
$pdf->Cell(3,0.7,"2.", 0, 0, 'L');
$pdf->SetFont('arialmt','',7.4);
$pdf->Cell(35,0.7,"Don't admit fault or discuss the accident with anyone but State Farm or", 0, 1, 'L');
$pdf->SetFont('arialmt','',7);
$pdf->Cell(1);
$pdf->Cell(8.2,2.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(109.2,4.5,"", 0, 0, 'L');
$pdf->Cell(3,0.7,"", 0, 0, 'L');
$pdf->Cell(35,0.7,"police.", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,3.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(109.2,4.5,"", 0, 0, 'L');
$pdf->Cell(3,0.7,"3.", 0, 0, 'L');
$pdf->Cell(59.5,0.7,"Promptly  notify  your  agent,  log  on to statefarm.com", 0, 0, 'L');
$pdf->SetFont('arialmt','',4);
$pdf->Cell(1,-1,utf8_decode("®"), 0, 0, 'L');
$pdf->SetFont('arialmt','',7);
$pdf->Cell(35,0.7,", or  use  the  State", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2.2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(8.2,4.5,"", 0, 0, 'L');
$pdf->Cell(22,0.7,"EFFECTIVE DATE", 0, 0, 'L');
$pdf->Cell(16,0.7,strtoupper("$fecha_transformada_sale"), 0, 0, 'L');
$pdf->Cell(23,0.7,"EXPIRATION DATA", 0, 0, 'L');
$pdf->Cell(43,0.7,strtoupper("$expires"), 0, 0, 'L');
$pdf->Cell(27,0.7,"Farm mobile app to file a claim.", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(112.2,4.5,"", 0, 0, 'L');
$pdf->Cell(37,0.7,"For EMERGENCY ROAD SERVICE use the State Farm mobile app, log", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,1.7,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(112.2,4.5,"", 0, 0, 'L');
$pdf->Cell(37,0.7,"on to statefarm.com, .", 0, 1, 'L');

$pdf->SetFont('arialmt','',7);
$pdf->Cell(1);
$pdf->Cell(8.2,2.2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(20.2,4.5,"", 0, 0, 'L');
$pdf->Cell(37,0.7,"CAR-YEAR/MAKE/VEHICLE IDENTIFICATION NUMBER", 0, 1, 'L');

$pdf->SetFont('arialmt','',8);
$pdf->Cell(1);
$pdf->Cell(8.2,2.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(32.2,4.5,"", 0, 0, 'L');
$pdf->Cell(37,0.7,"$year,$make ,$body_style,$major_color", 0, 1, 'L');

$pdf->SetFont('arialmt','',10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(1);
$pdf->Cell(8.2,-2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(119.2,4.5,"", 0, 0, 'L');
$pdf->Cell(37,0.7,"HOW TO IDENTIFY YOUR COVERAGES", 0, 1, 'L');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('arialmt','',7);
$pdf->Cell(1);
$pdf->Cell(8.2,3.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(32.2,4.5,"", 0, 0, 'L');
$pdf->Cell(37,1.7,"$vin_vehicle", 0, 1, 'L');

$pdf->SetFont('ariblk','',7);
$pdf->Cell(1);
$pdf->Cell(8.2,0,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(124.5,4.5,"", 0, 0, 'L');
$pdf->CellFitScaleForce(58,0.7,"SEE POLICY FOR FULL NAME AND DEFINITION",0,1,'',0);

$pdf->SetFont('arialmt','',6);
$pdf->Cell(1);
$pdf->Cell(8.2,2.1,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(34.2,4.5,"", 0, 0, 'L');
$pdf->Cell(83,0.7,"FULL COVERAGES", 0, 0, 'L');
$pdf->Cell(52.5,0.7,"North Carolina", 0, 0, 'L');
$pdf->Cell(37,0.7,"Virginia", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2.2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(22,4.5,"", 0, 0, 'L');
$pdf->Cell(80,0.7,"AB BODILY INJURY/PROPERTYDAMAGE", 0, 0, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,0,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.4,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.7,"A, AB", 0, 0, 'L');
$pdf->Cell(43,0.7,"Liability", 0, 0, 'L');
$pdf->Cell(9.5,0.7,"A", 0, 0, 'L');
$pdf->Cell(37.7,0.7,"Liability", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.7,"C", 0, 0, 'L');
$pdf->Cell(43.2,0.7,"Medical Payments", 0, 0, 'L');
$pdf->Cell(9.5,0.7,"A", 0, 0, 'L');
$pdf->Cell(37.7,0.7,"Bodily Injury/Property", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"CRV", 0, 0, 'L');
$pdf->Cell(43,0.5,"Cov. For Rented Veh.", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Damage Liability", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"D", 0, 0, 'L');
$pdf->Cell(43,0.5,"Damage To Your Auto", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"C1", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Medical Expense Benefits", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"E", 0, 0, 'L');
$pdf->Cell(43,0.5,"Fire, Windstorm and Theft", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"D", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Comprehensive", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"G", 0, 0, 'L');
$pdf->Cell(43,0.5,"Collision", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"G", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Collision", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"H", 0, 0, 'L');
$pdf->Cell(43,0.5,"Towing and Labor", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"H", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Towing & Labor", 0, 1, 'L');

$pdf->SetFont('ariblk','',24);
$pdf->SetTextColor(240,218,221);
$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(21.2,4.5,"", 0, 0, 'L');
$pdf->CellFitScaleForce(55,-13.5,"TEMPORARY",0,1,'',0);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('arialmt','',7);
$pdf->Cell(1);
$pdf->Cell(8.2,9.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(78.5,4.5,"", 0, 0, 'L');
$pdf->Cell(10,0.7,"NAIC #", 0, 0, 'L');
$pdf->Cell(22,0.7,"25143", 0, 0, 'L');

$pdf->SetFont('arialmt','',6);
$pdf->Cell(1);
$pdf->Cell(8.2,4.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"R", 0, 0, 'L');
$pdf->Cell(43,0.5,"Extended Transportation Expenses", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"P", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Income Loss Benefits", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"R1", 0, 0, 'L');
$pdf->Cell(43,0.5,"Increased Limits Transportation Expenses", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"R", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Rental Reimbursement", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"S", 0, 0, 'L');
$pdf->Cell(43,0.5,"Death Indemnity, specific Disability", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"S", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Death Indemnity", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"T", 0, 0, 'L');
$pdf->Cell(43,0.5,"Total Disability", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"T", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Total Disability", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"U", 0, 0, 'L');
$pdf->Cell(43,0.5,"Uninsured Motorists", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"U", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Uninsured Motorists", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2.4,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"U1", 0, 0, 'L');
$pdf->Cell(43,0.5,"Uninsured/Underinsured Motorists", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"UNOC", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"Use of Nonowned Cars", 0, 1, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2.1,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(108.2,4.5,"", 0, 0, 'L');
$pdf->Cell(9,0.5,"UNOC", 0, 0, 'L');
$pdf->Cell(43,0.5,"Use of Nonowned Cars", 0, 0, 'L');
$pdf->Cell(9.5,0.5,"", 0, 0, 'L');
$pdf->Cell(37.7,0.5,"", 0, 1, 'L');

$pdf->SetFont('arialmt','',7);
$pdf->Cell(1);
$pdf->Cell(8.2,-17.4,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(8.2,4.5,"", 0, 0, 'L');
$pdf->Cell(13,0.7,"AGENT:", 0, 0, 'L');
$pdf->Cell(78,0.7,"ANDERSEN, VAN", 0, 0, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(8.2,4.5,"", 0, 0, 'L');
$pdf->Cell(13,0.7,"", 0, 0, 'L');
$pdf->Cell(78,0.7,"11342 IRON BRIDGE RD", 0, 0, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,2.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(8.2,4.5,"", 0, 0, 'L');
$pdf->Cell(13,0.7,"", 0, 0, 'L');
$pdf->Cell(78,0.7,"CHESTER, VA 23831-1445", 0, 0, 'L');

$pdf->SetFont('ariblk','',7);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(1);
$pdf->Cell(8.2,13.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(42.5,4.5,"", 0, 0, 'L');
$pdf->Cell(17.7,0.7,"STATE FARM", 0, 0, 'L');
$pdf->SetFont('arialmt','',6);
$pdf->Cell(5,-1,utf8_decode("®"), 0, 0, 'L');

$pdf->SetFont('arialmt','',14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(1);
$pdf->Cell(8.2,31.2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(7.2,5,"", 0, 0, 'L');
$pdf->Cell(17.7,5,"Because many states require evidence of insurance on demand, one copy of this form", 0, 0, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,6,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(54.2,5,"", 0, 0, 'L');
$pdf->Cell(17.7,5,"should be carried in the vehicle at all times.", 0, 0, 'L');

$pdf->Cell(1);
$pdf->Cell(8.2,13,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(23.2,5,"", 0, 0, 'L');
$pdf->Cell(17.7,5,"Emergency Road Service information is located on your insurance card.", 0, 0, 'L');

$pdf->SetFont('arialmt','',6);
$pdf->Cell(1);
$pdf->Cell(6.2,18.2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(6.2,5,"", 0, 0, 'L');
$pdf->Cell(17.7,5,"1001032", 0, 0, 'L');

$numeroAleatorioFL = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-STA-$numeroAleatorioFL.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

// Eliminar el archivo generado
unlink($archivoQR);

}
?>




