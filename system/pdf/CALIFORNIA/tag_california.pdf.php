<?php
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
    

require('MultiCellBlt.php');
require('html2pdf.php');
$texto="\"How Information is Protected or Disclosed\"";
$texto01="\"IPA Guidelines\"";
$texto02="\"Privacy Policy\"";


$pdf = new PDF();
$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(280,216));
$pdf->AddFont('dealerplate', '', 'dealerplate california.php');
$pdf->Image('Figura.png',94,55,110,108);
$pdf->AddFont('RAGE', '', 'RAGE.php');
$pdf->SetFont('Helvetica','B',40);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(260,20,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->Cell(40, 55, "SEP", 0, 0, 'L');
$pdf->SetFont('RAGE','',102);
$pdf->Cell(180, 44, "California", 0, 0, 'C');
$pdf->SetFont('Helvetica','B',40);
$pdf->Cell(40, 53, "2023", 0, 1, 'L');
$pdf->SetFont('Helvetica','',15.5);
$pdf->Cell(1);
$pdf->Cell(13, -30, "ROS#", 0, 0, 'L');
$pdf->SetFont('Helvetica','B',15.5);
$pdf->Cell(50, -30, "  5740603", 0, 0, 'L');
$pdf->SetFont('Helvetica','B',17);
$pdf->Cell(62, -27, $make, 0, 0, 'L');
$pdf->SetFont('Helvetica','',15);
$pdf->Cell(57, -27, "VIN: ".$vin_vehicle, 0, 0, 'L'); //38
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(105, -27, "EXPIRES: $expires", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(260, 1, "", 0, 1, 'L');
$pdf->Cell(1);
$pdf->SetFont('dealerplate','',272);
$pdf->Cell(260, 134, $id_vehicle, 0, 1, 'L');
$pdf->Image('codigo_qr.png',49,44,25,25);

$pdf->SetMargins(10,5,5);
$pdf->AddPage('L',array(280,216));
$pdf->AddFont('dealerplate', '', 'dealerplate california.php');
$pdf->Image('Figura.png',94,55,110,108);
$pdf->AddFont('RAGE', '', 'RAGE.php');
$pdf->SetFont('Helvetica','B',40);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(260,20,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->Cell(40, 55, "SEP", 0, 0, 'L');
$pdf->SetFont('RAGE','',102);
$pdf->Cell(180, 44, "California", 0, 0, 'C');
$pdf->SetFont('Helvetica','B',40);
$pdf->Cell(40, 53, "2023", 0, 1, 'L');
$pdf->SetFont('Helvetica','',15.5);
$pdf->Cell(1);
$pdf->Cell(13, -30, "ROS#", 0, 0, 'L');
$pdf->SetFont('Helvetica','B',15.5);
$pdf->Cell(50, -30, "  5740603", 0, 0, 'L');
$pdf->SetFont('Helvetica','B',17);
$pdf->Cell(62, -27, $make, 0, 0, 'L');
$pdf->SetFont('Helvetica','',15);
$pdf->Cell(57, -27, "VIN: ".$vin_vehicle, 0, 0, 'L'); //38
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(105, -27, "EXPIRES: $expires", 0, 1, 'C');
$pdf->Cell(1);
$pdf->Cell(260, 1, "", 0, 1, 'L');
$pdf->Cell(1);
$pdf->SetFont('dealerplate','',272);
$pdf->Cell(260, 134, $id_vehicle, 0, 1, 'L');
$pdf->Image('codigo_qr.png',49,44,25,25);

$pdf->SetMargins(5,5,5);
$pdf->SetAutoPageBreak(true,5); 
$pdf->AddPage('P',array(210,297)); 
$pdf->SetFillColor(0, 61, 76); 
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(1);
$pdf->SetFillColor(209,211,212);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(200,2.5,"\nCUSTOMER COPY - DO NOT MAIL TO DMV \n\nPRIVACY NOTICE\n\n",1,"C",true);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(64,60,56);
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(1);
$pdf->Cell(200,5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->MultiCellBlt(200,4,chr(149)," Information provided to the Department of Motor Vehicles'  (DMV)  Registration Operations Division as memorialized on this\n form is subject to the limitations in the Information Practices Act (Civil Code 1798 et seq), the Driver's Privacy Protection Act\n (18 U.S.C. 2721-2725), the California Vehicle Code (CVC) and other applicable state and federal laws and regulations.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->MultiCellBlt(200,4,chr(149)," Personal information is collected under authority of the CVC, Divisions 3, 3.4, 3.6, and 4. The principal purposes within DMV\n for  which  this information is  used  are  for the issuance of temporary and permanent license plates  (when applicable)  and\n issuance of vehicle title and registration.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',9.9);
$pdf->MultiCellBlt(200,4,chr(149)," All information on this form is mandatory except where noted. Failure to provide the requested information is cause for refusal\n to issue or cancellation of a motor vehicle registration and/or title.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->MultiCellBlt(200,4,chr(149)," DMV may verify the information and documents you provide with other governmental agencies.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->MultiCellBlt(200,4,chr(149)," DMV  shares  your  information  with  other  governmental  agencies,  courts,  law  enforcement, and  commercial  entities  as\n authorized  by  law.  For more  information regarding specific CVC Sections or how DMV shares your information, please see\n $texto available on the DMV website at dmv.ca.gov.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->MultiCellBlt(200,4,chr(149)," You  may  obtain  a  copy  of  your  vehicle  registration  record  at  dmv.ca.gov or at any DMV field office during regular office\n hours. To make an appointment to visit a DMV field office during regular business hours, call (800) 777-0133. To access your\n personal information in DMV records, or to request correction/amendment of your record, please see $texto01 on the\n DMV website at dmv.ca.gov.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->MultiCellBlt(200,4,chr(149)," DMV's Privacy Policy is located at dmv.ca.gov under the $texto02 link at the bottom of the webpage.");
$pdf->Cell(1);
$pdf->Cell(200,1.5,"",0,1,"C",1);
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',9.7);
$pdf->MultiCellBlt(200,4,chr(149)," Questions regarding this Notice and regarding any system of records, location of records and the categories of any persons who\n use  the  information  in  those  records  should  be  addressed  to:  Department of Motor Vehicles, ATTN: Chief Privacy Officer -\n MS F127, PO Box 932328, Sacramento, CA 94232-3280.");
$pdf->Cell(1);
$pdf->Cell(28,16,"",0,1,"C");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',7);
$pdf->Cell(66,1,"REG51 (REV 9/2019) UH",0,0,"L");
$pdf->SetFont('Helvetica','BI',10);
//$guion=utf8_decode("— FOR CUSTOMER —");
$pdf->Cell(66,1,"- FOR CUSTOMER -",0,0,"C");
//$pdf->Cell(66,1,"$guion",0,0,"C");
$pdf->Cell(63,1,"Cut Here",0,1,"R");
$pdf->SetFont('Helvetica','',18);
$pdf->Cell(1);
$pdf->Cell(200,0,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,"L");
$pdf->SetFont('Helvetica','',10);
$pdf->Cell(1);
$pdf->Cell(200,3,"",0,1,"R");
$pdf->Cell(200,2,"",0,1,"R");
$pdf->Cell(1);
$pdf->Cell(43,3,"",0,1,"C");
$pdf->SetFont('Helvetica','B',10);
$pdf->Cell(1);
//$pdf->MultiCell(80,3.5,"USED VEHICLE DEALER NOTICE/TEMPORARY IDENTIFICATION\n\n(Must be affixed to the vehicle before delivery to the purchaser)",0,"C",true);
$pdf->Cell(45,3.5,"",0,0,"c");
$pdf->Cell(120,3.5,"USED VEHICLE DEALER NOTICE/TEMPORARY IDENTIFICATION",0,1,"c");
$pdf->Cell(35,2,"",0,1,"c");
$pdf->Cell(1);
$pdf->Cell(45,3.5,"",0,0,"c");
$pdf->Cell(120,2," (Must be affixed to the vehicle before delivery to the purchaser)",0,0,"c");
$pdf->Cell(15,1,"45487524",0,1,"c");
$pdf->Cell(1);
$pdf->Cell(200,5.5,"",0,1,"c");
$pdf->Line(170,140,203,140);
$pdf->Line(170,147,203,147);
$pdf->Line(170,140,170,147);
$pdf->Line(203,140,203,147);

$pdf->Line(7,150,203,150);
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(1);
$pdf->Cell(48,3,"MAKE",0,0,"L");
$pdf->Cell(15,3,"YEAR",0,0,"L");
$pdf->Cell(20,3,"MODEL",0,0,"L");
$pdf->Cell(18.5,3,"BODY TYPE",0,0,"L");
$pdf->Cell(90,3,"VEHICULE INDENTIFICATION NUMBER",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(200,2.5,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','B',8);
$pdf->Cell(48,3, $make,0,0,"L");
$pdf->Cell(15,3, $year,0,0,"L");
$pdf->Cell(20,3, strtoupper($model),0,0,"L");
$pdf->Cell(19,3, strtoupper($body_style),0,0,"L");
$pdf->Cell(90,3, $vin_vehicle,0,1,"L");

$pdf->Line(7,159,203,159);
$pdf->Line(54,150,54,167);
$pdf->Line(69,150,69,159);
$pdf->Line(89,150,89,159);
$pdf->Line(108,150,108,159);
$pdf->Image('imagepng.png',6,134,27,14);
$pdf->Cell(1);
$pdf->Cell(200,1,"",0,1,"L");
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(1);
$pdf->Cell(48,3,"DEALERS NUMBER",0,0,"L");
$pdf->Cell(44,3,"SALESPERSONS NUMBER",0,0,"L");
$pdf->Cell(68,3,"TEMPORARY OR PERMANENT LICENSE PLATE NUMBER",0,0,"L");
$pdf->Cell(12,3,"DATE SOLD (MO/DAY/YR)",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(200,1,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(48,3,$deler_number,0,0,"L");
$pdf->Cell(44,3,strtoupper($seller),0,0,"L");
$pdf->Cell(68,3, $id_vehicle,0,0,"L");
$pdf->Cell(12,3,$fecha_transformada_sale,0,1,"L");

$pdf->Line(7,167,203,167);
$pdf->Line(98,159,98,167);
$pdf->Line(166,159,166,167);
$pdf->Cell(1);
$pdf->Cell(200,1,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(200,3,"SOLD TO PRINT TRUE FULL NAME",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(200,0.5,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','B',8);
$pdf->Cell(200,2,"     ".strtoupper($name_1." ".$name_2),0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',7.5);
$pdf->Cell(101.5,2,"(1)",0,0,"L");
$pdf->Cell(100,2,"(2)",0,1,"L");

$pdf->Line(7,176,203,176);
$pdf->Line(108,167,108,176);
$pdf->Cell(1);
$pdf->Cell(200,1,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(105,3,"BUSINESS OR RESIDENCE ADDRESS",0,0,"L");
$pdf->Cell(15,3,"APTSTE NO",0,0,"L");
$pdf->Cell(33,3,"CITY",0,0,"L");
$pdf->Cell(13,3,"STATE",0,0,"L");
$pdf->Cell(25,3,"ZIP CODE",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(200,2,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','B',6.9);
$pdf->Cell(120,3,strtoupper($adress),0,0,"L");
$pdf->Cell(33,3,strtoupper($city),0,0,"L");
$pdf->Cell(13,3,$estado,0,0,"L");
$pdf->Cell(25,3,$zip,0,1,"L");

$pdf->Line(7,185,203,185);
$pdf->Cell(1);
$pdf->Cell(200,2,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',6.9);
$pdf->Cell(101.5,3,"NOTE: UPON TRANSFER OR SALE, DEALER",0,0,"L");
$pdf->Cell(100,3,"IMPORTANT ENTER BOTH DEALERS AND SALESPERSON'S NUMBERS. This is a",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(200,1,"",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(101.5,3,"MUST ENTER ODOMETER READING HERE",0,0,"L");
$pdf->Cell(100,3,"notice of purchase of vitics Do not use as an application for registration or title",0,1,"L");
$pdf->Image('2.png',60,185.5,47,8);
$pdf->Line(108,185,108,194);

$pdf->Line(7,194,203,194);
$pdf->Cell(1);
$pdf->Cell(200,6,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(66,2,"REG51 (REV 9/2019) UH",0,0,"L");
$pdf->SetFont('Helvetica','BI',10);
$pdf->Cell(66,2,"Fold Here",0,1,"C");
$pdf->SetFont('Helvetica','',18);
$pdf->Cell(1);
$pdf->Cell(200,0,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,"L");
$pdf->Cell(1);
$pdf->Cell(200,12,"",0,1,"R");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(200,3,"USED VEHICLE PURCHASER'S TEMPORARY OPERATING COPY",0,1,"C");
$pdf->Cell(1);
$pdf->Cell(200,6,"",0,1,"R");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',9.5);
$especial=utf8_decode("§4456");
$pdf->MultiCell(200,5,"Pursuant to California Vehicle Code $especial, a vehicle  displaying  a copy of its Report of Sale (this document), and temporary license\nplates,  may  be  operated  without  permanent  license  plates  or registration  card until either of the following, whichever occurs first\n(1) the license plates and registration card are received by the purchaser, or (2) a 90-day period, commencing with the date of sale of\nthe vehicle, has expired.",0,"J",true);
$pdf->Cell(1);
$pdf->Cell(200,5,"",0,1,"R");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(200,3.5,"NOTICE TO PURCHASER",0,1,"C");
$pdf->Cell(1);
$pdf->Cell(200,5,"",0,1,"R");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',9.5);
$pdf->MultiCell(200,5,"This is only a temporary identification and presupposes timely application for registration by the dealer. Once you receive your registration card and permanent license plates, remove this temporary operating copy and temporary license plates (Note: Please allow 60 days for the dealer or lessor-retailer and the department to process your application, then if you have not received your registration card and the license plates assigned to this vehicle, contact your local Department of Motor Vehicles for assistance)",0,"J",true);
$pdf->Cell(1);
$pdf->Cell(200,8,"",0,1,"L");
$pdf->Cell(1);
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(200,3,"REG51 (REV 9/2019) UH",0,1,"L");

$filenamepdf="tag_california.pdf";
$pdf->Output($filenamepdf,'I');

echo "<script>
         window.location.href = 'tag_california.pdf';
     </script>";

}


// Eliminar el archivo generado
unlink($archivoQR);
?>