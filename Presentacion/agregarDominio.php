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
              <p>Selecci??n de Paquete</p>
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
              <p>Editar Informaci??n</p>
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
                  <input type="submit" class="btn" style="color: white" name="btcerrarS" id="btcerrarS" value="Cerrar Sesi??n" />
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
            <input type="text" class="form-control" id="dominio" name="dominio" autofocus required="True" pattern="[A-Za-z]+">
           
            <label>Distribuidor: </label>
            <select name="distribuidor" id="distribuidor" autofocus required="True" class="form-select form-select-md" aria-label=".form-select-lg example">
              
              <option value="1,.com">Aleatorio o selecciona una opci??n</option>
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
            <?php
        if(isset($_POST['enviart'])){

          //VER CANTINDAD DE SITIOS EN SU PAQUETE
          $SQLcant_dominios = $bd ->prepare('SELECT "Paquete"."Cant_Sitios_Web" FROM "Cliente", "Paquete"
          WHERE "Cliente"."Tipo_Paquete_Id_Tipo_Paquete" = "Paquete"."Id_Paquete" AND
                "Cliente"."Id"=:id_cliente');
          $SQLcant_dominios -> bindParam(":id_cliente", $_SESSION['idUsuario']);
          $SQLcant_dominios -> execute();
          $cant_dominios = $SQLcant_dominios->fetchAll(PDO::FETCH_ASSOC);

          //VER CANTIDAD DE SITIOS ACTUALES
          $SQLSitiosActuales = $bd -> prepare('SELECT cant_sitios from "Cliente" where "Id"=:id_cliente');
          $SQLSitiosActuales -> bindParam(":id_cliente", $_SESSION['idUsuario']);
          $SQLSitiosActuales -> execute();
          $SitiosActuales = $SQLSitiosActuales->fetchAll(PDO::FETCH_ASSOC);


          if( $cant_dominios[0] ["Cant_Sitios_Web"]>$SitiosActuales[0] ["cant_sitios"]){
                
                $buscaweb=$_POST['dominio'];
                $distribuidor=$_POST['distribuidor'];
                $distribuidorPartes=explode(',', $distribuidor);
                $extension=$distribuidorPartes[1];
                $id=$distribuidorPartes[0];
                $pagina = 'www.'.$buscaweb.$extension;
                $cont=0;

                //BUSQUEDA DE LA EXISTENCIA DE ESE DOMINIO EN NUESTRA BD
                $queryDominio = $bd->prepare('SELECT "Nombre" FROM "Dominio";');
                $queryDominio -> execute();
                
                while ($fila = $queryDominio->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                  if($fila[0]==$buscaweb){
                    $cont= 1;
                  }
                }

                //BUSQUEDA DE LA EXISTENCIA DE ESE DOMINIO EN LA WEB
              if ((gethostbyname($pagina) != $pagina) || ($cont == 1)){
                  
                  ?> <br> <div class="container-sm bg-danger text-white"> <label style="text-align:center;"> <?php echo "La pagina con el dominio ".$pagina." no est?? disponible, por favor intenta con otro distribuidor u otro nombre.<br>";
                  ?> </label></div> <?php
              }else{
                  ?> <br> <div class="container-sm bg-success text-white"> <label style="text-align:center;"> <?php echo "??Enhorabuena! La pagina con el dominio ".$pagina." est?? disponible.<br>";
                  ?> </label></div> <?php
                  $query = $bd->prepare('INSERT INTO "Dominio" ("Nombre", "Cliente_Id_Cliente", "Distribuidor_Id_Distribuidor") VALUES
                  (:nombre,:id_cliente,:id_distribuidor);');
                  $query -> bindParam(":nombre",$buscaweb);
                  $query -> bindParam(":id_distribuidor",$id);
                  $query -> bindParam(":id_cliente", $_SESSION['idUsuario']);
                  $query -> execute();
                  echo "<script>
                  alertify.success('Agregado con exito.');
                  </script>";
                  //SUMARLE 1 DOMINIO AL ACTUAL 
                  $cant_sitios_actuales = $SitiosActuales[0] ["cant_sitios"] + 1;
                  $queriActualiza = $bd->prepare('UPDATE "Cliente" set "cant_sitios"=:sitios  WHERE "Id"=:id_cliente');
                  $queriActualiza -> bindParam(":sitios",$cant_sitios_actuales);
                  $queriActualiza -> bindParam(":id_cliente", $_SESSION['idUsuario']);
                  $queriActualiza -> execute();
                }
                    

                  

          }else{
            echo "<script>
                 alertify.error('Ha superdao su limite de dominos, actualice su paquete para agregar m??s.');
                </script>";
          }

        }
        ?>
            
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

