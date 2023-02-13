<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <main>
        <section class="seccionUsuarios">
            <h1>Insertar nuevo usuario</h1>
            <?php
                if(isset($ok)){
                    echo $mensaje;
                    if($ok){
                        header("refresh:2; url=../controladores/c_usuarios.php");
                    }
                }
            ?>
            <form action="../controladores/c_insertar_usuario.php" method="post">
                <div>
                    <label for="nombre">Nombre:</label>
                    <!-- AÑADIR EL REQUIRED -->
                    <input type="text" name="nombre" maxlength=50 >
                </div>
                <div>
                    <label for="nick">Nick:</label>
                    <input type="text" name="nick" maxlength=20 required>
                </div>
                <div>
                    <label for="pass">Constraseña:</label>
                    <input type="password" name="pass" maxlength=20 required>
                </div>
                <input type="submit" name="insertar_usuario" value="Guardar">
            </form>
        </section>
    </main>
    <footer>
            <div>
                <a href="#">Política de privacidad</a>
                <a href="#">Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <span>DESARROLLADO POR RICARDO ROMERO BUSTOS</span>
        </footer>
</body>
</html>