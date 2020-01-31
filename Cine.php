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
    public function getButacas()
    {
        return $this->_butacas;
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
                if ($butaca->ocupado()){   
                    return true;
                }
            }
        }
        return false;
    }

    public function sentar($fila, $letra, Espectador $e){
            $butaca = $this->_butacas[$fila][$letra];
            $butaca->setEspectador($e);
            //var_dump($this->_butacas[$fila][$letra]);
    }
    public function printSala(){
        for ($i = 0; $i < $this->_filas; $i++) {
            for ($j  = 0; $j < $this->_columnas; $j++) {
                $butaca = $this->_butacas[$i][$j];
                $ocupado = ($butaca->ocupado()) ? "*" : "";
                $b = "{$butaca->getFila()}{$butaca->getLetra()}{$ocupado}    ";
                echo $b;
            }
            echo "<br><br>";
        }
    }
    
}
