<?php
    if(isset($_POST['logearse'])){
        require_once("../funciones/funciones.php");
        require_once("../modelos/m_usuarios.php");
        require_once("../bd/bd.php");
        
        session_start();

        $nick=$_POST['nick'];
        $pass=$_POST['pass'];

        $usu=new usuario();

        if($usu->comprobar_login($nick,$pass)){
            $mensaje="<p>Bienvenido $nick</p>";
            $ok=true;
        }else{
            $mensaje="<p>Usuario o contraseña incorrectos</p>";
            $ok=false;
        }

        $header=headerGuest();

        $controlador=true;

        include "../vistas/v_login.php";
    }else{
        header("Location:../index.php");
    }
?>