$(document).ready(function () {
    fetch_list_state();
    fetch_list_register_state();

    function fetch_list_state() {
        $.ajax({
            type: "GET",
            url: "backend/Model/fetch_list_pdf.php",
            success: function (response) {
                let listRegistro = JSON.parse(response);
                let plantilla = '';
                
                listRegistro.forEach(registro => {
                    plantilla += `
                        <div class="cont-placa cont-placa-click" id="cont-placa-${registro.identificador_pdf}">
                            <label class="label-placa">${registro.name_state_pdf}</label>
                        </div>
                    `;
                });
    
                $('#cont-fisico-placas').html(plantilla);
    
                // Asignar eventos de clic a cada elemento individualmente
                listRegistro.forEach(registro => {
                    $(`#cont-placa-${registro.identificador_pdf}`).click(function () {
                        console.log("Click en " + registro.name_state_pdf);
    
                        $("#btn-placa-Modal").click();
                        let contPlacaTexasNueva = $(this).find("label").text();
                        $(".modal-title").html(contPlacaTexasNueva);
                        $("#estado_id").val(registro.identificador_pdf);
                    });
                });
            }
        });
    }
    
    

    function fetch_list_register_state() {
        $.ajax({
            type: "GET",
            url: "backend/Model/fetch_list_state.php",
            success: function (response) {
                let listRegistro = JSON.parse(response);
                let plantilla = '';
                listRegistro.forEach(listRegistro => {
                    plantilla += `
                    <tr idState="${listRegistro.id_state}">
                    <td>${listRegistro.id_state}</td>
                    <td>${listRegistro.name_state}</td>
                    <td>${listRegistro.identificador_state}</td>
                    <td><i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                </tr>
                    `;
                });

                $('#body-listRegisterState').html(plantilla);

                
            }
        });
    }

    function enviarValorVin() {
        var valor = $("#id_vin").val();
        localStorage.setItem("valorEnviado", valor);

        let modelText = $(".modal-title").html();
        if (modelText !== "Inspect") {
            window.location.href = "form-register.php";
        } else {
            window.location.href = "form-register-inspect.php";
        }
        let estado_id = $("#estado_id").val();
        localStorage.setItem("estado", estado_id);


    }

    $('.btn-buscarVin').click(function () {
        let valorVin = $("#id_vin").val();
        if (valorVin !== "") {
            enviarValorVin();

        } else {
            alert("Vin required");
        }

    });

    $("#search").on("input", function () {
        var search = $(this).val();
        // console.log('Texto ingresado: ' + search);
        if (search !== "") { 
            $.ajax({
                type: "POST",
                url: "backend/Model/fetch_searh_fisico.php",
                data: { search },
                success: function (response) {
                    // console.log(response)

                    let listRegistro = JSON.parse(response);
                    let plantilla = '';
                    listRegistro.forEach(listRegistro => {
                        plantilla += `
                            <div class="cont-placa cont-placa-click" id="cont-placa-${listRegistro.identificador_pdf}">
                               <!-- <div class="icono-placa icono-texasNueva">
                                    // <img src="img/img-placas/img-dmv.jpeg" alt="">
                                </div> -->
                                <label class="label-placa">${listRegistro.name_state_pdf}</label>
                            </div>
                        `;
                    });
    
                    $('#cont-fisico-placas').html(plantilla);
    
                    // Asignar eventos de clic a cada elemento individualmente
                    listRegistro.forEach(listRegistro => {
                        $(`#cont-placa-${listRegistro.identificador_pdf}`).click(function () {
                            console.log("Click en " + listRegistro.name_state_pdf);
    
                            $("#btn-placa-Modal").click();
                            let contPlacaTexasNueva = $(this).find("label").text();
                            // console.log(contPlacaTexasNueva);
                            $(".modal-title").html(contPlacaTexasNueva);
                            $("#estado_id").val(listRegistro.identificador_pdf);
                        });
                    });
                }
            });
        } else {
            fetch_list_state();
        }

    });

    
    $("#body-listRegisterState").on("click", ".delete-register", function () {
        if (confirm("¿Deseas eliminar este registro?")) {
            // Obtén el valor del atributo idState del elemento padre (tr)
            var idState = $(this).closest("tr").attr("idState");

            // console.log(idState);

            // Realizar la solicitud AJAX
            $.ajax({
                url: "backend/Model/eliminar_registro_state.php",
                type: "POST",
                data: {
                    idState: idState
                },
                success: function (response) {
                    console.log("Registro eliminado", response);
                    fetch_list_register_state();
                },
                error: function (xhr, status, error) {
                    console.error("Error al eliminar el registro:", error);
                    fetch_list_register_state();
                }
            });
        }



    });



});
