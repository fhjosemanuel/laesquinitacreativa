<?php
  include_once('./resources/controllers/db.php');

  $verification_code = $_GET['token'] ?? null;
  $email = $_GET['email'] ?? null;

  //* Validaciones para evitar inyecciones de código
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("El email proporcionado es inválido.");
  }
  if (!ctype_alnum($verification_code)) {
      die("El token de verificación proporcionado es inválido.");
  }

  // Verificar que la URL de confirmación tiene la estructura correcta
  $url_parts = parse_url($_SERVER['REQUEST_URI']);
  if (!isset($url_parts['query']) || empty($verification_code) || empty($email)) {
      header('Location: ./index.php');
      exit();
  }

  // Conectar a la base de datos
  $connect = conectar();
  $query = "SELECT * FROM users WHERE email = ?";
  //* Realiza una consulta preparada, evita inyecciones SQL
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  cerrarConexion($connect);

  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    if($user['code_validation'] == $verification_code){
      $id = $user['id'];
      $connect = conectar();
      $query = "UPDATE users SET validated = true WHERE id = ?";
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      cerrarConexion($connect);
      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      $_SESSION['user_email'] = $user['email'];
      $_SESSION['validated'] = true;
      header('Location: ./index.php');
      exit();
    }else {
      //?Se debe enviar un message de que el código no era valido
      header('Location: ./index.php');
      die("El código de verificación proporcionado es inválido, validación rechazada");
    }
  }
  exit();
?>