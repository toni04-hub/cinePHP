<?php
require_once "Butaca.php";
class Cine
{
    private $_butacas;
    private $_precio;
    private $_pelicula;
    private $_filas;
    private $_columnas;

    public function __construct($filas, $columnas, $precio, Pelicula $pelicula)
    {
        $this->_filas = $filas;
        $this->_columnas = $columnas;
        $this->_precio = $precio;
        $this->_pelicula =  $pelicula;
        $this->_rellenarButacas();
    }

    public function setButacas($butacas)
    {
        $this->_butacas = $butacas;
    }

    public function getButacas()
    {
        return $this->_butacas;
    }

    public function getPrecio()
    {
        return $this->_precio;
    }

    public function setPrecio($precio)
    {
        $this->_precio = $precio;
    }

    public function getPelicula()
    {
        return $this->_getPelicula;
    }

    public function setPelicula(Pelicula $pelicula)
    {
        $this->_pelicula = $pelicula;
    }

    private function _rellenarButacas()
    {
        $fila = $this->_filas;

        for ($i  = 0; $i < $this->_filas; $i++) {
            $letra = 'A';
            for ($j = 0; $j < $this->_columnas; $j++) {
                $this->_butacas[$i][$j] = new Butaca($letra++, $fila);
            }
            $fila--;
        }
    }

    public function haySitio()
    {
        for ($i = 0; $i < $this->_filas; $i++) {
            for ($j  = 0; $j < $this->_columnas; $j++) {
                $butaca = $this->_butacas[$i][$j];
                if ($butaca->ocupado()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function haySitioButaca($fila,$columna){
        $butaca = $this->getButaca($fila,$columna);
        return $butaca->ocupado();
    }

    public function getButaca($fila, $columna) {
        return $this->_butacas[$fila][$columna];
    }

    public function sePuedeSentar(Espectador $e){
        //si tiene dinero, y no esta ocupado

    }

    public function sentar($fila, $letra, Espectador $e)
    {
        $butaca = $this->_butacas[$fila][$letra];
        $butaca->setEspectador($e);
    }

    public function printSala()
    {
        echo "<table>";

        for ($i = 0; $i < $this->_filas; $i++) {
            echo "<tr>";
            for ($j  = 0; $j < $this->_columnas; $j++) {
                $butaca = $this->_butacas[$i][$j];
                $ocupado = ($butaca->ocupado()) ? "**" : "__";
                $b = "{$butaca->getFila()}{$butaca->getLetra()}{$ocupado}";
                echo "<td>$b</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
