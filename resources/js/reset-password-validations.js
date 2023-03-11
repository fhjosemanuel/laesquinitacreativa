function validateForm(){
  // Expresión regular para validar el correo electrónico
  const expresionRegularCorreoElectronico = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var email = $("#email-input").val();
  // Validar el correo electrónico utilizando la expresión regular
  if (expresionRegularCorreoElectronico.test(email)) {
    return true; // El correo electrónico es válido
  } else {
    return false; // El correo electrónico es inválido
  }
}


function resetPasswordValidation() {
  $("#reset-password-form").submit(function(event) {
    // Evitar que se recargue la página
    event.preventDefault();

    // Validar el formulario
    if (validateForm()) {
      // Crear objeto FormData y agregar campos del formulario
      var formData = new FormData();
      formData.append("email", $("#email-input").val());
      console.log("this", $("#email-input").val())
      // Enviar solicitud AJAX
      $.ajax({
        url: "../resources/controllers/passwordReset.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $("#message").html(`
          <div class="alert alert-success alert-dismissible show" id="alert" role="alert" data-auto-dismiss="3500">
            <strong>¡Éxito!</strong> ${response}
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
        error: function(xhr, status, error) {
          var errorMessage = xhr.responseText;
          $("#message").html(`
          <div class="alert alert-danger alert-dismissible show" id="alert" role="alert" data-auto-dismiss="3500">
            <strong>¡Error!</strong> ${errorMessage}
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
        }
      });
    }else{
      $("#message").html(`
      <div class="alert alert-danger alert-dismissible show" id="alert" role="alert" data-auto-dismiss="3500">
        <strong>¡Error!</strong> El correo electrónico ingresado no es valido, favor de ingresar de nuevo.
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
    }
  });
}
