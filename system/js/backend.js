$(document).ready(function () {
    // console.log("Jquery esta funcionando...");
    // Backend - list registers placas

    fetch_list_register_placas();
    fetch_list_register_users();

    function fetch_list_register_placas() {
        $.ajax({
            type: "GET",
            url: "backend/Model/list-register-vehicle.php",
            success: function (response) {
                // console.log(response);

                let listRegistro = JSON.parse(response);

                let plantilla = '';
                listRegistro.forEach(listRegistro => {

                    let phone = "<strong>No aplica</strong>";
                    // console.log(listRegistro.id_buyer);
                    if (listRegistro.phone !== "0") {
                        phone = listRegistro.phone;
                    }

                    plantilla +=
                        `
                    <tr idRegisterVehicle="${listRegistro.id_buyer}">
                        <td>${listRegistro.id_vehicle}</td>
                        <td>${listRegistro.name_1}</td>
                        <td>${phone}</td>
                        <td>${listRegistro.name_state}</td>
                        <td><i class="fa-solid fa-eye view-register"></i> | <i class="fa-solid fa-print print"></i> | <i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                    </tr>

                    `
                });

                $('#body-listRegisterVehicle').html(plantilla);
            }
        });
    };

    
    function fetch_list_register_users() {
        $.ajax({
            type: "GET",
            url: "backend/Model/fetch_list_users.php",
            success: function (response) {
                // console.log(response);

                let listRegistro = JSON.parse(response);

                let plantilla = '';
                listRegistro.forEach(listRegistro => {

                    // console.log(listRegistro.ID_Usuario);
                    plantilla +=
                        `
                    <tr idRegisterVehicle="${listRegistro.ID_Usuario}">
                        <td>${listRegistro.ID_Usuario}</td>
                        <td>${listRegistro.Nombre_User}</td>
                        <td>${listRegistro.Correo_Electronico}</td>
                        <td>${listRegistro.Rol_ID}</td>
                        <td><i class="fa-solid fa-eye view-register"></i> | <i class="fa-solid fa-print print"></i> | <i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                    </tr>

                    `
                });

                $('#body-listRegisterUser').html(plantilla);
            }
        });
    };


    $("#body-listRegisterVehicle").on("click", ".delete-register", function () {
        if (confirm("¿Deseas eliminar este registro?")) {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");

            console.log(idRegisterVehicle);

            // Realizar la solicitud AJAX
            $.ajax({
                url: "backend/Model/eliminar_registro_vehicleBuyer.php",
                type: "POST",
                data: {
                    idRegisterVehicle: idRegisterVehicle
                },
                success: function (response) {
                    console.log("Registro eliminado", response);
                    fetch_list_register_placas();
                },
                error: function (xhr, status, error) {
                    console.error("Error al eliminar el registro:", error);
                    fetch_list_register_placas();
                }
            });
        }



    });

    $("#body-listRegisterVehicle").on("click", ".print", function () {

        // Obtén el valor del cuarto td
        var estado = $(this).closest("tr").find("td:eq(3)").text();
        // console.log(estado);
        if (estado === "Texas Nueva") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/texas/crearHorizontalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;
            var pdfURL2 = "pdf/texas/crearVerticalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();

            // Abrir el segundo PDF en otra nueva pestaña después de un pequeño retraso
            setTimeout(function () {
                var newTab2 = window.open(pdfURL2, "_blank");
                newTab2.focus();
            }, 500);
        }if (estado === "Texas Vieja") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/texas/crearHPdfTXV.php?idRegisterVehicle=" + idRegisterVehicle;
            var pdfURL2 = "pdf/texas/crearVerticalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();

            // Abrir el segundo PDF en otra nueva pestaña después de un pequeño retraso
            setTimeout(function () {
                var newTab2 = window.open(pdfURL2, "_blank");
                newTab2.focus();
            }, 500);
        }if (estado === "California") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/CALIFORNIA/tag_california.pdf.php?idRegisterVehicle=" + idRegisterVehicle;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }
        else {
            alert("No hay PDF disponible para este registro");
        }


    });
    // $("#body-listRegisterVehicle").on("click", ".view-register", function () {

    // });

    




});