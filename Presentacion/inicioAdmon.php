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
          <?php echo $usuarioActual ?> 
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="inicioAdmon.php">
            <i class="bi bi-house-door-fill"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li>
            <a href="Administrador/tablaCliente.php">
            <i class="bi bi-people"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li>
            <a href="Administrador/tablaEmpleado.php">
            <i class="bi bi-person-square"></i>
              <p>Empleados</p>
            </a>
          </li>
          <li>
            <a href="Administrador/tablaDistribuidor.php">
            <i class="bi bi-truck"></i>
              <p>Distribuidores</p>
            </a>
          </li>
          <li>
            <a href="Administrador/tablaTickets.php">
            <i class="bi bi-receipt-cutoff"></i>
              <p>Tickets</p>
            </a>
          </li>
          <li>
            <a href="trazabilidadUsuarios.php">
            <i class="bi bi-layout-text-window"></i>
              <p>Trazabilidad Usuarios</p>
            </a>
          </li>
          <li>
            <a href="trazabilidadTickets.php">
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
            <a class="navbar-brand"style="color: white">BIENVENIDO ADMINISTRADOR</a>
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

        include_once "../Persistencia/conexion.php";
        $query = $bd->prepare('SELECT * from "Cliente" WHERE "Estado"=1;'  );
        $query -> execute();
        $clientes = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_clientes = count($clientes);  

        $query = $bd->prepare('SELECT * from "Empleado" WHERE "Estado"=1'  );
        $query -> execute();
        $empleados = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_empleados = count($empleados);    
        
        $query = $bd->prepare('SELECT * from "Distribuidor"'  );
        $query -> execute();
        $distribuidores = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_distribuidores = count($distribuidores);    

        $query = $bd->prepare('SELECT * from "Ticket" WHERE "Estado"=1'  );
        $query -> execute();
        $tickets = $query->fetchAll(PDO::FETCH_OBJ);
        $cant_tickets = count($tickets); 
        
      ?>


      <!-- ===============================================MODIFICAN DESDE ACA ============================================
      ================================================================================================================ -->
      
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                  <i class="bi bi-people text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Clientes</p>
                      <p class="card-title"><?php echo $cant_clientes ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="bi bi-person-square text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Empleados</p>
                      <p class="card-title"><?php echo $cant_empleados ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="bi bi-truck text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Distribuidores </p>
                      <p class="card-title"><?php echo $cant_distribuidores ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                    <i class="bi bi-receipt-cutoff text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Tickets</p>
                      <p class="card-title"><?php echo $cant_tickets ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
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


<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../Js/dashboard.js"></script>

