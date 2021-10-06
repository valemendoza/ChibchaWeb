<?php

    class Conexion{

        public function conectarDB(){
            $dbhost = "localhost";
            $dbuser = "postgres";
            $dbpass = "1020835144";
            $dbname = "ChibChaWebDB";

            $con = pg_connect($dbhost,$dbuser,$dbpass,$dbname)

            or die("Ha sucedido un error en la conexion de la base de datos");

            return $con;
        }

        public function desconectarDB($conexion){
            $cerrar = pg_close($conexion)
            or die("Ha sucedido un error en la desconexion de la base de datos");

            return $cerrar;
        }
    }
?>