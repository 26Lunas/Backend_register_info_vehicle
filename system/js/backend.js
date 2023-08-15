$(document).ready(function () {
    // console.log("Jquery esta funcionando...");
    // Backend - list registers placas

    fetch_list_register_placas();
    fetch_list_register_users();
    fetch_list_register_inspect();

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
                        <td class="text-capitalize">${listRegistro.name_1}</td>
                        <td>${phone}</td>
                        <td class="text-capitalize">${listRegistro.name_state}</td>
                        <td>${listRegistro.pdf}</td>
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

    function fetch_list_register_inspect() {
        $.ajax({
            type: "GET",
            url: "backend/Model/list_register_make_inspect.php",
            success: function (response) {
                // console.log(response);

                let listRegistro = JSON.parse(response);

                let plantilla = '';
                listRegistro.forEach(listRegistro => {


                    plantilla +=
                        `
                    <tr idRegisterInspect="${listRegistro.id_make_inspect}">
                        <td>${listRegistro.id_make_inspect}</td>
                        <td class="text-capitalize">${listRegistro.vin}</td>
                        <td>${listRegistro.sale_date}</td>
                        <td class="text-capitalize">${listRegistro.license}</td>
                        <td><i class="fa-solid fa-eye view-register"></i> | <i class="fa-solid fa-print print"></i> | <i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                    </tr>

                    `
                });

                $('#body-listRegisterInspect').html(plantilla);
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
        var pdf = $(this).closest("tr").find("td:eq(4)").text();
        // console.log(pdf);

        // Función para descargar un archivo al servidor
        function downloadPDFToServer(url, filename, urlEnvioPDF) {
            return fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    const formData = new FormData();
                    formData.append('pdf', blob, filename);

                    return fetch(urlEnvioPDF+'recibir_pdf.php', {
                        method: 'POST',
                        body: formData
                    });
                })
                .then(response => response.text())
                .then(result => {
                    console.log(result);
                })
                .catch(error => {
                    console.error('Error al descargar y guardar PDF: ' + error);
                });
        }

        if (pdf === "TX") {
            $("#cont_loader").toggleClass("ocultar_loader");
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            // console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/texas/crearHorizontalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;
            var pdfURL2 = "pdf/texas/crearVerticalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;

            
                    // Descargar los dos PDFs en el servidor y combinarlos
                    Promise.all([
                        downloadPDFToServer(pdfURL1, 'reporteHorizontal.pdf', 'pdf/texas/'),
                        downloadPDFToServer(pdfURL2, 'reporteVertical.pdf', 'pdf/texas/')
                    ]).then(() => {
                        $("#cont_loader").toggleClass("ocultar_loader");
                        var pdfURL = "pdf/texas/combinarPdf.php";

                        // Abrir el primer PDF en una nueva pestaña
                        var newTab = window.open(pdfURL, "_blank");
                        newTab.focus();
                    });
        }else if (pdf === "CA") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/CALIFORNIA/tag_california.pdf.php?idRegisterVehicle=" + idRegisterVehicle;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "LA") {
            $("#cont_loader").toggleClass("ocultar_loader");
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            // console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/TAG-LOUISIANA/crear_h_pdf_tag_louisiana.php?idRegisterVehicle=" + idRegisterVehicle;
            var pdfURL2 = "pdf/TAG-LOUISIANA/crear_h2_pdf_tag_louisiana.php?idRegisterVehicle=" + idRegisterVehicle;

             // Descargar los dos PDFs en el servidor y combinarlos
             Promise.all([
                downloadPDFToServer(pdfURL1, 'reporteHorizontal.pdf', 'pdf/TAG-LOUISIANA/'),
                downloadPDFToServer(pdfURL2, 'reporteVertical.pdf', 'pdf/TAG-LOUISIANA/')
            ]).then(() => {
                $("#cont_loader").toggleClass("ocultar_loader");
                var pdfURL = "pdf/TAG-LOUISIANA/combinarPdf.php";

                // Abrir el primer PDF en una nueva pestaña
                var newTab = window.open(pdfURL, "_blank");
                newTab.focus();
            });
        }else if (pdf === "NJ") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/NJ_NY/crear_h_pdf_nj_ny.php?idRegisterVehicle=" + idRegisterVehicle;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "NY") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/NJ_NY/crear_h_pdf_nj_ny.php?idRegisterVehicle=" + idRegisterVehicle;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "NV") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/TAG-NEVADA-/crear_h_tag_nevada_pdf.php?idRegisterVehicle=" + idRegisterVehicle;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "MD") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/TAG-MD/crear_h_pdf_tag_md.php?idRegisterVehicle=" + idRegisterVehicle;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "TN") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/TAG-TENNESSEE-/crear_v_pdf_tag_tennessee.php?idRegisterVehicle=" + idRegisterVehicle;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "NC") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            $("#cont_loader").toggleClass("ocultar_loader");
            // console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/NC_NORTE_CALIFORNIA/crear_h_pdf_norte_california.php?idRegisterVehicle=" + idRegisterVehicle;
            var pdfURL2 = "pdf/NC_NORTE_CALIFORNIA/crear_v2_pdf_norte_california.php?idRegisterVehicle=" + idRegisterVehicle;

             // Descargar los dos PDFs en el servidor y combinarlos
             Promise.all([
                downloadPDFToServer(pdfURL1, 'reporteHorizontal.pdf', 'pdf/NC_NORTE_CALIFORNIA/'),
                downloadPDFToServer(pdfURL2, 'reporteVertical.pdf', 'pdf/NC_NORTE_CALIFORNIA/')
            ]).then(() => {
                $("#cont_loader").toggleClass("ocultar_loader");
                var pdfURL = "pdf/NC_NORTE_CALIFORNIA/combinarPdf.php";

                // Abrir el primer PDF en una nueva pestaña
                var newTab = window.open(pdfURL, "_blank");
                newTab.focus();
            });
        }else if (pdf === "IL") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/Illonis/illonis.php?idRegisterVehicle=" + idRegisterVehicle;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }else if (pdf === "GA") {
            $("#cont_loader").toggleClass("ocultar_loader");
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/TAG-GEORGIA/crear_h_pdf_tag_georgia.php?idRegisterVehicle=" + idRegisterVehicle;
            var pdfURL2 = "pdf/TAG-GEORGIA/crear_v_pdf_tag_georgia.php?idRegisterVehicle=" + idRegisterVehicle;

            // Descargar los dos PDFs en el servidor y combinarlos
            Promise.all([
                downloadPDFToServer(pdfURL1, 'reporteHorizontal.pdf', 'pdf/TAG-GEORGIA/'),
                downloadPDFToServer(pdfURL2, 'reporteVertical.pdf', 'pdf/TAG-GEORGIA/')
            ]).then(() => {
                $("#cont_loader").toggleClass("ocultar_loader");
                var pdfURL = "pdf/TAG-GEORGIA/combinarPdf.php";

                // Abrir el primer PDF en una nueva pestaña
                var newTab = window.open(pdfURL, "_blank");
                newTab.focus();
            });
        }else if (pdf === "Insurance") {
            // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
            var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
            console.log(idRegisterVehicle);

            var pdfURL1 = "pdf/insurance/insurance.php?idRegisterVehicle=" + idRegisterVehicle;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
        }
        else {
            alert("No hay PDF disponible para este registro");
        }


    });

    $("#body-listRegisterInspect").on("click", ".print", function () {
       
            // Obtén el valor del atributo idRegisterInspect del elemento padre (tr)
            var idRegisterInspect = $(this).closest("tr").attr("idRegisterInspect");
            // console.log(idRegisterInspect);

            var pdfURL1 = "pdf/INSPECT/Inspect.php?idRegisterInspect=" + idRegisterInspect;
        
            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
    
    });

    $("#body-listRegisterInspect").on("click", ".delete-register", function () {
        if (confirm("¿Deseas eliminar este registro?")) {
            // Obtén el valor del atributo idRegisterInspect del elemento padre (tr)
            var idRegisterInspect = $(this).closest("tr").attr("idRegisterInspect");

            console.log(idRegisterInspect);

            // Realizar la solicitud AJAX
            $.ajax({
                url: "backend/Model/eliminar_registro_inspect.php",
                type: "POST",
                data: {
                    idRegisterInspect: idRegisterInspect
                },
                success: function (response) {
                    console.log("Registro eliminado", response);
                    fetch_list_register_inspect()
                },
                error: function (xhr, status, error) {
                    console.error("Error al eliminar el registro:", error);
                    fetch_list_register_inspect()
                }
            });
        }



    });


    
    // $("#body-listRegisterVehicle").on("click", ".view-register", function () {

    // });
    

    




});