
<?php 

include_once "../Persistencia/conexion.php";

$user="vmendoza@unbosque.edu.co";
$pass="1234";

$query = $bd->prepare('SELECT "Correo", "Clave", "Tipo_Usuario" FROM "Cliente" WHERE "Correo"=:user AND "Clave"=:pass'  );
$query -> bindParam(":user",$user);
$query -> bindParam(":pass",$pass);
$query -> execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    if ($usuarios) {
        foreach( $usuarios as $cliente){
            echo $cliente['Tipo_Usuario'];
        }
              
    }else{
         echo "no se encontro";
    }

        //foreach( $clientes as $cliente) 
      //{
        //$cant_clientes = $cliente["count"];
      //}    
 
?>
