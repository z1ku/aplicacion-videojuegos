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
        echo '<header>
            <a href="index.php"><img src="assets/img/logo.png" alt="" id="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="controladores/c_juegos.php">Juegos</a></li>
                    <li><a href="controladores/c_plataformas.php">Plataformas</a></li>
                </ul>
            </nav>
            <div class="rrss">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-discord"></i></a>
            </div>
            <div class="login">
                <form action="vistas/v_login.php" method="post">
                    <input type="submit" name="enviar" id="btn-login" value="Login">
                </form>
            </div>
        </header>';
    }

    //HEADER INDEX ADMIN
    function headerIndexAdmin(){
        echo '<header>
            <a href="index.php"><img src="assets/img/logo.png" alt="" id="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="controladores/c_juegos.php">Juegos</a></li>
                    <li><a href="controladores/c_plataformas.php">Plataformas</a></li>
                    <li><a href="controladores/c_usuarios.php">Usuarios</a></li>
                    <li><a href="controladores/c_comentarios.php">Comentarios</a></li>
                </ul>
            </nav>
            <div class="rrss">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-discord"></i></a>
            </div>
            <div class="login">
                <form action="controladores/c_cerrar_sesion.php" method="post">
                    <input type="submit" name="desconectar" id="btn-login" value="Salir">
                </form>
            </div>
        </header>';
    }

    //HEADER INDEX USUARIO
    function headerIndexUsu(){
        echo '<header>
            <a href="index.php"><img src="assets/img/logo.png" alt="" id="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="controladores/c_juegos.php">Juegos</a></li>
                    <li><a href="controladores/c_plataformas.php">Plataformas</a></li>
                </ul>
            </nav>
            <div class="rrss">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-discord"></i></a>
            </div>
            <div class="login">
                <form action="controladores/c_cerrar_sesion.php" method="post">
                    <input type="submit" name="desconectar" id="btn-login" value="Salir">
                </form>
            </div>
        </header>';
    }

    //HEADER DEFAULT INVITADO
    function headerGuest(){
        echo '<header>
            <a href="../index.php"><img src="../assets/img/logo.png" alt="" id="logo"></a>
            <nav>
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="php/juegos.php">Juegos</a></li>
                    <li><a href="php/plataformas.php">Plataformas</a></li>
                </ul>
            </nav>
            <div class="rrss">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-discord"></i></a>
            </div>
            <div class="login">
                <form action="vistas/v_login.php" method="post">
                    <input type="submit" name="enviar" id="btn-login" value="Login">
                </form>
            </div>
        </header>';
    }

?>