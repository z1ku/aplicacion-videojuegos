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
        echo $esAdmin;
        
        if($esAdmin){
            headerAdmin();
            $tipo_usu="admin";
            echo "admin";
        }else{
            headerUsu();
            $tipo_usu="usuario";
            echo "usu";
        }
    }else{
        headerGuest();
        $tipo_usu="invitado";
        echo "invitado";
    }

    $plata=new plataforma();
    $plataformas=$plata->total_plataformas();

    $jue=new juego();

    include "../vistas/v_juegos.php";
?>