<?php
    if(isset($_GET['plata_id'])){

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

        $plata=new plataforma();
        $plataforma=$plata->plataforma_por_id($_GET['plata_id']);

        if($plataforma!=null){
            $jue=new juego();
            $juegos=$jue->juegos_por_plataforma($_GET['plata_id']);

            $controlador=true;

            include "../vistas/v_juegos_por_plataforma.php";
        }else{
            header("Location:../index.php");
        }

    }else{
        header("Location:../index.php");
    }
?>