<?php
    //COMPROBAR ADMIN
    function comprobar_admin($nick,$pass){
        $con=conectar::conexion();

        $preparada=$con->prepare("select id from usuarios where nick=? and pass=?");
        $preparada->bind_result($id);
        $preparada->bind_param("ss",$nick,$pass);
        $preparada->execute();
        $preparada->store_result();
        $preparada->fetch();

        if($id===0){
            $res=true;
        }else{
            $res=false;
        }
        
        $preparada->close();
        $con->close();

        return $res;
    }

    // FUNCIONES PARA HEADER
    ////////////////////////////////////////////////////////////////////
    //HEADER INDEX INVITADO
    function headerIndexGuest(){
        echo '<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.png" alt="" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link m-1 fs-5" href="index.php">Inicio</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_juegos.php">Juegos</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_plataformas.php">Plataformas</a>
                    </div>
                    <form action="controladores/c_login.php" method="post">
                        <input type="submit" class="btn btn-primary" name="enviar" value="Login">
                    </form>
                </div>
            </div>
        </nav>';
    }

    //HEADER INDEX ADMIN
    function headerIndexAdmin(){
        echo '<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.png" alt="" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link m-1 fs-5" href="index.php">Inicio</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_juegos.php">Juegos</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_plataformas.php">Plataformas</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_usuarios.php">Usuarios</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_comentarios.php">Comentarios</a>
                    </div>
                    <form action="controladores/c_cerrar_sesion.php" method="post">
                        <input type="submit" class="btn btn-danger" name="desconectar" value="Salir">
                    </form>
                </div>
            </div>
        </nav>';
    }

    //HEADER INDEX USUARIO
    function headerIndexUsu(){
        echo '<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.png" alt="" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link m-1 fs-5" href="index.php">Inicio</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_juegos.php">Juegos</a>
                        <a class="nav-link m-1 fs-5" href="controladores/c_plataformas.php">Plataformas</a>
                    </div>
                    <form action="controladores/c_cerrar_sesion.php" method="post">
                        <input type="submit" class="btn btn-danger" name="desconectar" value="Salir">
                    </form>
                </div>
            </div>
        </nav>';
    }

    //HEADER DEFAULT INVITADO
    function headerGuest(){
        echo '<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/img/logo.png" alt="" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link m-1 fs-5" href="../index.php">Inicio</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_juegos.php">Juegos</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_plataformas.php">Plataformas</a>
                    </div>
                    <form action="../controladores/c_login.php" method="post">
                        <input type="submit" class="btn btn-primary" name="enviar" value="Login">
                    </form>
                </div>
            </div>
        </nav>';
    }

    //HEADER DEFAULT ADMIN
    function headerAdmin(){
        echo '<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/img/logo.png" alt="" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link m-1 fs-5" href="../index.php">Inicio</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_juegos.php">Juegos</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_plataformas.php">Plataformas</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_usuarios.php">Usuarios</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_comentarios.php">Comentarios</a>
                    </div>
                    <form action="../controladores/c_cerrar_sesion.php" method="post">
                        <input type="submit" class="btn btn-danger" name="desconectar" value="Salir">
                    </form>
                </div>
            </div>
        </nav>';
    }

    //HEADER DEFAULT USUARIO
    function headerUsu(){
        echo '<nav class="navbar sticky-top sticky-top navbar-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/img/logo.png" alt="" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link m-1 fs-5" href="../index.php">Inicio</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_juegos.php">Juegos</a>
                        <a class="nav-link m-1 fs-5" href="../controladores/c_plataformas.php">Plataformas</a>
                    </div>
                    <form action="../controladores/c_cerrar_sesion.php" method="post">
                        <input type="submit" class="btn btn-danger" name="desconectar" value="Salir">
                    </form>
                </div>
            </div>
        </nav>';
    }

    //FUNCION PARA FOOTER
    function footer(){
        echo '';
    }
?>