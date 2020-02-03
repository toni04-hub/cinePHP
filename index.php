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

$peli = new Pelicula("Lo que el código se llevó",120 ,89 , "Pepito Grillo");
echo "<h1>{$peli->getInfo()}</h1>";

$cine = new Cine(3,3,22,$peli);

var_dump($cine->getButacas());

























require_once "Espectador.php";




















// $pelicula = new Pelicula("Batman", 120, 16, "toniuep");
// $cine = new Cine(8,9,22,$pelicula);

// $cine->sentar(1,'A',new Espectador("toni", 37, 30));
// $cine->sentar(2,'B',new Espectador("Pep", 33, 20));
// $cine->sentar(3,'A',new Espectador("Guiem", 33, 20));
// $cine->sentar(4,'A',new Espectador("Juana", 33, 20));
// for($i = 0;$i<count($cine->getButacas());$i++){
//     //var_dump($cine->getButacas()[$i]);
// }

// $cine->printSala();

// var_dump($cine->getButaca(1,'A'));

/*$n = ord('A');
$c = chr(66);
echo $c;
echo $n;*/