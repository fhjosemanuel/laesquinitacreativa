<?php
require_once "../../controllers/CategoryController.php";
require_once "../../controllers/ProductController.php";

$objeto = new CategoryController();
$categorias = $objeto->read();
$html = '';
foreach($categorias as $categoria){
    $articulos = new ProductController();
    $productos = $articulos->readByCategory(ucfirst($categoria["name"]));
    $html .= '
    <div class="col-lg-4 col-md-6  mb-4">
        <div class="cat-item d-flex flex-column border  mb-4">
            <p class="text-right">'.count($productos).' Productos</p>
            <a href="../../views/productos/productos.html?categoria='.strtolower( $categoria["name"] ).'" class="cat-img position-relative overflow-hidden" style="height: 400px;">
                <img class="img-fluid" src="../../'.$categoria["url"].'" alt="'.$categoria["name"].'" />
            </a>
            <h5 class="font-weight-semi-bold m-0">'.$categoria["name"].'</h5>
        </div>
    </div>
    ';
}
echo $html;

?>