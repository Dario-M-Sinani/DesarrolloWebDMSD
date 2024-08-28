<?php 
class OperacionesCadena {
    private $cadena;

public function __construct($cadena){
    $this->cadena = $cadena;
}
public function invertir(){
    echo strrev($this->cadena);
}

public function mayusculas(){
    echo strtoupper($this->cadena);
}

public function minusculas(){
    echo strtolower($this->cadena);
}

}