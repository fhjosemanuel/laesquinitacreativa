<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>La esquinita creativa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../../../public/img/marca/La Esquinita Creativa.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://sfonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../resources/lib/owlcarousel/owl.carousel.min.js" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../resources/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <header id="header"></header>
    <!-- Topbar End -->
    
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Agregar producto</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-12 col-md-6 pb-1">
                <P>Nombre del producto: </P>
                <input type="text" name="nombreProducto" id="nombreProducto" class="form-control">
            </div>
            <div class="col-12 col-md-6 pb-1">
                <P>Precio: </P>
                <input type="text" name="precioProducto" id="precioProducto" class="form-control">
            </div>
            <div class="col-12 col-md-6 pb-1">
                <P>Categoria: </P>
                <select name="categoriaProducto" id="categoriaProducto" class="form-control">
                    <option value="">Selecciona una categoria</option>
                </select>
            </div>
            <div class="col-12 col-md-6 pb-1">
                <P>Descripción: </P>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
    </div>

    
    <div class="container-fluid pt-5">
        AGREGAR CATALOGO DE PREDISEÑOS
    </div>
    <!-- Categories Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-12 col-md-6 pb-1">
                    <P>Nombre del Diseño: </P>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-12 col-md-6 pb-1">
                    <P>Costro Extra: </P>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="col-12 col-md-6 pb-1">
                    <P>Descripción: </P>
                    <input type="text" name="name" id="name" class="form-control">
                </div>  
            </div>
        </div>
    <!-- Categories End -->

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="public/img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <!-- Espacio para ver pre-diseños -->
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-danger">Guardar producto</button>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Footer Start -->
    <footer id="footer"></footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../../resources/lib/easing/easing.min.js"></script>
    <script src="../../../resources/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../../../resources/mail/jqBootstrapValidation.min.js"></script>
    <script src="../../../resources/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../../../resources/js/main.js"></script>
    <script src="../../../resources/js/components.js"></script>
    <script type="text/javascript">
        window.addEventListener("load", headerShowNoSearch);
        window.addEventListener("load", footerShow);
        let categoriaProducto = document.getElementById("categoriaProducto");

        function mostrarCategorias() {

            let ajax = new XMLHttpRequest();

            if (window.XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }

            ajax.onreadystatechange = function() {
                if( this.readyState === 4 && this.status === 200 ) {
                    categoriaProducto.innerHTML = this.responseText;
                }
            }

            ajax.open("POST", "../../ajax/products/optionsCategories.php", true);
            ajax.send();
        }
        window.addEventListener("load", mostrarCategorias);
    </script>
</body>

</html>