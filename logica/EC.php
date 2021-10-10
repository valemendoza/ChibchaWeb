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
$nombre = $_POST ['Nombre'];
$apellido = $_POST ['Apellido'];
$correo = $_POST ['Correo'];
$Forma_P = $_POST ['formap'];
$Tipo_P = $_POST ['plan'];
$Tipo_PK = $_POST ['paquete'];
$query = $bd->prepare('UPDATE "Cliente" SET "Nombre" =:nombre, "Apellido" =:apellido, "Correo" =:correo, "Forma_Pago_Id_Forma_Pago" =:formaP, "Tipo_Plan_Id_Tipo_Plan" =:plan, "Tipo_Paquete_Id_Tipo_Paquete" =:paquete WHERE "Id" = 1;');
$query -> bindParam(":nombre",$nombre);
$query -> bindParam(":apellido",$apellido);
$query ->bindParam(":correo",$correo);
$query ->bindParam(":formaP", $Forma_P);
$query->bindParam(":plan", $Tipo_P);
$query->bindParam(":paquete", $Tipo_PK);
$query->execute();
echo "HECHO";
header('location: ../presentacion/inicioAdmon.php');