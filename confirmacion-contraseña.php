<?php
  include_once('./resources/controllers/db.php');

  if (isset($_GET['token'])) {
    // Descifrar datos
    $decode_data = base64_decode($_GET['token']);
    list($email, $verification_code) = explode('|', $decode_data);
  }else {
    $email = null;
    $verification_code = null;
  }

  // Verificar que la URL de confirmación tiene la estructura correcta
  $url_parts = parse_url($_SERVER['REQUEST_URI']);
  if (!isset($url_parts['query']) || empty($verification_code) || empty($email)) {
      header('Location: ./index.php');
      exit();
  }

  if (!ctype_alnum($verification_code)) {
    die("El token de verificación proporcionado es inválido.");
  }
  //* Validaciones para evitar inyecciones de código
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("El email proporcionado es inválido.");
  }


  // Conectar a la base de datos
  $connect = conectar();
  $query = "SELECT * FROM users WHERE email = ? AND code_validation = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "ss", $email, $verification_code);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  cerrarConexion($connect);

  if (mysqli_num_rows($result) == 1) {
    $encode_data = base64_encode($verification_code);
    header("Location: ./new-password.html?token=" . urldecode($encode_data));
    exit();
  }else {
    //?Se debe enviar un message de que el código no era valido
    header('Location: ./index.php');
    die("El código de verificación proporcionado es inválido, validación rechazada");
  }
?>