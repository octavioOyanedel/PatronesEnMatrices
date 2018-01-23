<?php

    require_once("conexion.php");

    class Consultas{

        //atributos
        private $sql;

        //metodos
        public function __construct(){

            //$this->sql = "SELECT * FROM enteros WHERE id BETWEEN 1 AND 15";
            $this->sql = "SELECT * FROM enteros";

        }

        public function consultar($consulta){

            $objConexion = new Conexion();
            $conexion = $objConexion->conectar();
            $resultados = mysqli_query($conexion, $consulta);

            if(!$resultados){

                echo "Error al realizar consulta en base de datos.";

            }

            $objConexion->desconectar($conexion);
            return $resultados;

        }

        public function getSql(){

            return $this->sql;

        }

        public function __destruct(){}

    }//fin clase

?>
