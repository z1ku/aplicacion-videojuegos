<?php
    if(!isset($controlador)){
        header("Location:../index.php");
    }
?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        echo $header;
    ?>
    <main>
        <section class="seccionUsuarios w-50 mx-auto my-5 min-vh-100">
            <h1 class="text-center">Editar usuario</h1>
            <?php
                if(isset($ok)){
                    echo $mensaje;
                    if($ok){
                        header("refresh:2; url=../controladores/c_usuarios.php");
                    }
                }

                echo '<form action="../controladores/c_modificar_usuario.php" method="post">
                    <input type="hidden" name="id_usuario" value="'.$datos['id'].'">
                    <input type="hidden" name="pass_anterior" value="'.$datos['pass'].'">
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre" maxlength=50 value="'.$datos['nombre'].'" required class="form-control" placeholder="Nombre">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="nick" maxlength=20 value="'.$datos['nick'].'" required class="form-control" placeholder="Nick">
                        <label for="nick">Nick:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="pass" maxlength=20 value="" class="form-control" placeholder="Constrase??a">
                        <label for="pass">Constrase??a:</label>
                    </div>
                    <div class="mb-3">';
                        if($datos['activo']==1){
                            echo '<div class="form-check">
                                <input type="radio" name="activar" value="1" checked class="form-check-input">
                                <label for="activado" class="form-check-label">Activado</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="activar" value="0" class="form-check-input">
                                <label for="desactivado" class="form-check-label">Desactivado</label>
                            </div>';
                        }else{
                            echo '<div class="form-check">
                                <input type="radio" name="activar" value="1" class="form-check-input">
                                <label for="activado" class="form-check-label">Activado</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="activar" value="0" checked class="form-check-input">
                                <label for="desactivado" class="form-check-label">Desactivado</label>
                            </div>';
                        }
                    echo '</div>
                    <input type="submit" name="enviar" value="Guardar" class="btn btn-success">
                </form>';
            ?>
        </section>
    </main>
    <footer>
            <div>
                <a href="#">Pol??tica de privacidad</a>
                <a href="#">Condiciones</a>
                <a href="#">Contacto</a>
            </div>
            <span>DESARROLLADO POR RICARDO ROMERO BUSTOS</span>
        </footer>
</body>
</html>