function validateForm() {

  // Validar campos
  var email = $("#email").val();
  var password = $("#password").val();
  if (email == "" || password == "") {
    $("#message").html("<p class='error-message'>Todos los campos son obligatorios.</p>");
    return false;
  } else {
    return true;
  }
}

function loginValidation() {
  $("#login-form").submit(function(event) {
    // Evitar que se recargue la página
    event.preventDefault();

    // Validar el formulario
    if (validateForm()) {
      // Crear objeto FormData y agregar campos del formulario
      var formData = new FormData();
      formData.append("email", $("#email").val());
      formData.append("password", $("#password").val());

      // Enviar solicitud AJAX
      $.ajax({
        url: "../resources/controllers/login.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          $("#message").html(`<p class='success-message'>${response}</p>`);
          window.location.replace("../../index.php");
        },
        error: function(xhr, status, error) {
          var errorMessage = xhr.responseText;
          $("#message").html(`<p class='error-message'>${errorMessage}</p>`);
        }
      });
    }
  });
}
