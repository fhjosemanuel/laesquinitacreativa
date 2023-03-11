<?php
require_once "../../controllers/ProductController.php";
require_once "../../controllers/CategoryController.php";
require_once "../../controllers/DesignController.php";

$categorias = new CategoryController();
$getCategoria = $categorias->id($_POST['categoria']);

$productos = new ProductController();
$getProducto = $productos->readByNameANDCategory($_POST['producto'], $getCategoria[0]['name']);


$directorio = '../../';
$archivo = 'public/img/bocetos/'.strtolower($getCategoria[0]['name']).'/'.$_FILES['imagenPrevisualizacion2']['name'];
$ruta = $directorio.$archivo;['name'];

$design = [
    $_POST['nombrePredisenio'],
    $archivo,
    $_POST['descripcionPredisenios'],
    $_POST['costoPredisenio'],
    $getProducto[0]['id']
];

$html = '';
$disenios = new DesignController();
$add = $disenios->create($design);
if( $add ) {
    move_uploaded_file($_FILES['imagenPrevisualizacion2']['tmp_name'], $ruta);
    $html .= 'true';
} else {
    $html .= '
    <div class="alert alert-warning" role="alert">
        Error al guardar los datos, intenta más tarde :(
    </div>
    ';
}

echo $html;
?>