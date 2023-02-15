<?php
    if(isset($_POST['insertar_plataforma'])){
        require_once("../funciones/funciones.php");
        require_once("../bd/bd.php");
        require_once("../modelos/m_plataformas.php");

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

        $ok=false;
        //COMPROBACIONES
        if($_FILES['foto']['type']!="image/png" && is_uploaded_file($_FILES['foto']['tmp_name'])){
            $mensaje="<p>La foto no es un png</p>";
            header("refresh:2; url=../controladores/c_plataforma_nueva.php");
        }else if($_POST['nombre']==""){
            $mensaje="<p>Rellena todos los campos</p>";
            header("refresh:2; url=../controladores/c_plataforma_nueva.php");
        }else if(strlen($_POST['nombre'])>50){
            $mensaje="<p>Nombre no puede ser mayor de 50 caracteres</p>";
            header("refresh:2; url=../controladores/c_plataforma_nueva.php");
        }else if(!is_uploaded_file($_FILES['foto']['tmp_name'])){
            $mensaje="<p>Debes subir una foto png</p>";
            header("refresh:2; url=../controladores/c_plataforma_nueva.php");
        }else{
            $ok=true;

            $plata=new plataforma();
            $id=$plata->siguiente_id();

            $nombre=$_POST['nombre'];
            $foto=$id.".png";

            $plata->insertar_plataforma($nombre,$foto);
            move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/plataformas/$foto");

            $mensaje="<p>Plataforma insertada correctamente</p>";
        }

        $controlador=true;

        include "../vistas/v_plataforma_nueva.php";
        
    }else{
        header("Location:../index.php");
    }
?>