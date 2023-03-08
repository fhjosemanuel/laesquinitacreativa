<?php

function conectar() {
  $db_host = getenv('DB_HOST');
  $db_name = getenv('DB_NAME');
  $db_user = getenv('DB_USER');
  $db_password = getenv('DB_PASSWORD');


  $conexion = mysqli_connect($db_host, $db_user, $db_password, $db_name);

  if (mysqli_connect_errno()) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
  }

  return $conexion;
}

function cerrarConexion($conexion) {
  mysqli_close($conexion);
}
?>