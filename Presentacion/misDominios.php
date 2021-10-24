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
        Cliente
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="../Css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="../Librerias/Bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../Librerias/Bootstrap/css/bootstrap.css">
    <!-- ALERTIFY -->
    <link rel="stylesheet" type="text/css" href="../Librerias/Alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../Librerias/Alertify/css/themes/default.css">
    <script src="../Librerias/Alertify/alertify.js"></script>
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
                <?php echo $usuarioActual; ?>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li >
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
                    <a href="agregarDominio.php">
                        <i class="bi bi-window"></i>
                        <p>Agregar Dominio</p>
                    </a>
                </li>
                <li class="active">
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
            <div class="container-fluid" style="background-color: #CA5B09;">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" style="color: white" >SEGUIMIENTO DE TICKETS</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav"  >
                        <li class="nav-item" >
                            <form method="POST">
                                <input type="submit" class="btn" style="color: white" name="btcerrarS" id="btcerrarS" value="Cerrar Sesión" />
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

        <div class="content" style="background-color:white">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Seguimiento de Tickets</h4>
                        </div>
                        <div><input  class="form-control" id="myInput" type="text" placeholder="Buscar por id..." onkeyup="myFunction()">
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
                                        <!--<th>
                                            Fecha de Ingreso
                                        </th>
                                        <th>
                                            Descripción
                                        </th>
                                        <th>
                                            Estado
                                        </th>-->
                                        <?php
                                        include_once "../Persistencia/conexion.php";
                                        $query = $bd->prepare('    SELECT * FROM "Dominio", "Cliente"
                                        where "Dominio"."Cliente_Id_Cliente" = "Cliente"."Id" AND
                                              "Cliente"."Id"=:id;');
                                        $query -> bindParam(":id",$_SESSION['idUsuario']);
                                        $query -> execute();
                                        while ($fila = $query->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                                        $datos = $fila[0] . "\t" . $fila[1] . "\t" . $fila[2] . "\n";
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $fila[0] ?>
                                        </td>
                                        <td>
                                            <?php echo $fila[1] ?>
                                        </td>
                                        <!--<td >
                                            <?php /*echo $fila[2] */?>
                                        </td>
                                        <td >
                                            <?php /*echo $fila[3] */?>
                                        </td>
                                        <td >
                                            <?php /*echo $fila[4] */?>
                                        </td>-->

                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===============================================MODIFICAN HASTA ACA============================================
               ================================================================================================================ -->

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
