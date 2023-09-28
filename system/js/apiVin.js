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
    window.location.href = "index.php";
  });

  $(".inputDigits").on("input", function () {
    var inputValue = $(this).val();
    var maxLength = 3;

    if (inputValue.length > maxLength) {
      $(this).val(inputValue.slice(0, maxLength));
    }
  });

  let pdfEstado = $("#campoBuyer-pdf").val();
  if (pdfEstado === "Insurance") {
    let plantilla2 = `
    <option value="">--</option>
      <option value="90">90</option>
      <option value="60">60</option>
      <option value="30">30</option>
      <option value="180">6 MESES</option>
      <option value="240">8 MESES</option>
      <option value="365">1 AÑO</option>
    `;
    $("#campoVehicle-days").html(plantilla2);
  } else if (pdfEstado === "NC") {
    let plantilla2 = `
    <option value="">--</option>
    <option value="30">30 DAY</option>
      <option value="60">60 DAY</option>
      <option value="90">90 DAY</option>
      <option value="120">120 DAY</option>
      <option value="150">150 DAY</option>
    `;
    $("#campoVehicle-days").html(plantilla2);
  }
  else if (pdfEstado === "MD") {
    let plantilla2 = `
    <option value="">--</option>
    <option value="30">30 DAY</option>
      <option value="60">60 DAY</option>
      <option value="90">90 DAY</option>
      <option value="120">120 DAY</option>
      <option value="150">150 DAY</option>
    `;
    $("#campoVehicle-days").html(plantilla2);
  } else if (pdfEstado === "GEICO") {
    let plantilla2 = `
    <option value="">--</option>
      <option value="90">90</option>
      <option value="60">60</option>
      <option value="30">30</option>
      <option value="180">6 MESES</option>
      <option value="240">8 MESES</option>
      <option value="365">1 AÑO</option>
    `;
    $("#campoVehicle-days").html(plantilla2);
  } else if (pdfEstado === "STA") {
    let plantilla2 = `
    <option value="">--</option>
      <option value="90">90</option>
      <option value="60">60</option>
      <option value="30">30</option>
      <option value="180">6 MESES</option>
      <option value="240">8 MESES</option>
      <option value="365">1 AÑO</option>
    `;
    $("#campoVehicle-days").html(plantilla2);
  }

  let valueCampoVin = $("#campoVehicle-vin").val();
  // console.log(valueCampoVin);

  if (valueCampoVin === "") {
    alert("The vin field is required [ERROR (0x0000vin)]");
    window.location.href = "index.php";
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
            if ($(this).val() === "" || $(this).val() === "") {
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

            // if (pdf === "TX") {
            //     $("#cont_loader").toggleClass("ocultar_loader");

            //     var pdfURL1 =
            //       "pdf/texas/crearHorizontalPdfTX.php?idRegisterVehicle=" + id_buyer;
            //     var pdfURL2 =
            //       "pdf/texas/crearVerticalPdfTX.php?idRegisterVehicle=" + id_buyer;

            //     console.log("URL del PDF horizontal:", pdfURL1);
            //     console.log("URL del PDF vertical:", pdfURL2);

            //     setTimeout(() => {
            //       Promise.all([
            //         downloadPDFToServer(pdfURL1, "reporteHorizontal.pdf", 'pdf/texas/'),
            //         downloadPDFToServer(pdfURL2, "reporteVertical.pdf", 'pdf/texas/'),
            //       ]).then(() => {
            //         // console.log("Descarga y guardado de PDFs completado.");

            //         $("#cont_loader").toggleClass("ocultar_loader");
            //         var pdfURL = "pdf/texas/TAG-TX.php";

            //         // Abrir el primer PDF en una nueva pestaña
            //         var newTab = window.open(pdfURL, "_blank");
            //         newTab.focus();
            //       });
            //     }, 500); // Retraso de .5 segundos
            // }
            // if (pdf === "TX") {
            //   $("#cont_loader").toggleClass("ocultar_loader");
            //   var pdfURL1 =
            //     "pdf/texas-buyer/index.php?idRegisterVehicle=" + id_buyer;

            //     fetch(pdfURL1, {
            //       method: 'GET',
            //     })
            //       .then(response => {
            //         if (response.ok) {
            //           return response.json();
            //         } else {
            //           throw new Error('Error al manipular el PDF');
            //         }
            //       })
            //       .then(data => {
            //         const pdfBlob = new Blob([Uint8Array.from(atob(data.pdfBytes), c => c.charCodeAt(0))], { type: 'application/pdf' });

            //         // Obtén el nombre de archivo del PDF desde la respuesta JSON
            //         const filename = data.filename;

            //         // Crear una URL a partir del objeto Blob
            //         const pdfURL = URL.createObjectURL(pdfBlob);

            //          // Crear un enlace de descarga con el nombre de archivo
            //         // const downloadLink = document.createElement('a');
            //         // downloadLink.href = pdfURL;
            //         // downloadLink.download = filename;

            //         // // Simular un clic en el enlace para descargar el archivo
            //         // downloadLink.click();

            //         downloadPDFToServer(pdfURL, filename, 'pdf/texas-buyer/')
            //         const rutaPdf = 'pdf/texas-buyer/'+filename;

            //         setTimeout(() => {
            //           $("#cont_loader").toggleClass("ocultar_loader");
            //           const newTab = window.open(rutaPdf, '_blank');
            //         newTab.focus();

            //         setTimeout(() => {
            //           $.ajax({
            //             url: "pdf/texas-buyer/eliminarpdf.php",
            //             method: "POST",
            //             data: { action: "eliminar",
            //                   filename:filename }, // Enviar los datos al servidor
            //             success: function(response) {
            //                 console.log(response); // Manejar la respuesta del servidor
            //                 if (response.success) {
            //                     console.log("Archivo eliminado con éxito.");
            //                 } else {
            //                     console.log("Error al eliminar el archivo.");
            //                 }
            //             },
            //             error: function(jqXHR, textStatus, errorThrown) {
            //                 console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
            //             }
            //         });
            //         }, 5000);

            //         }, 1000);

            //       })
            //       .catch(error => {
            //         console.error(error);
            //       });

            // }
            if (pdf === "TX") {
              var pdfURL1 =
                "pdf/texas-buyer/documento.php?idRegisterVehicle=" + id_buyer;

              setTimeout(() => {
                // Abrir el primer PDF en una nueva pestaña
                var newTab1 = window.open(pdfURL1, "_blank");
                newTab1.focus();
              }, 500);
            }
            // if (pdf === "TX") {
            //   var pdfURL1 =
            //     "pdf/texas-TX/index.php?idRegisterVehicle=" + id_buyer;

            //   setTimeout(() => {
            //     // Abrir el primer PDF en una nueva pestaña
            //     var newTab1 = window.open(pdfURL1, "_blank");
            //     newTab1.focus();
            //   }, 500);
            // }
            else if (pdf === "CA") {
              var pdfURL1 =
                "pdf/CALIFORNIA/tag_california.pdf.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "TX2") {
              var pdfURL1 =
                "pdf/texas_2/documento.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "LA") {
              $("#cont_loader").toggleClass("ocultar_loader");
              setTimeout(() => {
                $("#cont_loader").toggleClass("ocultar_loader");
                var pdfURL =
                  "pdf/TAG-LOUISIANA/documento.php?idRegisterVehicle=" + id_buyer;

                // Abrir el primer PDF en una nueva pestaña
                var newTab = window.open(pdfURL, "_blank");
                newTab.focus();
              }, 500);
            } else if (pdf === "NJ") {
              var pdfURL1 =
                "pdf/NJ_NY/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NY") {
              var pdfURL1 =
                "pdf/NJ_NY/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NV") {
              var pdfURL1 =
                "pdf/TAG-NEVADA-/documento.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "MD") {
              var pdfURL1 =
                "pdf/TAG-MD/documento.php?idRegisterVehicle=" +
                id_buyer;

              setTimeout(() => {
                // Abrir el primer PDF en una nueva pestaña
                var newTab1 = window.open(pdfURL1, "_blank");
                newTab1.focus();
              }, 500);
            } else if (pdf === "TN") {
              var pdfURL1 =
                "pdf/TAG-TENNESSEE-/documento.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NC") {
              $("#cont_loader").toggleClass("ocultar_loader");
              var pdfURL = "pdf/NC_NORTE_CALIFORNIA/documento.php?idRegisterVehicle=" + id_buyer;
              setTimeout(() => {
                $("#cont_loader").toggleClass("ocultar_loader");
                // Abrir el primer PDF en una nueva pestaña
                var newTab = window.open(pdfURL, "_blank");
                newTab.focus();
              }, 100);
            } else if (pdf === "IL") {
              var pdfURL1 =
                "pdf/Illonis/illonis.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "GA") {
              $("#cont_loader").toggleClass("ocultar_loader");
              setTimeout(() => {
                // console.log("Descarga y guardado de PDFs completado.");
                $("#cont_loader").toggleClass("ocultar_loader");
                var pdfURL = "pdf/TAG-GEORGIA/documento.php?idRegisterVehicle=" +
                  id_buyer;

                // Abrir el primer PDF en una nueva pestaña
                var newTab = window.open(pdfURL, "_blank");
                newTab.focus();
              }, 200);

            } else if (pdf === "Insurance") {
              var pdfURL1 =
                "pdf/insurance/insurance.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "GEICO") {
              var pdfURL1 =
                "pdf/insurance_geico/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "OH") {
              var pdfURL1 = "pdf/ohio/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "KS") {
              var pdfURL1 =
                "pdf/kansas/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "IN") {
              var pdfURL1 =
                "pdf/indiana/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "NM") {
              var pdfURL1 =
                "pdf/mexico/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "CO") {
              var pdfURL1 =
                "pdf/colorado/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "FL") {
              var pdfURL1 =
                "pdf/florida/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "VA") {
              var pdfURL1 =
                "pdf/virginia/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            } else if (pdf === "STA") {
              var pdfURL1 =
                "pdf/statefarm/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            }
            else {
              alert("No hay PDF disponible para este registro");
            }
          }
        });

        function guardar_register_vehicle_info() {
          let id_buyerVehicle = $("#campoBuyer-id").val();
          let campoVehicleVin = $("#campoVehicle-vin").val().toUpperCase();
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
            campoBuyerpdf: campoBuyerpdf,
          };

          for (let key in datos) {
            if (datos.hasOwnProperty(key) && typeof datos[key] === 'string') {
              datos[key] = datos[key].toUpperCase();
            }
          }

          // console.log(campoVehicleVin);

          $.ajax({
            type: "POST",
            url: "backend/Model/register-vehicle-info.php",
            data: datos,
            success: function (result) {
              //   console.log(result);
              if (result === "Exito") {
                $("#form-register")[0].reset();
                // console.log(result);

                let id_usuario = $("#id_usuario").text();
                // console.log(id_usuario);

                let description = "Nuevo registro";

                const datos_actividad = {
                  id_usuario: id_usuario,
                  description: description,
                };

                $.ajax({
                  type: "POST",
                  url: "backend/Model/registrar_actividad.php",
                  data: datos_actividad,
                  success: function (resultado) {
                    console.log(resultado);
                  },
                  error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX si es necesario
                    console.log(xhr.responseText);
                  },
                });
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
            var idRegisterInspect = $("#id_inspect").val();
            guardar_register_make_inspect();

            setTimeout(() => {
              console.log(idRegisterInspect);

              var pdfURL1 =
                "pdf/INSPECT/Inspect.php?idRegisterInspect=" +
                idRegisterInspect;

              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            }, 500);
          }
        });

        function guardar_register_make_inspect() {
          let make_inspect_id = $("#id_inspect").val();
          let make_inspect_vin = $("#campoVehicle-vin").val().toUpperCase();
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

          for (let key in datos) {
            if (datos.hasOwnProperty(key) && typeof datos[key] === 'string') {
              datos[key] = datos[key].toUpperCase();
            }
          }

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

  $.ajax({
    type: "POST",
    url: "backend/Model/valida_vin.php",
    data: { valueCampoVin },
    success: function (response) {
      // console.log(response);

      //Llenaremos los campos con la info de la base de datos
      let datos = JSON.parse(response);
      datos.forEach((dato) => {
        // $('#campoVehicle-saleDate').val(dato.sale_date);
        // $('#campoVehicle-days').val(dato.days);
        $('#campoVehicle-seller').val(dato.seller);
        $('#campoVehicle-delerNumber').val(dato.deler_number);

        $('#campoVehicle-Make').val(dato.make);
        $('#campoVehicle-bodyStyle').val(dato.body_style);
        $('#campoVehicle-year').val(dato.year);
        $('#campoVehicle-Model').val(dato.model);

        $('#campoVehicle-majorColor').val(dato.major_color);
        $('#campoVehicle-minorColor').val(dato.minor_color);
        $('#campoVehicle-Miles').val(dato.miles);

        $('#campoBuyer-name1').val(dato.name_1);
        $('#campoBuyer-name2').val(dato.name_2);
        $('#campoBuyer-adress').val(dato.adress);
        $('#campoBuyer-city').val(dato.city);

        $('#campoBuyer-state').val(dato.estado);
        $('#campoBuyer-zip').val(dato.zip);
        $('#campoBuyer-email').val(dato.email);
        $('#campoBuyer-phone').val(dato.phone);

        $('#campoBuyer-id').val(dato.id_buyer);
        $('#campoBuyer-pdf').val(dato.pdf);
      });

      if (response !== '[]') {
        var boton = $("#btn_generar");

        // Quita la clase "btn-save-vehicle" si existe
        boton.removeClass("btn-save-vehicle");

        // Agrega la clase "btn-edit"
        boton.addClass("btn-edit");
      }

      function update_register_vehicle_info() {
        let id_buyerVehicle = $("#campoBuyer-id").val();
        let campoVehicleVin = $("#campoVehicle-vin").val().toUpperCase();
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
          campoBuyerpdf: campoBuyerpdf,
        };

        for (let key in datos) {
          if (datos.hasOwnProperty(key) && typeof datos[key] === 'string') {
            datos[key] = datos[key].toUpperCase();
          }
        }

        // console.log(campoVehicleVin);

        $.ajax({
          type: "POST",
          url: "backend/Model/update_registro.php",
          data: datos,
          success: function (result) {
            //   console.log(result);
            if (result === "Exito") {
              $("#form-register")[0].reset();
              // console.log(result);
            } else {
              alert(
                "Hubo un error en los datos, porfavor vuelva a intentarlo."
              );
              // console.log(result);
            }
          },
          error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX si es necesario
            console.log(xhr.responseText);
          },
        });
      }




      $(".btn-edit").click(function () {
        let camposRequeridos = $(".required");
        // console.log(camposRequeridos);
        camposRequeridos.each(function () {
          if ($(this).val() === "" || $(this).val() === "") {
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
          update_register_vehicle_info();
          // console.log(id_buyer);
          // function downloadPDFToServer(url, filename, urlEnvioPDF) {
          //   console.log("Descargando archivo:", url);

          //   return fetch(url)
          //     .then((response) => response.blob())
          //     .then((blob) => {
          //       console.log("Archivo descargado:", url);

          //       const formData = new FormData();
          //       formData.append("pdf", blob, filename);

          //       return fetch(urlEnvioPDF + "recibir_pdf.php", {
          //         method: "POST",
          //         body: formData,
          //       });
          //     })
          //     .then((response) => response.text())
          //     .then((result) => {
          //       console.log("PDF guardado en el servidor:", result);
          //     })
          //     .catch((error) => {
          //       console.error("Error al descargar y guardar PDF: " + error);
          //     });
          // }
          if (pdf === "TX") {
            var pdfURL1 =
              "pdf/texas-buyer/documento.php?idRegisterVehicle=" + id_buyer;

            setTimeout(() => {
              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            }, 500);
          }
          else if (pdf === "CA") {
            var pdfURL1 =
              "pdf/CALIFORNIA/tag_california.pdf.php?idRegisterVehicle=" +
              id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "TX2") {
            var pdfURL1 =
              "pdf/texas_2/documento.php?idRegisterVehicle=" +
              id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "LA") {
            $("#cont_loader").toggleClass("ocultar_loader");
            setTimeout(() => {
              $("#cont_loader").toggleClass("ocultar_loader");
              var pdfURL =
                "pdf/TAG-LOUISIANA/documento.php?idRegisterVehicle=" + id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab = window.open(pdfURL, "_blank");
              newTab.focus();
            }, 500);
          } else if (pdf === "NJ") {
            var pdfURL1 =
              "pdf/NJ_NY/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "NY") {
            var pdfURL1 =
              "pdf/NJ_NY/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "NV") {
            var pdfURL1 =
              "pdf/TAG-NEVADA-/documento.php?idRegisterVehicle=" +
              id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "MD") {
            var pdfURL1 =
              "pdf/TAG-MD/documento.php?idRegisterVehicle=" +
              id_buyer;

            setTimeout(() => {
              // Abrir el primer PDF en una nueva pestaña
              var newTab1 = window.open(pdfURL1, "_blank");
              newTab1.focus();
            }, 500);
          } else if (pdf === "TN") {
            var pdfURL1 =
              "pdf/TAG-TENNESSEE-/documento.php?idRegisterVehicle=" +
              id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "NC") {
            $("#cont_loader").toggleClass("ocultar_loader");
            var pdfURL = "pdf/NC_NORTE_CALIFORNIA/documento.php?idRegisterVehicle=" + id_buyer;
            setTimeout(() => {
              $("#cont_loader").toggleClass("ocultar_loader");
              // Abrir el primer PDF en una nueva pestaña
              var newTab = window.open(pdfURL, "_blank");
              newTab.focus();
            }, 100);
          } else if (pdf === "IL") {
            var pdfURL1 =
              "pdf/Illonis/illonis.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "GA") {
            $("#cont_loader").toggleClass("ocultar_loader");
            setTimeout(() => {
              // console.log("Descarga y guardado de PDFs completado.");
              $("#cont_loader").toggleClass("ocultar_loader");
              var pdfURL = "pdf/TAG-GEORGIA/documento.php?idRegisterVehicle=" +
                id_buyer;

              // Abrir el primer PDF en una nueva pestaña
              var newTab = window.open(pdfURL, "_blank");
              newTab.focus();
            }, 200);

          } else if (pdf === "Insurance") {
            var pdfURL1 =
              "pdf/insurance/insurance.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "GEICO") {
            var pdfURL1 =
              "pdf/insurance_geico/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "OH") {
            var pdfURL1 = "pdf/ohio/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "KS") {
            var pdfURL1 =
              "pdf/kansas/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "IN") {
            var pdfURL1 =
              "pdf/indiana/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "NM") {
            var pdfURL1 =
              "pdf/mexico/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "CO") {
            var pdfURL1 =
              "pdf/colorado/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "FL") {
            var pdfURL1 =
              "pdf/florida/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "VA") {
            var pdfURL1 =
              "pdf/virginia/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          } else if (pdf === "STA") {
            var pdfURL1 =
              "pdf/statefarm/documento.php?idRegisterVehicle=" + id_buyer;

            // Abrir el primer PDF en una nueva pestaña
            var newTab1 = window.open(pdfURL1, "_blank");
            newTab1.focus();
          }
          else {
            alert("No hay PDF disponible para este registro");
          }
        }
      });

    }
  });


});
