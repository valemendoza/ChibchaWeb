<?php 

include_once "../Persistencia/conexion.php";

$user=$_POST["email"];
$pass=$_POST["password"];

$query = $bd->prepare('SELECT * FROM "Cliente" WHERE "Correo"=:user AND "Clave"=:pass'  );
$query -> bindParam(":user",$user);
$query -> bindParam(":pass",$pass);
$query -> execute();
$usuario = $query->fetchAll(PDO::FETCH_OBJ);
        if ($usuario) {
                    header("location:../Presentacion/inicioCliente.php");
                               
        }else{
            echo "<script>
            alert('Email o Clave Erroneos');
            window.location= '../Presentacion/login.php'
            </script>";
        }

        //foreach( $clientes as $cliente) 
      //{
        //$cant_clientes = $cliente["count"];
      //}    

?>