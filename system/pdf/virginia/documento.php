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
        $fecha_transformada_sale = date("m-d-y", $fecha_objeto);
    }else{
        $fecha_transformada = '';
    }
    // echo $fecha_transformada;
    $sale_date = $fecha_objeto = strtotime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
    $expires = date("m-d-y", strtotime($fecha . " +$days days"));



$pdf = new FPDF();
$pdf->SetMargins(5,10,10);
$pdf->AddPage('L',array(216,280));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(0,0,0);
$pdf->AddFont('arialn','','arialbd.php');
$pdf->AddFont('arialbd','','arialbd.php');
$pdf->AddFont('arial','','arial.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('arialmtb','','Arial-MT-Bold.php');
$pdf->AddFont('tahoma','','tahoma.php');
$pdf->AddFont('tahomabd','','tahomabd.php');
$pdf->AddFont('verdana','','verdana.php');
$pdf->AddFont('trebucbd','','trebucbd.php');
$pdf->AddFont('lucida','','l_10646.php');
$pdf->AddFont('lucidan','','LSANSD.php');
$pdf->AddFont('verdanab','','verdanab.php');
$pdf->AddFont('arials','','ARIALN.php');

$pdf->Image("logovirfinal.png",28,18,50,50);
$pdf->Image("logopeq.png",9,159,25,6.5);
$pdf->Image("checks.png",7,194,4.2,8.5);
$pdf->SetLineWidth(0.7);
$pdf->Rect(7.3,167.2,98,7.2);
$pdf->Rect(105.2,167.2,117,7.2);
$pdf->Rect(7.3,174.6,23.5,7.2);
$pdf->Rect(30.7,174.6,58,7.2);
$pdf->Rect(89,174.6,58.5,7.2);
$pdf->Rect(147.3,174.6,45.5,7.2);
$pdf->Rect(193,174.6,29.2,7.2);
$pdf->Rect(7.3,181.8,65.2,7.2);
$pdf->Rect(72.5,181.8,62.2,7.2);
$pdf->Rect(134.4,181.8,43.3,7.2);
$pdf->Rect(178,181.8,14.8,7.2);
$pdf->Rect(193,181.8,29.2,7.2);
$pdf->SetLineWidth(0.5);
$pdf->Rect(227.2,167.2,40.7,5.5);
$pdf->Rect(227.2,172.6,40.7,5.5);
$pdf->Rect(227.2,177.9,40.7,5.5);
$pdf->Rect(227.2,183.5,40.7,5.5);
$pdf->SetLineWidth(0.3);
$pdf->line(6,204.7,143,204.7);
$pdf->line(172,204.7,269,204.7);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('trebucbd','',36);
$pdf->Cell(1);
$pdf->Cell(260,9,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(79.5,14,"", 0, 0, 'L');
$pdf->Cell(90,14,"V I R G I N I A", 0, 0, 'L');
$pdf->SetFillColor(0,0,0);
$pdf->Rect(171,17.5,75,17,true);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('arials','',36);
$pdf->Cell(79,14,"Exp: $expires", 0, 1, 'L');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('tahoma','',18);
$pdf->Cell(1);
$pdf->Cell(190,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(77.5,9,"", 0, 0, 'L');
$pdf->Cell(84,7,"$year $make /$model/$major_color", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(77.5,6,"", 0, 0, 'L');
$pdf->SetFont('tahoma','',18);
$pdf->Cell(13,6,"VIN:", 0, 0, 'L');
$pdf->SetFont('lucida','',16);
$pdf->Cell(84,7,"$vin_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(260,2,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(76.5,6,"", 0, 0, 'L');
$pdf->SetFont('lucida','',18);
$pdf->Cell(26,6,"Sold By:", 0, 0, 'L');
$pdf->Cell(17,6,"", 0, 0, 'L');
$pdf->SetFont('tahoma','',18);
$pdf->Cell(84,6,"$seller,", 0, 1, 'L');
$pdf->SetFont('tahomabd','',180);
$pdf->Cell(1);
$pdf->Cell(260,55,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(30,6.2,"", 0, 0, 'L');
$pdf->CellFitScaleForce(230,6.2,"$id_vehicle",0,1,'',0);
$pdf->SetFont('tahomabd','',12);
$pdf->Cell(1);
$pdf->Cell(260,35.5,"", 0, 1, 'C');
$pdf->Cell(78,10,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->CellFitScaleForce(85,6,"TEMPORARY CERTIFICATE OF REGISTRATION",0,1,'',0);
$pdf->SetFont('arialmt','',12);
$pdf->Cell(1);
$pdf->Cell(101.5,4.5,"", 0, 0, 'L');
$pdf->CellFitScaleForce(37,4.5,"VALID FOR $days DAYS",0,1,'',0);
$pdf->SetFont('tahoma','',6);
$pdf->Cell(1);
$pdf->Cell(190,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(0.5,4.8,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(98,4.8,"PURCHASER'S NAME:", 0, 0, 'L');
$pdf->Cell(121.7,4.8,"ADDRESS:", 0, 0, 'L');
$pdf->Cell(35,4.6,"TEMPORARY TAG NUMBER:", 0, 1, 'L');//4
$pdf->SetFont('tahomabd','',6);
$pdf->Cell(1);
$pdf->Cell(2,2,"", 0, 0, 'L');
$pdf->Cell(99,2.5,"$name_1 $name_2", 0, 0, 'L');
$pdf->SetFont('arialbd','',5.5);
$pdf->Cell(120.5,2.5,"$adress $city $estado $zip", 0, 0, 'L');
$pdf->SetFont('arialbd','',6);
$pdf->Cell(35,1.5,"$id_vehicle:", 0, 1, 'L');
$pdf->SetFont('lucida','',5.5);
$pdf->Cell(1);
$pdf->Cell(192,2,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(4,5,"", 0, 0, 'L');
$pdf->Cell(23,5,"YEAR:", 0, 0, 'L');
$pdf->Cell(57,5,"MAKE:", 0, 0, 'L');
$pdf->Cell(58,5,"BODY STYLE", 0, 0, 'L');
$pdf->Cell(46,5,"IDENTIFICATION NUMBER:", 0, 0, 'L');
$pdf->Cell(33.3,4,"STATE IN WHICH", 0, 0, 'L');
$pdf->Cell(39,0,"DATE OF SALE:", 0, 1, 'L');
$pdf->SetFont('tahomabd','',5.5);
$pdf->Cell(1);
$pdf->Cell(192,3,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(4,5,"", 0, 0, 'L');
$pdf->Cell(23,5,"$year", 0, 0, 'L');
$pdf->Cell(57,5,"$make", 0, 0, 'L');
$pdf->Cell(58,5,"$model", 0, 0, 'L');
$pdf->SetFont('lucida','',5.5);
$pdf->Cell(46,5,"$vin_vehicle", 0, 0, 'L');
$pdf->Cell(33.5,2.2,"VEHICLE WILL BE", 0, 0, 'L');
$pdf->SetFont('tahomabd','',5.5);
$pdf->Cell(39,-1.2,"$fecha_transformada_sale", 0, 1, 'L');
$pdf->SetFont('lucida','',5.5);
$pdf->Cell(1);
$pdf->Cell(192,3,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(188,2.7,"", 0, 0, 'L');
$pdf->Cell(20,2.9,"LICENSED:", 0, 0, 'L');
$pdf->SetFont('arialbd','',5.5);
$pdf->Cell(13.3,1,"VA", 0, 0, 'L');
$pdf->SetFont('lucida','',5.5);
$pdf->Cell(46,1,"EXPIRATION DATE:", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(192,2.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(221.5,2,"", 0, 0, 'L');
$pdf->SetFont('tahomabd','',5.5);
$pdf->Cell(39,-1.2,"$expires", 0, 1, 'L');
$pdf->SetFont('tahoma','',6);
$pdf->Cell(1);
$pdf->Cell(190,0.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(0.5,4.8,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(65.5,4.8,"DEALER'S NAME:", 0, 0, 'L');
$pdf->Cell(62,4.8,"ADDRESS:", 0, 0, 'L');
$pdf->Cell(43.5,4,"CITY:", 0, 0, 'L');
$pdf->Cell(15,4,"STATE:", 0, 0, 'L');
$pdf->Cell(33.7,4,"ZIP:", 0, 0, 'L');
$pdf->Cell(25,6.5,"DEALER LICENSE NUMBER:", 0, 0, 'L');
$pdf->SetFont('arialbd','',6);
$pdf->Cell(1);
$pdf->Cell(190,3,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(0.5,4.8,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(65.5,4.8,"$seller,", 0, 0, 'L');
$pdf->Cell(62,4.8,"$adress", 0, 0, 'L');
$pdf->Cell(43.5,4,"$city,", 0, 0, 'L');
$pdf->Cell(15,4,"$estado", 0, 0, 'L');
$pdf->Cell(33.7,4,"$zip", 0, 0, 'L');
$pdf->Cell(25,5,"$deler_number", 0, 1, 'L');
$pdf->SetFont('tahoma','',5.2);
$pdf->Cell(1);
$pdf->Cell(0.5,3,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(65.5,3,"Virginia law states that a motor vihicle liability policy must be issued by a company licensed to do business in Virginia. The policy must provide at least minimum coverage as required by law.", 0, 1, 'L');
$pdf->SetFont('tahoma','',5.5);
$pdf->Cell(1);
$pdf->Cell(192,1.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(4.2,2.5,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(65.5,2.5,"This vehicle is insured by a policy that meets the above requirements.", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(4.2,2.5,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(65.5,2.5,"This vehicle will be licensed in Virginia and is not insured by a policy meeting the above requirements.", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(4.2,2.5,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(134,2.5,"This vehicle will be licensed out of state and is not insured by a policy meeting the above requirements.", 0, 0, 'L');
$pdf->SetFont('tahomabd','',8);
$pdf->Cell(9.5,2.5,"NOTE:", 0, 0, 'L');
$pdf->SetFont('lucidan','',5);
$pdf->Cell(18.8,2,"Payment of UMV fee", 0, 0, 'L');
$pdf->SetFont('verdanab','',5);
$pdf->Cell(9,2,"does not", 0, 0, 'L');
$pdf->SetFont('lucida','',5);
$pdf->Cell(20,2,"provide insurance coverage", 0, 1, 'L');
$pdf->SetFont('tahomabd','',5.5);
$pdf->Cell(1);
$pdf->Cell(192,4,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(-2,2.5,"", 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(101,2.5,"PURCHASER'S SIGNATURE", 0, 0, 'L');
$pdf->Cell(65,2.5,"DATE", 0, 0, 'L');
$pdf->Cell(65.5,2,"DEALER REPRESENTATIVE'S SIGNATURE", 0, 1, 'L');

$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-VA-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";

}
?>





