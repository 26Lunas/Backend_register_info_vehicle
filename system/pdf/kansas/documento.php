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
    $expires = date("m-d-Y", strtotime($fecha . " +$days days"));




$pdf = new FPDF();
$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(300,180));
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255,255,255);
$pdf->AddFont('arialmtb','','Arial-MT-Bold.php');
$pdf->AddFont('arialmt','','02587_ARIALMT.php');
$pdf->AddFont('ariblk','','ariblk.php');
$pdf->AddFont('arialbd','','arialbd.php');
$pdf->AddFont('calibrib','','calibrib.php');
$pdf->AddFont('calibrin','','calibrin.php');
$pdf->AddFont('calibriz','','calibriz.php');
$pdf->AddFont('tahoman','','tahoman.php');
$pdf->Image('sellop40.png',71,13,154,150);
$pdf->Image('fd.png',29,67.5,22,14);
$pdf->Image('fi.png',243,67.5,22,14);
$pdf->SetLineWidth(0.6);
$pdf->Rect(15, 13, 267, 149);
$pdf->Line(58, 40, 58, 53);
$pdf->Line(85, 40, 85, 53);
$pdf->Line(226, 40, 226, 53);
$pdf->Rect(15, 40, 267, 13);
$pdf->Line(55, 53, 55, 92);
$pdf->Line(240, 53, 240, 92);
$pdf->Rect(15, 92, 267, 70);
$pdf->SetDrawColor(0,0,0);
$pdf->Rect(32, 269, 156, 70);
$pdf->Rect(203, 262, 377, 77);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arialmtb','',74);
$pdf->Cell(1);
$pdf->Cell(277,18.5,"", 0, 1, 'C');
$pdf->Cell(277,13,"$days DAY TAG", 0, 1, 'C');
$pdf->SetFont('tahoman','',14);
$pdf->Cell(1);
$pdf->Cell(277,4.5,"", 0, 1, 'C');
$pdf->SetTextColor(75,75,75);
$pdf->Cell(1);
$pdf->Cell(17,5,"", 0, 0, 'C');
$pdf->Cell(30,5,"MAKE", 0, 0, 'L');
$pdf->Cell(27,5,"YEAR", 0, 0, 'C');
$pdf->Cell(141,5,"VIN#", 0, 0, 'C');
$pdf->Cell(13,5,"", 0, 0, 'C');
$pdf->Cell(44,5,"MODEL", 0, 1, 'L');
$pdf->SetFont('times','',19);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(1);
$pdf->Cell(277,1,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(11,5,"", 0, 0, 'C');
$pdf->Cell(36,5,"$make", 0, 0, 'L');
$pdf->Cell(27,5,"$year", 0, 0, 'C');
$pdf->Cell(141,5,"$vin_vehicle", 0, 0, 'C');
$pdf->Cell(19,5,"", 0, 0, 'C');
$pdf->Cell(42,5,"$body_style", 0, 1, 'L');    
$pdf->SetFont('arialmtb','',95);
$pdf->Cell(1);
$pdf->Cell(277,16.5,"", 0, 1, 'C');
$pdf->Cell(277,13,"$expires", 0, 1, 'C');
$pdf->SetFont('arialmt','',14);
$pdf->TextWithDirection(24,60,'E','R');
$pdf->TextWithDirection(24,64.7,'X','R');
$pdf->TextWithDirection(24,69.2,'P','R');
$pdf->TextWithDirection(25,73.7,'I','R');
$pdf->TextWithDirection(24,78.2,'R','R');
$pdf->TextWithDirection(24,82.8,'E','R');
$pdf->TextWithDirection(24,88,'S','R');
$pdf->TextWithDirection(269,60,'E','R');
$pdf->TextWithDirection(269,64.7,'X','R');
$pdf->TextWithDirection(269,69.2,'P','R');
$pdf->TextWithDirection(270,73.7,'I','R');
$pdf->TextWithDirection(269,78.2,'R','R');
$pdf->TextWithDirection(269,82.8,'E','R');
$pdf->TextWithDirection(269,88,'S','R');
$pdf->SetFont('arialmtb','',120);
$pdf->Cell(1);
$pdf->Cell(277,25,"", 0, 1, 'C');
$pdf->Cell(277,13,"$id_vehicle", 0, 1, 'C');
$pdf->SetFont('arialmtb','',75);
$pdf->Cell(1);
$pdf->Cell(277,21,"", 0, 1, 'C');
$pdf->Cell(277,13,"KANSAS", 0, 1, 'C');
$pdf->SetFont('arialmtb','',14.5);
$pdf->Cell(1);
$pdf->Cell(277,3,"", 0, 1, 'C');
$pdf->Cell(277,6,"AFFIX ON REAR OF VEHICLE AT REGULAR LICENSE PLATE LOCATION", 0, 1, 'C');
$pdf->SetTextColor(75,75,75);
$pdf->SetFont('arialmt','',10);
$pdf->TextWithDirection(20,142.5,'JOPPY TEST','R');
$pdf->TextWithDirection(20,147,'NEW/USED','R');

//Segunda Hoja
$pdf->AddPage('P',array(216,280));
$pdf->AddFont('timesb','','timesb.php');
$pdf->SetMargins(10,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->SetDrawColor(0,0,0);
$pdf->Image('sellop.png',56,21,24,24);
$pdf->Image('barras.gif',15,172,85,13);
$pdf->SetFillColor(174,170,170);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('times','',18);
$pdf->Cell(1);
$pdf->Cell(200,21,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(80,20,"", 0, 0, 'C');
$pdf->Cell(3.5,13,"S", 0, 0, 'L');
$pdf->SetFont('times','',12.5);
$pdf->Cell(19,14,"TATE OF", 0, 0, 'L');
$pdf->SetFont('times','',18);
$pdf->Cell(4.5,13,"K", 0, 0, 'L');
$pdf->SetFont('times','',12.5);
$pdf->Cell(21,14,"ANSAS", 0, 1, 'L');
$pdf->SetFont('timesB','',10);
$pdf->TextWithDirection(156,32,'KANSAS','R');
$pdf->SetFont('times','',10);
$pdf->TextWithDirection(156,36,'Departament of Revenue','R');
$pdf->TextWithDirection(156,40,'Division of Vehicle','R');
$pdf->TextWithDirection(156,44,'PO Box 2505 Topeka, KS 66601-2505','R');
$pdf->SetFont('arialmtb','',14);
$pdf->Cell(1);
$pdf->Cell(200,23.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(197,5,"State of Kansas Vehicle Registration", 0, 1, 'C');
$pdf->SetLineWidth(0.4);
$pdf->Rect(11, 89, 196, 14);
$pdf->Line(46, 79, 46, 96);
$pdf->Line(115, 79, 115, 89);
$pdf->Line(143, 79, 143, 89);
$pdf->Line(97, 96, 97, 103);
$pdf->Line(107, 125, 107, 132);
$pdf->SetLineWidth(0.2);
$pdf->Rect(11, 76, 196, 7,"FD");
$pdf->Rect(11, 119, 196, 7,"FD");
$pdf->Rect(11, 96, 196, 7);
$pdf->Line(77, 83, 77, 96);
$pdf->Line(120, 89, 120, 96);
$pdf->Line(156, 89, 156, 96);
$pdf->SetLineWidth(0.3);
$pdf->Rect(12, 157, 90, 14,"FD");
$pdf->Rect(12, 171, 90, 16);
$pdf->SetLineWidth(0.4);
$pdf->Rect(11, 126, 196, 7);
$pdf->SetLineWidth(0.5);
$pdf->Rect(11, 76, 196, 57);
$pdf->SetLineWidth(0.1);
$pdf->SetDrawColor(213,212,212);
$pdf->SetDash(1,1);
$pdf->Line(0, 190, 280, 190);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('arialmtb','',12);
$pdf->Cell(1);
$pdf->Cell(200,5.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(195,11,"INFORMATION RECORD", 0, 1, 'C');
$pdf->SetTextColor(35, 35, 35);
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(0.5,4,"", 0, 0, 'L');
$pdf->Cell(11,3,"Make:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(22.5,2.5,"$make", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(10,3,"Year:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(20,2.5,"$year", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(20,3,"Body Type:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(17,2.5,"$body_style", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(11,3,"Color:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(16,2.5,"$major_color", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(7.5,3,"VIN:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(17,2.5,"$vin_vehicle", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(200,2.5,"", 0, 1, 'C');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(0.5,5,"", 0, 0, 'L');
$pdf->Cell(11.5,5,"Model:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(22,5,strtoupper("$model"), 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(17,5,"FuelType:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(13,5,"R/G", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(20,5,"Odometer:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(21.5,5,"", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(11,5,"TAG#:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(24,5,"$id_vehicle", 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(24,5,"Date Created:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.63);
$pdf->Cell(17,5,"$fecha_transformada_sale", 0, 1, 'L');
$pdf->SetTextColor(0,0,0);
$valor="Owner".chr(39)."s Name:";
$pdf->Cell(1);
$pdf->Cell(200,2,"", 0, 1, 'C');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(0.5,5,"", 0, 0, 'L');
$pdf->Cell(25,5,$valor, 0, 0, 'L');
$pdf->SetFont('calibrin','',11.3);
$pdf->Cell(60,4.5,strtoupper("$name_1 $name_2"), 0, 0, 'L');
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(14.5,5,"Address:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.3);
$pdf->Cell(70,4.5,strtoupper("$adress, $city, $estado $zip"), 0, 1, 'L');
$pdf->SetFont('arial','',8);
$pdf->Cell(1);
$pdf->Cell(200,3.5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(0.5,3.5,"",0,0,'L');
$pdf->Cell(196,3.5,'I certify under penalty of law that the vehicle noted on the face hereof is covered by at least the minimum amounts of insurance required by the Kansas',0,1,'L');
$pdf->Cell(1);
$pdf->Cell(0.5,3.5,"",0,0,'L');
$pdf->Cell(196,3.5,'Motor Vehicle Laws and that I have no outstanding violations with the Motor Vehicle Administration. I further certify under penalty of perjury, that the',0,1,'L');
$pdf->Cell(1);
$pdf->Cell(0.5,3.5,"",0,0,'L');
$pdf->Cell(196,3.5,'statements made herein are true and correct to the best of my knowledge, information and belief',0,1,'L');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('arialmtb','',12);
$pdf->Cell(1);
$pdf->Cell(200,5,"", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(195,4,"BUSSINESS INFORMATION", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(200,3,"", 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',10.3);
$pdf->Cell(1);
$pdf->Cell(0.5,5,"", 0, 0, 'L');
$pdf->Cell(25,5,"Dealers Name:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.3);
$pdf->Cell(70,4.5,strtoupper("$seller,"), 0, 0, 'L');
$pdf->SetFont('arial','',10);
$pdf->Cell(1);
$pdf->Cell(15.5,5,"Address:", 0, 0, 'L');
$pdf->SetFont('calibrin','',11.3);
$pdf->Cell(70,4.5,strtoupper("223 E Main St, Beloit, KS 67420"), 0, 1, 'L');
$pdf->SetFont('arialbd','',12);
$pdf->Cell(1);
$pdf->Cell(200,34.5,"", 0, 1, 'L');
$pdf->Cell(1);
$pdf->Cell(95,3.5,"PROOF OF REGISTRATION", 0, 1, 'C');

$numeroAleatorio = mt_rand(10, 99);
// $pdf->Output();
$filenamepdf="TAG-KN-$numeroAleatorio.pdf";
// Definir el tipo de contenido y configurar el encabezado Content-Disposition
header('Content-Type: application/pdf');
header("Content-Disposition: inline; filename=$filenamepdf");


$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = $filenamepdf;
     </script>";

} 
?>


