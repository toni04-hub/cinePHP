<?php
/**
 * Clase Butaca
 * lleva todo lo relativo 
 * a la informacion de la butaca
 * @author toniuep
 */

Class Butaca
{   
    /**
     * Propiedades
     * @var $_letra Character
     * @var $_fila Integer
     * @var $_espectador Espectador
     */
    private $_letra;
    private $_fila;
    private $_espectador;

    /**
     * Constructor Butaca
     * @param $letra Char
     * @param $fila Int
     */
    public function __construct($fila, $letra){
        $this->_fila = $fila;
        $this->_letra = $letra;
        $this->_espectador = null; //al iniciar el assiento no hay nadie sentado
    }
    public function getfila(){
        return $this->_fila;
    }
    public function setFila($fila){
        $this->_fila = $fila;
    }
    public function getLetra(){
        return $this->_letra;
    }
    public function setLetra($letra){
        $this->_letra = $letra;
    }
    public function getEspectador(){
        return $this->_espectador;
    }
    public function setEspectador(Espectador $espectador){
        $this->_espectador = $espectador;
    }

    /**
     * indica si el asiento esta ocupado
     * @return
     */
    public function ocupado(){
        return !is_null($this->_espectador);
    }

    public function info(){
        //imprime informacion del asiento
    }
}