$(function () {

    // console.log("Jquery esta funcionando...");

   

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
                        <td><i class="fa-solid fa-eye"></i> | <i class="fa-solid fa-pen-to-square"></i> | <i class="fa-solid fa-trash-can"></i></td>
                    </tr>

                    `
                });

                $('#body-listRegisterVehicle').html(plantilla);
            }
        });
    };




});