<?php  
    if(isset($_POST['enviar'])){
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

        $plataf=new plataforma();

        $id=$_POST['id_plataforma'];
        
        $ok=false;
        //COMPROBACIONES
        if($_FILES['foto']['type']!="image/png" && is_uploaded_file($_FILES['foto']['tmp_name'])){
            $mensaje="<p>La foto debe ser png</p>";
        }else if($_POST['nombre']==""){
            $mensaje="<p>Rellena todos los campos</p>";
        }else if(strlen($_POST['nombre'])>50){
            $mensaje="<p>Nombre no puede ser mayor de 50 caracteres</p>";
        }else{
            $ok=true;

            $nombre=$_POST['nombre'];
            $foto=$id.".png";

            $plataf->modificar_plataforma($nombre,$foto,$id);
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/plataformas/$foto");
            }

            $mensaje="<p>Plataforma editada correctamente</p>"; 
        }

        $datos=$plataf->plataforma_por_id($id);

        $controlador=true;

        include "../vistas/v_plataforma_editar.php";

    }else{
        header("Location:../index.php");
    }
?>