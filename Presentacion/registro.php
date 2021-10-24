<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registro Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Css/registro.css">
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
              <p class="login-card-description">Registro</p>
              <form action="" method="POST" >
                <div class="form-group">
                    <label for="nombre" class="sr-only">nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label for="apellido" class="sr-only">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
                  </div>
                  <div class="form-group">
                    <label for="cedula" class="sr-only">Cedula</label>
                    <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Cedula">
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Clave</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                  </div>
                  <div class="form-group mb-4">
                    <label for="repassword" class="sr-only">Confirmar Clave</label>
                    <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Confirmar Contraseña">
                  </div>
                  <input name="registro" id="registro" class="btn btn-block login-btn mb-4" style="background-color: green;" type="submit" value="Registrate" >
                </form>
                <?php
                include_once "../Persistencia/conexion.php";
                
                if (isset($_POST['registro'])) {
                  
                
                $cedula=$_POST["cedula"];
                $nombre=$_POST["nombre"];
                $apellido=$_POST["apellido"];
                $clave=$_POST["password"];
                $email=$_POST["email"];
                $Tipo_Usuario="C";
                
                
                try{ 
                $sentencia = $bd->prepare('INSERT INTO "Cliente" 
                VALUES (:cedula, :nombre, :apellido,:clave,:email,1,0,0,0,:Tipo_Usuario)');
                $sentencia-> bindParam(':nombre', $nombre);
                $sentencia-> bindParam(':apellido', $apellido);
                $sentencia-> bindParam(':cedula', $cedula);
                $sentencia-> bindParam(':clave', $clave);
                $sentencia-> bindParam(':email', $email);
                $sentencia-> bindParam(':Tipo_Usuario',$Tipo_Usuario);
                
                $sentencia-> execute();
                
                $queryUsuario = $bd -> prepare(' INSERT INTO "Usuario" 
                (id_usuario, "Correo", "Clave", "Tipo_Usuario", "Nombre", estado) 
                VALUES (:cedula, :email,:clave,:Tipo_Usuario,:nombre,1)');
                $queryUsuario-> bindParam(':nombre', $nombre);
                $queryUsuario-> bindParam(':cedula', $cedula);
                $queryUsuario-> bindParam(':clave', $clave);
                $queryUsuario-> bindParam(':email', $email);
                $queryUsuario-> bindParam(':Tipo_Usuario',$Tipo_Usuario);
                
                $queryUsuario-> execute();
                
                
                include "../Logica/pruebaSql.php";
                } catch (PDOException $e){
                        echo "Error: " . $e->getMessage();
                }
                header("location:../Presentacion/login.php");  
              }
                ?>




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
</body>
</html>
