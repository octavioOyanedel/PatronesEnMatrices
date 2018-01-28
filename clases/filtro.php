<?php

    require_once("mostrar.php");
    define("DUO",2);
    define("DIEZ",10);

    class Filtro{

        //atributos
        private $filtros;
        private $sumas;
        private static $posicion;
        private static $posicionSumas;
        private static $posicionSuma;

        //metodos
        public function __construct(){

            $this->filtros = array();
            $this->sumas = array();
            Filtro::$posicion = 0;
            Filtro::$posicionSumas = 0;
            Filtro::$posicionSuma = 0;

        }

        public function crearSumas($ultimos){

            for ($i=0; $i < sizeof($ultimos) ; $i++) {

                $duo = array();

                $this->crearConteo($duo,$ultimos[$i]);

                $this->sumas[Filtro::$posicionSumas] = $duo;
                Filtro::$posicionSumas++;

            }

        }

        public function crearConteo(&$duo,$ultimo){

            for ($i=0; $i < DUO; $i++) {

                $indice = $i + DUO;
                $this->crearSuma($duo[$i],$ultimo,$indice);

            }

        }

        public function crearSuma(&$duo,$ultimo,$indice){

            $suma = array();
            $this->formatoSumas($suma);

            for ($i=0; $i < sizeof($this->filtros); $i++) {

                if($ultimo[0] == $this->filtros[$i][0] && $ultimo[1] == $this->filtros[$i][1]){

                $posicion = $this->filtros[$i][$indice];

                    if($posicion != -1){

                        $suma[$posicion] = $suma[$posicion] + $this->filtros[$i][4];

                    }

                }

            }

            $duo = $suma;

        }

// NOTE: codigo correcto

        public function formatoSumas(&$suma){

            for ($i=0; $i < DIEZ; $i++) {

                $suma[$i] = 0;

            }

        }

        public function crearFiltro($patrones,$ultimos){

            for ($i=0; $i < sizeof($ultimos); $i++) {

                $this->buscarPatrones($ultimos[$i],$patrones);

            }

        }

        public function buscarPatrones($patron,$patrones){

            for ($i=0; $i < sizeof($patrones); $i++) {

                if($this->existePatron($patron,$patrones[$i])){

                    $this->filtros[Filtro::$posicion] = $patrones[$i];
                    Filtro::$posicion++;

                }

            }

        }

        public function existePatron($ultimo,$patron){

            for ($i=0; $i < sizeof($ultimo); $i++) {

                if($ultimo[$i] != $patron[$i]){

                    return false;

                }

            }

            return true;

        }

        public function calcularPromedios(){

            for ($i=0; $i < sizeof($this->sumas); $i++) {

                $this->calcularPromedio($this->sumas[$i]);

            }

        }

        public function calcularPromedio($sumas){

            for ($i=0; $i < sizeof($sumas); $i++) {

                $this->calcularPromedioSuma($sumas[$i]);

            }

        }

        public function calcularPromedioSuma($sumas){

            $suma = 0;

            for ($i=0; $i < sizeof($sumas); $i++) {

                $suma = $suma + $sumas[$i];

            }

            echo floor($suma/10)."</br>";

        }

        public function verMatriz(){

            $objMostrar = new Mostrar();
            $objMostrar->verMatriz($this->filtros);

        }

        public function verColeccion(){

            $objMostrar = new Mostrar();

            for ($i=0; $i < sizeof($this->sumas); $i++) {

                $objMostrar->verMatriz($this->sumas[$i]);

            }

        }

        public function __destruct(){}

    }//fin clase

?>
