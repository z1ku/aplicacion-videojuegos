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

        $usu=new usuario();

        $id=$_POST['id_usuario'];
        $pass_anterior=$_POST['pass_anterior'];
        
        $ok=false;
        //COMPROBACIONES
        if($_POST['nombre']=="" || $_POST['nick']==""){
            $mensaje="<p>Rellena nombre y nick</p>";
        }else if(strlen($_POST['nombre'])>50){
            $mensaje="<p>Nombre no puede ser mayor de 50 caracteres</p>";
        }else if(strlen($_POST['nick'])>20){
            $mensaje="<p>Nick no puede ser mayor de 20 caracteres</p>";
        }else if(strlen($_POST['pass'])>20){
            $mensaje="<p>Contraseña no puede ser mayor de 20 caracteres</p>";
        }else{
            $ok=true;

            $nombre=$_POST['nombre'];
            $nick=$_POST['nick'];

            if($_POST['pass']!=""){
                $pass=$_POST['pass'];
            }else{
                $pass=$pass_anterior;
            }

            $activo=$_POST['activar'];

            $usu->modificar_usuario($nombre,$nick,$pass,$activo,$id);

            $mensaje="<p>Usuario editado correctamente</p>";
        }

        $datos=$usu->usuario_por_id($id);

        $controlador=true;

        include "../vistas/v_usuario_editar.php";

    }else{
        header("Location:../index.php");
    }
?>