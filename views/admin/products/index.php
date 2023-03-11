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

    <!-- Admin -->
    <div class="container-fluid">
        Cerrar sesión
    </div>
    <!-- /Admin -->

    <!-- Agregar Producto Start -->
        <div class="container-fluid pt-5" id="producto">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Agregar producto</span></h2>
            </div>
            <form enctype="multipart/form-data" id="formularioProducto">
                <div class="row px-xl-5 pb-3">
                    <div class="col-12 pb-1">
                        <P>Nombre del producto: </P>
                        <input type="text" name="nombreProducto" id="nombreProducto" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 pb-1">
                        <P>Categoria: </P>
                        <select name="categoriaProducto" id="categoriaProducto" class="form-control">
                            <option value="">Selecciona una categoria</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 pb-1">
                        <P>Precio: </P>
                        <input type="text" name="precioProducto" id="precioProducto" class="form-control">
                    </div>
                    <div class="col-12 pb-1">
                        <P>Descripción: </P>
                        <textarea name="descripcionProductos" id="descripcionProductos" class="form-control"></textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label for="seleccionArchivos" class="mb-2">Selecciona una imagen del producto</label>
                            <input type="file" accept="image/*" class="form-control-file" name="seleccionArchivos" id="seleccionArchivos">
                        </div>
                    </div>
                    <div class="col-12">
                        <img id="imagenPrevisualizacion" width="150px">
                    </div>
                    <div class="col-12 mt-3">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="agregarPredisenios">
                            <label class="form-check-label" for="agregarPredisenios">Agregar prediseños para este producto</label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-danger" id="insertar">Guardar producto</button>
                    </div>
                </div>
            </form>
        </div>
    <!-- Agregar Producto End -->
    
    <!-- Agregar Prediseños Start -->
        <div class="container-fluid" id="predisenio" style="display: none;">
            
            <form enctype="multipart/form-data" id="formularioPredisenio">
                <div class="row pb-3">
                    <div class="col-12 pb-1 text-center">
                        <h2 class="section-title px-5"><span class="px-2">Agregar prediseño</span></h2>
                    </div>
                    <div class="col-12 col-md-6 pb-1">
                        <P>Nombre del prediseño: </P>
                        <input type="text" name="nombrePredisenio" id="nombrePredisenio" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 pb-1">
                        <P>Costro Extra: </P>
                        <input type="text" name="costoPredisenio" id="costoPredisenio" class="form-control">
                    </div>
                    <div class="col-12 pb-1">
                        <P>Descripción: </P>
                        <textarea name="descripcionPredisenios" id="descripcionPredisenios" class="form-control"></textarea>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label for="seleccionArchivos2" class="mb-2">Selecciona una imagen del producto</label>
                            <input type="file" accept="image/*" class="form-control-file" id="seleccionArchivos2" name="imagenPrevisualizacion2">
                        </div>
                    </div>
                    <div class="col-12">
                        <img id="imagenPrevisualizacion2" width="150px">
                    </div>
                    <div class="col-12 text-center">
                        <input type="hidden" name="nombreDeProductoParaPre" id="nombreDeProductoParaPre" value="prueba"/>
                        <button class="btn btn-danger" id="agregarPredisenio">Agregar prediseño</button>
                    </div>
                </div>
            </form>
            
        </div>
        <div class="container-fluid text-center" id="botonRecargar" style="display: none;">
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-5">
                    <button class="btn btn-danger" onclick="recargar()">Agregar otro producto</button>
                </div>
            </div>
        </div>
    <!-- Agregar Prediseños End -->
    
    <!-- Zona Mensajes -->
    <div class="container-fluid" id="mensaje"></div>
    <!-- Zona Mensajes End -->

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
        let mensaje = document.getElementById("mensaje");
        let divProducto = document.getElementById("producto");
        let divPredisenio = document.getElementById("predisenio");
        
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

            ajax.open("GET", "../../ajax/products/optionsCategories.php", true);
            ajax.send();
        }
        
        const seleccionArchivos = document.querySelector("#seleccionArchivos");
        let imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        function verImagenProducto(){
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = seleccionArchivos.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            imagenPrevisualizacion.src = objectURL;
        }
        const seleccionArchivos2 = document.querySelector("#seleccionArchivos2");
        let imagenPrevisualizacion2 = document.querySelector("#imagenPrevisualizacion2");
        function verImagenPredisenio(){
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = seleccionArchivos2.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                imagenPrevisualizacion2.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            imagenPrevisualizacion2.src = objectURL;
        }

        /* Funciones para guardar */
        function guardarProducto(e){
            e.preventDefault();
            let ajax = new XMLHttpRequest();

            if (window.XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if( validarProducto() ){
                let formularioProducto = document.getElementById("formularioProducto");

                let datos = new FormData(formularioProducto);

                ajax.onreadystatechange = function() {
                    if( this.readyState === 4 && this.status === 200 ) {
                        mensaje.innerHTML = this.responseText;
                        if(mensaje.innerHTML == 'true'){
                            abrirSegundoFormulario()
                        }
                    }
                }

                ajax.open("POST", "../../ajax/products/addProduct.php", true);
                ajax.send(datos);
            }
            
        }

        function abrirSegundoFormulario(){
            let producto = document.getElementById("producto");
            let predisenio = document.getElementById("predisenio");
            let botonRecargar = document.getElementById("botonRecargar");
            let agregarPredisenios = document.getElementById("agregarPredisenios").checked;

            if(agregarPredisenios){
                producto.style.display = "none";
                predisenio.style.display = "flex";
                botonRecargar.style.display = "flex";
            } else {
                window.location.reload();
            }
        }
        function recargar(){
            window.location.reload();
        }

        function guardarPredisenio(e){
            e.preventDefault();
            let ajax = new XMLHttpRequest();

            if (window.XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            let nombreProducto = document.getElementById("nombreProducto").value;
            let categoriaProducto = document.getElementById("categoriaProducto").value;
            if( validarPredisenio() ){
                let formularioPredisenio = document.getElementById("formularioPredisenio");

                let datos = new FormData(formularioPredisenio);

                datos.append('producto', nombreProducto);
                datos.append('categoria', categoriaProducto);

                ajax.onreadystatechange = function() {
                    if( this.readyState === 4 && this.status === 200 ) {
                        mensaje.innerHTML = this.responseText;
                        if(mensaje.innerHTML == 'true'){
                            limpiarFormularioPredisenio();
                        }
                    }
                }

                ajax.open("POST", "../../ajax/products/addPredisenios.php", true);
                ajax.send(datos);
            }
        }

        function limpiarFormularioPredisenio(){
            document.getElementById("formularioPredisenio").reset();
            imagenPrevisualizacion2.src = "";
        }
        function validarProducto(){
            let nombreProducto = document.getElementById("nombreProducto").value;
            let categoriaProducto = document.getElementById("categoriaProducto").value;
            let precioProducto = document.getElementById("precioProducto").value;
            let descripcionProductos = document.getElementById("descripcionProductos").value;
            let seleccionArchivos = document.getElementById("seleccionArchivos");
            mensaje.innerHTML = '';

            if (nombreProducto.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio ingresar el nombre del producto.
                    </div>`;
                window.scrollTo();
                return false;
            }
            if (categoriaProducto.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio escoger una categoria para el producto.
                    </div>`;
                return false;
            }
            if (precioProducto.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio ingresar el precio del producto.
                    </div>`;
                return false;
            }
            if (descripcionProductos.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio ingresar una descripci\u00F3n del producto.
                    </div>`;
                window.scrollTo();
                return false;
            }
            return true;
        }
        function validarPredisenio(){
            let nombrePredisenio = document.getElementById("nombrePredisenio").value;
            let costoPredisenio = document.getElementById("costoPredisenio").value;
            let descripcionPredisenios = document.getElementById("descripcionPredisenios").value;
            let seleccionArchivos2 = document.getElementById("seleccionArchivos2");
            mensaje.innerHTML = '';

            if (nombrePredisenio.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio ingresar el nombre del predise\u00F1o.
                    </div>`;
                return false;
            }
            if (costoPredisenio.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio ingresar un costo para el predise\u00F1o.
                    </div>`;
                return false;
            }
            if (descripcionPredisenios.length == 0) {
                mensaje.innerHTML = `
                    <div class="alert alert-warning" role="alert">
                        Es obligatorio ingresar una descripci\u00F3n el predise\u00F1o.
                    </div>`;
                return false;
            }
            return true;
        }
        document.getElementById("insertar").addEventListener("click", guardarProducto);
        document.getElementById("agregarPredisenio").addEventListener("click", guardarPredisenio);
        window.addEventListener("change", verImagenProducto);
        window.addEventListener("change", verImagenPredisenio);
        window.addEventListener("load", mostrarCategorias);
    </script>
</body>

</html>