<?php
    require_once("../bd/bd.php");

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


    }


?>