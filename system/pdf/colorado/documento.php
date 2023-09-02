<?php
require('fpdf/fpdf.php');
include('../texas/list_register.php');

$jsonData = json_decode($jsonString);

foreach ($jsonData as $item) {
    $id_vehicle = $item->id_vehicle;
    $vin_vehicle = $item->vin_vehicle;
    $seller = $item->seller;
    $deler_number = $item->deler_number;
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
    $pdf2 = $item->pdf;

    $fecha = $sale_date;
    if ($fecha !== '') {
        $fecha_objeto = strtotime($fecha);
        $fecha_transformada = date("M d, Y", $fecha_objeto);
        $fecha_transformada_sale = date("m/d/Y", $fecha_objeto);
    } else {
        $fecha_transformada = '';
    }
    // echo $fecha_transformada;
    $sale_date = $fecha_objeto = strtotime($sale_date); // Suponiendo que $sale_date es la cadena de fecha
    $expires = date("M-d-Y", strtotime($fecha . " +$days days"));
    $parts = explode("-", $expires); // Dividir la cadena en partes usando el espacio como separador

    $expiresM = $parts[0]; // Mes
    $expiresD = $parts[1]; // Día
    $expiresY = $parts[2]; // Año


    $pdf = new FPDF();
    $pdf->SetMargins(10, 5, 5);
    $pdf->AddPage('L', array(266.87, 141.31));
    $pdf->SetAutoPageBreak(true, 5);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFillColor(0, 0, 0);
    $pdf->AddFont('arialmtb', '', 'Arial-MT-Bold.php');
    $pdf->AddFont('arialmt', '', '02587_ARIALMT.php');
    $pdf->AddFont('ariblk', '', 'ariblk.php');
    $pdf->AddFont('arialbd', '', 'arialbd.php');
    $pdf->AddFont('micross', '', 'micross.php');
    $pdf->AddFont('microssb', '', 'ms-reference-sans-serif-bold.php');
    $pdf->AddFont('calibrib', '', 'calibrib.php');
    $pdf->AddFont('LSANS', '', 'LSANS.php');
    $pdf->AddFont('LSANSD', '', 'LSANSD.php');

    $pdf->SetDash(1, 2);
    $pdf->SetLineWidth(0.8);
    $pdf->SetDrawColor(48, 92, 54);
    $pdf->Rect(-1, 22, 262, 113);
    $pdf->Image('imagenfinal.png', 0, 0, 267, 24);

    $pdf->SetDash(0, 0);
    $pdf->SetLineWidth(0.5);
    $pdf->SetDrawColor(173, 173, 173);
    $pdf->Rect(6, 35.5, 243.5, 90);
    $pdf->Rect(6, 116.25, 244, 9);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(6, 35, 244, 41);
    $pdf->Rect(6, 76, 244, 29.25);
    $pdf->Line(86, 76.5, 86, 104.75);
    $pdf->Line(175, 76.5, 175, 115.25);
    $pdf->Rect(6, 105.25, 244, 10.5);
    $pdf->Rect(6, 115.75, 244, 10);
    $pdf->Line(74, 115.75, 74, 125.25);
    $pdf->Line(159, 115.75, 159, 125.25);
    $pdf->SetTextColor(0, 0, 0);

    /*$pdf->SetFont('micross','',130);
    $pdf->Cell(1);
    $pdf->Cell(258.50,50.5,"", 0, 1, 'C');
    $pdf->Cell(238.5,5,"7933102", 0, 0, 'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(-235,4.5,"7933102", 0, 0, 'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(234,5,"7933102", 0, 0, 'C');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(-235,4.75,"7933102", 0, 1, 'C');*/

    $pdf->SetFont('micross', '', 130);
    $pdf->Cell(1);
    $pdf->Cell(258.50, 50.5, "", 0, 1, 'C');
    $pdf->Cell(238.5, 5, "$id_vehicle", 0, 0, 'C');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('micross', '', 80);
    $pdf->Cell(1);
    $pdf->Cell(160, 32, "", 0, 1, 'C');
    $pdf->Cell(1);
    $pdf->Cell(3, 7, "", 0, 0, 'L');
    $pdf->Cell(100, 7, strtoupper("$expiresM"), 0, 0, 'L');
    // $pdf->Cell(15, 7, "0", 0, 0, 'L');
    $pdf->SetFont('LSANS', '', 78);
    $pdf->Cell(65, 7, $expiresD, 0, 0, 'L');
    $pdf->SetFont('micross', '', 80);
    $pdf->Cell(62, 7, "$expiresY", 0, 1, 'L');
    $pdf->SetFont('calibrib', '', 24);
    $pdf->Cell(1);
    $pdf->Cell(99.5, 13, "", 0, 1, 'L');
    $pdf->Cell(148, 7, "$vin_vehicle", 0, 0, 'C');
    $pdf->SetFont('micross', '', 27);
    $pdf->Cell(34.5, 7, "", 0, 0, 'C');
    $pdf->Cell(50, 7, "$major_color", 0, 1, 'C');
    $pdf->Cell(1);
    $pdf->Cell(100, 3.75, "", 0, 1, 'L');
    $pdf->Cell(1);
    $pdf->Cell(50, 7, "$year", 0, 0, 'C');
    $pdf->Cell(100, 7, strtoupper("$make"), 0, 0, 'C');
    $pdf->Cell(39, 7, "", 0, 0, 'C');
    $pdf->SetFont('micross', '', 27);
    $pdf->Cell(45, 7, strtoupper("$model"), 0, 1, 'L');

    $pdf->SetFont('calibrib', '', 5.75);
    $pdf->TextWithDirection(7.5, 86.5, 'E', 'R');
    $pdf->TextWithDirection(7.5, 88.25, 'X', 'R');
    $pdf->TextWithDirection(7.5, 90, 'P', 'R');
    $pdf->TextWithDirection(7.5, 91.75, 'I', 'R');
    $pdf->TextWithDirection(7.5, 93.5, 'R', 'R');
    $pdf->TextWithDirection(7.5, 95.25, 'E', 'R');
    $pdf->TextWithDirection(7.5, 97, 'S', 'R');

    $pdf->TextWithDirection(7.5, 109, 'V', 'R');
    $pdf->TextWithDirection(7.5, 110.75, 'I', 'R');
    $pdf->TextWithDirection(7.5, 112.5, 'N', 'R');

    $pdf->TextWithDirection(7.5, 118.25, 'Y', 'R');
    $pdf->TextWithDirection(7.5, 120.25, 'E', 'R');
    $pdf->TextWithDirection(7.5, 122.25, 'A', 'R');
    $pdf->TextWithDirection(7.5, 124.25, 'R', 'R');

    $pdf->TextWithDirection(176.5, 107.5, 'C', 'R');
    $pdf->TextWithDirection(176.5, 109, 'O', 'R');
    $pdf->TextWithDirection(176.5, 110.5, 'L', 'R');
    $pdf->TextWithDirection(176.5, 112, 'O', 'R');
    $pdf->TextWithDirection(176.5, 113.5, 'R', 'R');

    $pdf->TextWithDirection(75, 118.25, 'M', 'R');
    $pdf->TextWithDirection(75, 120.25, 'A', 'R');
    $pdf->TextWithDirection(75, 122.25, 'K', 'R');
    $pdf->TextWithDirection(75, 124.25, 'E', 'R');

    $pdf->TextWithDirection(161, 118.25, 'B', 'R');
    $pdf->TextWithDirection(161, 120.25, 'O', 'R');
    $pdf->TextWithDirection(161, 122.25, 'D', 'R');
    $pdf->TextWithDirection(161, 124.25, 'Y', 'R');

    $pdf->SetFont('calibrib', '', 10);
    $pdf->TextWithDirection(39, 103.75, "MONTH", 'R');
    $pdf->TextWithDirection(127, 103.75, "DAY", 'R');
    $pdf->TextWithDirection(211, 103.75, "YEAR", 'R');

    //Segunda Hoja
    $pdf->SetMargins(10, 5, 5);
    $pdf->AddPage('L', array(297.05, 120.82));
    $pdf->SetAutoPageBreak(true, 5);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFillColor(0, 0, 0);

    $pdf->Image('logo02.jpg', 17, 9, 24, 24);

    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('micross', '', 13);
    $pdf->Cell(1);
    $pdf->Cell(260, 10, "", 0, 1, 'C');
    $pdf->Cell(1);
    $pdf->Cell(109, 7, "", 0, 0, 'L');
    $pdf->Cell(76, 6, "COLORADO DEPARTMENT OF PUBLIC", 0, 1, 'L');
    $pdf->Cell(1);
    $pdf->Cell(102, 4, "", 0, 0, 'L');
    $pdf->Cell(74, 4, "SAFETY BUREAU OF MOTOR VEHICLES", 0, 1, 'L');
    $pdf->SetFont('micross', '', 15);
    $pdf->Cell(1);
    $pdf->Cell(102, 22, "", 0, 0, 'L');
    $pdf->Cell(75, 23, "REGISTRATION FOR DEALER", 0, 1, 'L');
    $pdf->Cell(1);
    $pdf->Cell(115, -10, "", 0, 0, 'L');
    $pdf->Cell(74, -10, "TEMPORARY TAGS", 0, 1, 'L');

    $pdf->SetLineWidth(0.7);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(14.5, 78, 266, 12);
    $pdf->Rect(14.5, 89.75, 266, 11.5);
    $pdf->Rect(14.5, 101.5, 266, 11.75);
    $pdf->Line(218, 78.5, 218, 90);
    $pdf->Line(109.5, 101.5, 109.5, 112.5);
    $pdf->Line(166, 101.5, 166, 112.5);
    $pdf->Line(218, 101.5, 218, 112.5);


    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(1);
    $pdf->Cell(260, 42, "", 0, 1, 'C');
    $pdf->Cell(1);
    $pdf->Cell(5, 7, "", 0, 0, 'L');
    $pdf->Cell(10, 6, "NAME:", 0, 0, 'L');
    $pdf->SetFont('micross', '', 15);
    $pdf->Cell(5.5, 6, "", 0, 0, 'L');
    $pdf->Cell(76, 6, strtoupper($name_1 . " " . $name_2), 0, 0, 'L');
    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(100, 6, "", 0, 0, 'C');
    $pdf->Cell(11.5, 6, "", 0, 0, 'L');
    $pdf->Cell(20, 6, "PERMIT NUMBER:", 0, 0, 'L');
    $pdf->SetFont('micross', '', 18);
    $pdf->Cell(12, 6, "", 0, 0, 'L');
    $pdf->Cell(16, 6, "$id_vehicle", 0, 1, 'L');

    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(1);
    $pdf->Cell(260, 5, "", 0, 1, 'C');
    $pdf->Cell(1);
    $pdf->Cell(5, 7, "", 0, 0, 'L');
    $pdf->Cell(10, 6, "BUSSINES ADDRESS:", 0, 0, 'L');
    $pdf->SetFont('micross', '', 15);
    $pdf->Cell(37, 6, "", 0, 0, 'L');
    $pdf->Cell(76, 6, "1222 10TH APT", 0, 1, 'L');

    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(1);
    $pdf->Cell(260, 7, "", 0, 1, 'C');
    $pdf->Cell(1);
    $pdf->Cell(5, 7, "", 0, 0, 'L');
    $pdf->Cell(10, 6, "CITY:", 0, 0, 'L');
    $pdf->SetFont('micross', '', 15);
    $pdf->Cell(5.5, 6, "", 0, 0, 'L');
    $pdf->Cell(79, 6, strtoupper("$city"), 0, 0, 'L');

    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(9, 6, "STATE:", 0, 0, 'L');
    $pdf->SetFont('micross', '', 15);
    $pdf->Cell(6, 6, "", 0, 0, 'L');
    $pdf->Cell(42, 6, "$estado", 0, 0, 'L');

    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(10, 7, "ZIP CODE:", 0, 0, 'L');
    $pdf->SetFont('micross', '', 15);
    $pdf->Cell(9, 6.5, "", 0, 0, 'L');
    $pdf->Cell(34, 6.5, "$zip", 0, 0, 'L');

    $pdf->SetFont('micross', '', 10);
    $pdf->Cell(8, 5, "DEALER TELEPHONE NUMBER:", 0, 1, 'L');

    $pdf->Cell(1);
    $pdf->SetFont('micross', '', 12);
    $pdf->Cell(226, 4, "", 0, 0, 'L');
    $pdf->Cell(15.5, 4, "2048711928", 0, 0, 'L');

    $numeroAleatorio = mt_rand(10, 99);
    // $pdf->Output();
    $filenamepdf = "TAG-COL-$numeroAleatorio.pdf";
    // Definir el tipo de contenido y configurar el encabezado Content-Disposition
    header('Content-Type: application/pdf');
    header("Content-Disposition: inline; filename=$filenamepdf");


    $pdf->Output($filenamepdf, 'I');

    echo "<script>
         window.location.href = $filenamepdf;
     </script>";
}

?>