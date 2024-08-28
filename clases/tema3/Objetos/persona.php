<?php class persona{
    public $nombre;
    public $sexo;
    public $edad;
    public $altura;
    public function _constructor( $nombre, $sexo, $edad, $altura){
        $this->nombre = $nombre;
        $this->sexo = $sexo;
        $this->edad = $edad;
        $this->altura = $altura;
    }
}