<?php
    class Conexion{
        public function conectarDB(){
            $dbhost = "localhost";
            $dbuser = "postgres";
            $dbpass = "1020835144";
            $dbname = "ChibChaWebDB";
            
            $conn = pg_connect($dbhost,$dbuser,$dbpass,$dbname)
            or die("Ha sucedido un erro inerperado en la conexion de la base de datos");

            return $conn;
        }

        public function desconectarDB($conexion){
            $cerrar = pg_close($conexion)
            or die("Ha sucedido un erro inesperado en la conexion de la base de datos");

            return $cerrar;
        }
    }
?>