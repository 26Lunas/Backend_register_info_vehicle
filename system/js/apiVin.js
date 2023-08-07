$(function () {
    // console.log("Jquery esta funcionando...");

    let valor = localStorage.getItem("valorEnviado");
    $('#campoVehicle-vin').val(valor);
    localStorage.removeItem("valorEnviado");

    let estado = localStorage.getItem("estado");
    // console.log(estado);
    $('#campoBuyer-state').val(estado);
    localStorage.removeItem("estado");

    $('.btn-cancel').click(                                                                                                                                       function (){
        window.location.href = "index.html"
    });

    
    $('.inputDigits').on('input', function() {
        var inputValue = $(this).val();
        var maxLength = 3;
        
        if (inputValue.length > maxLength) {
            $(this).val(inputValue.slice(0, maxLength));
        }
    });



    let valueCampoVin = $("#campoVehicle-vin").val();
    // console.log(valueCampoVin);

    if (valueCampoVin === '') {
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
               let makeDigitos4 = make.toString().slice(0, 4);
                $('#campoVehicle-Make').val(makeDigitos4);
                $('#campoVehicle-Model').val(model.toString().slice(0, 3));
                $('#campoVehicle-year').val(modelYear);


                // conseguir datos del forms
                $(".btn-save-vehicle").click(function () {
                    let camposRequeridos = $(".required");
                    // console.log(camposRequeridos);
                    camposRequeridos.each(function () {
                        if ($(this).val() === '') {
                            algunoVacio = true;
                            $(this).addClass('valor-vacio');
                            return false; // Detener la iteración si se encuentra un valor vacío
                        }
                        if ($(this).val() !== '') {
                            $(this).removeClass('valor-vacio');
                            algunoVacio = false
                        }

                    });
                    if (algunoVacio) {
                        alert('Al menos uno de los valores está vacío.');
                    } else {
                        guardar_register_vehicle_info();
                        alert("Datos registrados con exito!");
                    }

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
                            $("#form-register")[0].reset();
                        },
                        error: function (xhr, status, error) {
                            // Manejar errores de la solicitud AJAX si es necesario
                            console.log(xhr.responseText);
                        }
                    });

                };

                $(".btn-save-inspect").click(function () {

                    let camposRequeridos = $(".required");
                    // console.log(camposRequeridos);
                    camposRequeridos.each(function () {
                        if ($(this).val() === '') {
                            algunoVacio = true;
                            $(this).addClass('valor-vacio');
                            $(this).focus();
                            return false; // Detener la iteración si se encuentra un valor vacío
                        }
                        if ($(this).val() !== '') {
                            $(this).removeClass('valor-vacio');
                            algunoVacio = false
                        }
                    });
                    if (algunoVacio) {
                        console.log('Al menos uno de los valores está vacío.');
                    } else {
                        guardar_register_make_inspect();
                        alert("Datos registrados con exito!");
                        window.location.href = "list_register_inspect.html"
                    }
                });

                function guardar_register_make_inspect() {

                    let make_inspect_vin = $('#campoVehicle-vin').val();
                    let make_inspect_saleDays = $('#campoVehicle-saleDate').val();
                    let make_inspect_year = $('#campoVehicle-year').val();
                    let make_inspect_make = $('#campoVehicle-Make').val();
                    let make_inspect_model = $('#campoVehicle-Model').val();
                    let make_inspect_vehicleType = $('#campoVehicle-vehicleType').val();
                    let make_inspect_engineSize = $('#campoVehicle-engineSize').val();
                    let make_inspect_cylinder = $('#campoVehicle-cylinder').val();
                    let make_inspect_LGN = $('#lgn').val();
                    let make_inspect_transmission = $('#transmission').val();
                    let make_inspect_GVW = $('#gvw').val();
                    let make_inspect_odometer = $('#odometer').val();
                    let make_inspect_fuelType = $('#fuel_type').val();
                    let make_inspect_license = $('#license').val();

                    console.log(make_inspect_year)

                    const datos = {
                        make_inspect_vin: make_inspect_vin,
                        make_inspect_saleDays: make_inspect_saleDays,
                        make_inspect_year: make_inspect_year,
                        make_inspect_make: make_inspect_make,
                        make_inspect_model: make_inspect_model,
                        make_inspect_vehicleType: make_inspect_vehicleType,
                        make_inspect_engineSize: make_inspect_engineSize,
                        make_inspect_cylinder: make_inspect_cylinder,
                        make_inspect_LGN: make_inspect_LGN,
                        make_inspect_transmission: make_inspect_transmission,
                        make_inspect_GVW: make_inspect_GVW,
                        make_inspect_odometer: make_inspect_odometer,
                        make_inspect_fuelType: make_inspect_fuelType,
                        make_inspect_license: make_inspect_license
                    }

                    $.ajax({
                        type: "POST",
                        url: "backend/Model/register-make-inspect.php",
                        data: datos,
                        success: function (result) {
                            console.log(result);
                            $("#form-register-inspect")[0].reset();
                        },
                        error: function (xhr, status, error) {
                            // Manejar errores de la solicitud AJAX si es necesario
                            console.log(xhr.responseText);
                        }
                    });

                }




            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });

    }

});