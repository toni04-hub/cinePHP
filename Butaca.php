<?php
Class Butaca
{
    private $_letra;
    private $_fila;
    private $_espectador;

    public function __construct($letra, $fila){
        $this->_letra = $letra;
        $this->_fila = $fila;
        $this->_espectador = null; //al iniciar el assiento no hay nadie sentado
    }

    public function getLetra(){
        return $this->_letra;
    }
    public function setLetra($letra){
        $this->_letra = $_letra;
    }
    public function getfila(){
        return $this->_fila;
    }
    public function setFila($fila){
        $this->_fila = $fila;
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