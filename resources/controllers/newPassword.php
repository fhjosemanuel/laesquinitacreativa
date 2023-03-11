<?php
include_once('db.php');

header('Content-Type: text/html; charset=UTF-8');

$verification_code = $_POST['token'];
$password = $_POST['password'];

if (isset($verification_code)) {
  // Descifrar datos
  $decode_data = base64_decode($verification_code);
}


$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

$connect = conectar();

$query = "UPDATE users SET password = ? WHERE code_validation = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "ss", $encrypted_password, $decode_data);
mysqli_stmt_execute($stmt);
$num_rows_affected = mysqli_stmt_affected_rows($stmt);
cerrarConexion($connect);

define("LOGIN_PAGE", "../../login.html");

// Verificar si la actualización de la contraseña fue exitosa y proporcionar una respuesta adecuada
if ($num_rows_affected === 1) {
  $response = array(
    "redirect" => LOGIN_PAGE
  );
  echo json_encode($response);
  die();
} else {
  die("No se pudo actualizar la contraseña.");
}
?>