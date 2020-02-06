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
    

    /**
     * Crea objetos de la clase Butaca con la fila y la letra que
     * correspondan segun las dimensiones de la sala y los guarda
     * en el array $this->_butacas.
     * El numero de las filas esta invertido.  
     */
    private function _rellenarButacas()
    {
        $fila = $this->_filas;
        for ($i  = 0; $i < $this->_filas; $i++) {
            $numLetra = ord('A');
            for ($j = 0; $j < $this->_columnas; $j++) {
                $this->_butacas[$i][$j] = new Butaca($fila,chr($numLetra++));
                
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
        $this->getButaca($fila, $letra)//Devuelve un objeto Butaca
             ->setEspectador($e);
    }

    public function generarEspectadoresRandom($numEspectadores, $nombres, $edadMin, $dinero){
            //numero de nombres disponibles ( de 0 a n-1)
            $numNombres = count($nombres)-1;
            //array para guardar los espedcatadores generados
            $butacasOcupadas = array();
            $i = 0;
            //llenamos el array con nuevos espectadores random
            while($i < $numEspectadores){
                //creamos las propiedades de forma aleatoria
                $e = rand($edadMin, 100);
                $d = rand($dinero, 50);
                $n = $nombres[rand(0, $numNombres)];
                //creamos un nuevo espectador y lo añadimos al array
                $espectadorRandom = new Espectador($n , $e, $d);
                //Generamos una fila y una letra aleatorias
                $filaRand = rand(1,  $this->_filas);
                $letraRand = chr(rand(65, $this->_columnas+65-1));

                //si el asiento esta ocupado no lo sentamos
                if(!$this->getButaca($filaRand, $letraRand)->ocupado()){
                    $butacasOcupadas[$i] = $this->getButaca($filaRand, $letraRand);
                    $this->sentar($filaRand, $letraRand, $espectadorRandom);
                    $i++;
                }
                
            }
            

            return $butacasOcupadas;
    }


    public function printSala()
    {
        echo "<table>";

        for ($i = 0; $i < $this->_filas; $i++) {
            echo "<tr>";
            for ($j  = 0; $j < $this->_columnas; $j++) {
                $butaca = $this->_butacas[$i][$j];

                $ocupado = ($butaca->ocupado()) ? "class = 'ocupado'" : "class = libre";
                
                $b = "{$butaca->getFila()}".$butaca->getLetra();
                echo "<td $ocupado>$b</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}


