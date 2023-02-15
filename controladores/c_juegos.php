<?php
    require_once("../funciones/funciones.php");
    require_once("../bd/bd.php");
    require_once("../modelos/m_juegos.php");
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

    $plata=new plataforma();
    $plataformas=$plata->todas_plataformas();

    $jue=new juego();

    $controlador=true;

    include "../vistas/v_juegos.php";
?>