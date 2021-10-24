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

<body class="" style="background-color: #CA5B09;">
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
      <div class="sidebar-wrapper" style="background-color: white;">
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
          <li class="active ">
            <a href="agregarDominio.php">
            <i class="bi bi-window"></i>
              <p>Agregar Dominio</p>
            </a>
          </li>
          <li >
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
            <a class="navbar-brand" style="color: white" >AGREGAR DOMINIO</a>
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
    <div class="container-sm" style="max-width: 50%">
    <br>
    <center>
        <img src="../Img/AgregarDominio.png" alt="" width= "90%" ></center>
        <form method="POST" >
            <label >Nombre del dominio: </label>
            <input type="text" class="form-control" id="dominio" name="dominio" autofocus required="True">
           
            <label>Distribuidor: </label>
            <select name="distribuidor" id="distribuidor" autofocus required="True" class="form-select form-select-md" aria-label=".form-select-lg example">
              
              <option value="1,.com">Aleatorio o selecciona una opción</option>
                <?php   
                    include_once "../Persistencia/conexion.php";
                    $query = $bd->prepare('
                    SELECT "Id_Distribuidor", "Nombre", "Extencion" FROM "Distribuidor"');
                    $query -> execute();
                    while ($fila = $query->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) 
                    { ?>
                        <option style="color:black" value="<?php echo $fila[0];?>,<?php echo $fila[2];?>"><?php echo $fila[2]." --> ".$fila[1];?></option>;

                <?php } ?>
            </select>
           
            <center><input name="enviart" id="enviart" class="btn btn-success" type="submit" value="Enviar"></center>
        </form>

    </div>
    </div>
       <!-- ===============================================MODIFICAN HASTA ACA============================================
      ================================================================================================================ -->
    
    </div>
  </div>
 
</body>

</html>

<?php
        if(isset($_POST['enviart'])){
                $buscaweb=$_POST['dominio'];
                $distribuidor=$_POST['distribuidor'];
                $distribuidorPartes=explode(',', $distribuidor);
                $extension=$distribuidorPartes[1];
                $id=$distribuidorPartes[0];
                echo "<script>
                alert('Aqui si funciona.');
                </script>";
                
                $pagina = 'http://www.'.$buscaweb.$extension;
                if (@fopen($pagina,»r»)){
                  echo "<script>
                alert('El dominio no está disponible.');
                </script>";
            }else{
              echo "<script>
              alert('Es tuyo!!!!');
              </script>";
                $query = $bd->prepare('INSERT INTO "Dominio" ("Nombre", "Cliente_Id_Cliente", "Distribuidor_Id_Distribuidor") VALUES
                (:nombre,:id_cliente,:id_distribuidor);');
                $query -> bindParam(":nombre",$buscaweb);
                $query -> bindParam(":id_distribuidor",$id);
                $query -> bindParam(":id_cliente", $_SESSION['idUsuario']);
                $query -> execute();
                echo "<script>
                 alertify.success('Agregado con exito.');
                </script>";
            }
        }
        ?>
            