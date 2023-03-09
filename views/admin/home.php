<?php
session_start();
if( $_SESSION["admin"] ) {
    require_once("products/index.html");

} else {
    echo 'Página no encontrada';
}
?>