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
    <title>Comentarios</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <section class="seccionComentarios">
            <h1>Comentarios</h1>
            <?php
                if(isset($ok)){
                    echo $mensaje;
                    if($ok){
                        header("refresh:2; url=../controladores/c_comentarios.php");
                    }
                }

                if($comentarios!=null){
                    echo "<table border>
                    <tr>
                        <td>Usuario</td>
                        <td>Juego</td>
                        <td>Fecha</td>
                        <td>Texto</td>
                        <td>Borrar</td>
                    </tr>";
                    for($i=0;$i<count($comentarios);$i++){
                        echo "<tr>
                        <td>".$comentarios[$i]['usuario']."</td>
                        <td>".$comentarios[$i]['juego']."</td>
                        <td>".$comentarios[$i]['fecha']."</td>
                        <td>".$comentarios[$i]['texto']."</td>";
                        echo '<td>
                            <form action="c_comentario_borrar.php" method="post">
                                <input type="hidden" name="id_usu" value="'.$comentarios[$i]['id_usuario'].'">
                                <input type="hidden" name="id_jue" value="'.$comentarios[$i]['id_juego'].'">
                                <input type="hidden" name="fecha" value="'.$comentarios[$i]['fecha'].'">
                                <input type="hidden" name="texto" value="'.$comentarios[$i]['texto'].'">
                                <input type="submit" name="enviar" id="btn-login" value="Borrar">
                            </form>
                        </td>';
                        echo "</tr>";
                    }
                    echo "</table>";
                }else{
                    echo "<p>Aún no hay comentarios</p>";
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