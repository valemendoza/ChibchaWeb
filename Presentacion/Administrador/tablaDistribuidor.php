<?php
session_start();
if(isset($_SESSION['emailUsuario'])){
    $usuarioActual=$_SESSION['emailUsuario'];
    echo $usuarioActual;
}else{
    header('location: login.php');
}

if(isset($_POST['btcerrarS'])){
    session_destroy();
    header('location: login.php');
}
?>

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
                Nombre del Admon
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active ">
                    <a href="../inicioAdmon.php">
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
                    <a href="tablaDistribuidor.php">
                        <i class="bi bi-truck"></i>
                        <p>Distribuidores</p>
                    </a>
                </li>
                <li>
                    <a href="tablaTickets.php">
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
                    <a class="navbar-brand" href="javascript:;">BIENVENIDO</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form method="POST">
                                <input type="submit" class="btn btn-link" name="btcerrarS" id="btcerrarS" value="Cerrar Sesión" />
                            </form> </a>
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

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Tabla de Clientes</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Cantidad Dominios
                                    </th>
                                    <th>
                                        Extencion
                                    </th>
                                    <!--<th>
                                        Estado
                                    </th>
                                    <th>
                                        Forma de Pago
                                    </th>
                                    <th>
                                        Tipo de Plan
                                    </th>
                                    <th>
                                        Tipo de Paquete
                                    </th>-->
                                    <th>
                                        Accion
                                    </th>
                                    <!--<th class="text-right">
                                        Salary
                                    </th>-->
                                    </thead>
                                    <tbody>
                                    <?php
                                    include_once "../../persistencia/conexion.php";
                                    $query = $bd->prepare('SELECT * FROM "Distribuidor"');
                                    $query->execute();
                                    foreach ($query as $row){
                                        ?> <tr>
                                            <td> <?php echo $row['Id_Distribuidor']; ?> </td>
                                            <td> <?php echo $row['Nombre']; ?> </td>
                                            <td> <?php echo $row['Cant_Dom']; ?> </td>
                                            <td> <?php echo $row['Extencion']; ?> </td>
                                            <!--<td> <?php /*echo $row['Estado']; */?> </td>
                                            <td> <?php /*echo $row['Forma_Pago_Id_Forma_Pago']; */?> </td>
                                            <td> <?php /*echo $row['Tipo_Plan_Id_Tipo_Plan']; */?> </td>
                                            <td> <?php /*echo $row['Tipo_Paquete_Id_Tipo_Paquete']; */?> </td>-->
                                            <td><i class="fa-solid fa-pen"></i><button type="button" class="btn btn-success" onclick="location.href='EditCliente.php'">Editar</button></td>
                                        </tr>
                                    <?php }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
