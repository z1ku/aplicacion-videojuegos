<?php  
    if(isset($_POST['insertar_comentario'])){
        require_once("../funciones/funciones.php");
        require_once("../bd/bd.php");
        require_once("../modelos/m_juegos.php");
        require_once("../modelos/m_plataformas.php");
        require_once("../modelos/m_comentario.php");
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

        $comen=new comentario();
        $jue=new juego();
        $plata=new plataforma();
        $usu=new usuario();

        $id=$_POST['id_juego'];

        $ok=false;
        //COMPROBACIONES
        if($_POST['texto']==""){
            $mensaje="<p>Escribe algo</p>";
        }else if(strlen($_POST['texto'])>100){
            $mensaje="<p>El comentario no puede ser mayor de 100 caracteres</p>";
        }else{
            $ok=true;

            $texto=$_POST['texto'];
            $fecha=date('Y-m-d');
            $usuario=$usu->obtener_id_por_nick($nick);

            $num=$comen->buscar_duplicado($usuario,$id,$fecha,$texto);

            if($num>0){
                $mensaje="<p>Ya has hecho ese comentario</p>";
            }else{
                $comen->insertar_comentario($usuario,$id,$fecha,$texto);

                $mensaje="<p>Comentario insertado correctamente</p>";
            }
        }

        $juego=$jue->juego_por_id($id);

        $plataforma=$plata->plataforma_por_id($juego['plataforma']);

        if($tipo_usu=="usuario"){
            $comentarios=$comen->ver_comentarios_por_juego($id);
        }

        $controlador=true;

        include "../vistas/v_juego_ver.php";
        
    }else{
        header("Location:../index.php");
    }

?>