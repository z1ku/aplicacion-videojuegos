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
        if($_FILES['foto']['type']!="image/jpeg" && $_FILES['foto']['type']!="image/webp" &&  is_uploaded_file($_FILES['foto']['tmp_name'])){
            $mensaje="<p>La foto debe ser jpg o webp</p>";
        }else if($_POST['nombre']=="" || $_POST['desc']=="" || $_POST['fecha_lanz']==""){
            $mensaje="<p>Rellena todos los campos</p>";
        }else if(strlen($_POST['nombre'])>50){
            $mensaje="<p>Nombre no puede ser mayor de 50 caracteres</p>";
        }else if(strlen($_POST['desc'])>50){
            $mensaje="<p>Descripción no puede ser mayor de 50 caracteres</p>";
        }else if(!is_uploaded_file($_FILES['foto']['tmp_name'])){
            $mensaje="<p>Debes subir una foto jpeg</p>";
        }else{
            $ok=true;

            $jue=new juego();
            $id=$jue->siguiente_id();

            $nombre=$_POST['nombre'];
            $desc=$_POST['desc'];
            $plata=$_POST['plata'];
            $foto=$id.".jpg";
            $fecha=$_POST['fecha_lanz'];
            $activado=$_POST['activar'];

            $jue->insertar_juego($nombre,$desc,$plata,$foto,$fecha,$activado);
            move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/juegos/$foto");

            $mensaje="<p>Juego insertado correctamente</p>";
        }

        $plata=new plataforma();
        $plataformas=$plata->todas_plataformas();

        include "../vistas/v_juego_nuevo.php";
        
    }else{
        header("Location:../index.php");
    }

?>