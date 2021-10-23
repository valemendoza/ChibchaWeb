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
<?php
include_once "../Persistencia/conexion.php";
    session_start();
    $user = $_SESSION['emailUsuario'];
    $query = $bd->prepare('SELECT "Id","Nombre", "Apellido", "Correo" FROM "Empleado" WHERE "Correo"=:user ' );
    $query -> bindParam(":user",$user);
    $query -> execute();
    $empleados = $query->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($_POST)){
        if(!empty($_POST["password"])) {
            $query1 = $bd->prepare('UPDATE "Empleado" set "Nombre"=:Nombre, "Apellido"=:Apellido, "Correo"=:Correo, "Clave"=:Clave WHERE "Id"=:Id');
            $query1 -> bindParam(":Clave",$_POST["password"]);
            $query2 = $bd->prepare('UPDATE "Usuario" set "Nombre"=:Nombre, "Correo"=:Correo, "Clave"=:Clave WHERE "Correo"=:CorreoAntiguo');
            $query2 -> bindParam(":Clave",$_POST["password"]);
                
        }
        else{
            $query1 = $bd->prepare('UPDATE "Empleado" set "Nombre"=:Nombre, "Apellido"=:Apellido, "Correo"=:Correo WHERE "Id"=:Id');
            $query2 = $bd->prepare('UPDATE "Usuario" set "Nombre"=:Nombre, "Correo"=:Correo WHERE "Correo"=:CorreoAntiguo');
            
        }
        //cliente
        $query1-> bindParam(":Nombre",$_POST["Nombre"] );
        $query1-> bindParam(":Apellido",$_POST["Apellido"] );
        $query1-> bindParam(":Correo",$_POST["Correo"] );
        $query1-> bindParam(":Id",$empleados[0]["Id"] );
        $query1 -> execute();
        //usuario
        $query2-> bindParam(":Nombre",$_POST["Nombre"] );
        $query2-> bindParam(":Correo",$_POST["Correo"] );
        $query2-> bindParam(":CorreoAntiguo",$empleados[0]["Correo"] );
        $query2 -> execute();

        $_SESSION['emailUsuario'] = $_POST["Correo"];
        $user = $_SESSION['emailUsuario'];
        $query = $bd->prepare('SELECT "Id","Nombre", "Apellido", "Correo" FROM "Empleado" WHERE "Correo"=:user ' );
    $query -> bindParam(":user",$user);
    $query -> execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Editar Cliente
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
            <?php echo $user ?> 
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li >
                    <a href="inicioEmpleado.php">
                        <i class="bi bi-house-door-fill"></i>
                        <p>Inicio</p>
                    </a>
                <li class="active">
                    <a href="editarCliente.php">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Editar Información</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" style="background-color: #188E00;">
       <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid" style="background-color: #CA5B09;">
          <div class="navbar-wrapper">
            <a class="navbar-brand"style="color: white">BIENVENIDO</a>
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
        <br><br><br><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="../Img/fondo2.png" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <p href="#">
                                <img class="avatar border-gray" src="../Img/iconoPerfil.png" alt="...">
                                <h5 class="title"><?php echo $empleados[0]["Nombre"]  ?></h5>
                            </p>
                            <br>
                            <p class="description">
                               <?php echo $empleados[0]["Correo"]  ?>                             
                            </p>
                        </div>
                        <!--<p class="description text-center">
                            "I like the way you work it <br>
                            No diggity <br>
                            I wanna bag it up"
                        </p>-->
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <!--<div class="col-lg-3 ml-auto">
                                    <h5>1<br><small>Correos</small></h5>
                                </div>
                                <div class="col-lg-4 ml-auto mr-auto">
                                    <h5>2<br><small>Bases de datos</small></h5>
                                </div>
                                <div class="col-lg-3 ml-auto">
                                    <h5>1<br><small>Almacenamiento</small></h5>
                                </div>
                                <div class="col-lg-2 ml-auto mr-auto ">
                                    <h5>1<br><small>Correos</small></h5>
                                </div>-->
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Editar Perfil</h5>
                </div>
                <div class="card-body">
                    <form method = "POST">
                        <div class="row">
                            <!--<div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Company (disabled)</label>
                                    <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                                </div>
                            </div>-->
                            <div class="col-md-3 px-1">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre" value="<?php echo $empleados[0]["Nombre"]  ?>">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido</label>
                                    <input type="text" name="Apellido" class="form-control" placeholder="Apellido" value="<?php echo $empleados[0]["Apellido"]  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="text" name="Correo" class="form-control" placeholder="Correo" value= "<?php echo $empleados[0]["Correo"]  ?>">
                                </div>
                            <!--</div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                                </div>
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                            </div>
                        </div>
                        
                       
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round" style="background: green; border-color: green">Actualizar Perfil</button>
                            </div>
                            <div class="update ml-auto mr-auto">
                                <button type="button" class="btn btn-danger" style="background: orangered; border-color: orangered">Eliminar Perfil</button>
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
</body>

</html>
