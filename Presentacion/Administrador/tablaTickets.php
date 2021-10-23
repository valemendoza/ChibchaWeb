<?php
session_start();
if(isset($_SESSION['emailUsuario'])){
    $usuarioActual=$_SESSION['nombreUsuario'];
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
                <?php echo $usuarioActual ?>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li >
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
                <li class="active">
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
        <div class="container-fluid" style="background-color: #CA5B09;">
          <div class="navbar-wrapper">
            <a class="navbar-brand"style="color: white">TICKETS</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <form method="POST">
                  <input type="submit" class="btn btn-link" style="color: white" name="btcerrarS" id="btcerrarS" value="Cerrar Sesión" />
                  </form>
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

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Tabla de Tickets</h4>
                        </div>
                        <div><input  class="form-control" id="myInput" type="text" placeholder="Buscar..." onkeyup="myFunction()">
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover">
                                    <tr class=" text-success" id="row">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Titulo
                                        </th>
                                        <th>
                                            Discrepcion
                                        </th>
                                        <th>
                                            Estado
                                        </th>
                                        <th>
                                            Nivel Ticket
                                        </th>
                                        <th>
                                            Cliente Ticket
                                        </th>
                                        <th>
                                            Dominio
                                        </th>
                                        <th>
                                            Fecha Ingreso
                                        </th>
                                        <!--<th>
                                            Accion
                                        </th>-->
                                        <?php

                                        include_once "../../persistencia/conexion.php";
                                        $query = $bd->prepare('SELECT * FROM "Ticket" WHERE "Estado" = 1');
                                        $query -> execute();
                                        while ($fila = $query->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                        /*$datos = $fila[0] . "\t" . $fila[1] . "\t" . $fila[2] . "\n";*/
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $fila[0] ?>
                                        </td>
                                        <td>
                                            <?php echo $fila[1] ?>
                                        </td>
                                        <td >
                                            <?php echo $fila[2] ?>
                                        </td>
                                        <td >
                                            <?php if ($fila[3] == 1){
                                                echo "Activo";
                                            }?>
                                        </td>
                                        <td >
                                            <?php echo $fila[4] ?>
                                        </td>
                                        <td >
                                            <?php echo $fila[5] ?>
                                        </td>
                                        <td >
                                            <?php echo $fila[6] ?>
                                        </td>
                                        <td >
                                            <?php echo $fila[7] ?>
                                        </td>
                                        <!--<td >
                                            <button type="button" class="btn btn-success" onclick="location.href='EditCliente.php'">Editar</button>
                                        </td>-->
                                    </tr>
                                    <?php } ?>
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
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0 ];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

