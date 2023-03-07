<?php

header('Content-Type: text/html; charset=UTF-8');
header("X-debug-Response: Ola k ase*******************");

// Incluir archivo de conexión a la base de datos
include_once('db.php');

// Verificar si se hizo una solicitud AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

  // Obtener datos del formulario
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Conectar a la base de datos
  $connect = conectar();

  // Preparar la consulta SQL para buscar al usuario por correo electrónico
  $consulta = "SELECT * FROM users WHERE email = '$email'";
  $resultado = mysqli_query($connect, $consulta);

  // Verificar si se encontró al usuario
  if (mysqli_num_rows($resultado) > 0) {
    // Obtener los datos del usuario
    $usuario = mysqli_fetch_assoc($resultado);
    // Verificar si la contraseña ingresada es correcta
    if (password_verify($password, $usuario['password'])) {
      // Inicio de sesión correcto
      session_start();
      $_SESSION['user_id'] = $usuario['id'];
      $_SESSION['user_name'] = $usuario['name'];
      $_SESSION['user_email'] = $usuario['email'];
      $_SESSION['validated'] = $usuario['validated'];
    } else {
      // Contraseña incorrecta
      http_response_code(400); // Establecer código de estado HTTP 400 (Bad Request)
      echo "La contraseña ingresada es incorrecta.";
    }
  } else {
    // Usuario no encontrado
    http_response_code(400); // Establecer código de estado HTTP 400 (Bad Request)
    echo "El correo electrónico ingresado no está registrado en la base de datos.";
  }

  // Cerrar la conexión a la base de datos
  cerrarConexion($connect);

} else {
  // Redireccionar a la página de inicio de sesión
  header('Location: ../../login.html');
}

?>