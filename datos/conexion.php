<?php

    class Conexion{

        //atributos
        private $servidor;
        private $usuario;
        private $password;
        private $base;

        //metodos
        public function __construct(){

            $this->servidor = "localhost";
            $this->usuario = "desarrollo";
            $this->password = "desarrollo";
            $this->base = "boleto";

        }

        public function conectar(){

            $conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->base);

            if(!$conexion){

                echo "Error al conectar con base de datos.";

            }

            return $conexion;
        }

        public function desconectar($conexion){

            mysqli_close($conexion);

        }

        public function __destruct(){}

    }//fin clase

?>
