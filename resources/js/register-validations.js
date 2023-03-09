function validarPassword(password) {
  let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
  return regex.test(password);
}

function validateForm() {

  // Validar campos
  var name = $("#name").val();
  var email = $("#email").val();
  var password = $("#password").val();
  var confirm_password = $("#confirm_password").val();
  if (name == "" || email == "" || password == "" || confirm_password == "") {
    $("#message").html("<p class='error-message'>Todos los campos son obligatorios.</p>");
    return false;
  } else if(!validarPassword(password)) {
    $("#message").html(`<p class='error-message'>contraseña invalida</p>`);
    return false;
  }else if (password != confirm_password) {
    $("#message").html("<p class='error-message'>Las contraseñas no coinciden.</p>");
    return false;
  } else {
    return true;
  }
}

function registerValidation() {
  $("#register-form").submit(function(event) {
    // Evitar que se recargue la página
    event.preventDefault();

    // Validar el formulario
    if (validateForm()) {
      // Crear objeto FormData y agregar campos del formulario
      var formData = new FormData();
      formData.append("name", $("#name").val());
      formData.append("email", $("#email").val());
      formData.append("password", $("#password").val());
      // formData.append("confirm-password-input", $("#confirm_password").val());

      // Enviar solicitud AJAX
      $.ajax({
        url: "../resources/controllers/register.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // $("#message").html(`<p class='success-message'>${response}</p>`);
          window.location.href = '../index.php';
        },
        error: function(xhr, status, error) {
          var errorMessage = xhr.responseText;
          $("#message").html(`<p class='error-message'>${errorMessage}</p>`);
        }
      });
    }
  });
}
