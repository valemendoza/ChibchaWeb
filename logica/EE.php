<?php
include_once "../persistencia/conexion.php";
/*session_start();
if(isset($_SESSION['emailUsuario'])){
    $usuarioActual=$_SESSION['emailUsuario'];
    echo $usuarioActual;
}else{
    header('location: login.php');
}

if(isset($_POST['btcerrarS'])){
    session_destroy();
    header('location: login.php');
}*/
$Id = $_POST['ID'];
$nombre = $_POST ['Nombre'];
$apellido = $_POST ['Apellido'];
$correo = $_POST ['Correo'];
$query = $bd->prepare('UPDATE "Empleado" SET "Nombre" =:nombre, "Apellido" =:apellido, "Correo" =:correo WHERE "Id" =:id;');
$query -> bindParam(":id",$Id);
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":apellido",$apellido);
$query ->bindParam(":correo",$correo);
$query->execute();
echo "HECHO";
header('location: ../presentacion/Administrador/tablaEmpleado.php');
