<?php  
    if(isset($_POST['insertar_juego'])){
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

        $ok=false;
        //COMPROBACIONES
        if($_POST['nombre']!="" && strlen($_POST['nombre'])<=50){
            
        }

        $jue=new juego();
        $jue->insertar_juego();

        include "../vistas/v_juego_nuevo.php";
        
    }else{
        header("Location:../index.php");
    }

?>