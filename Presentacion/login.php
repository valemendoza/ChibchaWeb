
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Iniciar Sesión</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Css/login.css">
  <link rel="shortcut icon" href="../Img/logo.png" />

  <!-- ALERTIFY -->
  <link rel="stylesheet" type="text/css" href="../Librerias/Alertify/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../Librerias/Alertify/css/themes/default.css">
  <script src="../Librerias/Alertify/alertify.js"></script>

</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../Img/log.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
              </div>
              <center>
              <p class="login-card-description">Inicio de Sesión:</p>
              <form  name="inicio" method="POST" onsubmit="return miFuncion(this)">
                  <div class="form-group">
                    <label for="email" class="sr-only">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" autofocus required="True">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Clave</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" maxlength="15" minlength="3" required="True">
                  </div>
                  <br>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Ingresar">
                </form>
                <p class="login-card-footer-text"><a href="registro.php" class="text-reset">No tengo cuenta. Registrarme Ahora.</a></p>
               
                <p class="login-card-back"><a href="../index.php" class="text-reset">Regresar a la Página Principal.</a></p>
                <center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
  <script>
        function miFuncion(a) {
            var response = grecaptcha.getResponse();
            if(response.length == 0){
                alertify.error("Captcha no verificado");
                return false;
                event.preventDefault();
            } else {
                return true;
            }
        }
    </script>

</body>
</html>
<?php 
session_start();
if(isset($_SESSION['emailUsuario'])){
  if($_SESSION['tipoUsuario']=="C"){
    $_SESSION['nombreUsuario']="hola";
    header("location:../Presentacion/inicioCliente.php");  
  }elseif($_SESSION['tipoUsuario']=="A"){
    header("location:../Presentacion/inicioAdmon.php");  
  }elseif($_SESSION['tipoUsuario']=="E"){
    header("location:../Presentacion/inicioEmpleado.php");  
  }
     
}

if(isset($_POST['login'])){

include_once "../Persistencia/conexion.php";

$user=$_POST["email"];
$pass=$_POST["password"];

$query = $bd->prepare('SELECT id_usuario, "Nombre", "Correo", "Clave", "Tipo_Usuario" FROM "Usuario" WHERE "Correo"=:user AND "Clave"=:pass AND estado=1'  );
$query -> bindParam(":user",$user);
$query -> bindParam(":pass",$pass);
$query -> execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
if(!isset($_SESSION['emailUsuario'])){
          if ($usuarios) {
          $_SESSION['emailUsuario']=$user;
          $_SESSION['tipoUsuario']=$usuarios['Tipo_Usuario'];
          $_SESSION['nombreUsuario']=$usuarios['Nombre'];
          $_SESSION['idUsuario']=$usuarios['id_usuario'];
          foreach( $usuarios as $usuario){
            if($usuario['Tipo_Usuario']=="C"){
              $_SESSION['nombreUsuario']=$usuario['Nombre'];
              $_SESSION['tipoUsuario']="C";
              $_SESSION['idUsuario']=$usuario['id_usuario'];
              header("location:../Presentacion/inicioCliente.php");     
            }elseif($usuario['Tipo_Usuario']=="A"){
              $_SESSION['tipoUsuario']="A";
              $_SESSION['nombreUsuario']=$usuario['Nombre'];
              $_SESSION['idUsuario']=$usuario['id_usuario'];
              header("location:../Presentacion/inicioAdmon.php");     
            }elseif($usuario['Tipo_Usuario']=="E"){
              $_SESSION['tipoUsuario']="E";
              $_SESSION['nombreUsuario']=$usuario['Nombre'];
              $_SESSION['idUsuario']=$usuario['id_usuario'];
              header("location:../Presentacion/inicioEmpleado.php");     
            }
          }  
        }else{
            echo "<script>
            alert('Email o Clave Erroneos');
            window.location= '../Presentacion/login.php'
            </script>";
        }
      }

        //foreach( $clientes as $cliente) 
      //{
        //$cant_clientes = $cliente["count"];
      //}    
      }
?>
