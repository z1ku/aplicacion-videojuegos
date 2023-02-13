<?php

    class comentario{
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
        
        public function todos_comentarios(){
            $con=conectar::conexion();
            $buscar=$con->query("select usuarios.nombre nomusu, juegos.nombre nomjue, comentario.fecha, comentario.texto, comentario.usuario idusu, comentario.juego idjue from comentario,juegos,usuarios where usuario=usuarios.id and juego=juegos.id");

            if($buscar->num_rows>0){
                $i=0;
                while($fila_buscar=$buscar->fetch_array(MYSQLI_ASSOC)){
                    $datos[$i]['usuario']=$fila_buscar['nomusu'];
                    $datos[$i]['juego']=$fila_buscar['nomjue'];
                    $datos[$i]['fecha']=$fila_buscar['fecha'];
                    $datos[$i]['texto']=$fila_buscar['texto'];
                    $datos[$i]['id_usuario']=$fila_buscar['idusu'];
                    $datos[$i]['id_juego']=$fila_buscar['idjue'];
                    $i++;
                }
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function ver_comentarios_por_juego($id){
            $con=conectar::conexion();

            $buscar=$con->query("select usuarios.nick,fecha,texto from comentario,usuarios where usuarios.id=usuario and juego=$id");

            if($buscar->num_rows>0){
                $i=0;
                while($fila_buscar=$buscar->fetch_array(MYSQLI_ASSOC)){
                    $datos[$i]['nick']=$fila_buscar['nick'];
                    $datos[$i]['fecha']=$fila_buscar['fecha'];
                    $datos[$i]['texto']=$fila_buscar['texto'];
                    $i++;
                }
            }else{
                $datos=null;
            }

            $con->close();
            return $datos;
        }

        public function insertar_comentario($usuario,$juego,$fecha,$texto){
            $con=conectar::conexion();

            $insertar=$con->prepare("insert into comentario values(?,?,?,?)");
            $insertar->bind_param("iiss",$usuario,$juego,$fecha,$texto);
            $insertar->execute();

            $insertar->close();
            $con->close();
        }

        public function borrar_comentario($usuario,$juego,$fecha,$texto){
            $con=conectar::conexion();

            $borrar=$con->prepare("delete from comentario where usuario=? and juego=? and fecha=? and texto=?");
            $borrar->bind_param("iiss",$usuario,$juego,$fecha,$texto);
            $borrar->execute();

            $borrar->close();
            $con->close();
        }

        public function buscar_duplicado($usuario,$juego,$fecha,$texto){
            $con=conectar::conexion();

            $buscar=$con->prepare("select count(*) from comentario where usuario=? and juego=? and fecha=? and texto=?");
            $buscar->bind_param("iiss",$usuario,$juego,$fecha,$texto);
            $buscar->bind_result($num);
            $buscar->execute();
            $buscar->store_result();

            $buscar->fetch();

            $buscar->close();
            $con->close();
            return $num;
        }


    }


?>