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

$peli = new Pelicula("Lo que el código se llevó",120 ,89 , "Pepito Grillo");
echo "<h1>{$peli->getInfo()}</h1>";

$cine = new Cine(7,7,22,$peli);

$pepito = new Espectador("Pepito Grillo", 55, 100);
$cine->sentar(2,'B',$pepito);

//Llamamos a la función printButacas
//printButacas($cine);

$cine->printSala();
//crea una funcion que imprima una tabla html que en cada celda aparezca 
//la fila y la columna de la butaca
//Esta funcion pasa a ser un método publico de la Clase Cine
// function printButacas($c){
//     $arrayButacas  = $c->getButacas();

//     echo "<table>";
//     for($i = 0; $i < $c->getFilas(); $i++){
//       echo "<tr>";
      
//       for($j = 0; $j < $c->getColumnas(); $j++){
//           $butaca = $arrayButacas[$i][$j];
//           echo "<td>{$butaca->getFila()},{$butaca->getLetra()} </td>";
//       }
//       echo "</tr>";
//     }

//     echo "</table>";
// }




















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