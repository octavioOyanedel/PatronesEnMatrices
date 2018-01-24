<?php

    require_once("datos/consulta.php");
    require_once("mostrar.php");

    class Entero{

    //atributos
    private $enteros;

    //metodos
    public function __construct(){

        $this->enteros = array();

    }

    public function crearMatriz(){

        $objConsulta = new Consulta();
        $resultados = $objConsulta->consultar($objConsulta->getSql());
        $k = 0;

        while ($fila = mysqli_fetch_row($resultados)) {

            $array = array();

            for ($i=1; $i < sizeof($fila); $i++) {

                $j = $i - 1;
                $array[$j] = $fila[$i];

            }

            $this->enteros[$k] = $array;
            $k++;
        }

        mysqli_free_result($resultados);

    }

    public function verMatriz(){

        $objMostrar = new Mostrar();
        $objMostrar->verMatriz($this->enteros);

    }

    public function getEnteros(){

        return $this->enteros;

    }

    public function __destruct(){}

    }//fin clase

?>
