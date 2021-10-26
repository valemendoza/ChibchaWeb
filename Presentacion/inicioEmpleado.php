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
    Empleado
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
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="active">
            <a href="#">
            <i class="bi bi-receipt-cutoff"></i>
              <p>Ticket Asignados</p>
            </a>
          </li>
          <li>
            <a href="EditarEmpleado.php">
              <i class="nc-icon nc-single-02"></i>
              <p>Editar Información</p>
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
            <a class="navbar-brand" style="color: white" >MIS TICKETS</a>
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

     
    
      <!-- ===============================================MODIFICAN DESDE ACA ============================================
      ================================================================================================================ -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Tabla de Tickets Asignados</h4>
              </div>
              <div><input  class="form-control" id="myInput" type="text" placeholder="Buscar..." onkeyup="myFunction()">
                  </div>
                  
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" id="transferir">Transferir Ticket</button>
                        
              <div class="card-body">
                <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <tr class=" text-success" id="row">
                      <th>
                        No. Ticket
                      </th>
                      <th>
                        Nivel
                      </th>
                      <th>
                        Fecha de Ingreso
                      </th>
                      <th>
                        Descripción
                      </th>
                      <th>
                        Estado
                      </th>
                      <th>
                        Comentario Anterior
                      </th>
                      <?php 

                        include_once "../Persistencia/conexion.php";
                        $query = $bd->prepare('SELECT "Id_Ticket", "Nivel_Ticket_Id_Nivel_Ticket", fecha_ingreso,"Descripcion","Estado", comentario
                        FROM "Ticket", "Detalle_Ticket"
                        WHERE "Ticket"."Id_Ticket" = "Detalle_Ticket"."Ticket_Id_Ticket"
                        AND "Detalle_Ticket"."Empleado_Id_Empleado" =:id;'  );
                        $query -> bindParam(":id", $_SESSION['idUsuario']);
                        $query -> execute();
                        while ($fila = $query->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

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
                        <td >
                        <?php echo $fila[4] ?>
                        </td>
                        <td >
                        <?php echo $fila[5] ?>
                        </td>
                      </tr>
                      <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <form method="POST" > 
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Comentario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <select name="ticket" id="ticket" autofocus required="True" class="form-select form-select-md" aria-label=".form-select-lg example">
                      <option value="0" >Selecciona el id del ticket a transferir</option>
                      <?php   
                          include_once "../Persistencia/conexion.php";
                          $querySelect = $bd->prepare('SELECT "Ticket_Id_Ticket" FROM "Detalle_Ticket", "Empleado"
                          where "Detalle_Ticket"."Empleado_Id_Empleado" =:id
                          GROUP BY "Ticket_Id_Ticket" ORDER BY "Ticket_Id_Ticket" ASC;');
                          $querySelect -> bindParam(":id", $_SESSION['idUsuario']);
                          $querySelect -> execute();
                          while ($fila = $querySelect->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) 
                          { ?>
                              <option autofocus required="True" style="color:black" value="<?php echo $fila[0];?>"><?php echo $fila[0];?></option>;
                      <?php } ?>
                  </select>
                  <label for="exampleFormControlTextarea1">Debe agregar un comentario sobre su transferencia:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" autofocus required="True"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="enviar" name="enviar" class="btn btn-success">Enviar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <?php
        if(isset($_POST['enviar'])){
                $descripcion=$_POST['descripcion'];
                $ticket=$_POST['ticket'];
                
                if($ticket==0){
                  ?> <div class="container bg-danger text-white"> <label style="text-align:center;"> <?php echo "Debe seleccionar el id del ticket a transferir. <br>";
                  ?> </label></div> <?php
                }else{

                  //VER EL NIVEL DEL TICKET SELECCIONADO
                $queryVer= $bd->prepare('SELECT "Nivel_Ticket_Id_Nivel_Ticket" FROM "Ticket" where "Id_Ticket"=:ticketId');
                $queryVer -> bindParam(":ticketId", $ticket);

                $queryVer -> execute();

                while ($fila = $queryVer->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                  $nivelId= $fila[0];
                }
                $nivelId= $nivelId+1;

                if($nivelId==4){
                  echo "<script>
                alert('No puede transferir el ticket.');
                </script>";
                }else{


                //AUDITORIA DEL TICKET
                $date=date("Y-m-d");
                $accion="Transferencia";
                $queryAudi = $bd->prepare('INSERT INTO "Auditoria_Tickets" 
                ("Id_Ticket", "Fecha_Mod", "Accion", nivel_actual,"comentario", "id_Emp") 
                VALUES (:ticketId, :fecha, :creacion, :nivelId, :comentario, :empleadoId );');
                $queryAudi -> bindParam(":ticketId", $ticket);
                $queryAudi -> bindParam(":fecha", $date);
                $queryAudi -> bindParam(":empleadoId", $_SESSION['idUsuario']);
                $queryAudi -> bindParam(":creacion", $accion);
                $queryAudi -> bindParam(":comentario", $descripcion);
                $queryAudi -> bindParam(":nivelId", $nivelId);
                
                $queryAudi -> execute();

                //BUSCAR EMPLEADO CON MENOS TICKETS DEL SIGUIENTE NIVEL
                $queryBuscar= $bd->prepare('SELECT "Id", MIN(cant_tickets) min FROM "Empleado"
                WHERE "Tipo_Empleado_Id_Tipo_Empleado"=:nivelId
                GROUP BY "Id" ORDER BY "min" DESC;');
                $queryBuscar -> bindParam(":nivelId", $nivelId);

                $queryBuscar -> execute();
                
                while ($fila = $queryBuscar->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                  $newEmpleado= $fila[0];
                }


                //CAMBIAR EL TICKET A OTRO EMPLEADO
                $ticket=$_POST['ticket'];
                $queryActualizar = $bd->prepare('UPDATE "Detalle_Ticket" 
                set "Empleado_Id_Empleado"=:newEmpleado
                WHERE "Ticket_Id_Ticket"=:ticketId;');

                $queryActualizar -> bindParam(":ticketId", $ticket);
                $queryActualizar -> bindParam(":newEmpleado", $newEmpleado);

                $queryActualizar -> execute();

                //CAMBIAR COMENTARIO DEL TICKET
                $descripcion=$_POST['descripcion'];
                $queryComentario = $bd -> prepare('UPDATE "Ticket"
                set comentario = :descripcion, "Nivel_Ticket_Id_Nivel_Ticket"=:nivelId
                WHERE "Id_Ticket"=:ticketId ;');
                $queryComentario -> bindParam(":descripcion", $descripcion);
                $queryComentario -> bindParam(":ticketId", $ticket);
                $queryComentario -> bindParam(":nivelId", $nivelId);

                $queryComentario -> execute();


                echo "<script>
                alert('Transferido con exito.');
                window.location= 'inicioEmpleado.php'
                </script>";
              }
            }
            
        }
        ?>

       <!-- ===============================================MODIFICAN HASTA ACA ============================================
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
