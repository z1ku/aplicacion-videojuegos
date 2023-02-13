<?php
    if(isset($_POST['buscar_usuario'])){
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
                headerAdmin();
                $tipo_usu="admin";
            }else{
                headerUsu();
                $tipo_usu="usuario";
            }
        }else{
            headerGuest();
            $tipo_usu="invitado";
        }

        if($tipo_usu!="admin"){
            header("Location:../index.php");
        }

        $cadena=$_POST['cadena'];

        $usu=new usuario();

        $usuarios=$usu->buscar_usuarios_por_nombre($cadena);

        include "../vistas/v_usuarios.php";
    }else{
        header("Location:../index.php");
    }
    
?>