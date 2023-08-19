$(document).ready(function () {
    // console.log("Jquery esta funcionando.");

    $(".btn-login").on("click", function () { 

        const usuario = $('#user').val();
        const password = $('#password').val();

        const datos = {
            user: usuario,
            password: password
        }
    
        $.ajax({
            type: "POST",
            url: "system/backend/Login/loguear.php",
            data: datos,
            success: function (result) {
              console.log(result);
              if(result !== 'Datos incorrectos.'){
                let listUsuario = JSON.parse(result);

                listUsuario.forEach(element => {
                 let usuario = element.usuario
                 let rol = element.rol
                 let estado_session = element.estado_session

                //  console.log(rol);
                //  console.log(usuario);
  
                 if(estado_session === 'exitosa'){
                  window.location.href = "system/index.php";
              }   
                });
              }
              
              
               
            },
            error: function (xhr, status, error) {
              // Manejar errores de la solicitud AJAX si es necesario
              console.log(xhr.responseText);
            },
          });
    });

    
 });