$(document).ready(function () {
    // console.log("Jquery esta funcionando...");
    // Backend - list registers placas

    fetch_list_register_placas();

    function fetch_list_register_placas() {
        $.ajax({
            type: "GET",
            url: "backend/Model/list-register-vehicle.php",
            success: function (response) {
                // console.log(response);

                let listRegistro = JSON.parse(response);

                let plantilla = '';
                listRegistro.forEach(listRegistro => {

                    // console.log(listRegistro.id_buyer);
                    plantilla +=
                        `
                    <tr idRegisterVehicle="${listRegistro.id_buyer}">
                        <td>${listRegistro.id_vehicle}</td>
                        <td>${listRegistro.name_1}</td>
                        <td>${listRegistro.phone}</td>
                        <td>${listRegistro.estado}</td>
                        <td><i class="fa-solid fa-eye view-register"></i> | <i class="fa-solid fa-print"></i> | <i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                    </tr>

                    `
                });

                $('#body-listRegisterVehicle').html(plantilla);
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



});