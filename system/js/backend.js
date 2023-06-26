$(function () {

    // console.log("Jquery esta funcionando...");

    function guardar_register_vehicle_info() {
        // Campo VIN del vehicle
        let campoVehicleVin = $('#campoVehicle-vin').val();
        if (campoVehicleVin !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleVin = campoVehicleVin
        } else {
            // console.log("el campo esta vacio el campo Vin");
            
        }

        //Campo Sale Date
        let campoVehicleSaleDate = $('#campoVehicle-saleDate').val();
        if (campoVehicleSaleDate !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleSaleDate = campoVehicleSaleDate
            console.log(campoVehicleSaleDate)
        } else {
            // console.log("el campo esta vacio el campo Sale Date");
           
        }

        //Campo Days
        let campoVehicleDays = $('#campoVehicle-days').val();
        if (campoVehicleDays !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleDays = campoVehicleDays
        } else {
            // console.log("el campo esta vacio el campo Days");
            
        }

        //Campo Seller
        let campoVehicleSeller = $('#campoVehicle-seller').val();
        if (campoVehicleSeller !== '') {

            campoVehicleSeller = campoVehicleSeller
        } else {
            // console.log("el campo esta vacio el campo Seller");
           
        }

         //Campo Deler Number
         let campoVehicleDelerNumber = $('#campoVehicle-delerNumber').val();
         if (campoVehicleDelerNumber !== '') {
             // console.log("el campo no esta vacio");
 
             campoVehicleDelerNumber = campoVehicleDelerNumber
         } else {
            //  console.log("el campo esta vacio el campo Deler Number");
             
         }

        //Campo Make
        let campoVehicleMake = $('#campoVehicle-Make').val();
        if (campoVehicleMake !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleMake = campoVehicleMake
            // console.log(campoVehicleMake)
        } else {
            // console.log("el campo esta vacio el campo Make");
        } 
        
        //Campo Deler Number
        let campoVehicleBodyStyle = $('#campoVehicle-bodyStyle').val();
        if (campoVehicleBodyStyle !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleBodyStyle = campoVehicleBodyStyle
            // console.log(campoVehicleBodyStyle)
        } else {
            // console.log("el campo esta vacio el campo Body Style");
        }

        
        //Campo Year
        let campoVehicleYear = $('#campoVehicle-year').val();
        if (campoVehicleYear !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleYear = campoVehicleYear
            // console.log(campoVehicleYear)
        } else {
            // console.log("el campo esta vacio el campo Year");
        }

        //Campo Model
        let campoVehicleModel = $('#campoVehicle-Model').val();
        if (campoVehicleModel !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleModel = campoVehicleModel
            // console.log(campoVehicleModel)
        } else {
            // console.log("el campo esta vacio el campo Model");
        }

        //Campo Major Color
        let campoVehicleMajorColor = $('#campoVehicle-majorColor').val();
        if (campoVehicleMajorColor !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleMajorColor = campoVehicleMajorColor
            // console.log(campoVehicleMajorColor)
        } else {
            // console.log("el campo esta vacio el campo Major Color");
        }
        //Campo Minor Color
        let campoVehicleMinorColor = $('#campoVehicle-minorColor').val();
        if (campoVehicleMinorColor !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleMinorColor = campoVehicleMinorColor
            // console.log(campoVehicleMinorColor)
        } else {
            // console.log("el campo esta vacio el campo Minor Color");
        }

        //Campo Minor Color
        let campoVehicleMiles = $('#campoVehicle-Miles').val();
        if (campoVehicleMiles !== '') {
            // console.log("el campo no esta vacio");

            campoVehicleMiles = campoVehicleMiles
            // console.log(campoVehicleMiles)
        } else {
            // console.log("el campo esta vacio el campo Miles");
        }

    };

    function guardar_rigister_buyer_info(){
        // Campo Name 1
        let campoBuyerName1 = $('#campoBuyer-name1').val();
        if (campoBuyerName1 !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerName1 = campoBuyerName1
        } else {
            // console.log("el campo esta vacio el campo Name 1");
            
        }

        // Campo Name 2
        let campoBuyerName2 = $('#campoBuyer-name2').val();
        if (campoBuyerName2 !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerName2 = campoBuyerName2
        } else {
            // console.log("el campo esta vacio el campo Name 2");
            
        }
        // Campo Adress
        let campoBuyerAdress = $('#campoBuyer-adress').val();
        if (campoBuyerAdress !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerAdress = campoBuyerAdress
        } else {
            // console.log("el campo esta vacio el campo Adress");
            
        }
        // Campo City
        let campoBuyerCity = $('#campoBuyer-city').val();
        if (campoBuyerCity !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerCity = campoBuyerCity
        } else {
            // console.log("el campo esta vacio el campo City");
            
        }
        // Campo State
        let campoBuyerState = $('#campoBuyer-state').val();
        if (campoBuyerState !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerState = campoBuyerState
        } else {
            // console.log("el campo esta vacio el campo State");
            
        }

        // Campo Zip
        let campoBuyerZip = $('#campoBuyer-zip').val();
        if (campoBuyerZip !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerZip = campoBuyerZip
        } else {
            // console.log("el campo esta vacio el campo Zip");
            
        }

        // Campo Email
        let campoBuyerEmail = $('#campoBuyer-email').val();
        if (campoBuyerEmail !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerEmail = campoBuyerEmail
        } else {
            // console.log("el campo esta vacio el campo Email");
            
        }
        // Campo Phone
        let campoBuyerPhone = $('#campoBuyer-phone').val();
        if (campoBuyerPhone !== '') {
            // console.log("el campo no esta vacio");

            campoBuyerPhone = campoBuyerPhone
        } else {
            // console.log("el campo esta vacio el campo Phone");
            
        }
    }

    $(".btn-save").click( function(){
        alert("Probando el envio de datos...")
        guardar_register_vehicle_info();
        guardar_rigister_buyer_info();
    });

    // Backend - list registers placas

    fetch_list_register_placas()

    function fetch_list_register_placas(){
        $.ajax({
            type: "GET",
            url: "backend/Model/list-register-vehicle.php",
            success: function (response) {
                    // console.log(response);

                let listRegistro = JSON.parse(response);
                
                let plantilla = '';
                listRegistro.forEach(listRegistro => {
                    plantilla += 
                    `
                    <tr>
                        <td>${listRegistro.id_vehicle}</td>
                        <td>${listRegistro.name_1}</td>
                        <td>${listRegistro.phone}</td>
                        <td>${listRegistro.estado}</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> | </td>
                    </tr>

                    `
                });

                $('#body-listRegisterVehicle').html(plantilla);
            }
        });
    };




});