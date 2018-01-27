<?php

    require_once("mostrar.php");
    define("DUO",2);
    define("DIEZ",10);

    class Filtro{

        //atributos
        private $filtros;
        private $sumas;
        private static $posicion;
        private static $posicionSumaDigito;
        private static $posicionConteo;
        private static $posicionSuma;

        //metodos
        public function __construct(){

            $this->filtros = array();
            $this->sumas = array();
            Filtro::$posicion = 0;
            Filtro::$posicionSumaDigito = 0;
            Filtro::$posicionConteo = 0;
            Filtro::$posicionSuma = 0;
        }

        public function crearSumas($ultimos){

            for ($i=0; $i <sizeof($ultimos) ; $i++) {

                $this->crearConteo($ultimos[$i]);

            }

        }

        public function crearConteo($patron){

            $conteo = array();

            for ($i=0; $i < DUO; $i++) {

                $posicion = $i + 2;
                $this->crearSumaSumas($posicion,$patron,$conteo);

            }

            $this->sumas[Filtro::$posicionSuma] = $conteo;
            Filtro::$posicionSuma++;

        }

        public function crearSumaSumas($posicion,$patron,&$conteo){

            $sumaDigito = array();

            for ($i=0; $i < sizeof($this->filtros); $i++) {

                $suma = 0;

                if($patron[0] == $this->filtros[0] && $patron[1] == $this->filtros[1]){

                    for ($j=0; $j < DIEZ; $j++) {

                        if ($this->filtros[$posicion] == $j) {

                            $suma = $suma + $this->filtros[4];

                        }

                    }

                    $sumaDigito[Filtro::$posicionSumaDigito] = $suma;
                    Filtro::$posicionSumaDigito++;

                }

            }

            $conteo[Filtro::$posicionConteo] = $sumaDigito;
            Filtro::$posicionConteo++;

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
