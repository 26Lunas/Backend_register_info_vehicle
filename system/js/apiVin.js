$(document).ready(function () {
  // console.log("Jquery esta funcionando...");

  // Generemos el id del comprador

  let min = 100000; // El número más pequeño de 6 dígitos
  let max = 999999; // El número más grande de 6 dígitos

  let numeroAleatorio = Math.floor(Math.random() * (max - min + 1)) + min;

  let idBuyerVehicle = numeroAleatorio;
  //    console.log("numero generado " + idBuyerVehicle);
  $("#campoBuyer-id").val(idBuyerVehicle);

  let idInspect = numeroAleatorio;
  $("#id_inspect").val(idInspect);

  let valor = localStorage.getItem("valorEnviado");
  $("#campoVehicle-vin").val(valor);
  localStorage.removeItem("valorEnviado");

  let estado = localStorage.getItem("estado");
  // console.log(estado);
  $("#campoBuyer-state").val(estado);
  $("#campoBuyer-pdf").val(estado);
  localStorage.removeItem("estado");

  $(".btn-cancel").click(function () {
    window.location.href = "index.html";
  });

  $(".inputDigits").on("input", function () {
    var inputValue = $(this).val();
    var maxLength = 3;

    if (inputValue.length > maxLength) {
      $(this).val(inputValue.slice(0, maxLength));
    }
  });

  let valueCampoVin = $("#campoVehicle-vin").val();
  // console.log(valueCampoVin);

  if (valueCampoVin === "") {
    alert("The vin field is required [ERROR (0x0000vin)]");
    window.location.href = "index.html";
  }

  if (valueCampoVin !== "") {
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
        $("#campoVehicle-Make").val(makeDigitos4);
        $("#campoVehicle-Model").val(model.toString().slice(0, 3));
        $("#campoVehicle-year").val(modelYear);

        // conseguir datos del forms
        $(".btn-save-vehicle").click(function () {
          let camposRequeridos = $(".required");
          // console.log(camposRequeridos);
          camposRequeridos.each(function () {
            if ($(this).val() === "") {
              algunoVacio = true;
              $(this).addClass("valor-vacio");
              return false; // Detener la iteración si se encuentra un valor vacío
            }
            if ($(this).val() !== "") {
              $(this).removeClass("valor-vacio");
              algunoVacio = false;
            }
          });
          if (algunoVacio) {
            alert("Al menos uno de los valores está vacío.");
          } else {
            let pdf = $("#campoBuyer-pdf").val();
            var id_buyer = $("#campoBuyer-id").val();
            guardar_register_vehicle_info();
            // console.log(id_buyer);
            function downloadPDFToServer(url, filename, urlEnvioPDF) {
              console.log("Descargando archivo:", url);

              return fetch(url)
                .then((response) => response.blob())
                .then((blob) => {
                  console.log("Archivo descargado:", url);

                  const formData = new FormData();
                  formData.append("pdf", blob, filename);

                  return fetch(urlEnvioPDF + "recibir_pdf.php", {
                    method: "POST",
                    body: formData,
                  });
                })
                .then((response) => response.text())
                .then((result) => {
                  console.log("PDF guardado en el servidor:", result);
                })
                .catch((error) => {
                  console.error("Error al descargar y guardar PDF: " + error);
                });
            }
            if (pdf === "TX") {
              console.log("Iniciando descarga de PDFs...");

              $("#cont_loader").toggleClass("ocultar_loader");

              var pdfURL1 =
                "pdf/texas/crearHorizontalPdfTX.php?idRegisterVehicle=" + id_buyer;
              var pdfURL2 =
                "pdf/texas/crearVerticalPdfTX.php?idRegisterVehicle=" + id_buyer;

              console.log("URL del PDF horizontal:", pdfURL1);
              console.log("URL del PDF vertical:", pdfURL2);

              setTimeout(() => {
                Promise.all([
                  downloadPDFToServer(pdfURL1, "reporteHorizontal.pdf", 'pdf/texas/'),
                  downloadPDFToServer(pdfURL2, "reporteVertical.pdf", 'pdf/texas/'),
                ]).then(() => {
                  // console.log("Descarga y guardado de PDFs completado.");

                  $("#cont_loader").toggleClass("ocultar_loader");
                  var pdfURL = "pdf/texas/combinarPdf.php";

                  // Abrir el primer PDF en una nueva pestaña
                  var newTab = window.open(pdfURL, "_blank");
                  newTab.focus();
                });
              }, 1000); // Retraso de 1 segundos
            } else if (pdf === "CA") {
              var pdfURL1 =
                "pdf/CALIFORNIA/tag_california.pdf.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "LA") {
              var pdfURL1 =
                "pdf/TAG-LOUISIANA/crear_h_pdf_tag_louisiana.php?idRegisterVehicle=" +
                id_buyer;
              var pdfURL2 =
                "pdf/TAG-LOUISIANA/crear_h2_pdf_tag_louisiana.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();

              // Abrir el segundo PDF en otra nueva pestaña después de un pequeño retraso
              setTimeout(function () {
                var newTab2 = window.open(pdfURL2, "_blank");
                newTab2.focus();
              }, 500);
            } else if (pdf === "NJ") {
              var pdfURL1 =
                "pdf/NJ_NY/crear_h_pdf_nj_ny.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NY") {
              var pdfURL1 =
                "pdf/NJ_NY/crear_h_pdf_nj_ny.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NV") {
              var pdfURL1 =
                "pdf/TAG-NEVADA-/crear_h_tag_nevada_pdf.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "MD") {
              var pdfURL1 =
                "pdf/TAG-MD/crear_h_pdf_tag_md.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "TN") {
              var pdfURL1 =
                "pdf/TAG-TENNESSEE-/crear_v_pdf_tag_tennessee.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NC") {
              var pdfURL1 =
                "pdf/NC_NORTE_CALIFORNIA/crear_h_pdf_norte_california.php?idRegisterVehicle=" +
                id_buyer;
              var pdfURL2 =
                "pdf/NC_NORTE_CALIFORNIA/crear_v2_pdf_norte_california.php?idRegisterVehicle=" +
                id_buyer;

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
            } else if (pdf === "IL") {
              var pdfURL1 =
                "pdf/Illonis/illonis.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "GA") {
              $("#cont_loader").toggleClass("ocultar_loader");
              var pdfURL1 = "pdf/TAG-GEORGIA/crear_h_pdf_tag_georgia.php?idRegisterVehicle=" + id_buyer;
              var pdfURL2 = "pdf/TAG-GEORGIA/crear_v_pdf_tag_georgia.php?idRegisterVehicle=" + id_buyer;

              setTimeout(() => {
                Promise.all([
                  downloadPDFToServer(pdfURL1, "reporteHorizontal.pdf", 'pdf/TAG-GEORGIA/'),
                  downloadPDFToServer(pdfURL2, "reporteVertical.pdf", 'pdf/TAG-GEORGIA/'),
                ]).then(() => {
                  // console.log("Descarga y guardado de PDFs completado.");
                  $("#cont_loader").toggleClass("ocultar_loader");
                  
                  var pdfURL = "pdf/TAG-GEORGIA/combinarPdf.php";

                  // Abrir el primer PDF en una nueva pestaña
                  var newTab = window.open(pdfURL, "_blank");
                  newTab.focus();
                });
              }, 1000); // Retraso de 1 segundos
            }
            else {
              alert("No hay PDF disponible para este registro");
            }
          }
        });

        function guardar_register_vehicle_info() {
          let id_buyerVehicle = $("#campoBuyer-id").val();
          let campoVehicleVin = $("#campoVehicle-vin").val();
          let campoVehicleSaleDate = $("#campoVehicle-saleDate").val();
          let campoVehicleDays = $("#campoVehicle-days").val();

          let campoVehicleSeller = $("#campoVehicle-seller").val();
          let campoVehicleDelerNamber = $("#campoVehicle-delerNumber").val();
          let campoVehicleMake = $("#campoVehicle-Make").val();
          let campoVehicleBodyStyle = $("#campoVehicle-bodyStyle").val();
          let campoVehicleYear = $("#campoVehicle-year").val();
          let campoVehicleModel = $("#campoVehicle-Model").val();
          let campoVehicleMajorColor = $("#campoVehicle-majorColor").val();
          let campoVehicleMinorColor = $("#campoVehicle-minorColor").val();
          let campoVehicleMiles = $("#campoVehicle-Miles").val();

          let campoBuyerName1 = $("#campoBuyer-name1").val();
          let campoBuyerName2 = $("#campoBuyer-name2").val();
          let campoBuyerAdress = $("#campoBuyer-adress").val();
          let campoBuyerCity = $("#campoBuyer-city").val();
          let campoBuyerState = $("#campoBuyer-state").val();
          let campoBuyerZip = $("#campoBuyer-zip").val();
          let campoBuyerEmail = $("#campoBuyer-email").val();
          let campoBuyerPhone = $("#campoBuyer-phone").val();
          let campoBuyerpdf = $("#campoBuyer-pdf").val();

          const datos = {
            id_buyerVehicle: id_buyerVehicle,
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
            campoBuyerPhone: campoBuyerPhone,
            campoBuyerpdf: campoBuyerpdf
          };

          // console.log(campoVehicleVin);

          $.ajax({
            type: "POST",
            url: "backend/Model/register-vehicle-info.php",
            data: datos,
            success: function (result) {
              //   console.log(result);
              if (result === "Exito") {
                $("#form-register")[0].reset();
              } else {
                alert(
                  "Hubo un error en los datos, porfavor vuelva a intentarlo."
                );
                console.log(result);
              }
            },
            error: function (xhr, status, error) {
              // Manejar errores de la solicitud AJAX si es necesario
              console.log(xhr.responseText);
            },
          });
        }

        $(".btn-save-inspect").click(function () {
          let camposRequeridos = $(".required");
          // console.log(camposRequeridos);
          camposRequeridos.each(function () {
            if ($(this).val() === "") {
              algunoVacio = true;
              $(this).addClass("valor-vacio");
              $(this).focus();
              return false; // Detener la iteración si se encuentra un valor vacío
            }
            if ($(this).val() !== "") {
              $(this).removeClass("valor-vacio");
              algunoVacio = false;
            }
          });
          if (algunoVacio) {
            alert("Al menos uno de los valores está vacío.");
          } else {
            guardar_register_make_inspect();
            var idRegisterInspect = $("#id_inspect").val();
            console.log(idRegisterInspect);

            var pdfURL1 =
              "pdf/INSPECT/Inspect.php?idRegisterInspect=" + idRegisterInspect;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          }
        });

        function guardar_register_make_inspect() {
          let make_inspect_id = $("#id_inspect").val();
          let make_inspect_vin = $("#campoVehicle-vin").val();
          let make_inspect_saleDays = $("#campoVehicle-saleDate").val();
          let make_inspect_year = $("#campoVehicle-year").val();
          let make_inspect_make = $("#campoVehicle-Make").val();
          let make_inspect_model = $("#campoVehicle-Model").val();
          let make_inspect_vehicleType = $("#campoVehicle-vehicleType").val();
          let make_inspect_engineSize = $("#campoVehicle-engineSize").val();
          let make_inspect_cylinder = $("#campoVehicle-cylinder").val();
          let make_inspect_LGN = $("#lgn").val();
          let make_inspect_transmission = $("#transmission").val();
          let make_inspect_GVW = $("#gvw").val();
          let make_inspect_odometer = $("#odometer").val();
          let make_inspect_fuelType = $("#fuel_type").val();
          let make_inspect_license = $("#license").val();

          console.log(make_inspect_year);

          const datos = {
            make_inspect_id: make_inspect_id,
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
            make_inspect_license: make_inspect_license,
          };

          $.ajax({
            type: "POST",
            url: "backend/Model/register-make-inspect.php",
            data: datos,
            success: function (result) {
              console.log(result);
              if (result === "exito") {
                $("#form-register-inspect")[0].reset();
              } else {
                {
                  alert(
                    "Hubo un error en los datos, porfavor vuelva a intentarlo."
                  );
                  console.log(result);
                }
              }
            },
            error: function (xhr, status, error) {
              // Manejar errores de la solicitud AJAX si es necesario
              console.log(xhr.responseText);
            },
          });
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      },
    });
  }
});
