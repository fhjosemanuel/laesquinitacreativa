<?php
header('Content-Type: text/html; charset=UTF-8');
header("X-debug-Response: Ola k ase*******************");
include_once('db.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $connect = conectar();

  // Verificar si el correo electrónico ya se encuentra registrado
  $consulta = "SELECT * FROM users WHERE email = '$email'";
  $resultado = mysqli_query($connect, $consulta);
  if (mysqli_num_rows($resultado) > 0) {
    // El correo electrónico ya se encuentra registrado
    http_response_code(400); // Establecer código de estado HTTP 400 (Bad Request)
    echo "El correo electrónico ya se encuentra registrado en la base de datos";
    return;
  }

  // Preparar la consulta SQL para insertar un nuevo registro en la tabla de users
  $consulta = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

  // Ejecutar la consulta SQL
  if (mysqli_query($connect, $consulta)) {
    // El registro se insertó correctamente
    echo 'El registro se realizó correctamente.';
  } else {
    // Hubo un error al insertar el registro
    http_response_code(400); // Establecer código de estado HTTP 400 (Bad Request)
    echo json_encode(array("error" => "Ocurrió un error al intentar registrar el usuario " . mysqli_error($connect)));
  }

  // Cerrar la conexión a la base de datos
  cerrarConexion($connect);
} else {
  header('Location: ../../register.html');
}
?>