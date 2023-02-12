<?php

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

        public function todas_plataformas(){
            $con=conectar::conexion();
            $buscar=$con->query("select * from plataformas");

            if($buscar->num_rows>0){
                $i=0;
                while($fila_buscar=$buscar->fetch_array(MYSQLI_ASSOC)){
                    $datos[$i]['id']=$fila_buscar['id'];
                    $datos[$i]['nombre']=$fila_buscar['nombre'];
                    $datos[$i]['logotipo']=$fila_buscar['logotipo'];
                    $datos[$i]['activo']=$fila_buscar['activo'];
                    $i++;
                }
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function plataforma_por_id($id){
            $con=conectar::conexion();
            $buscar=$con->query("select * from plataformas where id=$id");

            if($buscar->num_rows>0){
                $fila=$buscar->fetch_array(MYSQLI_ASSOC);
                $datos['id']=$fila['id'];
                $datos['nombre']=$fila['nombre'];
                $datos['logotipo']=$fila['logotipo'];
                $datos['activo']=$fila['activo'];
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function buscar_plataformas_por_nombre($cadena){
            $param="%$cadena%";

            $con=conectar::conexion();
            $buscar=$con->prepare("select distinct * from plataformas where nombre like ?");
            $buscar->bind_param("s",$param);
            $buscar->bind_result($id,$nombre,$activo,$logotipo);
            $buscar->execute();
            $buscar->store_result();

            if($buscar->num_rows>0){
                $i=0;
                while($buscar->fetch()){
                    $datos[$i]['id']=$id;
                    $datos[$i]['nombre']=$nombre;
                    $datos[$i]['activo']=$activo;
                    $datos[$i]['logotipo']=$logotipo;
                    $i++;
                }
            }else{
                $datos=null;
            }

            $buscar->close();
            $con->close();
            return $datos;
        }

        public function insertar_plataforma($nombre,$logotipo){
            $con=conectar::conexion();

            $insertar=$con->prepare("insert into plataformas values(null,?,1,?)");
            $insertar->bind_param("ss",$nombre,$logotipo);
            $insertar->execute();

            $insertar->close();
            $con->close();
        }

        public function modificar_plataforma($nombre,$logotipo,$id){
            $con=conectar::conexion();

            $insertar=$con->prepare("update plataformas set nombre=?, logotipo=? where id=?");
            $insertar->bind_param("ssi",$nombre,$logotipo,$id);
            $insertar->execute();

            $insertar->close();
            $con->close();
        }

        public function siguiente_id(){
            $con=conectar::conexion();

            $sentencia="select auto_increment from information_schema.tables where table_schema='videojuegos' and table_name='plataformas'";
            $resultado=$con->query($sentencia);

            $fila=$resultado->fetch_array(MYSQLI_NUM);
            $id=$fila[0];

            return $id;
        }

    }


?>