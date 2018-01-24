<?php

    require_once("mostrar.php");

    class Matriz{

        //atributos
        private $matriz;

        //metodos
        public function __construct(){

            $this->matriz = array();

        }

        public function crearColeccion($enteros){

            for ($i=0; $i < (sizeof($enteros) - 1); $i++) {

                $this->recorrerEnteros($enteros[$i],$enteros[$i+1],$i);

            }

        }

        public function recorrerEnteros($fila,$filaSiguiente,$posicion){

            $matriz = array();

            for ($i=0; $i < (sizeof($fila) - 1); $i++) {

                $inicio = 0;
                $siguiente = 1;

                for ($j=0; $j < (sizeof($fila) - 1); $j++) {

                    $matriz[$j] = $fila[$inicio];
                    $matriz[$j] = $fila[$siguiente];
                    $matriz[$j] = $filaSiguiente[$inicio];
                    $matriz[$j] = $filaSiguiente[$siguiente];
                    $inicio++;
                    $siguiente++;

                }

                $this->matriz[$posicion] = $matriz;

            }

        }

        public function verMatriz(){

            $objMostrar = new Mostrar();
            $objMostrar->verMatriz($this->matriz);

        }

        public function __destruct(){}

    }//fin clase

?>
