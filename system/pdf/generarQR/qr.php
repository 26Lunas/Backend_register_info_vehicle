<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <link rel="icon" type="image/x-icon" href="../img/icono-estrella.ico">
    <title>txdmvgot.com</title>
</head>
<body>

    <style>
        .center {
          display: flex;
          justify-content: center;
        }
  
        table,
        th,
        td {
          border-collapse: collapse;
          justify-content: center;
        }
  
        th,
        td {
          max-width: 55%;
          padding-top: 2px;
          padding-bottom: 2px;
          padding-left: 4px;
          padding-right: 5px;
        }
  
        tr {
          font-size: larger;
        }
    </style>

<?php
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
        $name_state = $item->name_state;

        $fecha = $sale_date;
        $facha_sale = new DateTime($fecha);
        $sale_fecha_format = $facha_sale->format('m/d/Y');
    
        $name_state = str_replace(' ', '', $name_state);
        
        $sale_date = new DateTime($sale_date);
        $expires = $sale_date->modify("+$days days");
        $formattedDateExpires = $expires->format('M d, Y');
        $formattedDateExpires2 = $expires->format('m/d/Y');

        ?>

    <table>
        <thead>
          <tr>
            <td colspan="2" align="center">
              <img src="txdmv_logo.jpg" alt="Web Dealer" title="Web Dealer - Electronic Title and Registration">
            </td>
          </tr>
        </thead>
        <tbody id="bodyTable">
          <tr>
            <td colspan="2" align="center"></td>
          </tr>
  
          <!-- Tag Details -->
  
          <tr>
            <td align="right"><b>TagNo:</b></td>
            <td align="left" id="TagNo"><?php echo $id_vehicle;?></td>
          </tr>
          <tr>
            <td align="right"><b>Tag Type:</b></td>
            <td align="left">BUYERS TAG</td>
          </tr>
  
          <tr>
            <td align="right"><b>Effective Timestamp:</b></td>
            <td align="left" id="effectiveDate"><?php echo $sale_fecha_format;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Verification Code:</b></td>
            <td align="left" id="verificationCode">20233069UK</td>
          </tr>

          <?php


date_default_timezone_set('America/New_York'); // Establece la zona horaria a Nueva York
$hora_actual = date("h:i A");

          ?>
  
          <tr>
            <td align="right"><b>Create Timestamp:</b></td>
            <td align="left" id="timestamp"><?php echo $sale_fecha_format;?> <?php echo $hora_actual;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>End Timestamp:</b></td>
            <td align="left" id="expires"><?php echo $formattedDateExpires2;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Status Code:</b></td>
            <td align="left">ACTIVE</td>
          </tr>
  
          <!-- Vehicle Details -->
  
          <tr>
            <td align="right"><b>VIN:</b></td>
            <td align="left" id="vin"><?php echo $vin_vehicle;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Model Year:</b></td>
            <td align="left" id="year"><?php echo $year;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Make:</b></td>
            <td align="left" id="make"><?php echo $make;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Vehicle BodyType:</b></td>
            <td align="left" id="bodyStyle"><?php echo $body_style;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Major Color:</b></td>
            <td align="left" id="color"><?php echo $major_color;?></td>
          </tr>
  
          <!-- Dealer Details -->
  
          <tr>
            <td align="right"><b>Dealer GDN:</b></td>
            <td align="left" id="numberDealler"><?php echo $deler_number;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Dealer Name:</b></td>
            <td align="left"><?php echo $name_1." ". $name_2;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Dealer DBA:</b></td>
            <td align="left"><?php echo $seller;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Address:</b></td>
            <td align="left"><?php echo $adress;?></td>
          </tr>
        </tbody>
      </table>

      <?php
    }
    ?>

    
</body>
</html>