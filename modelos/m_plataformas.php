<?php
    // require_once("..bd/bd.php");

    class plataforma{
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

        public function total_plataformas(){
            $con=conectar::conexion();
            $buscar=$con->query("select id,nombre from plataformas");

            $i=0;
            while($fila_buscar=$buscar->fetch_array(MYSQLI_ASSOC)){
                $datos[$i]['id']=$fila_buscar['id'];
                $datos[$i]['nombre']=$fila_buscar['nombre'];
                $i++;
            }

            $con->close();
            return $datos;
        }

        public function plataforma_por_id($id){
            $con=conectar::conexion();
            $buscar=$con->query("select * from plataformas where id=$id");

            $fila=$buscar->fetch_array(MYSQLI_ASSOC);
            $datos['id']=$fila['id'];
            $datos['nombre']=$fila['nombre'];
            $datos['logotipo']=$fila['logotipo'];
            $datos['activo']=$fila['activo'];

            $con->close();
            return $datos;
        }


    }


?>