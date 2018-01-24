<?php

    require_once("mostrar.php");
    define("MATRIZ",2);

    class Ultimo{

        //atributos
        private $ultimos;

        //metodos
        public function __construct(){

            $this->ultimos = array();

        }

        public function crearUltimo($enteros){

            $posicion = sizeof($enteros) - 1;
            $this->recorrerEntero($enteros[$posicion]);

        }

        public function recorrerEntero($ultimaFila){

            for ($i=0; $i < (sizeof($ultimaFila) - 1); $i++) {

                $cabecera = array();
                $inicio = 0;
                $fin = 1;

                for ($j=$inicio; $j <= $fin ; $j++) {

                    $cabecera[$inicio] = $ultimaFila[$i];
                    $cabecera[$fin] = $ultimaFila[$i+1];

                }

                $this->ultimos[$i] = $cabecera;

            }

        }

        public function verMatriz(){

            $objMostrar = new Mostrar();
            $objMostrar->verMatriz($this->ultimos);

        }

        public function getUltimo(){

            return $this->ultimos;

        }

        public function __destruct(){}

    }//fin clase

?>
