$(function () {
    // console.log("Jquery esta funcionando...");

    let valor = localStorage.getItem("valorEnviado");
    $('#campoVehicle-vin').val(valor);
    localStorage.removeItem("valorEnviado");


    let valueCampoVin = $("#campoVehicle-vin").val();
    // console.log(valueCampoVin);
    if(valueCampoVin === ''){
        alert("The vin field is required [ERROR (0x0000vin)]");
        window.location.href = "index.html"
    }

    if (valueCampoVin !== '') {
        let stringValor = String(valueCampoVin);

        $.ajax({
            url: "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/",
            type: "POST",
            data: { format: "json", data: stringValor },
            dataType: "json",
            success: function (result) {
                // console.log(result);

                // Acceder a los datos de la respuesta
                const data = result.Results[0];
                const make = data.Make;
                const model = data.Model;
                const modelYear = data.ModelYear;
                const vin = data.VIN;

                // datos obtenidos
                // console.log(make);
                // console.log(model);
                // console.log(modelYear);
                // console.log(vin);

                $('#campoVehicle-Make').val(make);
                $('#campoVehicle-Model').val(model);
                $('#campoVehicle-year').val(modelYear);


                // conseguir datos del forms
                $(".btn-save").click( function(){
                    alert("Probando el envio de datos...")
                    guardar_register_vehicle_info();
                });
            
                function guardar_register_vehicle_info() {
    
                    let campoVehicleVin = $('#campoVehicle-vin').val();
                    let campoVehicleSaleDate = $('#campoVehicle-saleDate').val();
                    let campoVehicleDays = $('#campoVehicle-days').val();

                    let campoVehicleSeller = $('#campoVehicle-seller').val();
                    let campoVehicleDelerNamber = $('#campoVehicle-delerNumber').val();
                    let campoVehicleMake = $('#campoVehicle-Make').val();
                    let campoVehicleBodyStyle = $('#campoVehicle-bodyStyle').val();
                    let campoVehicleYear = $('#campoVehicle-year').val();
                    let campoVehicleModel = $('#campoVehicle-Model').val();
                    let campoVehicleMajorColor = $('#campoVehicle-majorColor').val();
                    let campoVehicleMinorColor = $('#campoVehicle-minorColor').val();
                    let campoVehicleMiles = $('#campoVehicle-Miles').val();

                    let campoBuyerName1 = $('#campoBuyer-name1').val();
                    let campoBuyerName2 = $('#campoBuyer-name2').val();
                    let campoBuyerAdress = $('#campoBuyer-adress').val();
                    let campoBuyerCity = $('#campoBuyer-city').val();
                    let campoBuyerState = $('#campoBuyer-state').val();
                    let campoBuyerZip = $('#campoBuyer-zip').val();
                    let campoBuyerEmail = $('#campoBuyer-email').val();
                    let campoBuyerPhone = $('#campoBuyer-phone').val();

                    const datos = {
                        campoVehicleVin: campoVehicleVin,
                        campoVehicleSaleDate: campoVehicleSaleDate,
                        campoVehicleDays: campoVehicleDays,

                        campoVehicleSeller: campoVehicleSeller,
                        campoVehicleDelerNamber: campoVehicleDelerNamber,
                        campoVehicleMake: campoVehicleMake,
                        campoVehicleBodyStyle: campoVehicleBodyStyle,
                        campoVehicleYear: campoVehicleYear,
                        campoVehicleModel: campoVehicleModel,
                        campoVehicleMajorColor: campoVehicleMajorColor,
                        campoVehicleMinorColor: campoVehicleMinorColor,
                        campoVehicleMiles: campoVehicleMiles,

                        campoBuyerName1: campoBuyerName1,
                        campoBuyerName2: campoBuyerName2,
                        campoBuyerAdress: campoBuyerAdress,
                        campoBuyerCity: campoBuyerCity,
                        campoBuyerState: campoBuyerState,
                        campoBuyerZip: campoBuyerZip,
                        campoBuyerEmail: campoBuyerEmail,
                        campoBuyerPhone: campoBuyerPhone             
                    };
                    
                    // console.log(campoVehicleVin);

                    $.ajax({
                        type: "POST",
                        url: "backend/Model/register-vehicle-info.php",
                        data: datos,
                        success: function (result) {
                            console.log(result);
                        },
                        error: function(xhr, status, error) {
                            // Manejar errores de la solicitud AJAX si es necesario
                            console.log(xhr.responseText);
                          }
                    });
            
                };
               
               


            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });

    }

});