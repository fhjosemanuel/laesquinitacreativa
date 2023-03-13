<?php
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
            <h2>Productos Prediseñados</h2>
            <div class="card-list-products">
                <div class="card">
                    <div class="card-img">
                        <img src="../../'.$disenios[0]['url'].'" alt="prediseño1">
                    </div>
                    <div class="info-card">
                        <div class="text-product">
                            <h3>'.$disenios[0]['name'].'</h3>
                        </div>
                        <div class="price">$'.$disenios[0]['price'].'</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
}


echo $html;

?>