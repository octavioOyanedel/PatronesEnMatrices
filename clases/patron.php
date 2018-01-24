<?php

    require_once("mostrar.php");
    define("SUMA",4);

    class Patron {

        //atributos
        private $patrones;
        private static $posicion;

        //metodos
        public function __construct(){

            $this->patrones = array();
            Patron::$posicion = 0;

        }

        public function crearPatron($matrices){

            for ($i=0; $i < sizeof($matrices); $i++) {

                if (!$this->existePatron($matrices[$i])) {

                    $this->ingresarPatron($matrices[$i]);

                }else{

                    $this->incrementarSuma($matrices[$i]);

                }

            }

        }

        public function existePatron($patron){

            for ($i=0; $i < sizeof($this->patrones); $i++) {

                if($this->compararPatrones($patron,$this->patrones[$i])){

                    return true;

                }

            }

            return false;

        }

        public function compararPatrones($patron,$patronSuma){

            for ($i=0; $i < sizeof($patron) ; $i++) {

                if($patron[$i] != $patronSuma[$i]){

                    return false;

                }

            }

            return true;

        }

        public function ingresarPatron($matriz){

            $matrizSuma = array();

            for ($i=0; $i < sizeof($matriz); $i++) {

                $matrizSuma[$i] = $matriz[$i];

            }

            $matrizSuma[SUMA] = 1;
            $this->patrones[Patron::$posicion] = $matrizSuma;
            Patron::$posicion++;

        }

        public function incrementarSuma($matriz){

            $posicion = $this->buscarPatron($matriz);
            $this->patrones[$posicion][SUMA] += 1;

        }

        public function buscarPatron($matriz){

            for ($i=0; $i < sizeof($this->patrones); $i++) {

                if ($this->compararPatrones($matriz,$this->patrones[$i])) {

                    return $i;

                }

            }

        }

        public function verMatriz(){

            $objMostrar = new Mostrar();
            $objMostrar->verMatriz($this->patrones);

        }

        public function getPatron(){

            return $this->patrones;

        }

        public function __destruct(){}

    }//fin clase

?>
