<?php
include_once "../Persistencia/conexion.php";
session_start();
if(isset($_SESSION['emailUsuario'])){
    $usuarioActual=$_SESSION['emailUsuario'];
}else{
    header('location: login.php');
}

if(isset($_POST['btcerrarS'])){
    session_destroy();
    header('location: login.php');
}
$paquete = $_POST ['paquetes'];
$plan = $_POST ['plan'];
$query = $bd->prepare('UPDATE "Cliente" SET "Tipo_Plan_Id_Tipo_Plan" ='.$plan.', "Tipo_Paquete_Id_Tipo_Paquete" ='.$paquete.' WHERE "Correo" =:sesion ;');
$query->bindParam(":sesion", $usuarioActual);
$query->execute();

header("location:https://secure.payulatam.com/login.zul");