<?php
    require_once("..bd/bd.php");

    class usuario{
        private $id;
        private $nombre;
        private $descripcion;
        private $plataforma;
        private $caratula;
        private $fecha_lanzamiento;
        private $activo;

        public function __construct(){
            $this->id='';
            $this->nombre='';
            $this->descripcion='';
            $this->plataforma='';
            $this->caratula='';
            $this->fecha_lanzamiento='';
            $this->activo='';
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;
        }

        


    }


?>