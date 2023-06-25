$(function(){

    // let btnPlacaModal = document.getElementById("btn-placa-Modal");
       
    $("#cont-placa-texasNueva").click(function(){
        $("#btn-placa-Modal").click();
        let contPlacaTexasNueva =  $("#cont-placa-texasNueva label");

        let text = $(contPlacaTexasNueva).text();
        console.log(text);

        $(".modal-title").html(text);

    });


});