<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Administrador
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="../../Css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="../../Librerias/Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Librerias/Bootstrap/css/bootstrap.css">

    <link rel="shortcut icon" href="../../Img/logo.png" />

</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="../../Img/logo.png">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a class="simple-text logo-normal">
                Nombre del Admin
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active ">
                    <a href="../../inicioAdmon.php">
                        <i class="bi bi-house-door-fill"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="tablaCliente.php">
                        <i class="bi bi-people"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="tablaEmpleado.php">
                        <i class="bi bi-person-square"></i>
                        <p>Empleados</p>
                    </a>
                </li>
                <li>
                    <a href="misDominios.php">
                        <i class="bi bi-truck"></i>
                        <p>Distribuidores</p>
                    </a>
                </li>
                <li>
                    <a href="./user.html">
                        <i class="bi bi-receipt-cutoff"></i>
                        <p>Tickets</p>
                    </a>
                </li>
                <li>
                    <a href="./tables.html">
                        <i class="bi bi-layout-text-window"></i>
                        <p>Trazabilidad Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="./typography.html">
                        <i class="bi bi-menu-up"></i>
                        <p>Trazabilidad Tickets</p>
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
                    <a class="navbar-brand" href="javascript:;">EDITAR CLIENTE</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button type="button" onclick="location.href='../index.html'" class="btn btn-link" >Cerrar Sesión</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <?php

        include_once "../../persistencia/conexion.php";
        $query = $bd->prepare('SELECT * from "Cliente"'  );
        $query -> execute();
        $clientes = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_clientes = count($clientes);

        $query = $bd->prepare('SELECT * from "Empleado"'  );
        $query -> execute();
        $empleados = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_empleados = count($empleados);

        $query = $bd->prepare('SELECT * from "Distribuidor"'  );
        $query -> execute();
        $distribuidores = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_distribuidores = count($distribuidores);

        $query = $bd->prepare('SELECT * from "Ticket"'  );
        $query -> execute();
        $tickets = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_tickets = count($tickets);

        ?>


        <!-- ===============================================MODIFICAN DESDE ACA ============================================
        ================================================================================================================ -->

        <br><br><br><br>
        <div class="row">
            <!--<div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="../../Img/fondo2.png" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <p href="#">
                                <img class="avatar border-gray" src="../../Img/iconoPerfil.png" alt="...">
                            <h5 class="title">Nombre</h5>
                            </p>
                            <br>
                            <p class="description">
                                Correo
                            </p>
                        </div>
                        <p class="description text-center">
                            "I like the way you work it <br>
                            No diggity <br>
                            I wanna bag it up"
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 ml-auto">
                                    <h5>1<br><small>Correos</small></h5>
                                </div>
                                <div class="col-lg-4 ml-auto mr-auto">
                                    <h5>2<br><small>Bases de datos</small></h5>
                                </div>
                                <div class="col-lg-3 ml-auto">
                                    <h5>1<br><small>Almacenamiento</small></h5>
                                </div>
                                <div class="col-lg-2 ml-auto mr-auto ">
                                    <h5>1<br><small>Correos</small></h5>
                                </div>
                                <h5>Paquete Chibcha Oro</h5>
                                <h5>Mensual</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Editar Cliente</h5>
                    </div>
                    <div class="card-body">
                        <form action="../../logica/EC.php" method="post">
                            <div class="row">
                                <!--<div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>Company (disabled)</label>
                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                    </div>
                                </div>-->
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input name="Nombre" type="text" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido</label>
                                        <input name="Apellido" type="text" class="form-control" placeholder="Apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input name="Correo" type="text" class="form-control" placeholder="Correo">
                                    </div>
                                    <!--</div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                                        </div>
                                    </div>-->
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control" placeholder="Contraseña">
                                        </div>
                                    </div>
                                </div>-->
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Forma de Pago</label>
                                            <br>
                                            <select class="btn btn-secondary dropdown-toggle" name="formap" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <option value="1" class="dropdown-item">Credito</option>
                                                <option value="2" class="dropdown-item">Contado</option>
                                            </select>
                                            <!--<label>Forma de Pago</label>
                                            <input name="FP" type="text" class="form-control" placeholder="Forma de Pago">-->
                                        </div>
                                    </div>
                                    <div class="col-md-4 px-1">
                                        <div class="form-group">
                                            <label>Tipo de Plan</label>
                                            <br>
                                            <select class="btn btn-secondary dropdown-toggle" name="plan" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <option value="1" class="dropdown-item">Mensual</option>
                                                <option value="2" class="dropdown-item">Anual</option>
                                            </select>
                                            <!--<label>Tipo de Plan</label>
                                            <input name="TP" type="text" class="form-control" placeholder="Tipo de Plan">-->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tipo de Paquete</label>
                                            <select class="btn btn-secondary dropdown-toggle" name="paquete" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <option value="1" class="dropdown-item">Chibcha Plata</option>
                                                <option value="2" class="dropdown-item">Chibcha Oro</option>
                                                <option value="3" class="dropdown-item">Chibcha Platino</option>
                                            </select>
                                            <!--<label>Tipo de Paquete</label>
                                            <input name="TPK" type="text" class="form-control" placeholder="Tipo de Paquete">-->
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>About Me</label>
                                            <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-success" style="background: green; border-color: green">Actualizar Perfil</button>
                                    </div>
                                    <div class="update ml-auto mr-auto">
                                        <button type="button" class="btn btn-danger" style="background: orangered; border-color: orangered">Eliminar Perfil</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

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
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
</body>

</html>