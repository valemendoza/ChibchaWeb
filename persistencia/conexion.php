<?php
    class Conexion{
        /**
         * Metodo que permite la conexion de una base de datos PostgreSQL local
         * @return la conexion
         */
        public function conectarDB(){
            $dbhost = "localhost";
            $dbuser = "postgres";
            $dbpass = "1020835144";
            $dbname = "ChibChaWebDB";
            
            $conn = pg_connect($dbhost,$dbuser,$dbpass,$dbname)
            or die("Ha sucedido un erro inerperado en la conexion de la base de datos");

            return $conn;
        }

        /**
         * Metodo que permite la desconexion de una base de datos PostgreSQL
         * @param $conexion la conexion que se encuentra abierta
         * @return el cierre de la conexion
         */
        public function desconectarDB($conexion){
            $cerrar = pg_close($conexion)
            or die("Ha sucedido un erro inesperado en la conexion de la base de datos");

            return $cerrar;
        }
    }
?>