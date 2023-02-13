<?php
    if(isset($_POST['insertar_usuario'])){
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

        $ok=false;
        //COMPROBACIONES
        if($_POST['nombre']=="" || $_POST['nick']=="" || $_POST['pass']==""){
            $mensaje="<p>Rellena todos los campos</p>";
        }else if(strlen($_POST['nombre'])>50){
            $mensaje="<p>Nombre no puede ser mayor de 50 caracteres</p>";
        }else if(strlen($_POST['nick'])>20){
            $mensaje="<p>Nick no puede ser mayor de 20 caracteres</p>";
        }else if(strlen($_POST['pass'])>20){
            $mensaje="<p>Contraseña no puede ser mayor de 20 caracteres</p>";
        }else{
            $ok=true;

            $usu=new usuario();

            $nombre=$_POST['nombre'];
            $nick=$_POST['nick'];
            $pass=$_POST['pass'];

            $usu->insertar_usuario($nombre,$nick,$pass);

            $mensaje="<p>Usuario insertado correctamente</p>";
        }

        include "../vistas/v_usuario_nuevo.php";
        
    }else{
        header("Location:../index.php");
    }
?>