<?php  
    if(isset($_POST['enviar'])){
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

        $jue=new juego();
        $plataf=new plataforma();

        $id=$_POST['id_juego'];
        
        $ok=false;
        //COMPROBACIONES
        if($_FILES['foto']['type']!="image/jpeg" && is_uploaded_file($_FILES['foto']['tmp_name'])){
            $mensaje="<p>La foto no es un jpeg</p>";
            // header("refresh:2; url=../controladores/c_juegos.php");
        }else if($_POST['nombre']=="" || $_POST['desc']=="" || $_POST['fecha_lanz']==""){
            $mensaje="<p>Rellena todos los campos</p>";
            header("refresh:2; url=../controladores/c_juegos.php");
        }else if(strlen($_POST['nombre'])>50){
            $mensaje="<p>Nombre no puede ser mayor de 50 caracteres</p>";
            header("refresh:2; url=../controladores/c_juegos.php");
        }else if(strlen($_POST['desc'])>50){
            $mensaje="<p>Descripción no puede ser mayor de 50 caracteres</p>";
            header("refresh:2; url=../controladores/c_juegos.php");
        }else{
            $ok=true;

            $nombre=$_POST['nombre'];
            $desc=$_POST['desc'];
            $plata=$_POST['plata'];
            $foto=$id.".jpg";
            $fecha=$_POST['fecha_lanz'];
            $activado=$_POST['activar'];

            $jue->modificar_juego($nombre,$desc,$plata,$foto,$fecha,$activado,$id);
            if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/juegos/$foto");
            }

            $mensaje="<p>Juego editado correctamente</p>"; 
        }

        $datos=$jue->juego_por_id($id);
        $plataformas=$plataf->todas_plataformas();

        include "../vistas/v_juego_editar.php";

    }else{
        header("Location:../index.php");
    }
?>