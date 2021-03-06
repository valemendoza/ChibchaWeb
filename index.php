<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChibchaWeb</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
    <script src="Librerias/Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="Librerias/Bootstrap/css/bootstrap.css">

<link rel="shortcut icon" href="Img/logo.png" />


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .first {
        background-color: rgba(235, 148, 35, 0.842);
        }
  
    </style>

    
    <!-- Custom styles for this template -->
    <link href="Css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand navbar bg-white fixed-top">
    <div class="container-fluid">
       <a> <img src="Img/banner.png" style="width:30%"></a>
       
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
         
        </ul>
        <form class="d-flex">
            <button type="button"  onclick="location.href='Presentacion/registro.php'"class="btn btn-success">Registrarme</button>
            <button type="button"  onclick="location.href='Presentacion/login.php'"class="btn btn-success" >Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </nav><br>
</header>

  <!-- Sobre Nosotros
  ================================================== -->

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img " width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill='#CA5B09'/></svg>

        <div class="container ">
          <div class="carousel-caption text-start">
            <p><center> <img src="Img/logo.png" style="width:15%"></center></p>
            <h1>Sobre Nosotros.</h1>
            <p>ChibchaWeb es una empresa de hospedaje de páginas Web ubicada en Sugamuxi. Sus clientes están localizados en Colombia y países aledaños. </p>
            <p><center><a class="btn btn-lg btn-success" href="Presentacion/registro.php">Unirme</a></center></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#4A8D3A"/></svg>

        <div class="container">
          <div class="carousel-caption text-center">
            <h1>Misión.</h1>
            <p><img src="Img/mision.png" style="width:40%"></p>
            <p>Brindar dominios de calidad a todos sus clientes con el fin de <br>impulsar su crecimiento y presencia en la web.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#D6918E"/></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Visión.</h1>
            <p> <img src="Img/vision.png" style="width:51%"></p>
            <p>Se espera que en los próximos meses se cuente con clientes de África.</p>
          </div>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Paquetes
  ================================================== -->

  <div class="container marketing">

    <div class="row">
      <div class="col-lg-4">
        <img src="Img/plata.png" alt="LogoOro" style="width:70% ">
        <h2>Chibcha-Plata</h2>
        <p>5000 mensual - 50.000 anual.<br>  1 cuenta de correo - 2 bases de datos.<br> 1 solo sitio web - 50 gigas almacenamiento.<br></p>
        <p><a class="btn btn-success" href="Presentacion/login.php">Obtener &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="Img/oro.png" alt="LogoOro" style="width:70% ">
        <h2>Chibcha-Oro</h2>
        <p>10.000 mensual - 100.000 anual <br>100 cuentas de correo - 5 bases de datos.<br> 10 sitios web - 100 gigas almacenamiento. </p>
        <p><a class="btn btn-success" href="Presentacion/login.php">Obtener &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="Img/platino.png" alt="LogoOro" style="width:70% ">
        <h2>Chibcha-Platino</h2>
        <p>15.000 mensual - 120.000 anual <br> &infin; cuentas de correo - &infin; bases de datos.<br> 200 sitios web - 200 gigas almacenamiento. </p>
        <p><a class="btn btn-success" href="Presentacion/login.php">Obtener &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


      <!-- Imágenes de los clientes
  ================================================== -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Nuestros clientes <br><span class="text-muted">Son lo más importante.</span></h2>
      </div>
      <div class="col-md-5">
        <img src="Img/clientes1.png" alt="LogoOro" style="width:100% ">
        
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Por ustedes <br><span class="text-muted">Trabajamos arduamente.</span></h2>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="Img/clientes2.png" alt="LogoOro" style="width:100% ">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">¿Dudas?<br> </h2>
        <p class="lead">Correo: brawebsolutions@gmail.com.</p>
      </div>
      <div class="col-md-5">
        <img src="Img/clientes3.png" alt="LogoOro" style="width:100% ">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="">Regresar arriba</a></p>
    <p>&copy; Desarrollado por BraWeb Solutions. </a></p>
  </footer>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
