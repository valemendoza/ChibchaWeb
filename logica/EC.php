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
$Forma_P = $_POST ['formap'];
$Tipo_P = $_POST ['plan'];
$Tipo_PK = $_POST ['paquete'];
$query = $bd->prepare('UPDATE "Cliente" SET "Nombre" =:nombre, "Apellido" =:apellido, "Correo" =:correo, "Forma_Pago_Id_Forma_Pago" =:formaP, "Tipo_Plan_Id_Tipo_Plan" =:plan, "Tipo_Paquete_Id_Tipo_Paquete" =:paquete WHERE "Id" =:id AND "Estado" = 1;');
$query -> bindParam(":id",$Id);
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":apellido",$apellido);
$query ->bindParam(":correo",$correo);
$query ->bindParam(":formaP", $Forma_P);
$query->bindParam(":plan", $Tipo_P);
$query->bindParam(":paquete", $Tipo_PK);
$query->execute();
$query3 = $bd->prepare('UPDATE "Usuario" SET "Correo"=:correou, "Nombre"=:nombreu WHERE id_usuario=:idu;');
$query3->bindParam("idu", $Id);
$query3->bindParam(":correou", $correo);
$query3->bindParam(":nombreu", $nombre);
$query3->execute();
header('location: ../presentacion/Administrador/tablaCliente.php');
}if (isset($_POST['borrar'])){
    $Id = $_POST['ID'];
    $query2 = $bd->prepare('UPDATE "Cliente" SET "Estado" = 2 WHERE "Id"=:id;');
    $query2 -> bindParam(":id",$Id);
    $query2->execute();
    $query4 = $bd->prepare('UPDATE "Usuario" SET "Estado" = 2 WHERE id_usuario=:idu;');
    $query4->bindParam(":idu", $Id);
    header('location: ../presentacion/Administrador/tablaCliente.php');

}