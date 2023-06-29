$(document).ready(function () {
    fetch_list_state();

    function fetch_list_state() {
        $.ajax({
            type: "GET",
            url: "backend/Model/fetch_list_state.php",
            success: function (response) {
                let listRegistro = JSON.parse(response);
                let plantilla = '';
                listRegistro.forEach(listRegistro => {
                    plantilla += `
                        <div class="cont-placa cont-placa-click" id="cont-placa-${listRegistro.identificador_state}">
                            <div class="icono-placa icono-texasNueva">
                                <img src="img/img-placas/img-dmv.jpeg" alt="">
                            </div> 
                            <label class="label-placa">${listRegistro.name_state}</label>
                        </div>
                    `;
                });

                $('#cont-fisico-placas').html(plantilla);

                // Asignar eventos de clic a cada elemento individualmente
                listRegistro.forEach(listRegistro => {
                    $(`#cont-placa-${listRegistro.identificador_state}`).click(function () {
                        console.log("Click en " + listRegistro.name_state);

                        $("#btn-placa-Modal").click();
                        let contPlacaTexasNueva = $(this).find("label").text();
                        console.log(contPlacaTexasNueva);
                        $(".modal-title").html(contPlacaTexasNueva);
                    });
                });
            }
        });
    }

    

    function enviarValorVin() {
        var valor = $("#id_vin").val();
        localStorage.setItem("valorEnviado", valor);

        let modelText = $(".modal-title").html();
        if(modelText !== "Inspect"){
            window.location.href = "form-register.html";
        }else{
            window.location.href = "form-register-inspect.html";
        }
       

    }
    $('.btn-buscarVin').click(function () {
        let valorVin = $("#id_vin").val();
        if (valorVin !== "") {
            enviarValorVin();

        } else {
            alert("Vin required");
        }
        
    });



    // $(document).on('click', '#cont-placa-TX', function () {
    //     console.log("click");
    // });

    // $(document).on('click', '.cont-placa-click', function () {
    //     console.log("click");
    //     $("#btn-placa-Modal").click();
    //     let contPlacaTexasNueva = $(this).find("label").text();
    //     console.log(contPlacaTexasNueva);
    //     $(".modal-title").html(contPlacaTexasNueva);
    // });
});
