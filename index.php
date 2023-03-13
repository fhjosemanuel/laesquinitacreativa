<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>La esquinita creativa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="./public/img/marca/La Esquinita Creativa.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://sfonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./resources/lib/owlcarousel/owl.carousel.min.js" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./resources/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row py-2 px-xl-5 " style="background-color: rgba(244, 63, 94)">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white" href="">La</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-white" href="">Esquinita</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-white" href="">Creativa</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <?php
                        session_start();
                        if (isset($_SESSION['user_name'])) {
                            echo '<div class="dropdown">';
                            echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            echo "¡Hola, " . $_SESSION['user_name'] . "!";
                            echo '</button>';
                            echo '<div class="dropdown-menu">';
                            echo '<a class="dropdown-item" href="#">Carrito de compra</a>';
                            //Si el correo electrónico no está validado mostrará la opción para validarlo.
                            if(!$_SESSION['validated']){
                                echo '<a class="dropdown-item" href="./resources/controllers/emailValidation.php?email=' . $_SESSION['user_email'] . '&name=' . $_SESSION['user_name'] . '">Validar correo electrónico</a>';
                            }
                            echo '<div class="dropdown-divider"></div>';
                            echo '<a class="dropdown-item" href="./resources/controllers/logout.php">Cerrar sesión</a>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<button type="button" class="btn btn-primary btn-sm">';
                            echo '<a class="a-nav px-2" href="./login.html">Iniciar sesión</a>';
                            echo '</button>';
                        }
                    ?>

                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <!-- <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">La</span>Papeleria</h1>
                </a> -->
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar por categoría, producto o marca...">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent" s>
                                <i class="fa fa-search" tyle="background-color: rgba(244, 63, 94);"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Productos -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Categorias</span></h2>
        </div>
        <div class="row px-xl-5 pb-3" id="verCategorias"></div>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Productos</span></h2>
        </div>
        <div class="row px-xl-5 pb-3" id="verProductos"></div>
    </div>
    <!-- Products End -->

    <!-- Modal Register Start -->
        <div class="modal fade bd-example-modal-xl" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content bg-secondary">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2 class="section-title px-5 mb-3 text-center"><span class="bg-secondary text-center px-2">¿Qué esperas?</span></h2>
                    <p>Ve, escoge, diseña, agrega y compra.</p>
                </div>
                <div class="modal-footer text-center justify-content-center mb-4">
                    <a href="register.html" class="btn btn-primary text-center">Regístrate</a>
                </div>
                </div>
            </div>
        </div>
    <!-- Modal Register End -->

    <!-- Modal NoFound Start -->
        <div class="modal fade bd-example-modal-xl" id="noFound" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content bg-secondary">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h2 class="section-title px-5 mb-3 text-center"><span class="bg-secondary text-center px-2">Funcionalidad no desarrollada</span></h2>
                    <p>Se espera desarrollarse en el segundo sprint</p>
                </div>
                <div class="modal-footer text-center justify-content-center mb-4">
                </div>
                </div>
            </div>
        </div>
    <!-- Modal Nofound End -->

    <!-- Footer Start -->
    <footer id="footer"></footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./resources/lib/easing/easing.min.js"></script>
    <script src="./resources/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="./resources/mail/jqBootstrapValidation.min.js"></script>
    <script src="./resources/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="./resources/js/main.js"></script>

    <script src="../../resources/js/components.js"></script>
    <script type="text/javascript">
        //window.addEventListener("load", headerShow);
        window.addEventListener("load", footerShow);

        let verCategorias = document.getElementById("verCategorias");

        function mostrarCategorias() {
    
            let ajax = new XMLHttpRequest();
    
            if (window.XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
    
            ajax.onreadystatechange = function() {
                if( this.readyState === 4 && this.status === 200 ) {
                    verCategorias.innerHTML = this.responseText;
                }
            }
    
            ajax.open("GET", "ajax/products/categories.php", true);
            ajax.send();
        }

        let verProductos = document.getElementById("verProductos");

        function mostrarProductos() {
            const valores = window.location.search;
            const urlParams = new URLSearchParams(valores);
            

            let ajax = new XMLHttpRequest();

            if (window.XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }

            ajax.onreadystatechange = function() {
                if( this.readyState === 4 && this.status === 200 ) {
                    verProductos.innerHTML = this.responseText;
                }
            }
            
            ajax.open("GET", "ajax/products/products.php", true);
            ajax.send();
        }
        window.addEventListener("load", mostrarCategorias);
        window.addEventListener("load", mostrarProductos);
    </script>
</body>

</html>