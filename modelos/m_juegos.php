<?php

    class juego{
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

        public function ultimos_juegos_por_plataforma($id){
            $con=conectar::conexion();
            $buscar=$con->query("select * from juegos where plataforma=$id and activo=1 order by fecha_lanzamiento desc limit 0, 4");

            if($buscar->num_rows>0){
                $i=0;
                while($fila=$buscar->fetch_array(MYSQLI_ASSOC)){
                    $datos[$i]['id']=$fila['id'];
                    $datos[$i]['nombre']=$fila['nombre'];
                    $datos[$i]['descripcion']=$fila['descripcion'];
                    $datos[$i]['plataforma']=$fila['plataforma'];
                    $datos[$i]['caratula']=$fila['caratula'];
                    $datos[$i]['fecha_lanzamiento']=$fila['fecha_lanzamiento'];
                    $datos[$i]['activo']=$fila['activo'];
                    $i++;
                }
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function juegos_por_plataforma($id){
            $con=conectar::conexion();
            $buscar=$con->query("select * from juegos where plataforma=$id and activo=1");

            if($buscar->num_rows>0){
                $i=0;
                while($fila=$buscar->fetch_array(MYSQLI_ASSOC)){
                    $datos[$i]['id']=$fila['id'];
                    $datos[$i]['nombre']=$fila['nombre'];
                    $datos[$i]['descripcion']=$fila['descripcion'];
                    $datos[$i]['plataforma']=$fila['plataforma'];
                    $datos[$i]['caratula']=$fila['caratula'];
                    $datos[$i]['fecha_lanzamiento']=$fila['fecha_lanzamiento'];
                    $datos[$i]['activo']=$fila['activo'];
                    $i++;
                }
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }
        
        public function juego_por_id($id){
            $con=conectar::conexion();
            $buscar=$con->query("select * from juegos where id=$id and activo=1");

            if($buscar->num_rows>0){
                $fila=$buscar->fetch_array(MYSQLI_ASSOC);
                $datos['id']=$fila['id'];
                $datos['nombre']=$fila['nombre'];
                $datos['descripcion']=$fila['descripcion'];
                $datos['plataforma']=$fila['plataforma'];
                $datos['caratula']=$fila['caratula'];
                $datos['fecha_lanzamiento']=$fila['fecha_lanzamiento'];
                $datos['activo']=$fila['activo'];
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function buscar_juegos_por_nombre($cadena){
            $param="%$cadena%";

            $con=conectar::conexion();
            $buscar=$con->prepare("select distinct * from juegos where nombre like ?");
            $buscar->bind_param("s",$param);
            $buscar->bind_result($id,$nombre,$descripcion,$plataforma,$caratula,$fecha_lanzamiento,$activo);
            $buscar->execute();
            $buscar->store_result();

            if($buscar->num_rows>0){
                $i=0;
                while($buscar->fetch()){
                    $datos[$i]['id']=$id;
                    $datos[$i]['nombre']=$nombre;
                    $datos[$i]['descripcion']=$descripcion;
                    $datos[$i]['plataforma']=$plataforma;
                    $datos[$i]['caratula']=$caratula;
                    $datos[$i]['fecha_lanzamiento']=$fecha_lanzamiento;
                    $datos[$i]['activo']=$activo;
                    $i++;
                }
            }else{
                $datos=null;
            }

            $buscar->close();
            $con->close();
            return $datos;
        }

        public function insertar_juego($nombre,$descripcion,$plataforma,$caratula,$fecha_lanzamiento,$activo){
            $con=conectar::conexion();

            $insertar=$con->prepare("insert into juegos values(null,?,?,?,?,?,?");
            $insertar->bind_param("ssissi",$nombre,$descripcion,$plataforma,$caratula,$fecha_lanzamiento,$activo);
            $insertar->execute();

            $insertar->close();
            $con->close();
        }


    }

?>