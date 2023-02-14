<?php
    if(isset($_POST['enviar'])){
        require_once("../funciones/funciones.php");
        require_once("../modelos/m_usuarios.php");
        require_once("../bd/bd.php");
        
        headerGuest();

        $controlador=true;

        include "../vistas/v_login.php";
    }else{
        header("Location:../index.php");
    }
?>