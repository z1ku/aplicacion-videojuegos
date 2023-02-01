<?php
    require_once("..bd/bd.php");

    class usuario{
        private $id;
        private $nombre;
        private $nick;
        private $pass;
        private $activo;

        public function __construct(){
            $this->id='';
            $this->nombre='';
            $this->nick='';
            $this->pass='';
            $this->activo=false;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;
        }

        public function comprobar_usuario($nombre,$pass){
            $con=conectar::conexion();

            $con->close();
        }


    }


?>