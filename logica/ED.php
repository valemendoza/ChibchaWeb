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
$cantDominios = $_POST ['Cantidad'];
$Extencion = $_POST ['Extencion'];
$query = $bd->prepare('UPDATE "Distribuidor" SET "Nombre" =:nombre, "Cant_Dom" =:cantDominios, "Extencion" =:Extencion WHERE "Id_Distribuidor" =:id;');
$query -> bindParam(":id",$Id);
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":cantDominios",$cantDominios);
$query ->bindParam(":Extencion",$Extencion);
$query->execute();
echo "HECHO";
header('location: ../presentacion/Administrador/tablaDistribuidor.php');