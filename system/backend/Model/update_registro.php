<?php


include('../connection.php');


if ($_POST['id_buyerVehicle']) {

    $id_buyer = $_POST['id_buyerVehicle'];
    $name_1 = $_POST['campoBuyerName1'];
    $name_2 = $_POST['campoBuyerName2'];
    $buyer_city = $_POST['campoBuyerCity'];
    $buyer_email = $_POST['campoBuyerEmail'];
    $buyer_state = $_POST['campoBuyerState'];
    $buyer_phone = $_POST['campoBuyerPhone'];
    $buyer_adress = $_POST['campoBuyerAdress'];
    $buyer_zip = $_POST['campoBuyerZip'];
    $buyer_pdf = $_POST['campoBuyerpdf'];

    $tb_vehicle_vin = $_POST['campoVehicleVin'];
    $tb_vehicle_seller = $_POST['campoVehicleSeller'];
    $tb_vehicle_body_style = $_POST['campoVehicleBodyStyle'];
    $tb_vehicle_major_color = $_POST['campoVehicleMajorColor'];
    $tb_vehicle_minor_color = $_POST['campoVehicleMinorColor'];
    $tb_vehicle_sale_date = $_POST['campoVehicleSaleDate'];
    $tb_vehicle_deler_number = $_POST['campoVehicleDelerNamber'];
    $tb_vehicle_year = $_POST['campoVehicleYear'];
    $tb_vehicle_days = $_POST['campoVehicleDays'];
    $tb_vehicle_make = $_POST['campoVehicleMake'];
    $tb_vehicle_model = $_POST['campoVehicleModel'];
    $tb_vehicle_miles = $_POST['campoVehicleMiles'];

    $query = "UPDATE tb_vehicle AS v
    JOIN tb_buyer AS b ON v.id_buyer = b.id_buyer
    SET v.seller = '$tb_vehicle_seller',
        v.body_style = '$tb_vehicle_body_style',
        v.major_color = '$tb_vehicle_major_color',
        v.minor_color = '$tb_vehicle_minor_color',
        v.sale_date = '$tb_vehicle_sale_date',
        v.deler_number = '$tb_vehicle_deler_number',
        v.year = '$tb_vehicle_year',
        v.days = '$tb_vehicle_days',
        v.make = '$tb_vehicle_make',
        v.model = '$tb_vehicle_model',
        v.miles = '$tb_vehicle_miles',

        b.name_1 = '$name_1',
        b.name_2 = '$name_2',
        b.estado  = '$buyer_state',
        b.city  = '$buyer_city',
        b.email  = '$buyer_email',
        b.phone  = '$buyer_phone',
        b.adress  = '$buyer_adress',
        b.zip  = '$buyer_zip'

    WHERE v.id_buyer = '$id_buyer';
    ";

    $result = mysqli_query($Connection, $query);
    if (!$result) {
        die('Error en la consulta ' . mysqli_error($Connection));
    } else {
        echo "Exito";
    }
}
