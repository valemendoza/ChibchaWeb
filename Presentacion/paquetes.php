<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Bienvenido
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="../Css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="../Librerias/Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../Librerias/Bootstrap/css/bootstrap.css">

    <link rel="shortcut icon" href="../Img/logo.png" />

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="../Img/logo.png">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a class="simple-text logo-normal">
                Nombre del Cliente
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="inicioCliente.php">
                        <i class="bi bi-house-door-fill"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li  class="active ">
                    <a href="paquetes.php">
                        <i class="bi bi-bag-check"></i>
                        <p>Selección de Paquete</p>
                    </a>
                </li>
                <li>
                    <a href="./map.html">
                        <i class="bi bi-window"></i>
                        <p>Agregar Dominio</p>
                    </a>
                </li>
                <li>
                    <a href="misDominios.php">
                        <i class="bi bi-menu-button-wide"></i>
                        <p>Mis Dominios</p>
                    </a>
                </li>
                <li>
                    <a href="./editarCliente.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Editar Información</p>
                    </a>
                </li>
                <li>
                    <a href="./tables.html">
                        <i class="bi bi-receipt-cutoff"></i>
                        <p>Generar Ticket</p>
                    </a>
                </li>
                <li>
                    <a href="./typography.html">
                        <i class="bi bi-question-octagon"></i>
                        <p>Seguimiento de Tickets</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">BIENVENIDO</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button type="button" onclick="location.href='../index.html'"class="btn btn-link" >Cerrar Sesión</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->



        <!-- ===============================================MODIFICAN DESDE ACA ============================================
        ================================================================================================================ -->
        <br><br><br><br>
        <div class="container marketing">

            <div class="row">
                <div class="col-lg-4">
                    <img src="../Img/plata_preview_rev_1.png" alt="LogoOro" style="width:70% ">
                    <h2>Chibcha-Plata</h2>
                    <p>5000 mensual - 50.000 anual.<br>  1 cuenta de correo - 2 bases de datos.<br> 1 solo sitio web - 50 gigas almacenamiento.<br></p>
                    <!--        <p><a class="btn btn-success" href="#">Obtener &raquo;</a></p>-->
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="../Img/oro_preview_rev_1.png" alt="LogoOro" style="width:70% ">
                    <h2>Chibcha-Oro</h2>
                    <p>10.000 mensual - 100.000 anual <br>100 cuentas de correo - 5 bases de datos.<br> 10 sitios web - 100 gigas almacenamiento. </p>
                    <!--        <p><a class="btn btn-success" href="#">Obtener &raquo;</a></p>-->
                    <br>
                    <!--<div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Selecciona
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><option class="dropdown-item" value="1">Chibcha plata</option></li>
                        <li><option class="dropdown-item" value="2">Chibcha oro</option></li>
                        <li><option class="dropdown-item" value="3">Chibcha platino</option></li>
                      </ul>
                    </div>-->
                    <form action="paqueteE.php" method="post">
                    <select class="btn btn-secondary dropdown-toggle" name="paquetes" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Seleccione
                        <!--          <option class="dropdown-item">Seleccione</option>-->
                        <option  value="1" class="dropdown-item">Chibcha plata</option>
                        <option  value="2" class="dropdown-item">Chibcha oro</option>
                        <option  value="3" class="dropdown-item">Chibcha platino</option>
                    </select>
<<<<<<< Updated upstream:Presentacion/paquetes.php
                    <?php
                        include_once ("../Persistencia/conexion.php");

                    ?>
                    <br>
                    <br>
                    <select class="btn btn-secondary dropdown-toggle" name="paquetes" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
=======
                        <br>
                    <select class="btn btn-secondary dropdown-toggle" name="plan" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
>>>>>>> Stashed changes:paquetes.php
                        Seleccione
                        <!--          <option class="dropdown-item">Seleccione</option>-->
                        <option value="1" class="dropdown-item" >Mensual</option>
                        <option value="2" class="dropdown-item" >Anual</option>
                    </select>
                        <br>
                    <button type="submit" class="btn btn-success">Adquirir</button>
                    </form>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="../Img/platino_preview_rev_1.png" alt="LogoOro" style="width:70% ">
                    <h2>Chibcha-Platino</h2>
                    <p>15.000 mensual - 120.000 anual <br> &infin; cuentas de correo - &infin; bases de datos.<br> 200 sitios web - 200 gigas almacenamiento. </p>
                    <!--        <p><a class="btn btn-success" href="#">Obtener &raquo;</a></p>-->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        <!-- ===============================================MODIFICAN HASTA ACA ============================================
       ================================================================================================================ -->

        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, Desarrollado por <i class="fa fa-heart heart"></i> BraWeb Solutions.
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>

</html>

