<?php
session_start();
require_once "../../controllers/ProductController.php";
require_once "../../controllers/GalleriesController.php";

$html = "";
if(isset($_GET["categoria"])) {
    $objeto = new ProductController();
    $productos = $objeto->readByCategory(ucfirst($_GET["categoria"]));
    if( !empty($productos) ){
        foreach($productos as $producto){
            $galeria = new GalleriesController();
            $fotos = $galeria->readByProduct($producto["id"]);
            $html .= '
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" >
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            ';
                            foreach($fotos as $foto){
                                $html .= '<img class="img-fluid w-100" src="../../'.$foto["url"].'" alt="" style="height: 350px;">';
                            }
                            $html .= '
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">'.substr($producto["name"], 0, 10).'...</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$'.$producto["price"].'</h6><h6 class="text-muted ml-2"><del>$'.($producto["price"]*0.16+$producto["price"]).'</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="../../views/productos/producto.html?search='.$producto["id"].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Ver Detalles</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            ';
        }
    }
}else {
    $objeto = new ProductController();
    $productos = $objeto->readNameANDPrice();
    if( !empty($productos) ){
        foreach($productos as $producto){
            $galeria = new GalleriesController();
            $fotos = $galeria->readByProduct($producto["id"]);
            $html .= '
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" >
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            ';
                            foreach($fotos as $foto){
                                $html .= '<img class="img-fluid w-100" src="'.$foto["url"].'" alt="" style="height: 350px;">';
                            }
                            $html .= '
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">'.substr($producto["name"], 0, 10).'...</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$'.$producto["price"].'</h6><h6 class="text-muted ml-2"><del>$'.($producto["price"]*0.16+$producto["price"]).'</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="../../views/productos/producto.html?search='.$producto["id"].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Ver Detalles</a>
                            ';
                            if(isset($_SESSION['user_name'])) {
                                $html .= '
                                <a href="#definido" class="btn btn-sm text-dark p-0" data-toggle="modal" data-target="#noFound"><i class="fas fa-shopping-cart text-primary mr-1"></i>Agregar al carrito</a>
                                ';
                            } else {
                                $html .= '
                                <a href="#nodenifo" class="btn btn-sm text-dark p-0" data-toggle="modal" data-target="#registroModal"><i class="fas fa-shopping-cart text-primary mr-1"></i>Agregar al carrito</a>
                                ';
                            }
                            $html .= '
                        </div>
                    </div>
                </div>
            ';
        }
    }
}

echo $html;

?>