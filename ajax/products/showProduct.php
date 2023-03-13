<?php
require_once "../../controllers/ProductController.php";
require_once "../../controllers/GalleriesController.php";

$productos = new ProductController();
$producto = $productos->id($_GET['search']);

$galerias = new GalleriesController();
$galeria = $galerias->readByProduct($producto[0]['id']);
$html = '
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <img src="../../'.$galeria[0]['url'].'" class="imgProducto" alt="imagen-producto">
        </div>
        <div class="col-12 col-md-6 mx-5">
            <div class="container-price">
                <h2 class=""><span class="">'.$producto[0]['name'].'</span></h2>
            </div>
            <div class="container-price mt-5">
                <span>$'.$producto[0]['price'].'</span>
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="container-description mt-5">
                <div class="title-description">
                    <h4>Descripción</h4>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="text-description">
                    <p>'.$producto[0]['description'].'</p>
                </div>
            </div>

            <div class="container-add-cart mt-5">
                <div class="container-quantity">
                    <input type="number" placeholder="1" value="1" min="1" class="input-quantity">
                    <div class="btn-increment-decrement">
                        <i class="fa-solid fa-chevron-up"></i>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </div>
                <button class="btn-add-to-cart">
                    <i class="fa-solid fa-plus"></i>
                    Añadir al carrito
                </button>
            </div>
        </div>
    </div>
';
echo $html;
?>