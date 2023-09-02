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

        let plantilla = "";
        listRegistro.forEach((listRegistro) => {
          let phone = "<strong>No aplica</strong>";
          // console.log(listRegistro.id_buyer);
          if (listRegistro.phone !== "0") {
            phone = listRegistro.phone;
          }

          plantilla += `
                    <tr idRegisterVehicle="${listRegistro.id_buyer}">
                        <td>${listRegistro.id_vehicle}</td>
                        <td class="text-capitalize">${listRegistro.name_1}</td>
                        <td>${phone}</td>
                        <td class="text-capitalize">${listRegistro.name_state}</td>
                        <td>${listRegistro.pdf}</td>
                        <td><i class="fa-solid fa-eye view-register"></i> | <i class="fa-solid fa-print print"></i> | <i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                    </tr>

                    `;
        });

        $("#body-listRegisterVehicle").html(plantilla);
      },
    });
  }

  function fetch_list_register_users() {
    $.ajax({
      type: "GET",
      url: "backend/Model/fetch_list_users.php",
      success: function (response) {
        // console.log(response);
        let listRegistro = JSON.parse(response);

        let plantilla = "";

        listRegistro.forEach((listRegistro) => {
          // Verificar si el ID es igual a cero
          let deleteIcon =
            '<i class="fa-solid fa-trash-can delete-register"></i>';

          if (listRegistro.ID_Usuario === "0") {
            deleteIcon = "";
          }

          plantilla += `
                    <tr idRegisterUser="${listRegistro.ID_Usuario}">
                        <td>${listRegistro.ID_Usuario}</td>
                        <td>${listRegistro.Nombre_User}</td>
                        <td>${listRegistro.Correo_Electronico}</td>
                        <td>${listRegistro.Rol_ID}</td>
                        <td><i class="fa-solid fa-pen-to-square edit-register"></i> | ${deleteIcon}</td>
                    </tr>
                    `;
        });

        $("#body-listRegisterUser").html(plantilla);
      },
    });
  }

  function fetch_list_register_inspect() {
    $.ajax({
      type: "GET",
      url: "backend/Model/list_register_make_inspect.php",
      success: function (response) {
        // console.log(response);

        let listRegistro = JSON.parse(response);

        let plantilla = "";
        listRegistro.forEach((listRegistro) => {
          plantilla += `
                    <tr idRegisterInspect="${listRegistro.id_make_inspect}">
                        <td>${listRegistro.id_make_inspect}</td>
                        <td class="text-capitalize">${listRegistro.vin}</td>
                        <td>${listRegistro.sale_date}</td>
                        <td class="text-capitalize">${listRegistro.license}</td>
                        <td><i class="fa-solid fa-eye view-register"></i> | <i class="fa-solid fa-print print"></i> | <i class="fa-solid fa-pen-to-square edit-register"></i> | <i class="fa-solid fa-trash-can delete-register"></i></td>
                    </tr>

                    `;
        });

        $("#body-listRegisterInspect").html(plantilla);
      },
    });
  }

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
          idRegisterVehicle: idRegisterVehicle,
        },
        success: function (response) {
          console.log("Registro eliminado", response);
          fetch_list_register_placas();
        },
        error: function (xhr, status, error) {
          console.error("Error al eliminar el registro:", error);
          fetch_list_register_placas();
        },
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
        .then((response) => response.blob())
        .then((blob) => {
          const formData = new FormData();
          formData.append("pdf", blob, filename);

          return fetch(urlEnvioPDF + "recibir_pdf.php", {
            method: "POST",
            body: formData,
          });
        })
        .then((response) => response.text())
        .then((result) => {
          console.log(result);
        })
        .catch((error) => {
          console.error("Error al descargar y guardar PDF: " + error);
        });
    }
    // if (pdf === "TX") {
    //   $("#cont_loader").toggleClass("ocultar_loader");
    //   // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
    //   var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
    //   // console.log(idRegisterVehicle);

    //   var pdfURL1 = "pdf/texas/crearHorizontalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;
    //   var pdfURL2 = "pdf/texas/crearVerticalPdfTX.php?idRegisterVehicle=" + idRegisterVehicle;


    //   // Descargar los dos PDFs en el servidor y combinarlos
    //   Promise.all([
    //     downloadPDFToServer(pdfURL1, 'reporteHorizontal.pdf', 'pdf/texas/'),
    //     downloadPDFToServer(pdfURL2, 'reporteVertical.pdf', 'pdf/texas/')
    //   ]).then(() => {
    //     $("#cont_loader").toggleClass("ocultar_loader");
    //     var pdfURL = "pdf/texas/TAG-TX.php";

    //     // Abrir el primer PDF en una nueva pestaña
    //     var newTab = window.open(pdfURL, "_blank");
    //     newTab.focus();
    //   });
    // }
    // if (pdf === "TX") {
    //   $("#cont_loader").toggleClass("ocultar_loader");
    //   // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
    //   var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");

    //   fetch("pdf/texas-buyer/index.php?idRegisterVehicle=" + idRegisterVehicle, {
    //     method: 'GET',
    //   })
    //     .then(response => {
    //       if (response.ok) {
    //         console.log(response);
    //         return response.json(); 
    //       } else {
    //         throw new Error('Error al manipular el PDF');
    //       }
    //     })
    //     .then(data => {
    //       const pdfBlob = new Blob([Uint8Array.from(atob(data.pdfBytes), c => c.charCodeAt(0))], { type: 'application/pdf' });

    //       // Obtén el nombre de archivo del PDF desde la respuesta JSON
    //       const filename = data.filename;

    //       // Crear una URL a partir del objeto Blob
    //       const pdfURL = URL.createObjectURL(pdfBlob);

    //        // Crear un enlace de descarga con el nombre de archivo
    //       // const downloadLink = document.createElement('a');
    //       // downloadLink.href = pdfURL;
    //       // downloadLink.download = filename;

    //       // // Simular un clic en el enlace para descargar el archivo
    //       // downloadLink.click();

    //       downloadPDFToServer(pdfURL, filename, 'pdf/texas-buyer/')
    //       const rutaPdf = 'pdf/texas-buyer/'+filename;

    //       setTimeout(() => {
    //         $("#cont_loader").toggleClass("ocultar_loader");
    //         const newTab = window.open(rutaPdf, '_blank');
    //       newTab.focus();

    //       setTimeout(() => {
    //         $.ajax({
    //           url: "pdf/texas-buyer/eliminarpdf.php",
    //           method: "POST",
    //           data: { action: "eliminar",
    //                 filename:filename }, // Enviar los datos al servidor
    //           success: function(response) {
    //               console.log(response); // Manejar la respuesta del servidor
    //               if (response.success) {
    //                   console.log("Archivo eliminado con éxito.");
    //               } else {
    //                   console.log("Error al eliminar el archivo.");
    //               }
    //           },
    //           error: function(jqXHR, textStatus, errorThrown) {
    //               console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    //           }
    //       });
    //       }, 5000);

    //       }, 1500);


    //     })
    //     .catch(error => {
    //       console.error(error);
    //     });

    // }
    if (pdf === "TX") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/texas-buyer/documento.php?idRegisterVehicle=" + idRegisterVehicle;

      setTimeout(() => {
        // Abrir el primer PDF en una nueva pestaña
        var newTab1 = window.open(pdfURL1, "_blank");
        newTab1.focus();
      }, 500);
    }
    // if (pdf === "TX") {
    //   // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
    //   var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
    //   // console.log(idRegisterVehicle);

    //   var pdfURL1 =
    //     "pdf/texas-TX/index.php?idRegisterVehicle=" + idRegisterVehicle;

    //   setTimeout(() => {
    //     // Abrir el primer PDF en una nueva pestaña
    //     var newTab1 = window.open(pdfURL1, "_blank");
    //     newTab1.focus();
    //   }, 500);
    // } 
    else if (pdf === "CA") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/CALIFORNIA/tag_california.pdf.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    }
     else if (pdf === "LA") {
      $("#cont_loader").toggleClass("ocultar_loader");
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);
        setTimeout(() => {
          $("#cont_loader").toggleClass("ocultar_loader");
        var pdfURL = "pdf/TAG-LOUISIANA/documento.php?idRegisterVehicle=" +idRegisterVehicle;

        // Abrir el primer PDF en una nueva pestaña
        var newTab = window.open(pdfURL, "_blank");
        newTab.focus();
        }, 200);
     
    }
     else if (pdf === "NJ") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/NJ_NY/documento.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "NY") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/NJ_NY/documento.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "NV") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/TAG-NEVADA-/documento.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "MD") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/TAG-MD/documento.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "TN") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/TAG-TENNESSEE-/documento.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "NC") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      $("#cont_loader").toggleClass("ocultar_loader");
      // console.log(idRegisterVehicle);    
        $("#cont_loader").toggleClass("ocultar_loader");
        var pdfURL = "pdf/NC_NORTE_CALIFORNIA/documento.php?idRegisterVehicle=" + idRegisterVehicle;

        // Abrir el primer PDF en una nueva pestaña
        var newTab = window.open(pdfURL, "_blank");
        newTab.focus();
   
    } else if (pdf === "IL") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/Illonis/illonis.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "GA") {
      $("#cont_loader").toggleClass("ocultar_loader");
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/TAG-GEORGIA/crear_h_pdf_tag_georgia.php?idRegisterVehicle=" +
        idRegisterVehicle;
      var pdfURL2 =
        "pdf/TAG-GEORGIA/crear_v_pdf_tag_georgia.php?idRegisterVehicle=" +
        idRegisterVehicle;

      // Descargar los dos PDFs en el servidor y combinarlos
      Promise.all([
        downloadPDFToServer(
          pdfURL1,
          "reporteHorizontal.pdf",
          "pdf/TAG-GEORGIA/"
        ),
        downloadPDFToServer(pdfURL2, "reporteVertical.pdf", "pdf/TAG-GEORGIA/"),
      ]).then(() => {
        setTimeout(() => {
          $("#cont_loader").toggleClass("ocultar_loader");
        var pdfURL = "pdf/TAG-GEORGIA/documento.php";

        // Abrir el primer PDF en una nueva pestaña
        var newTab = window.open(pdfURL, "_blank");
        newTab.focus();
        }, 200);
      });
    } else if (pdf === "Insurance") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      console.log(idRegisterVehicle);

      var pdfURL1 =
        "pdf/insurance/insurance.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "OH") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);

      var pdfURL1 = "pdf/ohio/documento.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "KS") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);

      var pdfURL1 = "pdf/kansas/documento.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "IN") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);

      var pdfURL1 = "pdf/indiana/documento.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "NM") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);

      var pdfURL1 = "pdf/mexico/documento.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else if (pdf === "CO") {
      // Obtén el valor del atributo idRegisterVehicle del elemento padre (tr)
      var idRegisterVehicle = $(this).closest("tr").attr("idRegisterVehicle");
      // console.log(idRegisterVehicle);

      var pdfURL1 = "pdf/colorado/documento.php?idRegisterVehicle=" + idRegisterVehicle;

      // Abrir el primer PDF en una nueva pestaña
      var newTab1 = window.open(pdfURL1, "_blank");
      newTab1.focus();
    } else {
      alert("No hay PDF disponible para este registro");
    }
  });

  $("#body-listRegisterInspect").on("click", ".print", function () {
    // Obtén el valor del atributo idRegisterInspect del elemento padre (tr)
    var idRegisterInspect = $(this).closest("tr").attr("idRegisterInspect");
    // console.log(idRegisterInspect);

    var pdfURL1 =
      "pdf/INSPECT/Inspect.php?idRegisterInspect=" + idRegisterInspect;

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
          idRegisterInspect: idRegisterInspect,
        },
        success: function (response) {
          console.log("Registro eliminado", response);
          fetch_list_register_inspect();
        },
        error: function (xhr, status, error) {
          console.error("Error al eliminar el registro:", error);
          fetch_list_register_inspect();
        },
      });
    }
  });

  // $("#body-listRegisterVehicle").on("click", ".view-register", function () {

  // });



  $(".btn-crear-usuario").on("click", function () {
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
    if (!algunoVacio) {
      let nombre_user = $("#name_user").val();
      let correo_electronico = $("#Email").val();
      let contraseña = $("#password").val();
      let rol = $("#rol").val();
      $.ajax({
        url: "backend/Login/crear_user.php",
        type: "POST",
        data: {
          nombre_user: nombre_user,
          correo_electronico: correo_electronico,
          contraseña: contraseña,
          rol: rol,
        },
        success: function (response) {
          console.log("Usuario registrado", response);
          fetch_list_register_users();
          $("#formulario_user")[0].reset();
          $(".cont-form-agregar-usuario").toggleClass(
            "ocultar-form-crear-user"
          );
          $(".cont-user-register-succes").toggleClass(
            "ocultar-form-crear-user"
          );
          setTimeout(() => {
            $(".cont-user-register-succes").toggleClass(
              "ocultar-form-crear-user"
            );
          }, 2000);
        },
        error: function (xhr, status, error) {
          console.error("Error al hacer el registro:", error);
        },
      });
    }
  });

  $("#btn-crear-user").on("click", function () {
    $(".cont-form-agregar-usuario").toggleClass("ocultar-form-crear-user");
  });

  $(".btn-crear-cancelar").on("click", function () {
    $(".cont-form-agregar-usuario").toggleClass("ocultar-form-crear-user");
  });

  $("#body-listRegisterUser").on("click", ".delete-register", function () {
    if (confirm("¿Deseas eliminar este registro?")) {
      // Obtén el valor del atributo idRegisterUser del elemento padre (tr)
      var idRegisterUser = $(this).closest("tr").attr("idRegisterUser");

      console.log(idRegisterUser);

      // Realizar la solicitud AJAX
      $.ajax({
        url: "backend/Login/eliminar_user.php",
        type: "POST",
        data: {
          idRegisterUser: idRegisterUser,
        },
        success: function (response) {
          console.log("Registro eliminado", response);
          fetch_list_register_users();
        },
        error: function (xhr, status, error) {
          console.error("Error al eliminar el registro:", error);
          fetch_list_register_users();
        },
      });
    }
  });


  //Editar Usuarios


  $(".cont-form-editar-usuario").on("click", '.btn-editar-user', function () {

    if (confirm("Estas seguro que deseas cambiar estos datos?")) {
      let camposRequeridos = $(".required_user_edit");
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
      if (!algunoVacio) {
        let id_usuario = $("#id_user_edit").val();
        let nombre_user = $("#name_user_edit").val();
        let correo_electronico = $("#Email_edit").val();
        let contraseña = $("#password_edit").val();
        let rol = $("#rol_edit").val();
        // console.log(id_usuario)
        // console.log(nombre_user)
        // console.log(correo_electronico)
        // console.log(contraseña)
        // console.log(rol)

        $.ajax({
          url: "backend/Login/editar_usuario.php",
          type: "POST",
          data: {
            id_usuario: id_usuario,
            nombre_user: nombre_user,
            correo_electronico: correo_electronico,
            contraseña: contraseña,
            rol: rol,
          },
          success: function (response) {
            console.log("Usuario editado", response);
            fetch_list_register_users();
            $(".cont-form-editar-usuario").toggleClass("ocultar");
          },
          error: function (xhr, status, error) {
            console.error("Error al hacer el registro:", error);
          },
        });
      }
    }
  });



  $("#body-listRegisterUser").on("click", ".edit-register", function () {
    $("#cont-form-editar-usuario").toggleClass("ocultar");
    // Obtén el valor del atributo idRegisterUser del elemento padre (tr)
    var idRegisterUser = $(this).closest("tr").attr("idRegisterUser");

    // console.log(idRegisterUser);

    // Realizar la solicitud AJAX
    $.ajax({
      url: "backend/Login/view_usuario.php",
      type: "POST",
      data: {
        idRegisterUser: idRegisterUser,
      },
      success: function (response) {
        let listRegistro = JSON.parse(response);

        let plantilla = "";
        listRegistro.forEach((Registro) => {

          let selection = `<div class="cont-campo campo-rol">
          <label for="rol" class="form-label">ROL<span class="requerido">*</span></label>
          <select name="rol" id="rol_edit" class="form-control required_user_edit">
              <option value="">--</option>
              <option value="CLIENTE">CLIENTE</option>
          </select>
      </div>`

          if (Registro.Rol_ID === "ADMINISTRADOR") {
            selection = `<div class="cont-campo campo-rol">
          <label for="rol" class="form-label">ROL<span class="requerido">*</span></label>
          <select name="rol" id="rol_edit" class="form-control required_user_edit">
              <option value="ADMINISTRADOR">ADMINISTRADOR</option>
          </select>
      </div>`
          }



          plantilla += `
          <div class="cont-campo" hidden>
          <label for="id_user_edit" class="form-label">ID<span class="requerido">*</span></label>
          <input type="text" class="form-control required_user_edit" id="id_user_edit" value="${Registro.ID_Usuario}">
      </div>  
          <div class="cont-campo">
          <label for="name_user" class="form-label">NOMBRE DE USUARIO<span class="requerido">*</span></label>
          <input type="text" class="form-control required_user_edit" id="name_user_edit" value="${Registro.Nombre_User}">
      </div>
      
      <div class="cont-campo">
          <label for="Email" class="form-label">CORREO ELECTRONICO</label>
          <input type="email" class="form-control" id="Email_edit" value="${Registro.Correo_Electronico}">
      </div>
      <div class="cont-campo">
          <label for="password" class="form-label">CONTRASEÑA<span class="requerido">*</span></label>
          <input type="password" class="form-control required_user_edit" id="password_edit">

          <span class="toggle-password">
              <i id="eye_edit" class="fas fa-eye"></i>
          </span>
      </div>
      ${selection}
      
      <input type="text" class="form-control" hidden id="rol_oculto" value="${Registro.Rol_ID}">
      <div class="campo-btn">
          <button type="button" class="btn btn-editar-cancelar">CANCELAR</button>
          <button type="button" class="btn btn-editar-user">GUARDAR</button>
      </div>

                    `;


        });



        $("#formulario_user_editar").html(plantilla);
        let rol_editar = $('#rol_oculto').val();
        $('#rol_edit').val(rol_editar);
      },
      error: function (xhr, status, error) {
        console.error("Error al eliminar el registro:", error);
      },
    });


  });



  $(".cont-form-editar-usuario").on("click", '.btn-editar-cancelar', function () {
    $(".cont-form-editar-usuario").toggleClass("ocultar");
  });

  $(".cont-form-editar-usuario").on("click", '.toggle-password', function () {
    var passwordInput = $("#password_edit");
    var eyeIcon = $("#eye_edit");

    if (passwordInput.attr("type") === "password") {
      passwordInput.attr("type", "text");
      eyeIcon.removeClass("fa-eye");
      eyeIcon.addClass("fa-eye-slash");
    } else {
      passwordInput.attr("type", "password");
      eyeIcon.removeClass("fa-eye-slash");
      eyeIcon.addClass("fa-eye");
    }
  });


  $(".toggle-password").click(function () {
    var passwordInput = $("#password");
    var eyeIcon = $("#eye");

    if (passwordInput.attr("type") === "password") {
      passwordInput.attr("type", "text");
      eyeIcon.removeClass("fa-eye");
      eyeIcon.addClass("fa-eye-slash");
    } else {
      passwordInput.attr("type", "password");
      eyeIcon.removeClass("fa-eye-slash");
      eyeIcon.addClass("fa-eye");
    }
  });


  // Historial de actividad

  let id_usuario = $("#id_usuario").text();
  //   console.log(id_usuario)

  if (id_usuario === "0") {
    users_activity_admin();
  } else {
    let nombre_user = $("#nombre_user").text();
    // console.log(nombre_user)
    // console.log(id_usuario)

    let plantilla = `  
                        <option value="${id_usuario}">${nombre_user}</option>
                    `;
    $("#idUser").html(plantilla);
  }

  function users_activity_admin() {
    $.ajax({
      type: "GET",
      url: "backend/Model/fetch_list_users.php",
      success: function (response) {
        // console.log(response);
        let listRegistro = JSON.parse(response);

        let plantilla = "";

        listRegistro.forEach((listRegistro) => {

          plantilla += `
                        <option value="${listRegistro.ID_Usuario}">${listRegistro.Nombre_User}</option>
                    `;
        });

        $("#idUser").html(plantilla);
      },
    });
  }

  $('#btnBuscar').on('click', function () {
    // console.log("click en btn buscar");
    let usuarioSelect = $("#idUser").val();
    let fecha_inicio = $("#fechaInicio").val();
    let fecha_fin = $("#fechaFin").val();

    console.log(fecha_inicio)
    console.log(fecha_fin)
    console.log(usuarioSelect)
    if (fecha_inicio === "") {
      fecha_inicio = "vacio"
    }
    if (fecha_fin === "") {
      fecha_fin = "vacio"
    }

    $.ajax({
      url: "backend/Model/list_historial_usuario.php",
      type: "POST",
      data: {
        usuarioSelect: usuarioSelect,
        fecha_inicio: fecha_inicio,
        fecha_fin: fecha_fin
      },
      success: function (response) {
        let listRegistro = JSON.parse(response);
        console.log(response)
        let plantilla = "";
        let nombre_user = $("#idUser option:selected").text();
        listRegistro.forEach((Registro) => {

          plantilla += `
              <tr>
                  <td>${nombre_user}</td>
                  <td>${Registro.TotalRegistros}</td>
              </tr>
                        `;
        });

        $("#body_table_UA").html(plantilla);
      },
      error: function (xhr, status, error) {
        console.error("Error al hacer el registro:", error);
      },
    });
  });

  // Fin Historial







});
