<style>
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
th, td {
  padding: 15px;
  text-align: left;
}
</style>
<?php
require_once "Pelicula.php";
require_once "Cine.php";
require_once "Espectador.php";
$pelicula = new Pelicula("Batman", 120, 16, "toniuep");
$cine = new Cine(7,6,22,$pelicula);

$cine->sentar(2,2,new Espectador("toni", 37, 30));
$cine->sentar(1,2,new Espectador("Pep", 33, 20));
$cine->sentar(5,4,new Espectador("Guiem", 33, 20));
$cine->sentar(6,3,new Espectador("Juana", 33, 20));
for($i = 0;$i<count($cine->getButacas());$i++){
    //var_dump($cine->getButacas()[$i]);
}

$cine->printSala();
