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
        //$this->llenarArrayConButacas();
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

    public function getFilas()
    {
        return $this->_filas;
    }
    public function getColumnas()
    {
        return $this->_columnas;
    }

    // public function llenarArrayConButacas(){
    //     $contadorFila = $this->_filas;
    //     for($i = 0; $i < $this->_filas; $i++){
    //         for($j = 0; $j < $this->_columnas; $j++){
    //             $this->_butacas[$i][$j] = new Butaca($contadorFila, $j+1);
    //         }
    //         $contadorFila--;
    //     }
    // }
    


    private function _rellenarButacas()
    {
        $fila = $this->_filas;

        for ($i  = 0; $i < $this->_filas; $i++) {
            $letra = ord('A');
            for ($j = 0; $j < $this->_columnas; $j++) {
                $this->_butacas[$i][$j] = new Butaca($fila,$letra++);
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

    public function haySitioButaca($fila, $letra)
    {
        
        $butaca = $this->getButaca($fila, $letra);
        return $butaca->ocupado();
    } 

    

    public function sePuedeSentar(Espectador $e)
    {
        //si tiene dinero, y no esta ocupado
        $s = $e->tieneDinero($this->_precio) && $e->tieneEdad($this->_pelicula->getEdadMin());
        return $s;
    }
    /**
     * Devuelve un objeto Butaca segun la fila y la letra
     * @param Int $fila 
     * @param Char $letra
     * @return Butaca 
     */
    public function getButaca($fila, $letra){
        $fil = $this->getFilas() - $fila;
        $col = ord($letra) - ord('A');
        return $this->_butacas[$fil][$col];
    }
    
    
    public function sentar($fila, $letra, Espectador $e)
    {   
       //Necesitamos un objeto Butaca donde sentar al espectador
        $this->getButaca($fila, $letra)
             ->setEspectador($e);
    }

    public function printSala()
    {
        echo "<table>";

        for ($i = 0; $i < $this->_filas; $i++) {
            echo "<tr>";
            for ($j  = 0; $j < $this->_columnas; $j++) {
                $butaca = $this->_butacas[$i][$j];
                $ocupado = ($butaca->ocupado()) ? "**" : "__";
                $b = "{$butaca->getFila()}".chr($butaca->getLetra()).$ocupado;
                echo "<td>$b</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
