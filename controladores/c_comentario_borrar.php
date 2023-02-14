<?php
    if(isset($_POST['enviar'])){
        require_once("../funciones/funciones.php");
        require_once("../bd/bd.php");
        require_once("../modelos/m_comentario.php");

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

        $comen=new comentario();

        $usuario=$_POST['id_usu'];
        $juego=$_POST['id_jue'];
        $fecha=$_POST['fecha'];
        $texto=$_POST['texto'];

        $comen->borrar_comentario($usuario,$juego,$fecha,$texto);

        $ok=true;
        $mensaje="<p>Comentario borrado</p>";

        $comentarios=$comen->todos_comentarios();

        $controlador=true;

        include "../vistas/v_comentarios.php";
    }else{

    }
?>