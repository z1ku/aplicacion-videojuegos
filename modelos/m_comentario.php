<?php
    require_once("..bd/bd.php");

    class usuario{
        private $usuario;
        private $juego;
        private $fecha;
        private $texto;

        public function __construct(){
            $this->usuario='';
            $this->juego='';
            $this->fecha='';
            $this->texto='';
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;
        }

        


    }


?>