<?php
session_start();
require_once "../../controllers/DesignController.php";

$diseniosClass = new DesignController();
$disenios = $diseniosClass->readByIDProduct($_GET['search']);
$html = '';
if(empty($disenios)){
    $html = '';
} else {
    $html .= '
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Prediseños</span></h2>
            </div>
        </div>
    ';

    foreach($disenios as $disenio){
        $html .= '
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1" >
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="../../'.$disenio["url"].'" alt="" style="height: 350px;">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">'.substr($disenio["name"], 0, 10).'...</h6>
                    <div class="d-flex justify-content-center">
                        <h6>Por $'.$disenio["price"].' más</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-denter bg-light border">
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
        
        $html .= '
    </div>
    ';
}


echo $html;

?>