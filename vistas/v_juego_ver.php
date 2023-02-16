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
        <section class="seccionVerJuego w-75 mx-auto my-5 min-vh-100">
            <?php
                $fecha=date("d-m-Y",strtotime($juego['fecha_lanzamiento']));

                echo "<div class=\"infoJuego text-center\">
                <h1>".$juego['nombre']."</h1>
                <img class=\"mb-3\" src=\"../assets/img/juegos/".$juego['caratula']."\">
                <p>".$juego['descripcion']."</p>
                <p>".$plataforma['nombre']."</p>
                <p>".$fecha."</p>
                </div>";

                if($tipo_usu=="usuario"){

                    if($comentarios!=null){
                        echo "<div class=\"cajaComentarios\">";
                        echo "<h2>Comentarios</h2>";
                        for($i=0;$i<count($comentarios);$i++){
                            $fecha=date("d-m-Y",strtotime($comentarios[$i]['fecha']));
                            echo '<div class="comentario d-flex flex-column mb-3">
                                <div class="datos d-flex">
                                    <p>'.$comentarios[$i]['nick'].'</p>
                                    <p>'.$fecha.'</p>
                                </div>
                                <p class="my-auto p-3">'.$comentarios[$i]['texto'].'</p>
                            </div>';
                        }
                        echo "</div>";
                    }

                    if(isset($ok)){
                        echo $mensaje;
                    }

                    echo '<form action="../controladores/c_insertar_comentario.php" method="post">
                    <input type="hidden" name="id_juego" value="'.$id.'">
                    <div class="form-floating mb-3">
                        <textarea name="texto" maxlength="100" required class="form-control" placeholder="Deja tu comentario"></textarea>
                        <label for="texto">Comentario</label>
                    </div>
                    <input type="submit" name="insertar_comentario" value="Enviar" class="btn btn-success">
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