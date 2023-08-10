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
    include('../INSPECT/list_register_inspect_info.php');

    $jsonData = json_decode($jsonString);

    foreach ($jsonData as $item) {
        $id_make_inspect = $item->id_make_inspect;
        $vin = $item->vin;
        $sale_date = $item->sale_date;
        $year=$item->make_inspect_year;
        $make = $item->make;
        $model = $item->model;
        $vehicle_type = $item->vehicle_type;
        $engine_size = $item->engine_size;
        $LGN = $item->LGN;
        $transmission = $item->transmission;
        $GVW = $item->GVW;
        $odometer = $item->odometer;
        $fuel_type = $item->fuel_type;
        $cylinder = $item->cylinder;
        $license = $item->license;
    
?>    

    <table>
        <thead>
          <tr>
            <td colspan="2" align="center">
              <!-- <img src="txdmv_logo.jpg" alt="Web Dealer" title="Web Dealer - Electronic Title and Registration"> -->
              <h3>TEXAS VEHICLE INSPECTION REPORT</h3>
            </td>
          </tr>
        </thead>
        <tbody id="bodyTable">
          <tr>
            <td colspan="2" align="center"></td>
          </tr>
  
          <!-- Tag Details -->
          <!-- Vehicle Identification -->
  
          <tr>
            <td align="right"><b>TagNo:</b></td>
            <td align="left" id="TagNo"><?php echo $id_make_inspect;?></td>
          </tr>
          <tr>
            <td align="right"><b>Tag Type:</b></td>
            <td align="left">BUYERS TAG</td>
          </tr>
  
          <tr>
            <td align="right"><b>Test Date/Time:</b></td>
            <td align="left" id="effectiveDate"><?php echo $sale_date?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Test and Type:</b></td>
            <td align="left">Initial OBDII</td>
          </tr>
  
          <tr>
            <td align="right"><b>Insp. Type:</b></td>
            <td align="left">OBDNL</td>
          </tr>
  
          <tr>
            <td align="right"><b>Version/Test Number:</b></td>
            <td align="left" >2105/19842</td>
          </tr>
  
          <tr>
            <td align="right"><b>License Number:</b></td>
            <td align="left" style="text-transform: uppercase;"><?php echo $license;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Vehicle ID Number:</b></td>
            <td align="left" id="vin"><?php echo $vin;?></td>
          </tr>

          <tr>
            <td align="right"><b>Vehicle Make:</b></td>
            <td align="left" id="make"><?php echo $make;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Vehicle Model: </b></td>
            <td align="left" style="text-transform: uppercase;"><?php echo $model;?></td>
          </tr>
  
          
          <tr>
            <td align="right"><b>Vehicle Year/Type:</b></td>
            <td align="left" id="bodyStyle"><?php echo $year?>/<span style="text-transform: uppercase;"><?php echo $vehicle_type;?></span></td>
          </tr>
  
          <tr>
            <td align="right"><b>Engine Size/Cyl/Ign:</b></td>
            <td align="left"><?php echo $engine_size."/".$cylinder."/".$LGN;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Authorization Number:</b></td>
            <td align="left" id="numberDealler">ELH7WFUX0EEYV</td>
          </tr>
  
          <tr>
            <td align="right"><b>Transmission/GVW:</b></td>
            <td align="left"><?php echo $transmission."/".$GVW;?></td>
          </tr>
  
          <tr>
            <td align="right"><b>Odometer/Fuel Type:</b></td>
            <td align="left"><?php echo $odometer."/".$fuel_type;?></td>
          </tr>
        </tbody>
      </table>
      
      <table>
        <thead>
          <tr>
            <td colspan="2" align="center">
              <!-- <img src="txdmv_logo.jpg" alt="Web Dealer" title="Web Dealer - Electronic Title and Registration"> -->
              <h3>Station Identification</h3>
            </td>
          </tr>
        </thead>
        <tbody id="bodyTable">
          <tr>
            <td colspan="2" align="center"></td>
          </tr>
  
          <!-- Tag Details -->
          <!-- Vehicle Identification -->
  
          <tr>
            <td align="right"><b>Station Name:</b></td>
            <td align="left" id="TagNo">TSA AUTO</td>
          </tr>
          <tr>
            <td align="right"><b>Station #/Analyzer:</b></td>
            <td align="left">1P58035/WW610157</td>
          </tr>
  
          <tr>
            <td align="right"><b>Station Address:</b></td>
            <td align="left">2324 W CLARENDON DR</td>
          </tr>
  
          <tr>
            <td align="right"><b>Station City:</b></td>
            <td align="left">DALLAS</td>
          </tr>
  
          <tr>
            <td align="right"><b>Station Zip Code:</b></td>
            <td align="left">75208</td>
          </tr>
  
          <tr>
            <td align="right"><b>Inspector First Name:</b></td>
            <td align="left">JUAN</td>
          </tr>
  
          <tr>
            <td align="right"><b>Inspector Last Name:</b></td>
            <td align="left">MONTIEL MORA</td>
          </tr>
  
          <tr>
            <td align="right"><b></b></td>
            <td align="left"></td>
          </tr>

          <tr>
            <td align="right"><b>Safety Inspection Fee:</b></td>
            <td align="left">$7.00</td>
          </tr>
  
          <tr>
            <td align="right"><b>Safety Repair Cost:</b></td>
            <td align="left">$0.00</td>
          </tr>
  
          
          <tr>
            <td align="right"><b>Emissions Test Fee:</b></td>
            <td align="left" id="bodyStyle">$18.00</td>
          </tr>
  
          <tr>
            <td align="right"><b>Emissions Repair Cost:</b></td>
            <td align="left">$0.00</td>
          </tr>
  
          <tr>
            <td align="right"><b></b></td>
            <td align="left">----------</td>
          </tr>
  
          <tr>
            <td align="right"><b>Total Inspection Cost:</b></td>
            <td align="left">$25.00</td>
          </tr>
        </tbody>
      </table>
      <?php
    }
    ?>

    
</body>
</html>