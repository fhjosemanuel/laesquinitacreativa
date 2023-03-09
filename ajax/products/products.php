<?php
require_once "../../controllers/ProductController.php";
require_once "../../controllers/GalleriesController.php";

$html = "";
if(isset($_GET["categoria"])){
    $objeto = new ProductController();
    $productos = $objeto->readByCategory(ucfirst($_GET["categoria"]));
    if( !empty($productos) ){
        foreach($productos as $producto){
            $html .= '
            <div class="col-lg-4 col-md-6  mb-4">
                <div class="cat-item d-flex flex-column border  mb-4">
                    <p class="text-right">Perzonaliza</p>
                    <a href="productos.html?categoria='.$_GET["categoria"].'" class="cat-img position-relative overflow-hidden" style="height: 400px;">
                        ';
                        $galeria = new GalleriesController();
                        $fotos = $galeria->readByProduct($producto["id"]);
                        foreach($fotos as $foto){
                            $html .= '<img class="img-fluid" src="../../'.$foto["url"].'" alt="" style="height: 350px;" />';
                        }
                        $html .= '
                    </a>
                    <h6 class="font-weight-semi-bold m-0">'.strtolower( $producto["name"] ).'</h6>
                </div>
            </div>
            ';
        }
    } else {
        $html .= '
        SIN_DATOS
        ';
    }
}

echo $html;

?>