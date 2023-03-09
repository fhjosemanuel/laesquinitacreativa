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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <!-- Libraries Stylesheet -->
  <link href="../../../resources/lib/owlcarousel/owl.carousel.min.js" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../../../resources/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header"></header>

    <main>
        <section class="vh-100 bg-image m-0">
            <div class="mask d-flex align-items-center h-100 m-0">
                <div class="container h-100 m-0">
                    <div class="row d-flex justify-content-center align-items-center h-100 m-0">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6 p-4 rounded m-0" style="background-color: #EFFFDA!important;">
                            <div id="mensaje"></div>
                            <div class="col d-flex align-items-center">
                                <img src="../../../public/img/marca/La Esquinita Creativa.jpeg" alt="Logo la esquinita creativa" width="200"
                                class="mx-auto mb-2">
                            </div>
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-4">
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="email">Usuario</label>
                                        <input type="email" id="user" name="email" class="form-control form-control" required/>
                                    </div>
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control form-control" required/>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex">
                                            <label class="fw-bold text-body"><u>Administrador</u></label>
                                        </div>
                                        <div class="col">
                                            <button type="submit" onclick="iniciarSesion()" class="btn btn-primary btn-block">INICIAR SESIÓN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer"></footer>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="../../../resources/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="../../../resources/js/main.js"></script>
  <script src="../../../resources/js/login-validations.js"></script>
  <script src="../../../resources/js/components.js"></script>
    <script type="text/javascript">
        window.addEventListener("load", headerShowNoSearch);
        window.addEventListener("load", footerShow);
        let mensaje = document.getElementById("mensaje");

        function iniciarSesion() {
            let user = document.getElementById("user").value;
            let pass = document.getElementById("password").value;
    
            let ajax = new XMLHttpRequest();
    
            if (window.XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
    
            ajax.onreadystatechange = function() {
                if( this.readyState === 4 && this.status === 200 ) {
                    mensaje.innerHTML = this.responseText;
                    if( mensaje.innerHTML == 'true' ){
                        redirecciona();
                    }
                }
            }
    
            ajax.open("GET", "../../../ajax/admin/auth.php?user="+user+"&pass="+pass, true);
            ajax.send();

            
        }
        function redirecciona(){
            window.location = "http://laesquinitacreativa.test/views/admin/home.php"
        }
    </script>
</body>

</html>