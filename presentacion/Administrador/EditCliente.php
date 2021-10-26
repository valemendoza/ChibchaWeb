<?php
session_start();
if(isset($_SESSION['emailUsuario'])){
    $usuarioActual=$_SESSION['nombreUsuario'];
}else{
    header('location: ../login.php');
}

if(isset($_POST['btcerrarS'])){
    session_destroy();
    header('location: ../login.php');
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
                <?php echo $usuarioActual?>
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
                    <a href="../trazabilidadUsuarios.php">
                        <i class="bi bi-layout-text-window"></i>
                        <p>Trazabilidad Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="../trazabilidadTickets.php">
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
            <a class="navbar-brand"style="color: white">EDITAR CLIENTE </a>
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

        <!-- ===============================================MODIFICAN DESDE ACA ============================================
        ================================================================================================================ -->
        <?php
            include_once "../../Persistencia/conexion.php";

        ?>
        <br><br><br><br>
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Editar Cliente</h5>
                    </div>
                    <?php 
                        if(isset( $_POST['cargar'])){
                        include_once "../../Persistencia/conexion.php";
                        $query = $bd->prepare('SELECT "Id","Cliente"."Nombre", "Apellido", "Correo" , "Forma_Pago_Id_Forma_Pago" , "Tipo_Plan_Id_Tipo_Plan",
                        "Tipo_Paquete_Id_Tipo_Paquete", "Forma_Pago"."Nombre" fnombre, "Tipo_Paquete"."Nombre" pnombre, "Tipo_Plan"."Nombre" plnombre
                        FROM "Cliente", "Tipo_Paquete", "Forma_Pago", "Tipo_Plan"
                        WHERE "Cliente"."Tipo_Paquete_Id_Tipo_Paquete" = "Tipo_Paquete"."Id_Tipo_Paquete" AND
                              "Cliente"."Tipo_Plan_Id_Tipo_Plan" = "Tipo_Plan"."Id_Tipo_Plan" AND
                              "Cliente"."Forma_Pago_Id_Forma_Pago" = "Forma_Pago"."Id_Forma_Pago" AND
                              "Id"=:id ' );
                        $query -> bindParam(":id",$_POST['ID']);
                        $query -> execute();
                        $clientes = $query->fetchAll(PDO::FETCH_ASSOC);

                        }
                        ?>
                    <div class="card-body">
                        <form action="../../logica/EC.php" method="post">
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input name="ID" type="number" class="form-control" min="0" autofocus required="True" placeholder="Ingrese el Id del cliente a editar" value="<?php echo $clientes[0]["Id"]  ?>">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input name="Nombre" type="text" class="form-control" autofocus required="True" pattern="[A-Za-z]+" placeholder="Nombre" value="<?php echo $clientes[0]["Nombre"]  ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido</label>
                                        <input name="Apellido" type="text" class="form-control" autofocus required="True" pattern="[A-Za-z]+" placeholder="Apellido" value="<?php echo $clientes[0]["Apellido"]  ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input name="Correo" type="email" class="form-control" autofocus required="True" placeholder="Correo" value="<?php echo $clientes[0]["Correo"]  ?>">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Forma de Pago</label>
                                            <br>
                                            <select class="btn btn-neutral dropdown-toggle" name="formap" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" value="<?php echo $clientes[0]["Forma_Pago_Id_Forma_Pago"]  ?>">
                                            <option disabled selected value="<?php echo $clientes[0]['Forma_Pago_Id_Forma_Pago']  ?>" class="dropdown-item"><?php echo $clientes[0]['fnombre']  ?></option>
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
                                            <select class="btn btn-neutral dropdown-toggle" name="plan" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                                                <option disabled selected value="<?php echo $clientes[0]['Tipo_Plan_Id_Tipo_Plan']  ?>" class="dropdown-item"><?php echo $clientes[0]['plnombre']  ?></option>
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
                                            <select class="btn btn-neutral dropdown-toggle" name="paquete" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" value="<?php echo $clientes[0]["Tipo_Paquete_Id_Tipo_Paquete"]  ?>">
                                            <option disabled selected value="<?php echo $clientes[0]['Tipo_Paquete_Id_Tipo_Paquete']  ?>" class="dropdown-item"><?php echo $clientes[0]['pnombre']  ?></option>
                                                   
                                            <option value="0" class="dropdown-item">Sin seleccionar</option>
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
                                        <button name="actualizar" type="submit" class="btn btn-success" style="background: green; border-color: green">Actualizar Perfil</button>
                                        <button name="borrar" type="butmit" class="btn btn-danger" style="background: orangered; border-color: orangered">Eliminar Perfil</button>
                                    </div>
                                    <div class="update ml-auto mr-auto">
                                        <button type="button" onclick="location.href='tablaCliente.php'" class="btn btn-danger" style="background: orangered; border-color: orangered">Volver</button>
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