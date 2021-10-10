<?php
include_once "../persistencia/conexion.php";
session_start();
if(isset($_SESSION['emailUsuario'])){
    $usuarioActual=$_SESSION['emailUsuario'];
    echo $usuarioActual;
}else{
    header('location: login.php');
}

if(isset($_POST['btcerrarS'])){
    session_destroy();
    header('location: login.php');
}
$paquete = $_POST ['paquetes'];
$plan = $_POST ['plan'];
echo ("El paquete escogido es el numero: ".$paquete);
?><br> <?php
echo ("El plan escogido es el numero: ".$plan);
$query = $bd->prepare('UPDATE "Cliente" SET "Tipo_Plan_Id_Tipo_Plan" ='.$plan.', "Tipo_Paquete_Id_Tipo_Paquete" ='.$paquete.' WHERE "Correo" =:sesion ;');
$query->bindParam(":sesion", $usuarioActual);
$query->execute();
echo "hecho";
header("location:../presentacion/inicioCliente.php");