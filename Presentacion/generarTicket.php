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
          <?php echo $usuarioActual ?> 
        </a>
      </div>
      <div class="sidebar-wrapper" >
        <ul class="nav">
          <li >
            <a href="inicioCliente.php">
            <i class="bi bi-house-door-fill"></i>
              <p style="color:black">Inicio</p>
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
          <li class="active ">
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
            <a class="navbar-brand" style="color: white" >GENERAR TICKET</a>
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
        <img src="../Img/PQR.png" alt=""></center>
        <form method="POST" >
            <label >Titulo: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" autofocus required="True">
            <label for="exampleFormControlTextarea1">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" autofocus required="True"></textarea>
            <label>Dominio: </label>
              <select name="dominio" class="form-control" style="color:black" id="dominio" autofocus required="True">
              <option disabled selected>Selecciona una opción</option>
                <?php   
                    include_once "../Persistencia/conexion.php";
                    $query = $bd->prepare('
                    SELECT "Dominio"."Nombre", "Dominio"."Id_Dominio"
                    FROM "Dominio", "Usuario"
                    where "Dominio"."Cliente_Id_Cliente"="Usuario".id_usuario AND
                    "Usuario".id_usuario=:id;'  );
                    $query -> bindParam(":id", $_SESSION['idUsuario']);
                    $query -> execute();
                    while ($fila = $query->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) 
                    { ?>
                        <option style="color:black" value="<?php echo $fila[1];?>"><?php echo $fila[0];?></option>;
                <?php } ?>
            </select>
            
            <center><input name="enviart" id="enviart" class="btn btn-success" type="submit" value="Enviar"></center>
        </form>


        <?php 

          if(isset($_POST['enviart'])){

              include_once "../Persistencia/conexion.php";
              $dominio=$_POST["dominio"];
              $titulo=$_POST["titulo"];
              $descripcion=$_POST["descripcion"];
              //Encontrar el empleado con menor cantidad de tickets
              $queryEmpleado = $bd->prepare('SELECT "Id", MIN(cant_tickets) min FROM "Empleado" 
              WHERE "Tipo_Empleado_Id_Tipo_Empleado"=1
              GROUP BY "Id" ORDER BY "min" DESC;'  );
              $queryEmpleado -> execute();
              while ($fila = $queryEmpleado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $empleadoId= $fila[0];
                $empleadoCant=$fila[1]; 
              }

              $date=date("Y-m-d");
              
              //Insertar Ticket a ese empleado
              $queryTicket = $bd->prepare('INSERT INTO "Ticket" ("Titulo", "Descripcion", "Estado", "Nivel_Ticket_Id_Nivel_Ticket", "Cliente_Id_Cliente", "Id_Dominio", fecha_ingreso,comentario)
              VALUES (:titulo, :descripcion, 1, 1, :id, :dominio, :fecha,:comentario);');
              $queryTicket -> bindParam(":dominio",$dominio);
              $queryTicket -> bindParam(":titulo",$titulo);
              $queryTicket -> bindParam(":descripcion",$descripcion);
              $queryTicket -> bindParam(":id", $_SESSION['idUsuario']);
              $queryTicket -> bindParam(":fecha", $date);
              $queryTicket -> bindParam(":comentario", "N.A.");
              $queryTicket -> execute();


              $queryId = $bd->prepare('SELECT "Id_Ticket" FROM "Ticket" GROUP BY "Id_Ticket" ORDER BY "Id_Ticket" ASC;'  );
              $queryId -> execute();
              while ($fila = $queryId->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                $ticketId= $fila[0]; 
              }

              //INSERT en Detalle Ticket
              $queryDetalle = $bd->prepare('INSERT INTO "Detalle_Ticket" 
              ("Fecha", "Empleado_Id_Empleado", "Ticket_Id_Ticket")
              values (:fecha, :empleadoId, :ticketId);'  );
               $queryDetalle -> bindParam(":fecha", $date);
               $queryDetalle -> bindParam(":empleadoId", $empleadoId);
               $queryDetalle -> bindParam(":ticketId", $ticketId);
               $queryDetalle -> execute();

               $cantTicket= $empleadoCant +1;
               //Sumar 1 a la cantidad de tickets del empleado seleccionado
               $queryCantTicket = $bd->prepare('UPDATE "Empleado" set "cant_tickets"=:cant WHERE "Id"=:empleadoId;');
               $queryCantTicket -> bindParam(":cant", $cantTicket);
               $queryCantTicket -> bindParam(":empleadoId", $empleadoId);
               $queryCantTicket -> execute();
               

               //INSERTAR EN LA AUDITORIA DE TICKETS
               $date=date("Y-m-d");
               $comentario="NA";
               $accion="Creacion";
               $queryAudi = $bd->prepare('INSERT INTO "Auditoria_Tickets" 
               ("Id_Ticket", "Fecha_Mod", "Accion", nivel_actual,"comentario", "id_Emp") 
               VALUES (:ticketId, :fecha, :creacion, 1, :comentario, :empleadoId );');
               $queryAudi -> bindParam(":ticketId", $ticketId);
               $queryAudi -> bindParam(":fecha", $date);
               $queryAudi -> bindParam(":empleadoId", $empleadoId);
               $queryAudi -> bindParam(":ticketId", $ticketId);
               $queryAudi -> bindParam(":creacion", $accion);
               $queryAudi -> bindParam(":comentario", $comentario);
               
               $queryAudi -> execute();


              echo "<script>
                      alertify.success('Ticket Generado');
                      </script>";

              
              }
        ?>



    </div>
    </div>
       <!-- ===============================================MODIFICAN HASTA ACA============================================
      ================================================================================================================ -->
    
    </div>
  </div>
 
</body>

</html>

