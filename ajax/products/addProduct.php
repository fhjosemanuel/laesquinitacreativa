<?php
require_once "../../controllers/ProductController.php";
require_once "../../controllers/GalleriesController.php";
require_once "../../controllers/CategoryController.php";

$categorias = new CategoryController();
$getCategoria = $categorias->id($_POST['categoriaProducto']);

$html = '';

$product = [
    $_POST['nombreProducto'],
    $_POST['descripcionProductos'],
    $_POST['precioProducto'],
    $_POST['categoriaProducto']
];

$productos = new ProductController();
$existeRegistro = $productos->readByNameANDCategory($_POST['nombreProducto'], $getCategoria[0]['name']);
if(empty($existeRegistro)){

    $productos = new ProductController();
    $add = $productos->create($product);
    if( $add ) {
        $productos = new ProductController();
        $getIDProducto = $productos->readByNameANDCategory($_POST['nombreProducto'], $getCategoria[0]['name']);
        $directorio = '../../';
        $archivo = 'public/img/categorias/'.strtolower($getCategoria[0]['name']).'/'.$_FILES['seleccionArchivos']['name'];
        $ruta = $directorio.$archivo;
        move_uploaded_file($_FILES['seleccionArchivos']['tmp_name'], $ruta);

        $gallery = [
            $archivo,
            $getIDProducto[0]['id']
        ];
        $galeria = new GalleriesController();
        $add = $galeria->create($gallery);
        $html .= 'true';
    } else {
        $html .= '
        <div class="alert alert-warning" role="alert">
            Error al guardar los datos, intenta más tarde :(
        </div>
        ';
    }
} else {
    $html .= '
    <div class="alert alert-warning" role="alert">
        Ya existe un producto con ese nombre :(
    </div>
    ';
}
echo $html;
?>