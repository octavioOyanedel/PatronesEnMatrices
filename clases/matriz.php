<?php

    require_once("mostrar.php");
    define("PATRON",4);

    class Matriz{

        //atributos
        private $matriz;
        private static $posicion;

        //metodos
        public function __construct(){

            $this->matriz = array();
            Matriz::$posicion = 0;

        }

        public function crearColeccion($enteros){

            for ($i=0; $i < (sizeof($enteros) - 1); $i++) {

                $this->recorrerEnteros($enteros[$i],$enteros[$i+1]);

            }

        }

        public function recorrerEnteros($fila,$filaSiguiente){

            for ($i=0; $i < (sizeof($fila) - 1); $i++) {

                $this->crearMatriz($fila[$i],$fila[$i+1],$filaSiguiente[$i],$filaSiguiente[$i+1]);

            }

        }

        public function crearMatriz($n1,$n2,$n3,$n4){

            $array = array();

            for ($i=0; $i < PATRON; $i++) {

                $indice = $i + 1;
                $array[$i] = ${"n".$indice};

            }

            $this->matriz[Matriz::$posicion] = $array;
            Matriz::$posicion++;

        }

        public function verMatriz(){

            $objMostrar = new Mostrar();
            $objMostrar->verMatriz($this->matriz);

        }

        public function getMatriz(){

            return $this->matriz;

        }

        public function __destruct(){}

    }//fin clase

?>
