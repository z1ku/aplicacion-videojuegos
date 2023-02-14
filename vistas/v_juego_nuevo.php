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
</head>
<body>
    <main>
        <section class="seccionJuegos">
            <h1>Insertar nuevo juego</h1>
            <?php
                if(isset($ok)){
                    echo $mensaje;
                    if($ok){
                        header("refresh:2; url=../controladores/c_juegos.php");
                    }
                }
            ?>
            <form action="../controladores/c_insertar_juego.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nombre">Nombre:</label>
                    <!-- AÑADIR EL REQUIRED -->
                    <input type="text" name="nombre" maxlength=50 >
                </div>
                <div>
                    <label for="desc">Descripción:</label>
                    <input type="text" name="desc" maxlength=50 required>
                </div>
                <div>
                    <label for="plata">Plataforma:</label>
                    <select name="plata" required>
                        <?php
                            for($i=0;$i<count($plataformas);$i++){
                                echo '<option value="'.$plataformas[$i]['id'].'">'.$plataformas[$i]['nombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="fecha_lanz">Fecha de lanzamiento:</label>
                    <input type="date" name="fecha_lanz" required>
                </div>
                <div>
                    <label for="foto">Caratula:</label>
                    <input type="file" name="foto" required>
                </div>
                <div>
                    <input type="radio" name="activar" value="1" checked>
                    <label for="activado">Activado</label>
                    <input type="radio" name="activar" value="0">
                    <label for="desactivado">Desactivado</label>
                </div>
                <input type="submit" name="insertar_juego" value="Guardar">
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