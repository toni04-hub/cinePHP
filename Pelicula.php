<?php

CLass Pelicula
{
    private $_titulo;
    private $_duracion;
    private $_edadMin;
    private $_director;

    public function __construct($titulo,$duracion,$edadMin,$director){
        $this->_titulo = $titulo;
        $this->_duracion = $duracion;
        $this->_edadMin = $edadMin;
        $this->_director = $director;
    }
    public function getTitulo(){
        return $this->_titulo;
    }
    public function setTitulo($titulo){
        $this->_titulo = $titulo;
    }
    public function getDuracion(){
        return $this->_duracion;
    }
    public function set($duracion){
        $this->_duracion = $duracion;
    }
    public function getEdadMin(){
        return $this->_edadMin;
    }
    public function setEdadMin($edadMin){
        $this->_edadMin = $edadMin;
    }
    public function getDirector(){
        return $this->_director;
    }
    public function setDirector($director){
        $this->_director = $director;
    }

    public function info(){
        //imprime informacion de la pelicula
    }
}