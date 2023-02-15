<?php  
    if(isset($_POST['enviar'])){
        require_once("../funciones/funciones.php");
        require_once("../bd/bd.php");
        require_once("../modelos/m_usuarios.php");

        session_start();

        if(isset($_COOKIE['sesion'])){
            session_decode($_COOKIE['sesion']);
        }

        if(isset($_SESSION['nick']) && isset($_SESSION['pass'])){
            $nick=$_SESSION['nick'];
            $pass=$_SESSION['pass'];

            $esAdmin=comprobar_admin($nick,$pass);
            
            if($esAdmin){
                $header=headerAdmin();
                $tipo_usu="admin";
            }else{
                $header=headerUsu();
                $tipo_usu="usuario";
            }
        }else{
            $header=headerGuest();
            $tipo_usu="invitado";
        }

        if($tipo_usu!="admin"){
            header("Location:../index.php");
        }

        $id=$_POST['id_usu'];

        $usu=new usuario();
        $datos=$usu->usuario_por_id($id);

        $controlador=true;

        include "../vistas/v_usuario_editar.php";
    }else{
        header("Location:../index.php");
    }
?>