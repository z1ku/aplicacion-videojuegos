<?php
    // FUNCIONES PARA HEADER
    ////////////////////////////////////////////////////////////////////
    //HEADER INDEX INVITADO
    function headerIndexGuest(){
        echo '<header>
            <a href="index.php"><img src="assets/img/logo.png" alt="" id="logo"></a>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
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