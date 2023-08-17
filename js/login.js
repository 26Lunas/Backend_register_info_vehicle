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
                if(result === usuario){
                    window.location.href = "system/index.php";
                }
            },
            error: function (xhr, status, error) {
              // Manejar errores de la solicitud AJAX si es necesario
              console.log(xhr.responseText);
            },
          });
    });

    
 });