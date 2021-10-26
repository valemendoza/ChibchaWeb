<?php
include_once "../Persistencia/conexion.php";
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
$nivel = $_POST ['nivel'];
$query = $bd->prepare('UPDATE "Empleado" SET "Nombre" =:nombre, "Apellido" =:apellido, "Correo" =:correo, "Tipo_Empleado_Id_Tipo_Empleado" =:nivel WHERE "Id" =:id AND "Estado" = 1;');
$query -> bindParam(":id",$Id);
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":apellido",$apellido);
$query ->bindParam(":correo",$correo);
$query->bindParam(':nivel', $nivel);
$query->execute();
$query3 = $bd->prepare('UPDATE "Usuario" SET "Correo"=:correou, "Nombre"=:nombreu WHERE id_usuario=:idu ');
$query3->bindParam(":idu", $Id);
$query3->bindParam(":correou", $correo);
$query3->bindParam(":nombreu", $nombre);
$query3->execute();
header('location: ../presentacion/Administrador/tablaEmpleado.php');
}if (isset($_POST['borrar'])){
    $Id = $_POST['ID'];
    $query2 = $bd->prepare('UPDATE "Empleado" SET "Estado" = 2 WHERE "Id"=:id;');
    $query2 -> bindParam(":id",$Id);
    $query2->execute();
    $query4 = $bd->prepare('UPDATE "Usuario" SET "Estado" = 2 WHERE id_usuario=:idu;' );
    $query4->bindParam("idu", $Id);
    $query4->execute();
    header('location: ../presentacion/Administrador/tablaEmpleado.php');
}