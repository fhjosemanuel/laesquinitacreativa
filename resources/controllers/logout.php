<?php
  session_start(); // Iniciamos la sesión

  // Verificamos si existe la variable $_SESSION['user_id']
  if (isset($_SESSION['user_id'])) {
      // Si existe, eliminamos todas las variables de sesión
      session_destroy();
  }

  // Redirigimos al usuario a la página de inicio de sesión o a cualquier otra página
  header('Location: ../../../../index.php');
  exit();
?>