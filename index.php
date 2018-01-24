<?php

    require_once("clases/entero.php");
    require_once("clases/matriz.php");
    require_once("clases/patron.php");

    $objEntero = new Entero();
    $objMatriz = new Matriz();
    $objPatron = new Patron();

    $objEntero->crearMatriz();
    //$objEntero->verMatriz();
    $objMatriz->crearColeccion($objEntero->getEnteros());
    $objMatriz->verMatriz();
    $objPatron->crearPatron($objMatriz->getMatriz());
    //$objPatron->verMatriz();

?>
