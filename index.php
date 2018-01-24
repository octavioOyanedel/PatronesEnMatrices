<?php

    require_once("clases/entero.php");
    require_once("clases/matriz.php");

    $objEntero = new Entero();
    $objMatriz = new Matriz();

    $objEntero->crearMatriz();
    $objEntero->verMatriz();
    $objMatriz->crearColeccion($objEntero->getEnteros());
    $objMatriz->verMatriz();

?>
