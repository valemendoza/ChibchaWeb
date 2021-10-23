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
if (isset($_POST['actualizar'])){
$Id = $_POST['ID'];
$nombre = $_POST ['Nombre'];
$apellido = $_POST ['Apellido'];
$correo = $_POST ['Correo'];
$query = $bd->prepare('UPDATE "Empleado" SET "Nombre" =:nombre, "Apellido" =:apellido, "Correo" =:correo WHERE "Id" =:id AND "Estado" = 1;');
$query -> bindParam(":id",$Id);
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":apellido",$apellido);
$query ->bindParam(":correo",$correo);
$query->execute();
echo "HECHO";
header('location: ../presentacion/Administrador/tablaEmpleado.php');
}if (isset($_POST['borrar'])){
    $Id = $_POST['ID'];
    $query2 = $bd->prepare('UPDATE "Empleado" SET "Estado" = 2 WHERE "Id"=:id;');
    $query2 -> bindParam(":id",$Id);
    $query2->execute();
    header('location: ../presentacion/Administrador/tablaEmpleado.php');
}