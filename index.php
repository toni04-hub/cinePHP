<?php
require_once "Pelicula.php";
require_once "Cine.php";
require_once "Espectador.php";
$pelicula = new Pelicula("Batman", 120, 16, "toniuep");
$cine = new Cine(8,9,22,$pelicula);

$cine->sentar(2,2,new Espectador("toni", 37, 30));
$cine->sentar(1,2,new Espectador("Pep", 33, 20));
for($i = 0;$i<count($cine->getButacas());$i++){
    //var_dump($cine->getButacas()[$i]);
}

$cine->printSala();
