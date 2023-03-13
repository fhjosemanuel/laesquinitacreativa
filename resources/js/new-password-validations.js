function validarPassword(password) {
  let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
  return regex.test(password);
}

function validateForm() {
  // Validar campos
  var password = $("#password").val();
  var confirm_password = $("#confirm_password").val();
  if (password == "" || confirm_password == "") {
    $("#message").html(
      "<p class='error-message'>Todos los campos son obligatorios.</p>"
    );
    return false;
  } else if (!validarPassword(password)) {
    $("#message").html(`
          <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-dismiss="5000">
            <strong>¡Error!</strong>La contraseña ingresada es muy débil, tu contraseña debe contener 8 caracteres, por lo menos una letra mayúscula, una letra minúscula, un número y un carácter especial.
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          `);
    setTimeout(function () {
      $("#message").fadeOut();
    }, 5000); // El mensaje se ocultará después de 5 segundos (5000 ms)
    return false;
  } else if (password != confirm_password) {
    $("#message").html(`
          <div class="alert alert-danger alert-dismissible fade show" role="alert" data-auto-dismiss="5000">
            <strong>¡Error!</strong>Las contraseñas ingresadas no coinciden.
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          `);
    setTimeout(function () {
      $("#message").fadeOut();
    }, 5000); // El mensaje se ocultará después de 5 segundos (5000 ms)
    return false;
  } else {
    return true;
  }
}

function newPasswordValidation() {
  $("#new-password-form").submit(function (event) {
    // Evitar que se recargue la página
    event.preventDefault();

    // Validar el formulario
    if (validateForm()) {
      // Crear objeto FormData y agregar campos del formulario
      var formData = new FormData();
      formData.append("password", $("#password").val());
      formData.append("confirm_password", $("#confirm_password").val());
      // Obtener la cadena de consulta
      var queryString = window.location.search;
      // Crear un objeto URLSearchParams a partir de la cadena de consulta
      var params = new URLSearchParams(queryString);
      // Obtener el valor del parámetro 'token'
      var token = params.get("token");
      formData.append("token", token);
      // Enviar solicitud AJAX
      $.ajax({
        url: "../resources/controllers/newPassword.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          $("#message").html(`
          <div class="alert alert-success alert-dismissible show" id="alert" role="alert" data-auto-dismiss="5000">
            <strong>¡Éxito!</strong> Contraseña actualizada.
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          `);
          $("#modifica").html(`
            <a class="btn btn-primary btn-block" href="../../login.html">Ir a inicio de sesión</a>
          `);
          setTimeout(function() {
            $("#alert").fadeOut(function(){
              document.getElementById("alert").remove();
            });
          }, 3500); // El mensaje se ocultará después de 5 segundos (3500 ms)
        },
        error: function (xhr, status, error) {
          var errorMessage = xhr.responseText;
          $("#message").html(`
          <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert" data-auto-dismiss="5000">
            <strong>¡Error!</strong>${errorMessage}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          `);
          setTimeout(function() {
            $("#alert").fadeOut(function(){
              document.getElementById("alert").remove();
            });
          }, 3500); // El mensaje se ocultará después de 5 segundos (3500 ms)
        },
      });
    }
  });
}
