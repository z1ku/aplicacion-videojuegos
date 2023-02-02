<?php
    require_once("..bd/bd.php");

    class usuario{
        private $id;
        private $nombre;
        private $activo;
        private $logotipo;

        public function __construct(){
            $this->id='';
            $this->nombre='';
            $this->activo='';
            $this->logotipo='';
        }
        
        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;
        }

        


    }


?>