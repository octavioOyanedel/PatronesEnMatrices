<?php

    class Mostrar{

        //atributos

        //metodos
        public function __construct(){}

        public function verMatriz($matriz){

            for ($i=0; $i < sizeof($matriz); $i++) {

    			for ($j=0; $j < sizeof($matriz[$i]); $j++) {

    				if($matriz[$i][$j] == -1){

    					echo "[n]";

    				}else {

    					echo "[".$matriz[$i][$j]."]";

    				}

    			}

    			echo "</br>";

    		}

        }

        public function __destruct(){}

    }//fin clase

?>
