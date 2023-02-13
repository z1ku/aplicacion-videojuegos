<?php

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
            $this->activo='';
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo,$valor){
            $this->$atributo=$valor;
        }

        public function comprobar_login($nick,$pass){
            $con=conectar::conexion();

            $preparada=$con->prepare("select id from usuarios where nick=? and pass=?");
            $preparada->bind_result($id);
            $preparada->bind_param("ss",$nick,$pass);
            $preparada->execute();
            $preparada->store_result();

            if($preparada->num_rows>0){
                $_SESSION['nick']=$nick;
                $_SESSION['pass']=$pass;

                if(isset($_POST['recordar'])){
                    $datos=session_encode();
                    setcookie('sesion', $datos, time()+60*60*7, '/');
                }

                $res=true;
            }else{
                $res=false;
            }
            
            $preparada->close();
            $con->close();

            return $res;
        }

        public function todos_usuarios(){
            $con=conectar::conexion();
            $buscar=$con->query("select * from usuarios");

            if($buscar->num_rows>0){
                $i=0;
                while($fila_buscar=$buscar->fetch_array(MYSQLI_ASSOC)){
                    $datos[$i]['id']=$fila_buscar['id'];
                    $datos[$i]['nombre']=$fila_buscar['nombre'];
                    $datos[$i]['nick']=$fila_buscar['nick'];
                    $datos[$i]['pass']=$fila_buscar['pass'];
                    $datos[$i]['activo']=$fila_buscar['activo'];
                    $i++;
                }
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function buscar_usuarios_por_nombre($cadena){
            $param="%$cadena%";

            $con=conectar::conexion();
            $buscar=$con->prepare("select distinct * from usuarios where nombre like ?");
            $buscar->bind_param("s",$param);
            $buscar->bind_result($id,$nombre,$nick,$pass,$activo);
            $buscar->execute();
            $buscar->store_result();

            if($buscar->num_rows>0){
                $i=0;
                while($buscar->fetch()){
                    $datos[$i]['id']=$id;
                    $datos[$i]['nombre']=$nombre;
                    $datos[$i]['nick']=$nick;
                    $datos[$i]['pass']=$pass;
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

        public function insertar_usuario($nombre,$nick,$pass){
            $con=conectar::conexion();

            $insertar=$con->prepare("insert into usuarios values(null,?,?,?,1)");
            $insertar->bind_param("sss",$nombre,$nick,$pass);
            $insertar->execute();

            $insertar->close();
            $con->close();
        }

        public function modificar_usuario($nombre,$nick,$pass,$activo,$id){
            $con=conectar::conexion();

            $insertar=$con->prepare("update usuarios set nombre=?, nick=?, pass=?, activo=? where id=?");
            $insertar->bind_param("sssii",$nombre,$nick,$pass,$activo,$id);
            $insertar->execute();

            $insertar->close();
            $con->close();
        }

        public function usuario_por_id($id){
            $con=conectar::conexion();
            $buscar=$con->query("select * from usuarios where id=$id");

            if($buscar->num_rows>0){
                $fila=$buscar->fetch_array(MYSQLI_ASSOC);
                $datos['id']=$fila['id'];
                $datos['nombre']=$fila['nombre'];
                $datos['nick']=$fila['nick'];
                $datos['pass']=$fila['pass'];
                $datos['activo']=$fila['activo'];
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function obtener_id_por_nick($nick){
            $con=conectar::conexion();

            $sentencia="select id from usuarios where nick='$nick'";
            $resultado=$con->query($sentencia);

            $fila=$resultado->fetch_array(MYSQLI_NUM);
            $id=$fila[0];

            return $id;
        }


    }


?>