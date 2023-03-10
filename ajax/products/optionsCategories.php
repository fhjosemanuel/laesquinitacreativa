<?php
require_once "../../controllers/CategoryController.php";

$query = new CategoryController();
$categorias = $query->read();

$html = '<option value="">Selecciona una categoria</option>';
foreach($categorias as $categoria){
    $html .= '<option value="'.$categoria['id'].'">'.$categoria['name'].'</option>';
}

echo $html;
?>