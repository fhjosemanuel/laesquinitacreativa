<?php
$user = "21232f297a57a5a743894a0e4a801fc3";
$pass = "caf1a3dfb505ffed0d024130f58c5cfa";
$html = '';
if(empty($_GET["user"]) || empty($_GET["pass"])){
    $html .= '
        <div class="alert alert-danger" role="alert">
            Son obligatorios los campos
        </div>
    ';
} else {
    if(MD5($_GET["user"]) == $user && MD5($_GET["pass"]) == $pass) {
        if( !isset($_SESSION) ) session_start();
		if( !isset($_SESSION['admin']) )  $_SESSION['admin'] = true;
        $html .= 'true';
    } else {
        if( !isset($_SESSION) ) session_start();
		if( !isset($_SESSION['admin']) )  $_SESSION['admin'] = false;
        $html .= '
            <div class="alert alert-danger" role="alert">
                Credenciales incorrectas
            </div>
        ';
    }
}


echo $html;
?>