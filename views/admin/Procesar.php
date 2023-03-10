<?php
session_start();
if( $_SESSION["admin"] ) {
    require_once  ("../../controllers/CategoryController.php");

    require_once("products/index.php");

} else {
    echo 'Página no encontrada';
}
?>