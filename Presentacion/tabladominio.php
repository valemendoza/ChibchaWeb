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
                <li class="active ">
                    <a href="inicioCliente.php">
                        <i class="bi bi-house-door-fill"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li>
                    <a href="paquetes.php">
                        <i class="bi bi-bag-check"></i>
                        <p>Selección de Paquete</p>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                    <a href="editarCliente.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Editar Información</p>
                    </a>
                </li>
                <li>
                    <a href="generarTicket.php">
                        <i class="bi bi-receipt-cutoff"></i>
                        <p>Generar Ticket</p>
                    </a>
                </li>
                <li>
                    <a href="misTickets.php">
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
                            <button type="button" onclick="location.href='index.html'"class="btn btn-link" >Cerrar Sesión</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->



        <!-- ===============================================MODIFICAN DESDE ACA ============================================
        ================================================================================================================ -->

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Tabla de Clientes</h4>
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
                                            Nombre
                                        </th>
                                        <th>
                                            Cliente
                                        </th>
                                        <th>
                                            Distribuidor
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
                                        <?php

                                        include_once "../Persistencia/conexion.php";
                                        $query = $bd->prepare('SELECT * FROM "Dominio"');
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
                                            <?php echo $fila[3] ?>
                                        </td>
                                        <!--<td >
                                            <?php /*echo $fila[4] */?>
                                        </td>
                                        <td >
                                            <?php /*if ($fila[5] == 1){
                                                echo "Activo";
                                            }*/?>
                                        </td>
                                        <td >
                                            <?php /*if ($fila[6] == 0){
                                                echo "Sin Seleccionar";
                                            }elseif ($fila[6] == 1){
                                                echo "Credito";
                                            }elseif ($fila[6] == 2){
                                                echo "Contado";
                                            }*/?>
                                        </td>
                                        <td >
                                            <?php /*if ($fila[7] == 0){
                                                echo "Sin Seleccionar";
                                            }elseif ($fila[7] == 1){
                                                echo "Mensual";
                                            }elseif ($fila[7] == 2){
                                                echo "Anual";
                                            }*/?>
                                        </td>
                                        <td >
                                            <?php /*if ($fila[8] == 0){
                                                echo "Sin Seleccionar";
                                            }elseif ($fila[8] == 1){
                                                echo "Chibcha-Plata";
                                            }elseif ($fila[8] == 2){
                                                echo "Chibcha-Oro";
                                            }elseif ($fila[8] == 3){
                                                echo "Chibcha-Platino";
                                            }*/?>
                                        </td>-->
                                        <td >
                                            <button type="button" class="btn btn-success" onclick="location.href='EditCliente.php'">Editar</button>
                                        </td>
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
