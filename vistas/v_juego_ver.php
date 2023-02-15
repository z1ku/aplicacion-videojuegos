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
    <title>Juegos</title>
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
        <section class="seccionJuegos">
            <?php
                echo "<div class=\"infoJuego\">
                <h1>".$juego['nombre']."</h1>
                <img src=\"../assets/img/juegos/".$juego['caratula']."\">
                <p>".$juego['descripcion']."</p>
                <p>".$plataforma['nombre']."</p>
                <p>".$juego['fecha_lanzamiento']."</p>
                </div>";

                if($tipo_usu=="usuario"){

                    if($comentarios!=null){
                        echo "<div class=\"cajaComentarios\">";
                        for($i=0;$i<count($comentarios);$i++){
                            echo '<div class="comentario">
                                <p>'.$comentarios[$i]['nick'].'</p>
                                <p>'.$comentarios[$i]['fecha'].'</p>
                                <p>'.$comentarios[$i]['texto'].'</p>
                            </div>';
                        }
                        echo "</div>";
                    }

                    if(isset($ok)){
                        echo $mensaje;
                    }

                    echo '<form action="../controladores/c_insertar_comentario.php" method="post">
                    <input type="hidden" name="id_juego" value="'.$id.'">
                    <div>
                        <label for="texto">Comentario:</label>
                        <textarea name="texto" cols="30" rows="10" maxlength="100" required></textarea>
                    </div>
                    <input type="submit" name="insertar_comentario" value="Enviar">
                    </form>';
                }
            ?>
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