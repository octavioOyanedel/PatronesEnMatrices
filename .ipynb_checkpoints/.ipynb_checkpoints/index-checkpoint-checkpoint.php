<?php

    require_once("clases/entero.php");
    require_once("clases/matriz.php");
    require_once("clases/patron.php");
    require_once("clases/ultimo.php");
    require_once("clases/filtro.php");
    // test
    $objEntero = new Entero();
    $objMatriz = new Matriz();
    $objPatron = new Patron();
    $objUltimo = new Ultimo();
    $objFiltro = new Filtro();

    $objEntero->crearMatriz();
    //$objEntero->verMatriz();
    $objMatriz->crearColeccion($objEntero->getEnteros());
    //$objMatriz->verMatriz();
    $objPatron->crearPatron($objMatriz->getMatriz());
    //echo "MATRIZ PATRONES MAS SUMA</br>";
    //$objPatron->verMatriz();
    $objUltimo->crearUltimo($objEntero->getEnteros());
    $objUltimo->verMatriz();
    $objFiltro->crearFiltro($objPatron->getPatron(),$objUltimo->getUltimo());
    //$objFiltro->verMatriz();
    $objFiltro->crearSumas($objUltimo->getUltimo());
    $objFiltro->calcularPromedios();
    $objFiltro->verColeccion();

?>
