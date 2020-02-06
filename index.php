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
.ocupado{
  background-color: red;
}
.libre{
  background-color: gray;
}
</style>
<?php
require_once "Pelicula.php";
require_once "Cine.php";
require_once "Espectador.php";

$peli = new Pelicula("Lo que el código se llevó",120 ,89 , "Pepito Grillo");
echo "<h1>{$peli->getInfo()}</h1>";

$cine = new Cine(7,20,40,$peli);


//creamos un array de nombres para generar espectadores
$nombres = ['Susana', 'Raúl', 'Delia', 'Xavi', 'Miguel Angel'];
$butacasOcupadas = $cine->generarEspectadoresRandom(30, $nombres, 16, 30);
//Llamamos a la función printButacas
//printButacas($cine);

//var_dump($butacasOcupadas);

?>
<h2>Sala del cine</h2>
<?php
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
?>
<h2>Detalle espectadores</h2>
<!--Ejercicio: Imprime una tabla con la informacion del Espectador
y fila y letra de la butaca correspondiente-->
<table>
  <tr>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Dinero</th>
    <th>Fila</th>
    <th>Letra</th>
  </tr>
  <?php
    foreach($butacasOcupadas as $butacaOcupada){
      echo "<tr>
                <td>{$butacaOcupada->getEspectador()->getNombre()}</td>
                <td>{$butacaOcupada->getEspectador()->getEdad()}</td>
                <td>{$butacaOcupada->getEspectador()->getDinero()}</td>
                <td>{$butacaOcupada->getFila()}</td>
                <td>{$butacaOcupada->getLetra()}</td>
            </tr>";
    }
    ?>
</table>