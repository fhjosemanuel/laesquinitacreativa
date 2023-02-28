<?php

function conectar() {
  $conexion = mysqli_connect('localhost', 'root', '', 'esquinita');

  if (mysqli_connect_errno()) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
  }

  return $conexion;
}

function cerrarConexion($conexion) {
  mysqli_close($conexion);
}
?>